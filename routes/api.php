<?php

use App\Http\Controllers\SombreroController;
use Illuminate\Support\Facades\Route;

Route::get('/sombreros',[SombreroController::class, 'index']);
