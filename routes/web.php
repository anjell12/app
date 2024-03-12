<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardContrOller;
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

 Route::get('/register', [AuthController::class, 'register'])->name('register');
 Route::post('/register', [AuthController::class, 'store'])->name('store');

Route::get('/reset-password', [AuthController::class, 'password'])->name('password');
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard',[DashboardContrOller::class, 'index'])->name('dashboard')->middleware('auth');