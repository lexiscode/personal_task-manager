<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/


Route::get('/', [HomeController::class, '__invoke'])->name('home');

Route::group(['as'=>'client.', 'prefix' =>'client'], function(){
    Route::post('register', [ClientController::class, 'signup'])->name('signup');
    Route::post('login', [ClientController::class, 'signin'])->name('signin');
});

