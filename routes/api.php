<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| كل المسارات هنا يتم إضافة /api تلقائياً من Laravel
| لذلك لا نكررها في prefix
|--------------------------------------------------------------------------
*/
// مسارات التوثيق
Route::prefix('ar/auth')->group(function () {
    Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::get('/user', [App\Http\Controllers\Api\AuthController::class, 'user']);
    });
});

// مسارات الباحث عن عمل
Route::prefix('ar/job-seeker')->group(function () {
    // مسارات عامة
    Route::match(['get', 'post'], '/all-jobs', [App\Http\Controllers\Api\JobSeekerController::class, 'getAllJobs']);
    Route::get('/job-details/{id}', [App\Http\Controllers\Api\JobSeekerController::class, 'getJobDetails']);

    // مسارات محمية بالتوكن
    Route::middleware('bearer.token')->group(function () {
        Route::post('/jobs/{id}/mark-favorite', [App\Http\Controllers\Api\JobSeekerController::class, 'markFavorite']);
        Route::get('/favorite-jobs', [App\Http\Controllers\Api\JobSeekerController::class, 'getFavoriteJobs']);
        Route::post('/jobs/applied/{id}', [App\Http\Controllers\Api\JobSeekerController::class, 'applyForJob']);
    });
});

// مسارات الشركات والمحتوى العام
Route::prefix('ar')->group(function () {
    Route::get('/all-companies', [App\Http\Controllers\Api\CompanyController::class, 'getAllCompanies']);
    Route::get('/faqs', [App\Http\Controllers\Api\FAQController::class, 'getAllFAQs']);
    Route::get('/policies', [App\Http\Controllers\Api\PolicyController::class, 'getAllPolicies']);
    Route::get('/policies/{type}', [App\Http\Controllers\Api\PolicyController::class, 'getPolicyByType']);
});
