<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\espController;
use App\Http\Controllers\exportController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', 'dashboard');

Route::get('dashboard', [dashboardController::class, 'index']);
Route::get('data', [dashboardController::class, 'getDashboardData']);
Route::get('dashboard/chart/{data}', [dashboardController::class, 'chartData']);
Route::get('dashboard/heatMap', [dashboardController::class, 'heatMapData']);
Route::get('dashboard/exportCsv', [exportController::class, 'exportCsv'])->name('exportCsv');
Route::get('dashboard/activeButton', [dashboardController::class, 'pumpActive'])->name('pumpActivation');
