<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{ 

    //...$roles -> untuk mengubah data yang dikirim ke middleware menjadi bentukan array
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(in_array(Auth::user()->role, $roles)){
            return $next($request);
        }
        return redirect('/error');
    }
}
