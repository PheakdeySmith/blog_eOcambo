<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PermissionController;

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [BackendController::class, 'index'])->name('index');
    });

    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::post('/', [RoleController::class, 'store'])->name('store');
        Route::get('/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::put('/{id}', [RoleController::class, 'update'])->name('update');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->name('destroy');
        Route::get('/{role}/permissions', [RoleController::class, 'getPermissions']);

    });


    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');
        Route::post('/', [PermissionController::class, 'store'])->name('store');
        Route::put('/{id}', [PermissionController::class, 'update'])->name('update');
        Route::delete('/{id}', [PermissionController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('authors')->name('authors.')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name('index');
        Route::post('/', [AuthorController::class, 'store'])->name('store');
        Route::put('/{id}', [AuthorController::class, 'update'])->name('update');
        Route::delete('/{id}', [AuthorController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('frontend')->name('frontend.')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
});

require __DIR__.'/auth.php';
