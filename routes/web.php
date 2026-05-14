<?php

use Illuminate\Support\Facades\Route;

// Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
// Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show']);
// Route::get('/addresses', [\App\Http\Controllers\UserController::class, 'allAddresses']);

Route::get('/users', [\App\Http\Controllers\UserController::class, 'getAllUsers']);
//Route::get('/users/{id}/detail', [\App\Http\Controllers\UserController::class, 'getUserDetail']);

