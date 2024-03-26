<?php

use App\Http\Controllers\UrlController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountSettingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [UrlController::class, 'index'])->name('url.index');
    Route::post('/', [UrlController::class, 'store'])->name('url.store');
    Route::get('s/{key}', [UrlController::class, 'visit'])->name('url.visit');
    Route::get('shortened/{key}', [UrlController::class, 'show'])->name('url.show');
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('change-password', [PasswordController::class, 'edit'])
        ->name('password.edit');
    Route::patch('change-password', [PasswordController::class, 'update'])
        ->name('password.change');

    Route::get('account-setting', [AccountSettingController::class, 'index'])
        ->name('setting.index');
    Route::delete('account-setting', [AccountSettingController::class, 'destroy'])
        ->name('setting.destroy');
});

require __DIR__ . '/auth.php';
