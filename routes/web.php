<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateBookController;

// auth
Route::middleware('Guest')->group(function () {
    Route::get('/', [RegistrationController::class, 'index'])->name('index');
    Route::get('/login', [RegistrationController::class, 'login'])->name('login');
    Route::post('/auth/login', [RegistrationController::class, 'auth'])->name('login.auth');
    Route::get('/auth/register', [RegistrationController::class, 'register'])->name('register');
    Route::post('/register', [RegistrationController::class, 'inputRegister'])->name('register.post');
});

//user
Route::middleware(['Login', 'Role:user'])->group(function () {
    Route::get('/user/dashboard', [RegistrationController::class, 'userDash'])->name('userDash');
    Route::get('/user/edit', [RegistrationController::class, 'edit'])->name('edit');
});

//admin & user
Route::middleware(['Login', 'Role:user, admin'])->group(function () {
    Route::get('/buku', [RegistrationController::class, 'book'])->name('book');
    Route::get('/buku/{id}', [RegistrationController::class, 'bookDetail'])->name('bookDetail');
    Route::get('/download/{id}', [RegistrationController::class, 'bookDownload'])->name('bookDownload');
});

Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');
Route::get('/error', [RegistrationController::class, 'error'])->name('error');

//admin
Route::middleware(['Login', 'Role:admin'])->group(function () {
    //Registration
    Route::get('/admin/dashboard', [RegistrationController::class, 'adminDash'])->name('adminDash');
    Route::get('/admin/user', [RegistrationController::class, 'adminUser'])->name('adminUser');
    Route::get('/buku/excel', [RegistrationController::class, 'export'])->name('export.excel');
    //CreateBook
    Route::get('/admin/create', [CreateBookController::class, 'createBook'])->name('createBook');
    Route::post('/admin/create', [CreateBookController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CreateBookController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [CreateBookController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [CreateBookController::class, 'destroy'])->name('delete');
    //Category
    Route::get('/admin/category', [CategoryController::class, 'create'])->name('create');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('category');
    Route::post('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
});
