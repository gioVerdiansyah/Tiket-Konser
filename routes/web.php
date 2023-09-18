<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user_page.home');
});

Route::get('/profile', function () {
    return view('user_page.profile');
});

Route::get('/detail-tiket', function () {
    return view('user_page.detail-tiket');
})->middleware('CekLogin');

// Route::get('/loginview', function () {
//     return view('login');
// })->name('loginview');

// // Define the route for the 'login' action from the controller
// Route::get('/', [SesiController::class, 'login'])->name('login');


Route::get('/cart', function () {
    return view('user_page.cart');
});

Route::get('/jualtiket', function () {
    return view('user_page.jual_tiket');
});



Route::get('/konser', function() {
    return view('user_page.konser');
})->middleware('CekLogin');


Route::get('/profile', function () {
    return view('user_page.profile');
});
Route::get('/history', function () {
    return view('user_page.history');
});
// Route::get('/homeAdmin', function () {
//     return view('admin_page.homeAdmin');
// })->middleware(['CekLogin', 'CekRole:admin']);

Route::get('/penjualan', function () {
    return view('admin_page.penjualan');
})->name('penjualan');


Auth::routes();

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/homeAdmin', function () {
    return view('admin_page.homeAdmin');
})->middleware(['CekLogin', 'CekRole:admin'])->name('homeAdmin');

Route::middleware(['CekRole:user,admin'])->group(function () {
    Route::get('user', function () {
        return view('user_page.home');
    });
});
