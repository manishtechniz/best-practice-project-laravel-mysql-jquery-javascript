<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;

class UserLoginAuto
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Login user if not logged in
        if (! Auth::check()) {
            if (empty(User::first())) {
                Artisan::call('db:seed');
            }
            
            Auth::loginUsingId(User::first()->id);
        }
        
        return $next($request);
    }
}
