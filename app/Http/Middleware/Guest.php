<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guest
{
   
    public function handle(Request $request, Closure $next)
    {
         if(Auth::check()) {
            if(Auth::user()->role == 'admin'){
                return redirect()->route('adminDash')->with('notAllowed', 'Anda sudah login!');
            }else{
                return redirect('/user/dashboard')->with('notAllowed', 'Anda sudah login!');
            }
           }
           return $next($request);      
    }
}
