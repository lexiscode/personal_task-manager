<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// Routes that should be accessible only for non-logged-in users
Route::middleware('guest')->group(function () {

    Route::get('/', [HomeController::class, '__invoke'])->name('home');

    Route::group(['as'=>'client.', 'prefix' =>'client'], function(){
    Route::get('register', [RegisterController::class, 'create'])->name('signup');
    Route::post('register', [RegisterController::class, 'store'])->name('store');

    Route::get('login', [LoginController::class, 'create'])->name('signin');
    Route::post('login', [LoginController::class, 'verify'])->name('login');

    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});

});


// Routes that should be accessible only for logged-in users
Route::middleware('auth.check')->group(function () {

    Route::resource('task', TaskController::class);

    Route::get('search', [SearchController::class, 'search'])->name('task.search');

    Route::resource('category', CategoryController::class);

});

