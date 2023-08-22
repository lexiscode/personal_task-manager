<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [HomeController::class, '__invoke'])->name('home');

Route::group(['as'=>'client.', 'prefix' =>'client'], function(){
    Route::get('register', [RegisterController::class, 'create'])->name('signup');
    Route::post('register', [RegisterController::class, 'store'])->name('store');

    Route::get('login', [LoginController::class, 'create'])->name('signin');
    Route::post('login', [LoginController::class, 'verify'])->name('login');

    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});


