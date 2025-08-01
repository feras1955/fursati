<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Jobs routes
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

// Jobs routes (تتطلب تسجيل دخول)
Route::middleware('auth')->group(function () {
    Route::post('/jobs/{id}/bookmark', [JobController::class, 'toggleBookmark'])->name('jobs.bookmark');
    Route::post('/jobs/{id}/apply', [JobController::class, 'apply'])->name('jobs.apply');
});

// Profile routes (تتطلب تسجيل دخول)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Settings routes (تتطلب تسجيل دخول)
Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.profile');
    Route::post('/settings/notifications', [SettingsController::class, 'updateNotifications'])->name('settings.notifications');
    Route::post('/settings/privacy', [SettingsController::class, 'updatePrivacy'])->name('settings.privacy');
    Route::post('/settings/language', [SettingsController::class, 'updateLanguage'])->name('settings.language');
    Route::post('/settings/security', [SettingsController::class, 'updateSecurity'])->name('settings.security');
    Route::post('/settings/change-language', [SettingsController::class, 'changeLanguage'])->name('settings.change-language');
    Route::post('/settings/export-data', [SettingsController::class, 'exportData'])->name('settings.export-data');
    Route::post('/settings/delete-account', [SettingsController::class, 'deleteAccount'])->name('settings.delete-account');
    Route::post('/settings/logout-all', [SettingsController::class, 'logoutAllDevices'])->name('settings.logout-all');

    // Bookmarks routes
    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/bookmarks/clear-all', [BookmarkController::class, 'clearAll'])->name('bookmarks.clear-all');
    Route::post('/bookmarks/export', [BookmarkController::class, 'export'])->name('bookmarks.export');
});

// FAQ routes
Route::get('/faq', [FAQController::class, 'index'])->name('faq.index');

// Help routes
Route::get('/help', [HelpController::class, 'index'])->name('help.index');
Route::post('/help/submit-ticket', [HelpController::class, 'submitTicket'])->name('help.submit-ticket');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Password reset routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Social login routes
Route::get('/login/{provider}', [AuthController::class, 'redirectToProvider'])->name('social.login');
Route::get('/login/{provider}/callback', [AuthController::class, 'handleProviderCallback'])->name('social.callback');

// Legal pages
Route::get('/terms', function () {
    return view('legal.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('legal.privacy');
})->name('privacy');

// Search and filter routes
Route::get('/search', [JobController::class, 'search'])->name('jobs.search');
Route::post('/filter', [JobController::class, 'filter'])->name('jobs.filter');

// API routes for AJAX requests
Route::prefix('api')->group(function () {
    Route::post('/jobs/search', [JobController::class, 'apiSearch'])->name('api.jobs.search');
    Route::post('/jobs/filter', [JobController::class, 'apiFilter'])->name('api.jobs.filter');
    Route::post('/profile/upload-avatar', [ProfileController::class, 'uploadAvatar'])->name('api.profile.upload-avatar');
    Route::post('/profile/upload-cv', [ProfileController::class, 'uploadCV'])->name('api.profile.upload-cv');
});

// Fallback route for 404
Route::fallback(function () {
    return view('errors.404');
});
