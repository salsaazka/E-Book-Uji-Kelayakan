<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateBookController;

// auth

    Route::get('/', [RegistrationController::class, 'index'])->name('index');
    Route::get('/auth/register', [RegistrationController::class, 'register'])->name('register');
    Route::post('/register', [RegistrationController::class, 'inputRegister'])->name('register.post');
    Route::get('/login', [RegistrationController::class, 'login'])->name('login');
    Route::post('/auth/login', [RegistrationController::class, 'auth'])->name('login.auth');

Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [RegistrationController::class, 'adminDash'])->name('adminDash');

