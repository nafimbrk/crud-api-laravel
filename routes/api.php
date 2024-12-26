<?php

use App\Http\Controllers\Api\Api1_tokobuku;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/api1',Api1_tokobuku::class);

Route::resource('/mk',MatakuliahController::class);

