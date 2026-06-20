<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\Admin\MailSettingController;
use App\Http\Controllers\API\Admin\SiteSettingController;
use App\Http\Controllers\API\Admin\SeoSettingController;
use App\Http\Controllers\API\Admin\BannerController;
use App\Http\Controllers\API\Admin\TeamFirstSectionController;
use App\Http\Controllers\API\Admin\TeamSecondSectionController;
use App\Http\Controllers\API\Admin\TeamMemberController;
use App\Http\Controllers\API\Admin\SrFirstSectionController;
use App\Http\Controllers\API\Admin\SrSecondSectionController;
use App\Http\Controllers\API\Admin\SrThirdSectionController;
use App\Http\Controllers\API\Admin\SrForthSectionController;
use App\Http\Controllers\API\Admin\SrFifthSectionController;
use App\Http\Controllers\API\Admin\SrSixthSectionController;
use App\Http\Controllers\API\Admin\SrSeventhSectionController;
use App\Http\Controllers\API\Admin\BlogFirstSectionController;
use App\Http\Controllers\API\Admin\BlogSecondSectionController;
use App\Http\Controllers\API\Admin\AboutFirstSectionController;
use App\Http\Controllers\API\Admin\AboutSecondSectionController;
use App\Http\Controllers\API\Admin\AboutThirdSectionController;
use App\Http\Controllers\API\Admin\AboutForthSectionController;
use App\Http\Controllers\API\Public\AboutController;

