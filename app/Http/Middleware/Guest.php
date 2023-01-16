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
            if(Auth::user()->role == 'user'){
                return redirect()->route('userDash')->with('notAllowed', 'Anda sudah login!');
            }else{
                return redirect('/admin/dashboard')->with('notAllowed', 'Anda sudah login!');
            }
            //kalau gak ada history login bakal dikembalikan ke halaman login dengan pesan error
           
           }
           return $next($request);      
    }
}
