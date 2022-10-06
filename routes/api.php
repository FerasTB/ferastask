<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/auth/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/auth/forgot-password', [\App\Http\Controllers\Api\AuthController::class, 'sendLink']);
Route::post('/auth/reset-password', [\App\Http\Controllers\Api\AuthController::class, 'resetPassword']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('patient', App\Http\Controllers\Api\PatientController::class);
    Route::apiResource('consultation', App\Http\Controllers\Api\consultationController::class);
    Route::group(['middleware' => 'is_admin_or_doctor'], function () {
        Route::apiResource('radiograph', App\Http\Controllers\Api\RadiographController::class);
    });
});
