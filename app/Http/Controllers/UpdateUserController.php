<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoginModel;
use Auth;
class UpdateUserController extends Controller
{
    public function update_name(Request $request){
    	$data = LoginModel::select('name')->where('name',$request->input('name'))->first();
    	if(empty($data)){
    		LoginModel::where('id',$request->session()->get('id'))->update(['name'=>$request->input('name')]);
    		return 'name_success';
    	}else{
    		return 'Tên đã tồn tại';
    	}
    }
    public function update_email(Request $request){
    	$data = LoginModel::select('name')->where('email',$request->input('email'));
    	if(empty($data->name)){
    		LoginModel::where('id',$request->session()->get('id'))->update(['email'=>$request->input('email')]);
    		return 'email_success';
    	}else{
    		return 'email đã tồn tại';
    	}
    }
    public function update_password(Request $request){
    	if($request->input('new_pass')!=$request->input('new_pass_confirm')){
    		return 'Mật khẩu không khớp';
    	}
    	$data = LoginModel::select('name')->where('id',$request->session()->get('id'))->first();
        if(Auth::attempt(['name'=>$data->name,'password'=>$request->input('password')])){
    		LoginModel::where('id',$request->session()->get('id'))->update(['password'=>bcrypt($request->input('new_pass'))]);
    		return 'password_success';
    	}else{
    		return 'Sai mật khẩu';
    	}
    }
}
