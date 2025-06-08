<?php

use Illuminate\Support\Facades\Route;

Route::view('/admin', 'admin.admindash');
Route::view('/product', 'admin.product');
Route::view('/categories', 'admin.categories');
Route::view('/users', 'admin.users');
Route::view('/audit-logs', 'admin.audit_logs');

Route::view('/', 'admin.admindash');