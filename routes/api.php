<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ReplySupportApiController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::post('/files', [FileUploadController::class,'upload']);
Route::get('/files/{file}', [FileUploadController::class,'download']);
Route::delete('/files/{file}', [FileUploadController::class,'delete']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/replies/{support_id}', [ReplySupportApiController::class, 'getRepliesFromSupport']);
    Route::post('/replies/{support_id}', [ReplySupportApiController::class, 'createNewReply']);
    Route::delete('/replies/{id}', [ReplySupportApiController::class, 'destroy']);
    Route::apiResource('/supports', SupportController::class);
});
// Route::apiResource('/supports', SupportController::class)->middleware('auth');
