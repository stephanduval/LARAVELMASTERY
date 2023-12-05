<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getDepartments', [DepartmentController::class, 'getDepartments'])->middleware('auth:api');
Route::post('storeDepartment', [DepartmentController::class, 'storeDepartment']);
Route::post('updateDepartment/{id}', [DepartmentController::class, 'updateDepartment']);
Route::post('deleteDepartment/{id}', [DepartmentController::class, 'deleteDepartment']);

Route::get('getAllDepartments', [ApiController::class, 'getAllDepartments'])->middleware('auth:api');
Route::get('getAllRoles', [ApiController::class, 'getAllRoles'])->middleware('auth:api');
Route::get('getAllPermissions', [ApiController::class, 'getAllPermissions'])->middleware('auth:api');

Route::get('getUsers', [UserController::class, 'getUsers']);
Route::post('storeUser', [UserController::class, 'storeUser']);
Route::post('updateUser/{id}', [UserController::class, 'updateUser']);
Route::post('deleteUser/{id}', [UserController::class, 'deleteUser']);
