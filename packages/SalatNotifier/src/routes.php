<?php

use Illuminate\Support\Facades\Route;
use SalatNotifier\Http\Controllers\SalatController;

Route::prefix('api')->group(function () {
    Route::get('salat-times', [SalatController::class, 'index']);
    Route::post('salat-times', [SalatController::class, 'store']);
    Route::put('salat-times/{id}', [SalatController::class, 'update']);
    Route::delete('salat-times/{id}', [SalatController::class, 'destroy']);
});
