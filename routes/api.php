<?php

use App\Http\Controllers\espController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/store', [espController::class, 'store']);
    Route::get('/logging', [espController::class, 'logging']);
});

Route::get('/', function () {
    return view('welcome');
});
