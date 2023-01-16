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
Route::get('/admin/user', [RegistrationController::class, 'adminUser'])->name('adminUser');
Route::get('/admin/create', [RegistrationController::class, 'create'])->name('create');
Route::post('/admin/create', [RegistrationController::class, 'store'])->name('store');
Route::get('/edit/{id}', [RegistrationController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [RegistrationController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [RegistrationController::class, 'destroy'])->name('delete');
