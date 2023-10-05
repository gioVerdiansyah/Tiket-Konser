<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendapatanUserController extends Controller
{
    public function grafik(){
        return view('user_page.pendapatanku');
    }
}
