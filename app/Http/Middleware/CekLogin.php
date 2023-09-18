<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        if (Auth::check()) {
            return $next($request);
        } else {
            // Jika belum login, set pesan alert ke dalam session
            session()->flash('info', 'Silahkan login terlebih dahulu!');
            return redirect()->route('login');
        }
    }
}
