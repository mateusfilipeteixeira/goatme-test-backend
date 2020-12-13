<?php

use App\Http\Controllers\ScheduleController;
use App\Models\Schedule;
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

Route::get('/schedules/{month}', [ScheduleController::class, 'index']);
Route::post('/schedules', [ScheduleController::class, 'store']);
