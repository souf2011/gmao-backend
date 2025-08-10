<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EmplacementsController;
use App\Http\Controllers\EquipementsController;
use App\Http\Controllers\IntervenantsController;
use App\Http\Controllers\InterventionsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ---------- Public Routes ----------
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');

// ---------- Protected Routes ----------
// Get notifications for the authenticated admin user
Route::middleware('auth:sanctum')->get('/notifications', [NotificationController::class, 'index']);

// Confirm a pending user registration (by admin)
Route::middleware('auth:sanctum')->post('/users/{id}/confirm', [UsersController::class, 'confirm']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::get('/notifications/unread', [NotificationController::class, 'unread']); // Only unread
    Route::post('/notifications', [NotificationController::class, 'store']); // Create
    Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead']); // Mark as read
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy']);
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Categories Routes
    Route::apiResource('categories', CategoriesController::class);
    // Emplacements Routes
    Route::apiResource('emplacements', EmplacementsController::class);
    // Equipements Routes
    Route::apiResource('equipements', EquipementsController::class);
    // Intervenants Routes
    Route::apiResource('intervenants', IntervenantsController::class);

    Route::apiResource('intervention', InterventionsController::class);
    // services Routes
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('users', UsersController::class);

});


// Route::put('/emplacements/{id}', [EmplacementsController::class, 'update']);
