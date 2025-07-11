<?php

use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\API\Auth\AuthController;
use Illuminate\Support\Facades\Route;





/**
 * ========     Auth Routes     ===============
 */
Route::controller(AuthController::class)
    ->prefix('auth')
    ->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::get('/test', 'testRole')->middleware('auth:api', 'role:student');
        Route::post('/logout', 'logout')->middleware('auth:api');
    });



/**
 * ========     Classroom Routes     ===============
 */
Route::prefix('admin')
    ->middleware(['auth:api', 'role:admin'])
    ->group(function () {
        Route::apiResource('classrooms', ClassroomController::class);
    });