<?php

use Illuminate\Support\Facades\Route;

Route::view('/admin', 'admindash');
Route::view('/product', 'product');
Route::view('/categories', 'categories');
Route::view('/users', 'users');
Route::view('/audit-logs', 'audit_logs');