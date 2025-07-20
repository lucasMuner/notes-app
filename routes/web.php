<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIfLogged;
use App\Http\Middleware\CheckIfNotLogged;

// auth routes
Route::middleware([CheckIfNotLogged::class])->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-submit', [AuthController::class, 'loginSubmit'])->name('login-submit');
});

Route::middleware([CheckIfLogged::class])->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/new-note', [MainController::class, 'newNote'])->name('new');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/editNote/{id}',[MainController::class, 'editNote'])->name('edit');
    Route::get('/deleteNote/{id}',[MainController::class, 'deleteNote'])->name('delete');
});

