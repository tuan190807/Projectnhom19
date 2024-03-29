<?php

namespace App\Http\Middleware;

use Closure;
use App\CustomUser;

class Admin
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
        if(Auth::user()->role != 1) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
