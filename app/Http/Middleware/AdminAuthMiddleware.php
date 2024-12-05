<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            $user = Auth::user(); 
            if($user->hasRole('SUPER-ADMIN') || $user->hasRole('OFFICE-MANAGERS')) {
                return $next($request);
            }else {
                return redirect()->route('super-admin.login')->withError('Please login with valid credentials')->withInput();
            } 
        }else {
            return redirect()->route('super-admin.login')->withError('Please login with valid credentials')->withInput();
        }
    }
}
