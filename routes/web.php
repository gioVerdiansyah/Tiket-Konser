<?php

use App\Http\Controllers\SesiController;
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
});

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
});


Route::get('/profile', function () {
    return view('user_page.profile');
});
Route::get('/history', function () {
    return view('user_page.history');
});
