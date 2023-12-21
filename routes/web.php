<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*  We refactored this code to work in a controller below:
Route::get('/', function () {
    return view('dashboard');

Route::get('departments/index', function () {
    return view('management.departments.index');
})->name('departmentsIndex');

Route::get('users/index', function () {
    return view('management.users.index');
})->name('usersIndex');

});
*/

Route::post("/login", [AuthController::class, "login"])->name('login');


// // This code breaks the submenu
// Route::get('/', function () {
//     return redirect("/login");
// });

// This code creates an infinite loop:
// Route::get('/', function () {
//     return redirect("/login");
// });

//  This code totaly breaks the Sidebar Menu
// Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');


Route::get('departments/index', [DepartmentController::class, 'index'])->name('departmentsIndex');
Route::get('departments/create', [DepartmentController::class, 'create'])->name('departmentsCreate');
Route::post('departments/store', [DepartmentController::class, 'store'])->name('departmentsStore');
Route::get('departments/edit/{id}', [DepartmentController::class, 'edit'])->name('departmentEdit');
Route::post('departments/update/{id}', [DepartmentController::class, 'update'])->name('departmentsUpdate');
Route::post('departments/delete/{id}', [DepartmentController::class, 'delete'])->name('departmentsDelete');


Route::get('roles/index', [RoleController::class, 'index'])->name('rolesIndex');
Route::get('roles/create', [RoleController::class, 'create'])->name('rolesCreate');
Route::post('roles/store', [RoleController::class, 'store'])->name('rolesStore');
Route::get('roles/edit/{id}', [RoleController::class, 'edit'])->name('rolesEdit');
Route::post('roles/update/{id}', [RoleController::class, 'update'])->name('rolesUpdate');
Route::post('roles/delete/{id}', [RoleController::class, 'delete'])->name('rolesDelete');

Route::get('permissions/index', [PermissionController::class, 'index'])->name('permissionsIndex');
Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissionsCreate');
Route::post('permissions/post', [PermissionController::class, 'store'])->name('permissionsStore');
Route::get('permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissionsEdit');
Route::post('permissions/update/{id}', [PermissionController::class, 'update'])->name('permissionsUpdate');
Route::post('permissions/delete/{id}', [PermissionController::class, 'delete'])->name('permissionsDelete');






Route::get('users/index', [UserController::class, 'index'])->name('usersIndex');


