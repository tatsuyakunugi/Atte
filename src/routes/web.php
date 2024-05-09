<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StampController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\AttendanceController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/punchin', [StampController::class, 'punchin']);
    Route::post('/punchin', [StampController::class, 'punchin']);
    Route::get('/punchout', [StampController::class, 'punchout']);
    Route::post('/punchout', [StampController::class, 'punchout']);
});

Route::middleware('auth')->group(function () {
    Route::get('/restin', [RestController::class, 'restin']);
    Route::post('/restin', [RestController::class, 'restin']);
    Route::get('/restout', [RestController::class, 'restout']);
    Route::post('/restout', [RestController::class, 'restout']);
});

Route::middleware('auth')->group(function () {
    Route::get('/attendance', [AttendanceController::class, 'attendance']);
    Route::get('/users-list', [AttendanceController::class, 'getUsers']);
    Route::get('/show', [AttendanceController::class, 'show']);
    Route::get('/show', [AttendanceController::class, 'showResult']);
});