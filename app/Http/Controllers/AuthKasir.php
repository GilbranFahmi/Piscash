<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthKasir
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login atau belum
        if (!Session::has('kasir')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
