<?php

use App\Http\Controllers\PolicyController;
use Illuminate\Support\Facades\Route;

Route::apiResource('policies', PolicyController::class);
