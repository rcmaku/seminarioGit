<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('alumnos',AlumnosController::class);

Route::get('/alumnos/queue', [AlumnosController::class, 'queueAlum']);

use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'welcome'])->name('users.index');
Route::post('/rotate', [UserController::class, 'rotate'])->name('users.rotate');
