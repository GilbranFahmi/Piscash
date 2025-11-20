<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AuthKasir
{
    public function handle($request, Closure $next)
{
    dd("Middleware AuthKasir jalan");

    if (!Session::has('kasir_id')) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    return $next($request);
}
}
