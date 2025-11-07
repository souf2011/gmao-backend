<?php

use App\Http\Controllers\AprovisionementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\EmplacementsController;
use App\Http\Controllers\EquipementsController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\IntervenantsController;
use App\Http\Controllers\InterventionDetailController;
use App\Http\Controllers\InterventionsController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SuiviController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ---------- Public Routes ----------
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('logins');

// ---------- Protected Routes ----------
// Get notifications for the authenticated admin user


// Confirm a pending user registration (by admin)
Route::get('/equipements/maintenance-history', [MaintenanceController::class, 'indexAllMaintenance']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::put('/maintenance/{id}',[MaintenanceController::class, 'update']);
    Route::put('/maintenance/{id}/compteur', [MaintenanceController::class, 'updateCompteur']);


    Route::get('/suivis', [SuiviController::class, 'index']);
    Route::get('/suivis/{id}', [SuiviController::class, 'show']);
    Route::get('/interventions/{interventionId}/suivis', [SuiviController::class, 'byIntervention']);


    // routes/api.php
    Route::get('/equipments/needs-maintenance', [EquipementsController::class, 'needsMaintenance']);

    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications', [NotificationController::class, 'store']);
    Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logouts');


    Route::post('/users/{id}/confirm', [UsersController::class, 'confirm']);
    Route::apiResource('register',RegisteredUserController::class);
    Route::apiResource('roles',RolesController::class);
    // Categories Routes
    Route::apiResource('categories', CategoriesController::class);
    // Emplacements Routes
    Route::apiResource('emplacements', EmplacementsController::class);
    // Equipements Routes
    Route::apiResource('equipements', EquipementsController::class);
    // Intervenants Routes
    Route::apiResource('intervenants', IntervenantsController::class);

    Route::apiResource('interventions', InterventionsController::class);
    // services Routes
    Route::apiResource('services' ,ServiceController::class);

    Route::apiResource('suivis', SuiviController::class);


    Route::get('/users/{id}', [UsersController::class, 'show']);
    Route::apiResource('users', UsersController::class);
    Route::get('/users-intervenants', [UsersController::class, 'index_intervenant']);

    Route::get('/equipements/maintenance-history', [MaintenanceController::class, 'IndexAllMaintenance']);

    Route::get('/equipements/{id}/interventions', [InterventionsController::class, 'history']);



    Route::get('/equipements/{id}/maintenance-history', [\App\Http\Controllers\MaintenanceController::class, 'getByEquipment']);
    Route::put('/maintenance/{id}/operation', [MaintenanceController::class, 'update']);


    Route::get('/dashboard/equipementState', [InterventionsController::class, 'equipementStats']);

    Route::apiResource('aprovisionements', AprovisionementController::class);
    Route::get('/dashboard/dashboardStats',[InterventionsController::class,'dashboardStats']);


    Route::post('/interventions/{id}/details', [InterventionDetailController::class, 'store']);
    Route::get('/interventions/{id}/details', [InterventionDetailController::class, 'show']);

    Route::apiResource('etablissements',EtablissementController::class);
});


// Route::put('/emplacements/{id}', [EmplacementsController::class, 'update']);
