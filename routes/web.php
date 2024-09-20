<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//user module

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::post('/users',[UserController::class,'store'])->name('users.store');

// Route::get('/properties', [HomeController::class, 'index'])->name('properties');
