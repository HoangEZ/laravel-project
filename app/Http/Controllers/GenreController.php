<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GenreModel;

class GenreController extends Controller
{
    public function manage(Request $request){
        $datas = GenreModel::select('id','genre')->get();
        $user = $request->attributes->get('username');
        return view('admin.genre_manage',['datas'=>$datas,'user'=>$user]);
    }
    public function delete(Request $request){
        GenreModel::find($request->input('id'))->delete();
    }
}
