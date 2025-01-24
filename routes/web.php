<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
use App\Http\Controllers\VacanteController;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [VacanteController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('vacantes', VacanteController::class);
    Route::get('vacantes/historial', [VacanteController::class, 'historial'])->name('vacantes.historial');
});