use App\Http\Controllers\API\Admin\ServiceCategoryController;
use App\Http\Controllers\API\Admin\ServiceSubCategoryController;
use App\Http\Controllers\API\Admin\ServiceSubCategorySectionController;
use App\Http\Controllers\API\Public\ServiceController;
use App\Http\Controllers\API\Admin\SvFirstSectionController;



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
        Route::get('/seo-settings/list', [SeoSettingController::class, 'list']);
        Route::post('/seo-settings/save', [SeoSettingController::class, 'save']);
        Route::get('/seo-settings/{page}', [SeoSettingController::class, 'details']);

        // Banner
        Route::post('/banner/save', [BannerController::class, 'save']);
        Route::get('/banner/{page}',[BannerController::class, 'details']);
        Route::get('/banner-list',[BannerController::class, 'list']);

        // Team First Section
        Route::post('/team-first-section/save',[TeamFirstSectionController::class, 'save']);
        Route::get('/team-first-section',[TeamFirstSectionController::class, 'details']);

        // Team Second Section
        Route::post('/team-second-section/save', [TeamSecondSectionController::class, 'save']);
        Route::get('/team-second-section',[TeamSecondSectionController::class, 'details']);

        // Team Members
        Route::post('/team-member/save', [TeamMemberController::class, 'save']);
        Route::get('/team-member/{id}', [TeamMemberController::class, 'details']);
        Route::get('/team-member-list',[TeamMemberController::class, 'list']);

        // Corporate Social Responsibility (SR) First Section
        Route::post('/sr-first-section/save', [SrFirstSectionController::class, 'save']);
        Route::get('/sr-first-section', [SrFirstSectionController::class, 'details']);
        // Corporate Social Responsibility (SR) Second Section
        Route::post('/sr-second-section/save', [SrSecondSectionController::class, 'save']);
        Route::get('/sr-second-section', [SrSecondSectionController::class, 'details']);
        // Corporate Social Responsibility (SR) Third Section
        Route::post('/sr-third-section/save', [SrThirdSectionController::class, 'save']);
        Route::get('/sr-third-section', [SrThirdSectionController::class, 'details']);
        Route::get('/sr-third-section/{id}', [SrThirdSectionController::class, 'edit']);
        // Corporate Social Responsibility (SR) Forth Section
        Route::post('/sr-forth-section/save', [SrForthSectionController::class, 'save']);
        Route::get('/sr-forth-section/{id}', [SrForthSectionController::class, 'details']);
        Route::get('/sr-forth-section-list', [SrForthSectionController::class, 'list']);
        Route::delete('/sr-forth-section/{id}', [SrForthSectionController::class, 'delete']);
        // Corporate Social Responsibility (SR) Fifth Section
        Route::post('/sr-fifth-section/save', [SrFifthSectionController::class, 'save']);
        Route::get('/sr-fifth-section/{id}', [SrFifthSectionController::class, 'details']);
        Route::get('/sr-fifth-section-list', [SrFifthSectionController::class, 'list']);
        Route::delete('/sr-fifth-section/{id}', [SrFifthSectionController::class, 'delete']);
        // Corporate Social Responsibility (SR) Sixth Section
        Route::post('/sr-sixth-section/save', [SrSixthSectionController::class, 'save']);
        Route::get('/sr-sixth-section/{id}', [SrSixthSectionController::class, 'details']);
        Route::get('/sr-sixth-section-list', [SrSixthSectionController::class, 'list']);
        Route::delete('/sr-sixth-section/{id}', [SrSixthSectionController::class, 'delete']);
        //Corporate Social Responsibility (SR) Seventh Section
        Route::post('/sr-seventh-section/save', [SrSeventhSectionController::class, 'save']);
        Route::get('/sr-seventh-section', [SrSeventhSectionController::class, 'details']);

        // Blog Section
        Route::post('/blog-first-section/save', [BlogFirstSectionController::class, 'save']);
        Route::get('/blog-first-section', [BlogFirstSectionController::class, 'details']);
        // blog second section
        Route::post('/blog/save', [BlogSecondSectionController::class, 'save']);
        Route::get('/blog/{id}', [BlogSecondSectionController::class, 'details']);
        Route::get('/blog-list', [BlogSecondSectionController::class, 'list']);
        Route::delete('/blog/{id}', [BlogSecondSectionController::class, 'delete']);

        // About first section
        Route::post('/about-first-section/save', [AboutFirstSectionController::class,'save']);
        Route::get('/about-first-section', [AboutFirstSectionController::class,'details']);
        // About second section
        Route::post('/about-second-section/save', [AboutSecondSectionController::class, 'save']);
        Route::get('/about-second-section', [AboutSecondSectionController::class, 'details']);
        // About third section
        Route::post('/about-third-section/save', [AboutThirdSectionController::class,'save']);
        Route::get('/about-third-section', [AboutThirdSectionController::class,'details']);
        // About forth section
        Route::post('/about-forth-section/save', [AboutForthSectionController::class,'save']);
        Route::get('/about-forth-section', [AboutForthSectionController::class,'details']);

        //Service Section

        //Service Category
        Route::post('/service-category/save', [ServiceCategoryController::class,'save']);
        Route::get('/service-category/list', [ServiceCategoryController::class,'list']);
        Route::get('/service-category/{id}', [ServiceCategoryController::class,'details']);
        Route::delete('/service-category/{id}', [ServiceCategoryController::class,'delete']);
        //Service Sub Category
        Route::post('/service-sub-category/save', [ServiceSubCategoryController::class,'save']);
        Route::get('/service-sub-category/list', [ServiceSubCategoryController::class,'list']);
        Route::get('/service-sub-category/{id}', [ServiceSubCategoryController::class,'details']);
        Route::delete('/service-sub-category/{id}', [ServiceSubCategoryController::class,'delete']);
        //Service Sub Category Section
        Route::post('/service-sub-category-section/save', [ServiceSubCategorySectionController::class,'save']);
        Route::get('/service-sub-category-section/list', [ServiceSubCategorySectionController::class,'list']);
        Route::get('/service-sub-category-section/{id}', [ServiceSubCategorySectionController::class,'details']);
        Route::delete('/service-sub-category-section/{id}', [ServiceSubCategorySectionController::class,'delete']);
        // Service Details Page First Section
        Route::post('/sv-first-section/save', [SvFirstSectionController::class,'save']);
        Route::get('/sv-first-section/list', [SvFirstSectionController::class,'list']);
        Route::get('/sv-first-section/{id}', [SvFirstSectionController::class,'details']);
        Route::delete('/sv-first-section/{id}', [SvFirstSectionController::class,'delete']);


    });

});

// Public routes for fetching details
Route::get('/team', [TeamFirstSectionController::class, 'pageDetails']);
Route::get('/team-member/{slug}', [TeamMemberController::class, 'detailsBySlug']);

// blog 
Route::get('/blogs', [BlogSecondSectionController::class, 'allBlogs']);
Route::get('/blog/{slug}', [BlogSecondSectionController::class, 'detailsBySlug']);
// about
Route::get('/about', [AboutController::class,'details']);

// service
Route::get('/services', [ServiceController::class,'services']);
Route::get('/service/{slug}', [ServiceController::class,'details']);





