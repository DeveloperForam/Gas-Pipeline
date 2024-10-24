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

Auth::routes(['verify'=>true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

//user module

Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::post('/users',[UserController::class,'store'])->name('users.store');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::patch('users/{user}/toggleStatus', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');

// Property Module

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index')->middleware('auth');

Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');

Route::get('/properties/edit', [PropertyController::class, 'edit'])->name('properties.edit');

Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');

Route::patch('properties/{property}/toggleStatus', [UserController::class, 'toggleStatus'])->name('properties.toggleStatus');

//algorithm

Route::get('/dijkstra', [DijkstraController::class, 'findShortestPath'])->name('findShortestPath');

Route::post('/dijkstra', [DijkstraController::class, 'findShortestPath'])->name('findShortestPath1');

//reports

Route::post('/download-pdf', [DijkstraController::class, 'downloadPDF'])->name('downloadPDF');
