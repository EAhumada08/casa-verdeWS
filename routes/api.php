<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\SombreroController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AdminCRUD;


Route::get('/administrador', [AdminCRUD::class, 'index']);
Route::post('/administrador', [AdminCRUD::class, 'create']);
Route::get('/administrador/{id}', [AdminCRUD::class, 'show']);
Route::put('/administrador/{id}', [AdminCRUD::class, 'update']);
Route::delete('/administrador/{id}', [AdminCRUD::class, 'destroy']);
Route::post('/login/administrador', [AdministradorController::class, 'loginadmin']);
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

Route::get('/sombreros', [SombreroController::class, 'index']);
Route::get('/sombreros/{id}', [SombreroController::class, 'show']);
