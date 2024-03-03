<?php

use App\Http\Controllers\AlarmController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);



Route::prefix('data')
    ->controller(DataController::class)
    ->group(function () {
        Route::get('/',  'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}',  'update');
        Route::delete('/{id}', 'destroy');
    });

Route::prefix('alarms')
    ->controller(AlarmController::class)
    ->group(function () {
        Route::get('/',  'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}',  'update');
        Route::delete('/{id}', 'destroy');
    });
