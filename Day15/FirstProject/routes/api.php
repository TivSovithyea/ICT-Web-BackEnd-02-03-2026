<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    Route::get("/users", [UserController::class, 'index']);

    Route::post("/users", [UserController::class, 'store']);

    Route::get("/categories", [CategoryController::class, 'index']);

    Route::post("/categories", [CategoryController::class, 'store']);