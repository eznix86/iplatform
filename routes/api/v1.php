<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PolicyHolderController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::apiResource('policies', PolicyController::class);

Route::apiResource('policies/{policy}/drivers', DriverController::class);

Route::apiResource('policies/{policy}/drivers', DriverController::class);

Route::apiResource('policies/{policy}/policy-holder', PolicyHolderController::class);

Route::apiResource('policies/{policy}/vehicles', VehicleController::class);
