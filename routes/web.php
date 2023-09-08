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
    return view('login');
});

Route::get('/detail-tiket', function () {
    return view('detail-tiket');
});

Route::get('/loginview', function () {
    return view('login');
})->name('loginview');

// Define the route for the 'login' action from the controller
Route::get('/', [SesiController::class, 'login'])->name('login');


Route::get('/cart', function () {
    return view('cart');
});

Route::get('/jualtiket', function () {
    return view('jual_tiket');
});

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/history', function () {
    return view('history');
});
