<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/mark-entry', [AttendanceController::class, 'markEntry'])->name('attendance.markEntry');
Route::post('/mark-exit', [AttendanceController::class, 'markExit'])->name('attendance.markExit');
Route::get('/report', [AttendanceController::class, 'report'])->name('attendance.report');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



// Route::get('users', [UserController::class, 'index'])->name('users.index')
// ->middleware('permission:users.index');
// Route::post('users/store', [UserController::class, 'store'])->name('users.store')
// ->middleware('permission:users.store');
// Route::put('users/{user}', [UserController::class, 'update'])->name('users.update')
// ->middleware('permission:users.update');
// Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy')
// ->middleware('permission:users.destroy');


// Admin
// Permission
// Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
//     // ->middleware('permission:permissions.index');
// Route::post('permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
//     // ->middleware('permission:permissions.store');
// Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
//     // ->middleware('permission:permissions.update');
// Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
//     // ->middleware('permission:permissions.destroy');

Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions/{permission}', [PermissionController::class, 'show'])->name('permissions.show');
Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

// Role
// Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
//     // ->middleware('permission:roles.index');
// Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
//     // ->middleware('permission:roles.store');
// Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
//     // ->middleware('permission:roles.update');
// Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
//     // ->middleware('permission:roles.destroy');

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
