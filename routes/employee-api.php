<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;


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

Route::post('login', [EmployeeController::class, 'login']);
Route::post('logout', [EmployeeController::class, 'logout']);
Route::get('user-info', [EmployeeController::class, 'userInfo'])->middleware('auth:employee');
Route::post('update-profile', [EmployeeController::class, 'updateProfile'])->middleware('auth:employee');
Route::post('change-password', [EmployeeController::class, 'changePassword'])->middleware('auth:employee');
