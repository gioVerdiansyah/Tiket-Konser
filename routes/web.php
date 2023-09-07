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
    return view('welcome');
});
Route::get('/login', [SesiController::class, 'login'])->name('index');
Route::post('/login', [SesiController::class, 'login']);
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/jualtiket', function () {
    return view('jual_tiket');
});
Route::get('/profile', function () {
    return view('profile');
});
