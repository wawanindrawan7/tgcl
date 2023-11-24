<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('ruangan', [RuanganController::class, 'view']);
Route::get('ruangan/create', [RuanganController::class, 'create']);
Route::post('ruangan/create', [RuanganController::class, 'create']);
Route::get('ruangan/update', [RuanganController::class, 'update']);
Route::post('ruangan/update', [RuanganController::class, 'update']);
Route::get('ruangan/delete', [RuanganController::class, 'delete']);

Route::get('booking', [BookingController::class, 'view']);
Route::get('booking/create', [BookingController::class, 'create']);
Route::post('booking/create', [BookingController::class, 'create']);
Route::get('booking/delete', [BookingController::class, 'delete']);
Route::get('booking/approve', [BookingController::class, 'approve']);
Route::get('booking/selesai', [BookingController::class, 'selesai']);
Route::get('/booking/{kursi}/{data}', [BookingController::class, 'pesan'])->name('pesan');
Route::get('nama-booking/cari', [BookingController::class, 'cari']);


Route::get('history', [BookingController::class, 'history']);
Route::get('history/delete', [BookingController::class, 'historyDelete']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
