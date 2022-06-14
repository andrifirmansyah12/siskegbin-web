<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->hasRole('admin')) {
            return $next($request)->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
        }
        return redirect()->route('home');
    }
}
