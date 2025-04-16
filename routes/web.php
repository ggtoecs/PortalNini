<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AplicacionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [VacanteController::class, 'dashboard'])->name('dashboard');

    // Crear y guardar vacantes
    Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');
    Route::post('/vacantes', [VacanteController::class, 'store'])->name('vacantes.store'); 

    // Mostrar vacantes (como postulante y empleador)
    Route::get('/vacantes/{id}/{empleador_id}', [VacanteController::class, 'show'])->name('vacantes.show');
    Route::get('/vacantes/{id}/{empleador_id}/post', [VacanteController::class, 'showPost'])->name('vacantes.showPost');

    // Mis vacantes (como empleador)
    Route::get('/mis-vacantes', [VacanteController::class, 'misVacantes'])->name('vacantes.mias');

    // Aplicar a una vacante
    Route::post('/vacantes/{id}/postular', [AplicacionController::class, 'store'])->name('aplicaciones.store');

    // Editar y actualizar vacantes
    Route::get('/vacantes/{vacante}/edit', [VacanteController::class, 'edit'])->name('vacantes.edit');
    Route::put('/vacantes/{vacante}', [VacanteController::class, 'update'])->name('vacantes.update');

    // Perfil del usuario (CV y descripción)
    Route::get('/perfil', [VacanteController::class, 'perfil'])->name('vacantes.perfil');
    Route::get('/perfil/crear', [VacanteController::class, 'createPerfil'])->name('perfil.create');
    Route::post('/perfil', [VacanteController::class, 'storePerfil'])->name('vacantes.storePerfil');
    Route::get('/perfil/{mejorarPerfil}/editar', [VacanteController::class, 'editPerfil'])->name('vacantes.editPerfil');
    Route::put('/perfil/{mejorarPerfil}', [VacanteController::class, 'updatePerfil'])->name('vacantes.updatePerfil');

});
