<?php

use App\Http\Controllers\AdminKonserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\KonserController;
use App\Http\Controllers\BuatKonserController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdateProfileController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChartUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListOrderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentDataController;
use App\Http\Controllers\PendapatanUserController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index')->middleware('CekAdmin');
Auth::routes(['verify' => true]);

Route::get('/detail-tiket/{id}', [KonserController::class, 'detailTiket'])->name('detail_konser');

Route::get('/konser', [KonserController::class, 'index'])->name('konser');
Route::get('/konser/search', [KonserController::class, 'search'])->name('konser.search');
Route::get('/konser/kategori/{id}', [KonserController::class, 'kategori']);

// User
Route::middleware(['CekLogin', 'CekRole:user'])->group(function () {
    Route::get('/profile', [UpdateProfileController::class, 'index'])->name('profileUser');
    Route::put('/profile/{user}', [UpdateProfileController::class, 'update'])->name('updateProfile');
    Route::put('/profile/pass/{user}', [UpdateProfileController::class, 'chagePass'])->name('updateProfilePass');
    Route::get('/profile/history', [UpdateProfileController::class, 'history'])->name('history');
    Route::put('/marked', [UpdateProfileController::class, 'markNotif'])->name('read-notif');
    Route::delete('/delete-notif', [UpdateProfileController::class, 'deleteNotif'])->name('delete-notif');

    Route::get('/konserku', [KonserController::class, 'konserku'])->name('konserku');
    Route::get('pendapatanku/{id}', [ChartUserController::class, 'index'])->name('pendapatanku');
    Route::get('get-payment-data/{id}', [PaymentDataController::class, 'getPaymentData'])->name('get-payment-data');
    Route::get('/konserku/search', [KonserController::class, 'searchKonserku'])->name('konserku.search');
    Route::resource('/buatkonser', KonserController::class);
    Route::resource('orders', OrderController::class);
    Route::post('/orders/trans', [OrderController::class, 'trans'])->name('sendTrans');
    Route::post('/detail-tiket/{id}/comment', [CommentController::class, 'store'])->name('comment');
    Route::get('/detail-tiket/{id}/comment/get', [CommentController::class, 'get'])->name('load-comments');
    Route::delete('/detail-tiket/comment/{id}', [CommentController::class, 'destroy'])->name('delete-comment');
    Route::get('/tiketku', function () {
        return view('user_page.tiketku');
    })->name('tiketku');
});
// Admin
Route::middleware(['CekLogin', 'CekRole:admin'])->group(function () {
    Route::get('/pembelian', function () {
        return view('admin_page.pembelian');
    })->name('pembelian');

    Route::get('/konser_page', [AdminKonserController::class, 'index'])->name('konser_page');
    Route::get('/konser_page/detail/{id}', [AdminKonserController::class, 'detail'])->name('konser_page.detail');
    Route::delete('/konser_page/destroy/{id}', [AdminKonserController::class, 'destroy'])->name('konser_page.destroy');
    Route::delete('/konser_page/comment/destroy/{id}', [AdminKonserController::class, 'commentDestroy'])->name('konser_page.comment.destroy');

    Route::get('/detail_konser_page', function () {
        return view('admin_page.detail_konser_page');
    })->name('detail_konser_page');

    Route::get('/penjualan', function () {
        return view('admin_page.penjualan');
    })->name('penjualan');

    Route::get('list-konser', [ListOrderController::class, 'ListKonser'])->name('list-konser');
    Route::get('/list-konser/search', [ListOrderController::class, 'search'])->name('list-konser.search');

    Route::get('homeAdmin', [ChartController::class, 'index'])->name('homeAdmin');

    Route::delete('/order/{id}', [ListOrderController::class, 'destroy'])->name('order.destroy');


});


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['CekRole:user,admin'])->group(function () {
    Route::get('user', function () {
        return view('user_page.home');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');

Route::get('/done', function () {
    return view('auth.donereset');
});