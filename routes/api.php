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
Route::get('/smtp-ping', function () {
    $host = 'smtp.gmail.com';
    $ports = [587, 465];
    $out = [];
    foreach ($ports as $p) {
        $start = microtime(true);
        $conn = @fsockopen($host, $p, $errno, $errstr, 8); // 8s timeout
        $ok = $conn ? 'OK' : "FAIL ($errno: $errstr)";
        if ($conn) fclose($conn);
        $out[] = "$host:$p -> $ok in " . round((microtime(true)-$start)*1000) . "ms";
    }
    return implode("\n", $out);
});
