<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
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
//     return view('pages.adminer.dashboard');
// });

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login_auth', [LoginController::class, 'login_auth'])->name('login_auth');

Route::prefix('admin')
    ->group(function(){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
});