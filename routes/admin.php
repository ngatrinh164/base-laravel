<?php

use App\Http\Controllers\AdminController;
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

Route::post('register', [AdminController::class, 'register']);
Route::post('login', [AdminController::class, 'login']);
Route::get('login',  function (Request $request) {
    return response()->json([
        'message' => 'Unauthorized',
        'status' => 401
    ]);
})->name('login');
Route::post('logout', [AdminController::class, 'logout']);
Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('user-info', [AdminController::class, 'userInfo']);
    Route::post('update-profile', [AdminController::class, 'updateProfile']);
});
Route::get('/test', function (Request $request) {
    return 'ok';
});
