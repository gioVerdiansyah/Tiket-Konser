<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index(){
        return view('welcome');
    }

    function login(Request $request){
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($infologin)){
            echo "sukses";
            exit();
        } else {
            return redirect('')->withErrors('Username atau Password yang dimasukkan tidak sesuai')->withInput();
        }
    }
}
