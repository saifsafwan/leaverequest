<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class IsStaff
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
        if (Auth::check()){
            if (auth()->user()->user_level === 'staff') {
                return $next($request);
            } else{
                return redirect()->route('welcome');
            }
        } else{
            return redirect()->route('welcome');
        }
    }
}
