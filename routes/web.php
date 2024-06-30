<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por middleware de autenticación y roles
Route::middleware(['auth'])->group(function () {
    // Rutas para el rol "Director de Carrera"
    Route::middleware(['role:Director de Carrera'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Otras rutas específicas para "Director de Carrera"
    });

    // Rutas para el rol "Área de Planeación"
    Route::middleware(['role:Área de Planeación'])->group(function () {
        // Rutas específicas para "Área de Planeación"
    });

    // Rutas para el rol "Vigilancia"
    Route::middleware(['role:Vigilancia'])->group(function () {
        // Rutas específicas para "Vigilancia"
    });
});

// Ruta para la página principal
Route::get('/', function () {
    return view('welcome');
});
