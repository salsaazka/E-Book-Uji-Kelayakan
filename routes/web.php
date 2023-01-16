<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateBookController;

// auth

    Route::get('/', [EbookController::class, 'index'])->name('index');
    Route::get('/auth/register', [EbookController::class, 'register'])->name('register');
    Route::post('/register', [EbookController::class, 'inputRegister'])->name('register.post');
    Route::get('/login', [EbookController::class, 'login'])->name('login');
    Route::post('/auth/login', [EbookController::class, 'auth'])->name('login.auth');

Route::get('/logout', [EbookController::class, 'logout'])->name('logout');
