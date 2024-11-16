<?php

//Login
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

//Index
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\IndexAnuncioController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\PropuestaController;

//APP Alumnos
use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\QuejasController;

//App Profesores
use App\Http\Controllers\ProfesorAnunciosController;
use App\Http\Controllers\AnunciosProfController;




Route::get('/', function () {
    return view('index.propuestas_educativas');
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



//Login & Registrar
Route::get('/Login', [LoginController::class, 'login'])->name('Login');
Route::get('/Registrar', [LoginController::class, 'registro'])->name('Registro');

Route::post('/IniSesion', [LoginController::class, 'IniSesion'])->name('IniSesion');
Route::post('/Registrar', [LoginController::class, 'registrar'])->name('registrar');

//Index
Route::get('/Contactanos', [ContactanosController::class, 'contactanos'])->name('index.contactanos');
Route::get('/indexAnuncios', [IndexAnuncioController::class, 'indexAnuncios'])->name('index.anuncios');
Route::get('/Nosotros', [NosotrosController::class, 'nosotros'])->name('index.nosotros');
Route::get('/Propuestas_Educativas', [PropuestaController::class, 'propuesta'])->name('index.propuestas_educativas');

//Rutas Alumnos
Route::get('/Anuncios', [AnunciosController::class, 'anuncios'])->name('Alumno.anuncios');
Route::get('/Docentes', [DocentesController::class, 'docentes'])->name('Alumno.docentes');
Route::get('/Horarios', [HorariosController::class, 'horarios'])->name('Alumno.horarios');
Route::get('/Notas', [NotasController::class, 'notas'])->name('Alumno.notas');
Route::get('/Quejas', [QuejasController::class, 'quejas'])->name('Alumno.quejas');

//Rutas Profesores
Route::get('/ProfesorAnuncios', [ProfesorAnunciosController::class, 'panuncios'])->name('Profesor.Anuncios');
Route::get('/ProfesorQuejas', [QuejasController::class, 'pquejas'])->name('Profesor.quejas');



// Ruta para mostrar todos los anuncios
Route::get('/anuncios_profs', [AnunciosProfController::class, 'index'])->name('anuncios_profs.index');

// Ruta para crear un nuevo anuncio
Route::get('/anuncios_profs/create', [AnunciosProfController::class, 'create'])->name('anuncios_profs.create');

// Ruta para guardar un nuevo anuncio
Route::post('/anuncios_profs', [AnunciosProfController::class, 'store'])->name('anuncios_profs.store');

// Ruta para editar un anuncio existente
Route::get('/anuncios_profs/{id}/edit', [AnunciosProfController::class, 'edit'])->name('anuncios_profs.edit');

// Ruta para actualizar un anuncio
Route::put('/anuncios_profs/{id}', [AnunciosProfController::class, 'update'])->name('anuncios_profs.update');

// Ruta para eliminar un anuncio
Route::delete('/anuncios_profs/{id}', [AnunciosProfController::class, 'destroy'])->name('anuncios_profs.destroy');
