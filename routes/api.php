<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\SombreroController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/usuario', [UsuarioController::class, 'index']);
Route::get('/usuario', [UsuarioController::class, 'index']);
Route::post('/usuario/create', [UsuarioController::class, 'create']);
Route::post('/usuario', [UsuarioController::class, 'store']);
Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
Route::get('/usuario/{id}/edit', [UsuarioController::class, 'edit']);
Route::put('/usuario/{id}', [UsuarioController::class, 'update']);
Route::patch('/usuario/{id}', [UsuarioController::class, 'update']); // PATCH como alternativa
Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);


Route::post('/registrar', [UsuarioController::class, 'registrar']);
Route::post('/login', [Login::class, 'login']);