<?php

use App\Http\Controllers\KonserController;
use App\Http\Controllers\BuatKonserController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdateProfileController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes(['verify' => true]);

// Route::get('/email/verify', [VerificationController::class, 'notice'])->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::post('/email/verification-notification', [VerificationController::class, 'send'])->name('verification.send');


Route::get('/detail-tiket/{id}', [KonserController::class, 'detailTiket'])->name('detail_konser');

// Route::get('/loginview', function () {
//     return view('login');
// })->name('loginview');

// // Define the route for the 'login' action from the controller
// Route::get('/', [SesiController::class, 'login'])->name('login');


Route::get('/cart', function () {
    return view('user_page.cart');
})->name('cart');

Route::get('/konser', [KonserController::class, 'index'])->name('konser');
Route::get('/konser/search', [KonserController::class, 'search'])->name('konser.search');
Route::get('/konser/kategori/{id}', [KonserController::class, 'kategori']);

// User
Route::middleware('CekLogin')->group(function () {
    Route::get('/profile', [UpdateProfileController::class, 'index'])->name('profileUser');
    Route::put('/profile/{user}', [UpdateProfileController::class, 'update'])->name('updateProfile');
    Route::put('/profile/pass/{user}', [UpdateProfileController::class, 'chagePass'])->name('updateProfilePass');

    Route::get('/history', function () {
        return view('user_page.history');
    })->name('history');
    Route::resource('/buatkonser', KonserController::class);
});
// Admin
Route::middleware(['CekLogin', 'CekRole:admin'])->group(function () {
    Route::get('/homeAdmin', function () {
        return view('admin_page.homeAdmin');
    })->name('homeAdmin');

    Route::get('/penjualan', function () {
        return view('admin_page.penjualan');
    })->name('penjualan');
});



Auth::routes();

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['CekRole:user,admin'])->group(function () {
    Route::get('user', function () {
        return view('user_page.home');
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');

Route::get('/done', function() {
    return view('auth.donereset');
});