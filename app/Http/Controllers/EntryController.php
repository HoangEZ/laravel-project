<?php

namespace App\Http\Controllers;
use App\EntryModel;
use App\CommentModel;
use Illuminate\Http\Request;

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
		
	}
}
