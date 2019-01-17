<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutModel;

class AboutController extends Controller
{
    public function display(){
        $data = AboutModel::select('about')->first();
        return view('about',['data'=>$data]);
    }
    public function update(){
        $data = AboutModel::select('about')->first();
        return view('admin.about_form',['data'=>$data]);
    }
}
