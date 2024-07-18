<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\InvitadosController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\SecurityController;
use App\Http\Middleware\CheckRole;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*Route::get('/Vigilante', [DashboardController::class, 'showVigilante'])->name('security');
Route::get('/Admin', [DashboardController::class, 'showAdmin'])->name('planning');
Route::get('/Registrante', [DashboardController::class, 'showRegistrante'])->name('director');*/

/*Route::get('/solicitudes', [DashboardController::class, 'showSolicitudes'])->name('solicitudes');
Route::get('/usuarios', [DashboardController::class, 'showUsuarios'])->name('usuarios');
Route::get('/invitados', [DashboardController::class, 'showInvitados'])->name('invitados');*/

Route::get('/solicitudes', [SolicitudesController::class, 'index'])->name('solicitudes');
Route::post('/solicitudes/store', [SolicitudesController::class, 'store'])->name('solicitudes.store');
Route::get('/solicitudes/{id}', [SolicitudesController::class, 'show'])->name('solicitudes.show');

Route::get('/planning', [PlanningController::class, 'index'])->name('planning');
Route::get('/director', [DirectorController::class, 'index'])->name('director');
Route::get('/security', [SecurityController::class, 'index'])->name('security');
Route::get('/dashboard/planning', [PlanningController::class, 'index'])->name('planning');
Route::get('/dashboard/director', [DirectorController::class, 'index'])->name('director');
Route::get('/dashboard/security', [SecurityController::class, 'index'])->name('security');

Route::get('/usuarios', [UsuariosController::class,'index'])->name('usuarios.index');
Route::post('/usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('/invitados', [InvitadosController::class,'index'])->name('invitados');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




Route::get('/', function () {
    return view('welcome');
});
 