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

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





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

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


//Route::resource('empleados', EmpleadoController::class);

Route::get('/empleados', [EmpleadoController::class, 'index'])
    ->name('empleados.index');

Route::resource('empleados', EmpleadoController::class);


Route::resource('familiares', FamiliarController::class);

Route::get('/empleados/{empleado}/familiares/create', [FamiliarController::class, 'create'])->name('familiares.create');
Route::post('/empleados/{empleado}/familiares', [FamiliarController::class, 'store'])->name('familiares.store');

Route::get('/familiares/{familiar}/edit', [FamiliarController::class, 'edit'])->name('familiares.edit');
Route::put('/familiares/{familiar}', [FamiliarController::class, 'update'])->name('familiares.update');


Route::resource('reservas', ReservaController::class);

Route::resource('menus', MenuController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('menus', MenuController::class);

Route::view('/reportes', 'reportes.index')
    ->name('reportes.index');

Route::resource('entregas', EntregaController::class);  

Route::view('/configuracion', 'configuracion.index')
    ->name('configuracion.index');

Route::resource('familiares', FamiliarController::class);