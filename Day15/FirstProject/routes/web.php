<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return "This is test route";
});

Route::get("/home", [HomeController::class, 'index'])->name("home");

Route::get("/about", [AboutController::class, 'index']);