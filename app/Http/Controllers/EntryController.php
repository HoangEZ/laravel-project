<?php

namespace App\Http\Controllers;
use App\EntryModel;
use App\CommentModel;
use App\GenreModel;
use App\BelongModel;
use Validator;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class EntryController extends Controller
{
	private function select($id, $request){
		if(!empty($id)){
			$data = EntryModel::selectRaw('entry.id as id,title,content, date_format(entry.created_at,\'%d %M %Y, %W\') as date,name')->join('users','users.id','=','entry.user_id')->where('entry.id',$id)->first();
		}else{
			$request->session()->get('id');
			$data = EntryModel::selectRaw('entry.id as id,title,content, date_format(entry.created_at,\'%d %M %Y, %W\') as date,name')->join('users','users.id','=','entry.user_id')->where('entry.user_id',$request->session()->get('id'))->get();
		}
		return $data;
	}
    public function entry($id){
    	$data = $this->select($id,null);
    	$comment =CommentModel::selectRaw('comment.id, url, name, comment, date_format(comment.created_at,\'%d %M %Y, %W\') as date')->join('image','image.id','=','comment.image_id')->where('pending','<>',true)->where('entry_id',$id)->get();
    	return view('blog-detail',['data'=>$data,'comment'=>$comment]);
    }
    public function manage(Request $request){
		$data = $this->select(null,$request);
		$user = $request->attributes->get('username');
    	return view('admin.entry_manage',['data'=>$data,'user'=>$user]);
	}
	public function add(Request $request){
		$user = $request->attributes->get('username');
		$genre = GenreModel::select('id','genre')->get();
		return view('admin.entry_form',['user'=>$user,'task'=>'add','genres'=>$genre]);
	}
	public function update(Request $request,$id){
		$user = $request->attributes->get('username');
		$data = EntryModel::select('id','title','content','image')->where('id',$id)->first();
		$belongs = GenreModel::selectRaw('genre_id as id, genre')->join('belong','genre_id','=','genre.id')->distinct()->where('entry_id',$id)->get();
		$genreid = [];
		foreach($belongs as $belong){
			array_push($genreid,$belong->id);
		}
		$genres = GenreModel::select('id','genre')->whereNotIn('id',$genreid)->get();
		return view('admin.entry_form',['user'=>$user,'data'=>$data,'id'=>$id,'belongs'=>$belongs,'genres'=>$genres,'task'=>'update']);
	}
	public function update_process(Request $request){
		$genreids = $request->input('genreid');
		$id = $request->input('id');
		$insertArray = [];
		foreach ($genreids as $genreid) {
			$insertArray[]=[
				'entry_id'=>$id,
				'genre_id'=>$genreid
			];
		}
		DB::transaction(function(&$result) use ($id,$insertArray,$request){
			BelongModel::where('entry_id',$id)->delete();
			BelongModel::insert($insertArray);
			EntryModel::where('id',$id)->update(['title'=>$request->input('title'),'content'=>$this->eliminate_script($request->input('content')),'image'=>$request->input('image')]);
		},5);
		return 1;
	}
	private function eliminate_script($text){
		return preg_replace(['/<script .*>/','/<\/script>/'],'',$text);
	}
	public function add_process(Request $request){
		if(empty($request->input('content'))){
			return 'Nội dung trắng';
		}
		$content = $this->eliminate_script($request->input('content'));
		$validator = Validator::make($request->all(),[
			'title'=>'required',
			'image'=>'required|url',
			'content'=>'required'
		]);
		if(!$validator->fails()){
			DB::transaction(function() use ($request,$content){
				$id = EntryModel::insertGetId([
					'title'=>$request->input('title'),
					'image'=>$request->input('image'),
					'content'=>$content,
					'user_id'=>$request->session()->get('id')
				]);
				$genreids = $request->input('genreid');
				foreach($genreids as $genreid){
					BelongModel::insert([
						'entry_id'=>$id,
						'genre_id'=>$genreid
					]);
				}
			},5);
			return 1;
		}else{
			$errors=$validator->errors();
			$msg = '';
			foreach($errors->all() as $error){
				$msg .= $error."\n";
			}
			return $msg;
		}
	}
	public function delete_process(Request $request){
		if($request->has('delAll')){
			$result = EntryModel::where('user_id',$request->session()->get('id'))->delete();
		}else{
			$result = EntryModel::destroy($request->input('id'));
		}
		return ($result)? 1:0;
	}
}
