<?php

namespace App\Http\Controllers;
use Validator;
use App\CommentModel;
use App\ImageModel;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private function reCapcha($key,$token){
        $verify_url = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($verify_url, CURLOPT_POST, true);
        curl_setopt($verify_url, CURLOPT_POSTFIELDS,'secret='.$key.'&response='.$_POST['token']);
        curl_setopt($verify_url, CURLOPT_RETURNTRANSFER,true);
        $value = curl_exec($verify_url);
        return json_decode($value);
    }
    private function uuid(){
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    private function crop($url,$top,$left,$size){
    $type = exif_imagetype($url);
    switch ($type) {
        case IMAGETYPE_JPEG:
            $img = imagecreatefromjpeg($url);
            break;
        case IMAGETYPE_PNG:
            $img = imagecreatefrompng($url);
            break;

        default:
            return false;
    }
    $s_width = imagesx($img);
    $s_height = imagesy($img);
    $final_img = imagecreatetruecolor(80, 80);
    $crop_img = imagecrop($img,['x'=>$left,'y'=>$top,'width'=>$size,'height'=>$size]);
    imagecopyresized($final_img, $crop_img, 0, 0, 0, 0, 80, 80, $size, $size);
    $uuid = $this->uuid();
    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($final_img,public_path('images/'.$uuid.'.jpg'));
            $url = 'public/images/'.$uuid.'.jpg';
            break;
        case IMAGETYPE_PNG:
            imagepng($final_img,public_path('images/'.$uuid.'.png'));
            $url = 'public/images/'.$uuid.'.png';
            break;
        default:
            return false;
    }
    //insert image url into table 
    $id = ImageModel::insertGetId(['url'=>$url]);
    imagedestroy($img);
    imagedestroy($crop_img);
    imagedestroy($final_img);
    return $id;
    }
    public function add(Request $request){
        if(!($this->reCapcha('6Lf2mocUAAAAAELvDI95xnemQfCULg5CH3y9TUR3',$request->input('token'))->success)){
            return 004;//website duoc bao ve boi capcha
        }
        if($img_id=$this->crop($request->input('avatar'),$request->input('top'),$request->input('left'),$request->input('size'))){
        	$validator = Validator::make($request->all(),[
        		'name'=>'required',
        		'email'=>'required|email',
        		'avatar'=>'required|url',
        		'comment'=>'required'
        	]);
        	if($validator->fails()){
        		return 002;//loi kiem duyet
        	};
        	$id = CommentModel::insertGetId([
        		'name'=>$request->input('name'),
        		'image_id'=>$img_id,
        		'email'=>$request->input('email'),
        		'comment'=>$request->input('comment'),
        		'entry_id'=>$request->input('entry_id'),
        		'created_at'=>date('Y-m-d H:i:s')
        	]);
        	if($id){
        		return 003;
        	}else{
        		return 002;
        	}
    	}else{
            return 001;//dinh dang khong ho tro
        };
    }
    public function display($id){
        $comment =CommentModel::selectRaw('comment.id, url, email, name, comment, date_format(comment.created_at,\'%d %M %Y, %W\') as date,pending')->join('image','image.id','=','comment.image_id')->where('entry_id',$id)->get();
        return view('admin.comment',['data'=>$comment]);
    }
    private function pending_update($request,$param){
        return CommentModel::where('id',$request->input('id'))->update(['pending'=>$param]);
    }
    public function accept(Request $request){
        return $this->pending_update($request,0);
    }
    public function reject(Request $request){
        return $this->pending_update($request,1);
    }
}
