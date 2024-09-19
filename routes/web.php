<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/user', [HomeController::class, 'index'])->name('user');

// Route::get('/properties', [HomeController::class, 'index'])->name('properties');
