<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Cek apakah pengguna sudah login
        if (!auth()->check()) {
            // Jika pengguna belum login, tampilkan pesan alert
            Session::flash('alert', 'Anda harus login terlebih dahulu.');
            return redirect()->route('login'); // Ganti 'login' dengan nama rute login Anda
        }

        return view('user_page.home');
    }
}