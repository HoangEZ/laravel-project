<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
	public function login(Request $request){
		if($request->session()->exists('user')){
			return redirect('admin/');
		}else{
			return view('admin.login');
		}
	}
    public function verify(Request $request){
    	if(Auth::attempt(['name'=>$request->input('name'),'password'=>$request->input('password')])){
    		$request->session()->put('user',$request->input('name'));
    		return 1;
    	}else{
    		return 0;
    	}
    }
}
