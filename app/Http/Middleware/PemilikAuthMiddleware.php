<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PemilikAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('pemilik')->check()) {
            return redirect('/pemilik'); // Halaman login pemilik
        }
        return $next($request);
    }
}
