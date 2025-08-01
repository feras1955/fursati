<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// API Routes للتوثيق
Route::prefix('ar/api/auth')->group(function () {
    Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::get('/user', [App\Http\Controllers\Api\AuthController::class, 'user']);
    });
});

// API Routes للباحثين عن عمل (تتطلب توثيق)
Route::prefix('ar/api/job-seeker')->middleware('bearer.token')->group(function () {
    Route::get('/all-jobs', [App\Http\Controllers\Api\JobSeekerController::class, 'getAllJobs']);
    Route::get('/job-details/{id}', [App\Http\Controllers\Api\JobSeekerController::class, 'getJobDetails']);
    Route::post('/jobs/{id}/mark-favorite', [App\Http\Controllers\Api\JobSeekerController::class, 'markFavorite']);
    Route::get('/favorite-jobs', [App\Http\Controllers\Api\JobSeekerController::class, 'getFavoriteJobs']);
    Route::post('/jobs/applied/{id}', [App\Http\Controllers\Api\JobSeekerController::class, 'applyForJob']);
});

// API Routes للشركات (لا تتطلب توثيق)
Route::prefix('ar/api')->group(function () {
    Route::get('/all-companies', [App\Http\Controllers\Api\CompanyController::class, 'getAllCompanies']);
    Route::get('/faqs', [App\Http\Controllers\Api\FAQController::class, 'getAllFAQs']);
    Route::get('/policies', [App\Http\Controllers\Api\PolicyController::class, 'getAllPolicies']);
    Route::get('/policies/{type}', [App\Http\Controllers\Api\PolicyController::class, 'getPolicyByType']);
});
