<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GenreModel;

class GenreController extends Controller
{
    public function manage(){
        $datas = GenreModel::select('id','genre')->get();
        return view('admin.genre_manage',['datas'=>$datas]);
    }
    public function delete(Request $request){
        GenreModel::find($request->input('id'))->delete();
    }
}
