<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginModel;
use Auth;
class LoginController extends Controller
{
	public function login(Request $request){
		if($request->session()->exists('id')){
			return redirect('admin/');
		}else{
			return view('admin.login');
		}
	}
    public function verify(Request $request){
    	if(Auth::attempt(['name'=>$request->input('name'),'password'=>$request->input('password')])){
            $data = LoginModel::select('id')->where('name',$request->input('name'))->first();
    		$request->session()->put('id',$data->id);
    		return 1;
    	}else{
    		return 0;
    	}
    }
    public function logout(Request $request){
        $request->session()->forget('id');
        return redirect('admin/login');
    }
}
