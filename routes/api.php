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
    Route::get('patient/{patient}/consultations', [App\Http\Controllers\Api\PatientController::class, 'indexConsultations']);
    Route::apiResource('consultation', App\Http\Controllers\Api\consultationController::class);
    Route::get('payment/{consultation}', [App\Http\Controllers\Api\consultationController::class, 'submitAsPaid']);
    Route::apiResource('request/{req}/attachment', App\Http\Controllers\Api\AttachmentController::class);
    Route::get('ticket/{ticket}', [App\Http\Controllers\Api\TicketController::class, 'show']);
    Route::post('ticket', [App\Http\Controllers\Api\TicketController::class, 'store']);
    Route::post('{ticket}/comment', [App\Http\Controllers\Api\CommentController::class, 'store']);
    Route::get('image/{image}', [App\Http\Controllers\Api\ConsultationController::class, 'getImage']);
    Route::get('attachment/{attachment}', [App\Http\Controllers\Api\AttachmentController::class, 'getAttachment']);
    Route::get('pdf/{pdf}', [App\Http\Controllers\Api\ConsultationController::class, 'getPdf']);
    Route::get('audio/{audio}', [App\Http\Controllers\Api\ConsultationController::class, 'getAudio']);
    Route::delete('req/{req}/attachment', [App\Http\Controllers\Api\RequestController::class, 'deleteAttachment']);
    Route::group(['middleware' => 'is_admin'], function () {
        Route::apiResource('user/manager', App\Http\Controllers\Api\UserController::class);
        Route::put('ticket/{ticket}', [App\Http\Controllers\Api\TicketController::class, 'update']);
    });
    Route::group(['middleware' => 'is_admin_or_doctor'], function () {
        Route::apiResource('radiograph', App\Http\Controllers\Api\RadiographController::class);
        Route::apiResource('bloodtest', App\Http\Controllers\Api\BloodTestController::class);
        Route::apiResource('category', App\Http\Controllers\Api\CategoryController::class);
        Route::apiResource('drug', App\Http\Controllers\Api\DrugController::class);
        Route::apiResource('option', App\Http\Controllers\Api\DrugOptionController::class);
        Route::post('prescription/{prescription}/drug', [App\Http\Controllers\Api\PrescriptionController::class, 'addDrug']);
        Route::put('prescription/{prescription}/drug/{drug}/edit', [App\Http\Controllers\Api\PrescriptionController::class, 'editDrug']);
        Route::delete('prescription/{prescription}/drug/{drug}', [App\Http\Controllers\Api\PrescriptionController::class, 'deleteDrug']);
        Route::get('prescription/{prescription}/submit', [App\Http\Controllers\Api\PrescriptionController::class, 'submitPrescription']);
        Route::apiResource('prescription', App\Http\Controllers\Api\PrescriptionController::class);
        Route::apiResource('{consultation}/req', App\Http\Controllers\Api\RequestController::class);
    });
});
