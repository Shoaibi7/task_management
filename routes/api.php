<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\TaskApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('tasks',[App\Http\Controllers\Api\v1\TaskApiController::class]);
// Route::put('{task}/complete', [App\Http\Controllers\Api\v1\TaskApiController::class, 'markAsCompleted']);


Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', [TaskApiController::class, 'index']);
    Route::get('{task}', [TaskApiController::class, 'show']);
    Route::post('/store', [TaskApiController::class, 'store']);
    Route::put('{task}', [TaskApiController::class, 'update']);
    Route::delete('{task}', [TaskApiController::class, 'destroy']);
    Route::put('{task}/complete', [TaskApiController::class, 'markAsCompleted']);
});