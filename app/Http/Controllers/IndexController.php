<?php

namespace App\Http\Controllers;

use App\GenreModel;
use App\EntryModel;
use App\BelongModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
    	$genre = GenreModel::select('id','genre')->get();
    	$entry = EntryModel::select('id','title','image')->get();
    	for($i=0;$i<count($entry);$i++){
    		$genreOfEntry = BelongModel::select('genre_id')->where('entry_id',$entry[$i]->id)->get();
    		for($j=0;$j<count($genreOfEntry);$j++){
    			$entry[$i]->belong[]=$genreOfEntry[$j];
    		}
    	}
    	return view('index',['genre'=>$genre,'entry'=>$entry]);
    }
    public function adminIndex(Request $request){
        $user = $request->session()->get('user');
        return view('admin.index',['user'=>$user]);
    }
}
