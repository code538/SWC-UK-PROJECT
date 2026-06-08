<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\Admin\MailSettingController;
use App\Http\Controllers\API\Admin\SiteSettingController;
use App\Http\Controllers\API\Admin\SeoSettingController;

Route::post('/login', [AuthController::class, 'login']);

//forgot password routes
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

   

    Route::prefix('admin')->group(function () {

        // Smtp Settings
        Route::post('/smtp/save', [MailSettingController::class, 'save']);
        Route::get('/smtp/details', [MailSettingController::class, 'details']);
        
        // Site Settings
        Route::post('/site-settings/save', [SiteSettingController::class, 'save']);
        Route::get('/site-settings', [SiteSettingController::class, 'details']);

        // SEO Settings
        Route::post('/seo-settings/save', [SeoSettingController::class, 'save']);
        Route::get('/seo-settings/{page}', [SeoSettingController::class, 'details']);
    });

    

});
