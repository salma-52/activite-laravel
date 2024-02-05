<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ProductController::class,"index"])->name("product.index")->middleware('auth');
Route::get('/login', [UserController::class,"loginForm"])->name("user.loginForm");
Route::post('/login', [UserController::class,"login"])->name("user.login");
Route::get('/logout', [UserController::class,"logout"])->name("user.logout")->middleware('auth');
Route::resource('product', ProductController::class)->middleware('auth');

