<?php

namespace App\Http\Middleware;

use Closure;
use App\LoginModel;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->exists('id')){
            return redirect('admin/login');
        }
        $user_id = $request->session()->get('id');
        $data = LoginModel::select('id','name','email')->where('id',$user_id)->first();
        $request->attributes->add(['username'=>$data->name]);
        return $next($request);
    }
}
