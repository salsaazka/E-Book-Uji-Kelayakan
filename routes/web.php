<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateBookController;

// auth
Route::middleware('Guest')->group(function(){
    Route::get('/login', [RegistrationController::class, 'login'])->name('login');
    Route::post('/auth/login', [RegistrationController::class, 'auth'])->name('login.auth');   
    Route::get('/auth/register', [RegistrationController::class, 'register'])->name('register');
    Route::post('/register', [RegistrationController::class, 'inputRegister'])->name('register.post');

});

//user
 Route::middleware(['Login', 'Role:user'])->group(function(){
    Route::get('/user/dashboard', [RegistrationController::class, 'userDash'])->name('userDash');
    Route::get('/user/edit', [RegistrationController::class, 'edit'])->name('edit');
 });

//admin & user
Route::middleware(['Login', 'Role:user, admin'])->group(function(){
    Route::get('/buku', [RegistrationController::class, 'book'])->name('book');
    Route::get('/buku/{id}', [RegistrationController::class, 'bookDetail'])->name('bookDetail');
    Route::get('/download/{id}', [RegistrationController::class, 'bookDownload'])->name('bookDownload');
    Route::get('/', [RegistrationController::class, 'index'])->name('index');
});
   
Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');
Route::get('/error', [RegistrationController::class, 'error'])->name('error');
//admin
Route::middleware(['Login', 'Role:admin'])->group(function(){
    Route::get('/admin/dashboard', [RegistrationController::class, 'adminDash'])->name('adminDash');
    Route::get('/admin/user', [RegistrationController::class, 'adminUser'])->name('adminUser');
    Route::get('/admin/create', [CreateBookController::class, 'createBook'])->name('createBook');
    Route::post('/admin/create', [CreateBookController::class, 'store'])->name('store');
    Route::get('/admin/category', [CategoryController::class, 'create'])->name('create');
    Route::post('/admin/category', [CategoryController::class, 'post'])->name('post');
    Route::get('/edit/{id}', [RegistrationController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [RegistrationController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [RegistrationController::class, 'destroy'])->name('delete');
});