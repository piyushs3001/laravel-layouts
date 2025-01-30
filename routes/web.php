<?php

use Illuminate\Support\Facades\Route;
use Piyush\LaravelLayouts\Http\Controllers\Admin\AuthController as AdminAuthController;
use Piyush\LaravelLayouts\Http\Controllers\Admin\DashboardController;


// Admin Routes
// -------------------------------------------------------------------------------------------------
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLoginForm'])->name('admin.login.form');
    Route::post('login',[AdminAuthController::class, 'login'])->name('admin.login');

    Route::middleware(['adminauth'])->group(function () {
        // Manage Dashboard & Admin Profile
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/','index')->name('admin.dashboard');
        });
    });

});