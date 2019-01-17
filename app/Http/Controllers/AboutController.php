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
    public function update(Request $request){
        $data = AboutModel::select('about')->first();
        $user = $request->attributes->get('username');
        return view('admin.about_form',['data'=>$data,'user'=>$user]);
    }
    private function eliminate_script($text){
		return preg_replace(['/<script .*>/','/<\/script>/'],'',$text);
	}
    public function update_process(Request $request){
        AboutModel::select()->update(['about'=>$this->eliminate_script($request->input('about'))]);
    }
}
