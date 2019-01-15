<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\LoginModel;

class RegisterController extends Controller
{
    private function reCapcha($key,$token){
        $verify_url = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($verify_url, CURLOPT_POST, true);
        curl_setopt($verify_url, CURLOPT_POSTFIELDS,'secret='.$key.'&response='.$_POST['token']);
        curl_setopt($verify_url, CURLOPT_RETURNTRANSFER,true);
        $value = curl_exec($verify_url);
        return json_decode($value);
    }
    public function add(Request $request){
        if(!($this->reCapcha('6LeqdokUAAAAAFHh301LMtrPOnaSaeoL4gyXkLuN',$request->input('token'))->success)){
            return 004;//website duoc bao ve boi capcha
        }
        if($request->input('password')!=$request->input('password_compare')){
        	return 000;
        }
        var_dump($request->all());
    	$validator = Validator::make($request->all(),[
    		'name'=>'required',
    		'email'=>'required|email',
    		'password'=>'required'
    	]);
    	if($validator->fails()){
    		return 002;//loi kiem duyet
    	};
    	$id = LoginModel::insertGetId([
    		'name'=>$request->input('name'),
    		'email'=>$request->input('email'),
    		'password'=>bcrypt($request->input('password')),
    		'created_at'=>date('Y-m-d H:i:s')
    	]);
    	if($id){
    		return 003;
    	}else{
    		return 002;
    	}
    }
    public function display(){
    	return view('admin.register');
    }
}
