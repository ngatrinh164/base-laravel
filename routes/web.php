<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\LiquidationController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::post('/employees', ([EmployeeController::class, 'store']));
    Route::put('/employees/{id}', [EmployeeController::class, 'update']);
    Route::delete('/employees/{id}', [EmployeeController::class, 'delete']);
    Route::get('/employees/{id}', [EmployeeController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/equipments', [EquipmentController::class, 'index']);
    Route::post('/equipments', [EquipmentController::class, 'store']);
    Route::put('/equipments/{id}', [EquipmentController::class, 'update']);
    Route::delete('/equipments/{id}', [EquipmentController::class, 'delete']);
    Route::get('/equipments/{id}', [EquipmentController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'delete']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::post('/departments', [DepartmentController::class, 'store']);
    Route::put('/departments/{id}', [DepartmentController::class, 'update']);
    Route::delete('/departments/{id}', [DepartmentController::class, 'delete']);
    Route::get('/departments/{id}', [DepartmentController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/liquidations', [LiquidationController::class, 'index']);
    Route::post('/liquidations', [LiquidationController::class, 'store']);
    Route::put('/liquidations/{id}', [LiquidationController::class, 'update']);
    Route::delete('/liquidations/{id}', [LiquidationController::class, 'delete']);
    Route::get('/liquidations/{id}', [LiquidationController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/repairs', [RepairController::class, 'index']);
    Route::post('/repairs', [RepairController::class, 'store']);
    Route::put('/repairs/{id}', [RepairController::class, 'update']);
    Route::delete('/repairs/{id}', [RepairController::class, 'delete']);
    Route::get('/repairs/{id}', [RepairController::class, 'show']);
});
Route::group(['middleware' => 'auth:employee'], function () {
    Route::get('/employee-requests', [RequestController::class, 'getEmployeeRequest']);
    Route::post('/employee-requests', [RequestController::class, 'createEmployeeRequest']);
    Route::put('/employee-requests/{id}', [RequestController::class, 'updateEmployeeRequest']);
    Route::delete('/employee-requests/{id}', [RequestController::class, 'deleteEmployeeRequest']);
    Route::get('/employee-requests/{id}', [RequestController::class, 'showEmployeeRequest']);
});
// create request by admin role
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/requests', [RequestController::class, 'index']);
    Route::post('/requests', [RequestController::class, 'store']);
    Route::put('/requests/{id}', [RequestController::class, 'update']);
    Route::delete('/requests/{id}', [RequestController::class, 'delete']);
    Route::get('/requests/{id}', [RequestController::class, 'show']);
});
