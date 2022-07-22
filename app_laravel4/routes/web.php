<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home\LaporanController;
use App\Http\Controllers\Home\OperatorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// ====== ROUTE AUTH
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login-action', [AuthController::class, 'login_action'])->name('login-action');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register/store', [AuthController::class, 'register_store'])->name('register-store');


// ===== ROUTE AUTH LOGIN
Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::resource('/home/operator', OperatorController::class);


// ====== ROUTE LAPORAN
Route::resource('/home/laporan', LaporanController::class);

// ====== ROUTE SUPERVISOR
Route::get('/supervisor', [SupervisorController::class, 'index'])->name('supervisor-index');
