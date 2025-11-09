<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', fn () => 'Hello from Docker!');

Route::get('/ninjas', function () {return view('ninjas.index'); });
