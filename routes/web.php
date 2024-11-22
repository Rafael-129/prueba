<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\profesorCitasController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\QuejasController;
use App\Http\Controllers\ProfesorAnunciosController;
use App\Http\Controllers\AnunciosProfController;
use App\Http\Controllers\ProfesorNotasController;


// Rutas de acceso público (Index)
Route::get('/', function () {
 return view('index.propuestas_educativas');
});
Route::get('/Contactanos', [IndexController::class, 'contactanos'])->name('index.contactanos');
Route::get('/indexAnuncios', [IndexController::class, 'indexAnuncios'])->name('index.anuncios');
Route::get('/Nosotros', [IndexController::class, 'nosotros'])->name('index.nosotros');
Route::get('/Propuestas_Educativas', [IndexController::class, 'propuesta'])->name('index.propuestas_educativas');

// Rutas de autenticación (Login)
Route::get('/Login', [LoginController::class, 'login'])->name('Login');
Route::get('/Registrar', [LoginController::class, 'registro'])->name('Registro');
Route::post('/IniSesion', [LoginController::class, 'IniSesion'])->name('IniSesion');
Route::post('/Registrar', [LoginController::class, 'registrar'])->name('registrar');

// Rutas de la aplicación para Alumnos (Intraner)
Route::get('/Anuncios', [AnunciosController::class, 'anuncios'])->name('Alumno.anuncios');
Route::get('/Citas', [CitasController::class, 'Citas'])->name('Alumno.Citas');
Route::get('/Horarios', [HorariosController::class, 'horarios'])->name('Alumno.horarios');
Route::get('/Notas', [NotasController::class, 'notas'])->name('Alumno.notas');
Route::get('/Quejas', [QuejasController::class, 'quejas'])->name('Alumno.quejas');

// Rutas de la aplicación para Profesores (Intranet)
Route::get('/ProfesorAnuncios', [ProfesorAnunciosController::class, 'panuncios'])->name('Profesor.Anuncios');
Route::get('/ProfesorQuejas', [QuejasController::class, 'pquejas'])->name('Profesor.quejas');
Route::get('/ProfesorCitas', [profesorCitasController::class, 'pCitas'])->name('Profesor.Citas');
Route::get('/ProfesorNotas', [profesorNotasController::class, 'profNotas'])->name('Profesor.Notas');

Route::middleware(['auth'])->group(function () {
    // Rutas accesibles solo para usuarios autenticados
    Route::get('profesor/notas', [ProfesorNotasController::class, 'profNotas'])->name('profesor.notas.index');
    Route::get('profesor/notas/create', [ProfesorNotasController::class, 'create'])->name('profesor.notas.create');
    Route::post('profesor/notas', [ProfesorNotasController::class, 'store'])->name('profesor.notas.store');
    Route::get('profesor/notas/{nota}/edit', [ProfesorNotasController::class, 'edit'])->name('profesor.notas.edit');
    Route::put('profesor/notas/{nota}', [ProfesorNotasController::class, 'update'])->name('profesor.notas.update');
    Route::delete('profesor/notas/{nota}', [ProfesorNotasController::class, 'destroy'])->name('profesor.notas.destroy');
});

// Otros recursos protegidos
Route::resource('anuncios_profs', AnunciosProfController::class);

// Ruta para cerrar sesión
Route::post('/logout', function () {
    Auth::logout();
     return redirect('/Login'); 
    })->name('logout');
