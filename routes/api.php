<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitController;

Route::apiResource('habits', HabitController::class);
