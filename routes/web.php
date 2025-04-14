<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [VacanteController::class, 'dashboard'])->name('dashboard');

    Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create'); // formulario
    Route::post('/vacantes', [VacanteController::class, 'store'])->name('vacantes.store'); // guardar
    Route::get('/vacantes/{id}/{empleador_id}', [VacanteController::class, 'show'])->name('vacantes.show');
    Route::get('/mis-vacantes', [VacanteController::class, 'misVacantes'])->name('vacantes.mias')->middleware('auth');

   });
