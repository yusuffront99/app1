<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/auth_login', [LoginController::class, 'auth_login'])->name('auth_login');
Route::post('/auth_logout', [loginController::class, 'auth_logout'])->name('auth_logout');

// ---Home
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth');
// --- Admin
Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('/lokal', LocalController::class);
    });