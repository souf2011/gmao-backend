<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EmplacementsController;
use App\Http\Controllers\EquipementsController;
use App\Http\Controllers\IntervenantsController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ---------- Public Routes ----------
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');

// ---------- Protected Routes ----------
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Categories Routes
    Route::apiResource('categories', CategoriesController::class);
    // Emplacements Routes
    Route::apiResource('emplacements', EmplacementsController::class);
    // Equipements Routes
    Route::apiResource('equipements', EquipementsController::class);
    // Intervenants Routes
    Route::apiResource('intervenants', IntervenantsController::class);

    // services Routes
    Route::apiResource('services', ServiceController::class);

});


// Route::put('/emplacements/{id}', [EmplacementsController::class, 'update']);
