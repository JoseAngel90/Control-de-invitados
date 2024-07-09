<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckRole;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/solicitudes', [DashboardController::class, 'showSolicitudes'])->name('solicitudes');
    Route::get('/usuarios', [DashboardController::class, 'showUsuarios'])->name('usuarios');
});

Route::get('/', function () {
    return view('welcome');
});
 