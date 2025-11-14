<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DojoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/hello', fn() => 'Hello from Docker!');

Route::middleware('auth')->group(function () {
    Route::get('/ninjas', [NinjaController::class, 'index'])->name('ninjas.index');
    Route::get('/ninjas/create', [NinjaController::class, 'create'])->name('ninjas.create');
    Route::get('/ninjas/{id}', [NinjaController::class, 'show'])->name('ninjas.show');
    Route::post('/ninjas', [NinjaController::class, 'store'])->name('ninjas.store');
    Route::delete('/ninjas/{id}', [NinjaController::class, 'destroy'])->name('ninjas.destroy');

    Route::get('/dojos', [DojoController::class, 'index'])->name('dojos.index');
    Route::get('/dojos/{id}', [DojoController::class, 'show'])->name('dojos.show');
    Route::delete('/dojos/{id}', [DojoController::class, 'destroy'])->name('dojos.destroy');
});
