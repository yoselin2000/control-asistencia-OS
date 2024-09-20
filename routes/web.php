<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;

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