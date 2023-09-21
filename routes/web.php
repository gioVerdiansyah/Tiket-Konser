<?php

use App\Http\Controllers\KonserController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdateProfileController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\GoogleMapController;
use App\Http\Controllers\IndoregionController;
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
})->middleware('CekAdmin')->name('index');

Auth::routes();

Route::get('/login', [SesiController::class, 'login'])->name('index');

Route::post('/login', [SesiController::class, 'login']);



Route::get('/cart', function () {
    return view('cart');
});

Route::get('/jualtiket', function () {
    return view('jual_tiket');
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
})->name('cart');

Route::get('/konser', [KonserController::class, 'index'])->name('konser')->middleware('CekLogin');
Route::get('/konser', [KonserController::class, 'search'])->name('konser.search')->middleware('CekLogin');
Route::get('/konser/kategori/{id}', [KonserController::class, 'kategori'])->middleware('CekLogin');

// Profile User
Route::middleware('CekLogin')->group(function () {
    Route::get('/profile', [UpdateProfileController::class, 'index'])->name('profileUser');

    Route::put('/profile/{user}', [UpdateProfileController::class, 'update'])->name('updateProfile');

    Route::get('/history', function () {
        return view('user_page.history');
    })->name('history');

    Route::get('/jualtiket',[IndoregionController::class,'jualtiket'])->name('jualtiket');
    Route::post('/getkota',[IndoregionController::class,'getkota'])->name('getkota');
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
