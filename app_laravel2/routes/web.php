<?php

use App\Http\Controllers\Admin\CcrController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Operator\OperatorController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\Operator;

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
Route::prefix('home')
    ->middleware('auth')
    ->group(function(){
        Route::get('/', [HomeController::class, 'home'])->name('home');
        Route::get('/show_operator/{id}', [AuthController::class, 'show_operator'])->name('show.operator');
        Route::get('/foto', [OperatorController::class, 'index'])->name('foto');
    });


// --- Admin
Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/operator', [AuthController::class, 'index'])->name('operator');
        Route::post('/create_operator', [AuthController::class, 'create_operator'])->name('create_operator');
        
        Route::resource('/lokal', LocalController::class);
        Route::resource('/ccr', CcrController::class);
    });