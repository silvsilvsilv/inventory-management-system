<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->role === 'admin') {
           return redirect()->route('admin.dashboard'); // Redirect authenticated users to the admin dashboard
        }
        else if(Auth::check() && Auth::user()->role === 'manager') {
           return redirect()->route('manager.dashboard'); // Redirect authenticated users to the manager dashboard
        }
        return $next($request);
    }
}
