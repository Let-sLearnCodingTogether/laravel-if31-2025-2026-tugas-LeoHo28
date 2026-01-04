<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('habits', function () {
    $habits = \App\Models\Habit::all();
    return view('habits', compact('habits'));
});
