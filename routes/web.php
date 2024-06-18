<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('web')->group(function(){

    Route::middleware('guest')->group(function(){
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
        Route::post('/login', [AuthController::class, 'login'])->name('login'); 
    });


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth')->name('dashboard');

});