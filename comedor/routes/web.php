<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FamiliarController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\EntregaController;
// se quieta para que se vaya directo al dashborad para realizar pruebas
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MisReservasController;

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::redirect('/', '/login');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('familiares', FamiliarController::class);
    Route::resource('menus', MenuController::class);
    Route::get('reservas/{id}/lista', [ReservaController::class, 'lista'])->name('reservas.lista');
    Route::resource('usuarios', UsuarioController::class);
    Route::view('/reportes', 'reportes.index')->name('reportes.index');

    Route::get('/entregas/{id}', [EntregaController::class, 'lista'])->name('entregas.lista');
    Route::patch('/entregas/{reserva}/entregar', [EntregaController::class, 'entregar'])->name('entregas.entregar');
    Route::resource('entregas', EntregaController::class);  

    Route::view('/configuracion', 'configuracion.index')->name('configuracion.index');

});

Route::middleware(['auth', 'role:empleado'])->group(function () {
    Route::resource('reservas', ReservaController::class);

});
