<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersManageController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Rutes per a la visualització de vídeos
Route::get('/video/{id}', [VideosController::class, 'show'])->name('videos.show');
Route::get('/videos', [VideosController::class, 'index'])->name('videos.index');

// Rutes de gestió de vídeos amb protecció de permisos

Route::middleware(['auth', 'can:manage-videos'])->prefix('videos/manage')->group(function () {
    Route::get('/', [VideosManageController::class, 'index'])->name('videos.manage.index');
    Route::get('/create', [VideosManageController::class, 'create'])->name('videos.manage.create');
    Route::post('/', [VideosManageController::class, 'store'])->name('videos.manage.store');
    Route::get('/{id}/edit', [VideosManageController::class, 'edit'])->name('videos.manage.edit');
    Route::put('/{id}', [VideosManageController::class, 'update'])->name('videos.manage.update');
    Route::delete('/{id}', [VideosManageController::class, 'destroy'])->name('videos.manage.destroy');
});

Route::middleware(['auth', 'can:manage-users'])->prefix('users/manage')->group(function () {
    Route::get('/', [UsersManageController::class, 'index'])->name('users.manage.index');
    Route::get('/create', [UsersManageController::class, 'create'])->name('users.manage.create');
    Route::post('/', [UsersManageController::class, 'store'])->name('users.manage.store');
    Route::get('/{user}/edit', [UsersManageController::class, 'edit'])->name('users.manage.edit');
    Route::put('/{user}', [UsersManageController::class, 'update'])->name('users.manage.update');
    Route::delete('/{user}', [UsersManageController::class, 'destroy'])->name('users.manage.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
});
