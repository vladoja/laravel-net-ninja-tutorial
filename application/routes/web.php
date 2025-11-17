<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DojoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/ninjas', [NinjaController::class, 'index'])->name('ninjas.index');
    Route::get('/ninjas/create', [NinjaController::class, 'create'])->name('ninjas.create');
    Route::get('/ninjas/{id}', [NinjaController::class, 'show'])->name('ninjas.show');
    Route::post('/ninjas', [NinjaController::class, 'store'])->name('ninjas.store');
    Route::delete('/ninjas/{id}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');

    Route::get('/dojos', [DojoController::class, 'index'])->name('dojos.index');
    // this must go before /dojos/{id} route
    Route::get('/dojos/create', [DojoController::class, 'create'])->name('dojos.create');
    Route::get('/dojos/{id}', [DojoController::class, 'show'])->name('dojos.show');
    Route::get('/dojos/{id}/edit', [DojoController::class, 'edit'])->name('dojos.edit');
    Route::put('/dojos/{id}', [DojoController::class, 'update'])->name('dojos.update');
    Route::post('/dojos', [DojoController::class, 'store'])->name('dojos.store');
    Route::delete('/dojos/{id}', [DojoController::class, 'destroy'])->name('dojos.destroy');
});
