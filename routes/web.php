<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Middleware\AuthUser;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;


// Admin routes
Route::prefix('admin')->middleware(IsAdmin::class)->group(function () {
    Route::view('/', 'admin.admindash')->name('admin.dashboard');

    Route::get('/users', [UserController::class, 'getAllUsers'])->name('admin.users');
    Route::post('/users', [UserController::class, 'createUser'])->name('admin.create_user');
    Route::put('/users', [UserController::class, 'updateUser'])->name('admin.update_user');
    Route::delete('/users', [UserController::class, 'deleteUser'])->name('admin.delete_user');

    Route::get('/categories', [CategoriesController::class, 'getAllCategories'])->name('admin.categories');
    Route::post('/categories', [CategoriesController::class, 'createCategory'])->name('admin.create_category');
    Route::put('/categories', [CategoriesController::class, 'editCategory'])->name('admin.edit_category');
    Route::delete('/categories', [CategoriesController::class, 'deleteCategory'])->name('admin.delete_category');

    Route::get('/products', [ProductsController::class, 'getAllProducts'])->name('admin.products');
    Route::post('/products', [ProductsController::class, 'createProduct'])->name('admin.create_product');
    Route::put('/products', [ProductsController::class, 'editProduct'])->name('admin.edit_product');
    Route::delete('/products', [ProductsController::class, 'deleteProduct'])->name('admin.delete_product');

    Route::get('/sales', [SalesController::class, 'getAllSalesAdmin'])->name('admin.sales');
});


// Manager routes
Route::prefix('manager')->middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::view('/', 'manager.managerdash')->name('manager.dashboard');
    // Route::view('/staff', 'manager.staffdash')->name('manager.staff');


    Route::get('/', [StaffDashboardController::class,'managerDashboard'])->name('manager.dashboard');
    Route::post('/', [ProductsController::class, 'createProduct'])->name('manager.add_product');

    Route::get('/staff', [StaffDashboardController::class, 'dashboardFilter'])->name('manager.staff');
    Route::put('/staff',[StaffDashboardController::class, 'updateQuantity'])->name('manager.update_quantity');

    Route::get('/sales', [SalesController::class, 'getAllSalesManager'])->name('manager.sales');
});

// Public routes
Route::middleware(AuthUser::class)->group(function (){
    Route::view('/','login');
    Route::view('/login', 'login')->name('login'); 
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    Route::view('/register', 'register')->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
    
    Route::get('/forgot-password', function () {
        return 'Password reset page (not implemented yet)';
    })->name('password.request');
});

Route::post('/logout', [LoginController::class, 'logoutUser'])->name('logout');
