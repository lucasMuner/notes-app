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

    //register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register-submit', [AuthController::class, 'registerSubmit'])->name('register-submit');
});

Route::middleware([CheckIfLogged::class])->group(function() {
    // home
    Route::get('/', [MainController::class, 'index'])->name('home');

    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // create
    Route::get('/new-note', [MainController::class, 'newNote'])->name('new');
    Route::post('/new-note-submit', [MainController::class, 'newNoteSubmit'])->name('new-note-submit');

    // edit
    Route::get('/edit-note/{id}',[MainController::class, 'editNote'])->name('edit');
    Route::post('/edit-note-submit',[MainController::class, 'editNoteSubmit'])->name('edit-note-submit');

    // delete
    Route::get('/delete-note/{id}',[MainController::class, 'deleteNote'])->name('delete');
    Route::get('/delete-note-confirm/{id}',[MainController::class, 'deleteNoteConfirm'])->name('delete-note-confirm');
});

