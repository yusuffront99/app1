<?php

use App\Http\Controllers\AuthController;
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
