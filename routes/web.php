<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

// <<<<<<< Updated upstream
Route::view('/admin', 'admin.admindash');
Route::view('/product', 'admin.product');
Route::view('/categories', 'admin.categories');
Route::view('/users', 'admin.users');
Route::view('/audit-logs', 'admin.audit_logs');

Route::view('/', 'admin.admindash');
// =======
Route::view('/admin', 'admindash');
Route::view('/product', 'product');
Route::view('/categories', 'categories');
Route::view('/users', 'users');
Route::view('/audit-logs', 'audit_logs');

Route::get('/manager/dashboard', function () {
    return view('managerdash');
})->name('manager.dashboard');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/forgot-password', function () {
    return 'Password reset page (not implemented yet)';
})->name('password.request');

Route::get('/register', function () {
    return view('register');
})->name('register');
// >>>>>>> Stashed changes

Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::view('/staff', 'staffdash');
Route::view('/activity-log', 'actlogdash');

