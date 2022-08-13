<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
// rota home
Route::get('/', [HomeController::class, 'create']);

// rotas de registro
Route::get('/registro', [UsersController::class, 'create']);
Route::post('/registrar', [UsersController::class, 'store']);
// Rotas de Login
Route::get('/login', [UsersController::class, 'login']);
Route::post('/logar', [UsersController::class, 'auth']);
// logout
Route::get('/logout', [UsersController::class, 'logout']);

// rotas de hqs
Route::get('/detalhes/{id?}', [HomeController::class, 'detalhes']);
