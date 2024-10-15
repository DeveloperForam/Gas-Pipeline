<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DijkstraController;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

//user module

Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::post('/users',[UserController::class,'store'])->name('users.store');

Route::patch('users/{user}/toggleStatus', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');

// Property Module

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index')->middleware('auth');

Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');

Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

Route::patch('properties/{property}/toggleStatus', [UserController::class, 'toggleStatus'])->name('properties.toggleStatus');

//algorithm

Route::get('/dijkstra', [DijkstraController::class, 'findShortestPath'])->name('findShortestPath');

Route::post('/dijkstra', [DijkstraController::class, 'findShortestPath'])->name('findShortestPath1');

//reports

Route::post('/download-pdf', [DijkstraController::class, 'downloadPDF'])->name('downloadPDF');