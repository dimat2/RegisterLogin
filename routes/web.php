<?php

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
    return view('welcome');
});

Route::prefix("auth")-> group(function () {
    Route::get("init", [App\Http\Controllers\AppController::class, 'init']);

    Route::post("login", [App\Http\Controllers\AppController::class, 'login']);
    Route::post("register", [App\Http\Controllers\AppController::class, 'register']);
    Route::post("logout", [App\Http\Controllers\AppController::class, 'logout']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
