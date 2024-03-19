<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardContrOller;
use App\Http\Controllers\DashboardDesainController;
use App\Http\Controllers\DashboardProdukController;
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

Route::get('/home', function () {
    return redirect('/dashboard');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

 Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
 Route::post('/register', [AuthController::class, 'store'])->name('store');

Route::get('/reset-password', [AuthController::class, 'password'])->name('password')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('/dashboard/desain', DashboardDesainController::class)->names('desain')->middleware('auth');
Route::get('/getHargaProduk/{id}',[DashboardDesainController::class,'getHargaProduk']);

Route::resource('/dashboard/produk', DashboardProdukController::class)->names('produk')->middleware('auth');
