<?php

namespace App\Http\Controllers;
use App\EntryModel;
use App\CommentModel;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function entry($id){
    	$data = EntryModel::selectRaw('entry.id as id,title,content, date_format(entry.created_at,\'%d %M %Y, %W\') as date,name')->join('users','users.id','=','entry.user_id')->where('entry.id',$id)->first();
    	$comment =CommentModel::selectRaw('comment.id, url, name, comment, date_format(comment.created_at,\'%d %M %Y, %W\') as date')->join('image','image.id','=','comment.image_id')->where('pending','<>',true)->get();
    	return view('blog-detail',['data'=>$data,'comment'=>$comment]);
    }
}
