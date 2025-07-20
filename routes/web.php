<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

// auth routes
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login-submit', [AuthController::class, 'loginSubmit']);

Route::get('/logout', [AuthController::class, 'logout']);