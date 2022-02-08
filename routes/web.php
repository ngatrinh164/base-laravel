<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\LiquidationController;
use App\Http\Controllers\RepairController;
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
    Route::post('/employee', ([EmployeeController::class, 'store']));
    Route::put('/employee/{id}', [EmployeeController::class, 'update']);
    Route::delete('/employee/{id}', [EmployeeController::class, 'delete']);
    Route::get('/employee/{id}', [EmployeeController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/equipments', [EquipmentController::class, 'index']);
    Route::post('/equipment', [EquipmentController::class, 'store']);
    Route::put('/equipment/{id}', [EquipmentController::class, 'update']);
    Route::delete('/equipment/{id}', [EquipmentController::class, 'delete']);
    Route::get('/equipment/{id}', [EquipmentController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/category', [CategoryController::class, 'store']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'delete']);
    Route::get('/category/{id}', [CategoryController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::post('/department', [DepartmentController::class, 'store']);
    Route::put('/department/{id}', [DepartmentController::class, 'update']);
    Route::delete('/department/{id}', [DepartmentController::class, 'delete']);
    Route::get('/department/{id}', [DepartmentController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/liquidations', [LiquidationController::class, 'index']);
    Route::post('/liquidation', [LiquidationController::class, 'store']);
    Route::put('/liquidation/{id}', [LiquidationController::class, 'update']);
    Route::delete('/liquidation/{id}', [LiquidationController::class, 'delete']);
    Route::get('/liquidation/{id}', [LiquidationController::class, 'show']);
});
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/repairs', [RepairController::class, 'index']);
    Route::post('/repair', [RepairController::class, 'store']);
    Route::put('/repair/{id}', [RepairController::class, 'update']);
    Route::delete('/repair/{id}', [RepairController::class, 'delete']);
    Route::get('/repair/{id}', [RepairController::class, 'show']);
});
