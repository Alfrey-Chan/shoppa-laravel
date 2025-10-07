<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\RequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('/contact', ContactController::class);
Route::apiResource('/request', RequestController::class);
