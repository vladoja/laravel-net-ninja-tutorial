<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', fn () => 'Hello from Docker!');

Route::get('/ninjas', function () {
    $ninjas = [
        ["name" => "Yoshi","skill" => 75, "age" => 25, "id" => 1],
        ["name" => "Kuma", "skill" => 45, "age" => 30, "id" => 2],
        ["name" => "Hattori", "skill" => 90, "age" => 28, "id" => 3 ],
    ];
    return view('ninjas.index', [ "greeting" => "Hello Ninjas!", "ninjas" => $ninjas]);
});

Route::get('/ninjas/create', function () {
    return view('ninjas.create');
});

Route::get('/ninjas/{id}', function ($id) {
    return view('ninjas.show', [ "id" => $id ]);
});
