<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    Route::get("/users", [UserController::class, 'index']);

    Route::post("/users", [UserController::class, 'store']);

    Route::get("/categories", [CategoryController::class, 'index']);

    Route::post("/categories", [CategoryController::class, 'store']);

    Route::get("/categories/{id}", [CategoryController::class, 'show']);

    Route::put("/categories/{id}", [CategoryController::class, 'update']);

    Route::delete("/categories/{id}", [CategoryController::class, 'destroy']);

