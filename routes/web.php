<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthUser;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;


// Admin routes
Route::prefix('admin')->middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::view('/', 'admin.admindash')->name('admin.dashboard');
    Route::view('/product', 'admin.product')->name('admin.product');
    Route::view('/categories', 'admin.categories')->name('admin.categories');
    Route::view('/sales', 'admin.sales')->name('admin.sales');
    // Route::view('/users', 'admin.users')->name('admin.users');
    Route::view('/audit-logs', 'admin.audit_logs')->name('admin.audit_logs');

    Route::get('/users', [UserController::class, 'getAllUsers'])->name('admin.users');
    Route::post('/users', [UserController::class, 'createUser'])->name('admin.create_user');
    Route::put('/users', [UserController::class, 'updateUser'])->name('admin.update_user');
    Route::delete('/users', [UserController::class, 'deleteUser'])->name('admin.delete_user');
});


// Manager routes
Route::prefix('manager')->middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::view('/', 'manager.managerdash')->name('manager.dashboard');
    Route::view('/log', 'manager.actlogdash')->name('manager.log');
    
    Route::view('/sales', 'manager.sales')->name('manager.sales');
});

// Public routes
Route::middleware(AuthUser::class)->group(function (){
    Route::view('/login', 'login')->name('login'); 
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::view('/register', 'register')->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
    
    Route::get('/forgot-password', function () {
        return 'Password reset page (not implemented yet)';
    })->name('password.request');
});



Route::post('/logout', [LoginController::class, 'logoutUser'])->name('logout');
