<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\{
    AuthController,
    DashboardController
};

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
})->name('admin.login');

Route::get('/super-admin/login', function () {
    return view('super-admin.auth.login');
})->name('super-admin.login');


Route::post('login-submit', [AuthController::class, 'adminLoginSubmit'])->name('admin.login.submit');
Route::post('super-admin/login-submit', [AuthController::class, 'superAdminLoginSubmit'])->name('super-admin.login.submit');

Route::middleware('admin')->group(function () {
    
    Route::get('dashboard', [DashboardController::class, 'adminDashboard'])->name('super-admin.dashboard');
    Route::get('superAdminlogout', [AuthController::class, 'superAdminLogout'])->name('super-admin.logout');
    Route::get('adminlogout', [AuthController::class, 'adminLogout'])->name('admin.logout');
});