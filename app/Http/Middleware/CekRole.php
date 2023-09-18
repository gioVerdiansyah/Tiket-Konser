<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Izinkan akses jika URL adalah root
        if ($request->is('/')) {
            return $next($request);
        }

        // Periksa apakah pengguna memiliki salah satu peran yang diizinkan
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        // Jika pengguna tidak memiliki peran yang diizinkan, kembalikan tanggapan status 403 (Forbidden)
        return response()->view('error_page.403'); // Gantilah dengan tanggapan yang sesuai untuk aplikasi Anda.
    }
}
