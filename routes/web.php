<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);
Route::get('/show/{id}', [TodoController::class, 'show']);
Route::post('/edit/{id}', [TodoController::class, 'edit']);
Route::post('/update/{id}', [TodoController::class, 'update']);
Route::post('/store', [TodoController::class, 'store']);
Route::post('/done/{id}', [TodoController::class, 'done']);
Route::post('/undo/{id}', [TodoController::class, 'undo']);
Route::post('/destroy/{id}', [TodoController::class, 'destroy']);
