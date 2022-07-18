<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
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
Route::resource('/user', UserController::class);

Route::get('image', [ImageController::class, 'image']);
Route::post('image', [ImageController::class, 'store'])->name('image.store');
Route::get('image/fetch', [ImageController::class, 'fetchData'])->name('image.fetch');
Route::get('image/edit/', [ImageController::class, 'edit'])->name('image.edit');
Route::post('image/update', [ImageController::class, 'update'])->name('image.update');

Route::delete('image/delete', [ImageController::class, 'delete'])->name('image.delete');

