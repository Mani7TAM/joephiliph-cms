<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SmartPickController;
use Illuminate\Support\Facades\Route;

// Public routes (no middleware)
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin routes (protected by web and auth.admin)
Route::middleware(['web', 'auth.admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('smart_picks', SmartPickController::class);
});

// Test route for debugging
Route::get('/test', function () {
    return 'Test route works!';
});