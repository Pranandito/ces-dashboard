<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\espController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', 'dashboard');

Route::get('dashboard', [dashboardController::class, 'index']);
Route::get('data', [dashboardController::class, 'getDashboardData']);
Route::get('dashboard/chart/{data}', [dashboardController::class, 'chartData']);
Route::get('dashboard/heatMap', [dashboardController::class, 'heatMapData']);
