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
        return $next($request);
    }
}
