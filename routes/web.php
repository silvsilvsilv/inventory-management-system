<?php

use Illuminate\Support\Facades\Route;

Route::view('/admin', 'admindash');
Route::view('/product', 'product');
Route::view('/categories', 'categories');
Route::view('/users', 'users');
Route::view('/audit-logs', 'audit_logs');
Route::get('/managerdash', function () {
    return view('managerdash');
})->name('managerdash');
Route::view('/sales', 'sales');
Route::view('/home', 'homepage');