<?php

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoController::class, 'index']);
Route::post('/todos', [TodoController::class, 'store']);
Route::post('/todos/update', [TodoController::class, 'update']);
Route::post('/todos/delete', [TodoController::class, 'destroy']);
