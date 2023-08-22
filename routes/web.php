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


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['as'=>'client.', 'prefix' =>'client'], function(){
    Route::get('signup', [ClientController::class, 'signup'])->name('signup');
    Route::get('signin', [ClientController::class, 'signin'])->name('signin');
});

