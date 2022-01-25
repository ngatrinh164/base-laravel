<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EquipmentController;
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
    Route::post('/categorie', [CategoryController::class, 'store']);
    Route::put('/categorie/{id}', [CategoryController::class, 'update']);
    Route::delete('/categorie/{id}', [CategoryController::class, 'delete']);
    Route::get('/categorie/{id}', [CategoryController::class, 'show']);
});
