<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\TasksController;
use Illuminate\Support\Facades\Route;

Route::post('user', [AuthController::class, 'authenticateToken']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/', [TasksController::class, 'index']);
    Route::delete('task/{id}', [TasksController::class, 'delete']);
    Route::post('task', [TasksController::class, 'create']);
    Route::put('task/{id}', [TasksController::class, 'update']);
});
