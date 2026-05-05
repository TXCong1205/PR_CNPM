<?php

use App\Http\Controllers\BinhLuanController;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    Route::prefix('/binh-luan')->group(function () {
        Route::get('/', [BinhLuanController::class, 'getBinhLuan']);
        Route::post('/create', [BinhLuanController::class, 'postBinhLuan']);
        Route::put('/update', [BinhLuanController::class, 'putBinhLuan']);
        Route::delete('/delete/{id}', [BinhLuanController::class, 'deleteBinhLuan']);
        Route::patch('/change-status', [BinhLuanController::class, 'changesStatus']);
    });
});
