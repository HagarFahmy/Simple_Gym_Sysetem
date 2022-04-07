<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next = null, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }
        return redirect('dashboard/login');
    }
}
