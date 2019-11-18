<?php

namespace App\Http\Middleware;

use Closure;
use App\CustomUser;
use Illuminate\Support\Facades\Auth;

class Teacher
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
        if(Auth::user()->role != 2) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
