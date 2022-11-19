<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\OvertimepayController;
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

Route::get('overtime-pays/calculate', [OvertimepayController::class, 'calculate']);
Route::post('overtimes', [OvertimeController::class, 'store']);
Route::patch('settings', [SettingController::class, 'patch']);
Route::post('employee/store', [EmployeeController::class, 'store']);
Route::get('employee', [EmployeeController::class, 'index']);