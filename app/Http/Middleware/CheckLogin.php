<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == '1'){
                return $next($request);
            }else{
                return redirect()->route('users.home')
                // ->with('error','Bạn không có quyền')
                ;
            }
        }else{
            return redirect()->route('viewLogin')
            ->with('error','Bạn phải đăng nhập trước');    
        }
    }
}
