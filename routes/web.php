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
    Route::get('/download/{id}', [CreateBookController::class, 'bookDownload'])->name('bookDownload');
});

Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');
Route::get('/error', [RegistrationController::class, 'error'])->name('error');

//admin
Route::middleware(['Login', 'Role:admin'])->group(function () {
    //Registration
    Route::get('/admin/dashboard', [RegistrationController::class, 'adminDash'])->name('adminDash');
    Route::get('/admin/user', [RegistrationController::class, 'adminUser'])->name('adminUser');
   
});

Route::middleware(['Login', 'Role:admin'])->group(function () {
    //CreateBook
    Route::get('/admin/create', [CreateBookController::class, 'createBook'])->name('createBook');
    Route::post('/admin/create', [CreateBookController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CreateBookController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [CreateBookController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [CreateBookController::class, 'destroy'])->name('delete');
    Route::get('/export/excel', [CreateBookController::class, 'export'])->name('export.excel');
});

Route::middleware(['Login', 'Role:admin'])->group(function () {
    //Category
    Route::get('/admin/category', [CategoryController::class, 'create'])->name('create');
    Route::post('/admin/category', [CategoryController::class, 'store'])->name('category');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
});
