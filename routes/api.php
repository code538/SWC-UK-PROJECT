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
use App\Http\Controllers\API\Admin\SvSecondSectionController;
use App\Http\Controllers\API\Admin\SvThirdSectionController;
use App\Http\Controllers\API\Admin\SvForthSectionController;
use App\Http\Controllers\API\Admin\SvFifthSectionController;
use App\Http\Controllers\API\Admin\SvSixthSectionController;
use App\Http\Controllers\API\Admin\SvSeventhSectionController;
use App\Http\Controllers\API\Admin\SvEighthSectionController;
use App\Http\Controllers\API\Admin\SvNinethSectionController;
use App\Http\Controllers\API\Admin\SvTenthSectionController;
use App\Http\Controllers\API\Admin\SvEleventhSectionController;
use App\Http\Controllers\API\Admin\SvTwelvethSectionController;
use App\Http\Controllers\API\Admin\TestimonialSectionController;
use App\Http\Controllers\API\Admin\FaqController;
use App\Http\Controllers\API\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\API\Admin\HrComplianceFirstSectionController;
use App\Http\Controllers\API\Admin\HrComplianceSecondSectionController;
use App\Http\Controllers\API\Admin\HrComplianceThirdSectionController;
use App\Http\Controllers\API\Admin\SponsorshipFirstSectionController;
use App\Http\Controllers\API\Admin\SponsorshipSecondSectionController;
use App\Http\Controllers\API\Admin\ContactQueryController;
use App\Http\Controllers\API\Admin\ComplaintController;

//Start tool navbar all route 
use App\Http\Controllers\API\Admin\RtwFirstSectionController;
//form route
use App\Http\Controllers\API\Admin\FormController;
use App\Http\Controllers\API\Admin\FormQuestionController;
use App\Http\Controllers\API\Admin\QuestionOptionController;
use App\Http\Controllers\API\Admin\FormSubmissionController;
use App\Http\Controllers\API\Admin\SubmissionAnswerController;
use App\Http\Controllers\API\Public\FormSubmissionController as PublicFormSubmissionController;

//this all are Uk Salary Calculator Route
use App\Http\Controllers\API\Admin\Calculator\CountryController;
use App\Http\Controllers\API\Admin\Calculator\RegionController;
use App\Http\Controllers\API\Admin\Calculator\TaxYearController;
use App\Http\Controllers\API\Admin\Calculator\TaxCodeController;
use App\Http\Controllers\API\Admin\Calculator\NiCategoryController;
use App\Http\Controllers\API\Admin\Calculator\NiBandController;
use App\Http\Controllers\API\Admin\Calculator\StudentLoanPlanController;
use App\Http\Controllers\API\Admin\Calculator\PensionOptionController;
use App\Http\Controllers\API\Public\SalaryCalculatorController;




//End tool navbar all route 

Route::post('/login', [AuthController::class, 'login']);

//forgot password routes
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    

    Route::prefix('admin/calculator')->group(function () {
        // Country route
        Route::post('/country/save', [CountryController::class, 'save']);
        Route::get('/country/list', [CountryController::class, 'list']);
        Route::get('/country/details/{id}', [CountryController::class, 'details']);
        Route::delete('/country/delete/{id}', [CountryController::class, 'delete']);

        // Region Route
        Route::post('/region/save', [RegionController::class, 'save']);
        Route::get('/region/list', [RegionController::class, 'list']);
        Route::get('/region/details/{id}', [RegionController::class, 'details']);
        Route::delete('/region/delete/{id}', [RegionController::class, 'delete']);
        
        //Tax Year Route 
        Route::post('/tax-year/save', [TaxYearController::class, 'save']);
        Route::get('/tax-year/list', [TaxYearController::class, 'list']);
        Route::get('/tax-year/details/{id}', [TaxYearController::class, 'details']);
        Route::delete('/tax-year/delete/{id}', [TaxYearController::class, 'delete']);

        //Tax Code Route
        Route::post('/tax-code/save', [TaxCodeController::class, 'save']);
        Route::get('/tax-code/list', [TaxCodeController::class, 'list']);
        Route::get('/tax-code/details/{id}', [TaxCodeController::class, 'details']);
        Route::delete('/tax-code/delete/{id}', [TaxCodeController::class, 'delete']);

        // Ni Category Controller
        Route::post('/ni-category/save', [NiCategoryController::class, 'save']);
        Route::get('/ni-category/list', [NiCategoryController::class, 'list']);
        Route::get('/ni-category/details/{id}', [NiCategoryController::class, 'details']);
        Route::delete('/ni-category/delete/{id}', [NiCategoryController::class, 'delete']);

        // Ni Band Controller
        Route::post('/ni-band/save', [NiBandController::class, 'save']);
        Route::get('/ni-band/list', [NiBandController::class, 'list']);
        Route::get('/ni-band/details/{id}', [NiBandController::class, 'details']);
        Route::delete('/ni-band/delete/{id}', [NiBandController::class, 'delete']);

        // Student Loan Plan Route
        Route::post('/student-loan-plan/save', [StudentLoanPlanController::class, 'save']);
        Route::get('/student-loan-plan/list', [StudentLoanPlanController::class, 'list']);
        Route::get('/student-loan-plan/details/{id}', [StudentLoanPlanController::class, 'details']);
        Route::delete('/student-loan-plan/delete/{id}', [StudentLoanPlanController::class, 'delete']);

        //
        Route::post('/pension-option/save', [PensionOptionController::class,'save']);
        Route::get('/pension-option/list', [PensionOptionController::class,'list']);
        Route::get('/pension-option/details/{id}', [PensionOptionController::class,'details']);
        Route::delete('/pension-option/delete/{id}', [PensionOptionController::class,'delete']);

    });

   

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
        Route::post('/services/save', [AdminServiceController::class,'save']);
        Route::get('/services/details', [AdminServiceController::class,'details']);
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

        Route::get('/service-section-list/{section_name}', [ServiceSubCategorySectionController::class,'sectionList']);
        // Service Details Page First Section
        Route::post('/sv-first-section/save', [SvFirstSectionController::class,'save']);
        Route::get('/sv-first-section/list', [SvFirstSectionController::class,'list']);
        Route::get('/sv-first-section/{id}', [SvFirstSectionController::class,'details']);
        Route::delete('/sv-first-section/{id}', [SvFirstSectionController::class,'delete']);
        // Service Details Page Second Section
        Route::post('/sv-second-section/save', [SvSecondSectionController::class,'save']);
        Route::get('/sv-second-section/list', [SvSecondSectionController::class,'list']);
        Route::get('/sv-second-section/{id}', [SvSecondSectionController::class,'details']);
        Route::delete('/sv-second-section/{id}', [SvSecondSectionController::class,'delete']);
        // Service Details Page Third Section
        Route::post('/sv-third-section/save', [SvThirdSectionController::class,'save']);
        Route::get('/sv-third-section/list', [SvThirdSectionController::class,'list']);
        Route::get('/sv-third-section/{id}', [SvThirdSectionController::class,'details']);
        Route::delete('/sv-third-section/{id}', [SvThirdSectionController::class,'delete']);
        // Service Details Page Forth Section
        Route::post('/sv-forth-section/save', [SvForthSectionController::class,'save']);
        Route::get('/sv-forth-section/list', [SvForthSectionController::class,'list']);
        Route::get('/sv-forth-section/{id}', [SvForthSectionController::class,'details']);
        Route::delete('/sv-forth-section/{id}', [SvForthSectionController::class,'delete']);
        // Service Details Page Fifth Section
        Route::post('/sv-fifth-section/save', [SvFifthSectionController::class,'save']);
        Route::get('/sv-fifth-section/list', [SvFifthSectionController::class,'list']);
        Route::get('/sv-fifth-section/{id}', [SvFifthSectionController::class,'details']);
        Route::delete('/sv-fifth-section/{id}', [SvFifthSectionController::class,'delete']);
        // Service Details Page Sixth Section
        Route::post('/sv-sixth-section/save', [SvSixthSectionController::class,'save']);
        Route::get('/sv-sixth-section/list', [SvSixthSectionController::class,'list']);
        Route::get('/sv-sixth-section/{id}', [SvSixthSectionController::class,'details']);
        Route::delete('/sv-sixth-section/{id}', [SvSixthSectionController::class,'delete']);
        // Service Details Page Seventh Section
        Route::post('/sv-seventh-section/save', [SvSeventhSectionController::class,'save']);
        Route::get('/sv-seventh-section/list', [SvSeventhSectionController::class,'list']);
        Route::get('/sv-seventh-section/{id}', [SvSeventhSectionController::class,'details']);
        Route::delete('/sv-seventh-section/{id}', [SvSeventhSectionController::class,'delete']);
        // Service Details Page Eighth Section
        Route::post('/sv-eighth-section/save', [SvEighthSectionController::class,'save']);
        Route::get('/sv-eighth-section/list', [SvEighthSectionController::class,'list']);
        Route::get('/sv-eighth-section/{id}', [SvEighthSectionController::class,'details']);
        Route::delete('/sv-eighth-section/{id}', [SvEighthSectionController::class,'delete']);
        // Service Details Page Nineth Section
        Route::post('/sv-nineth-section/save', [SvNinethSectionController::class,'save']);
        Route::get('/sv-nineth-section/list', [SvNinethSectionController::class,'list']);
        Route::get('/sv-nineth-section/{id}', [SvNinethSectionController::class,'details']);
        Route::delete('/sv-nineth-section/{id}', [SvNinethSectionController::class,'delete']);
        // Service Details Page Tenth Section
        Route::post('/sv-tenth-section/save',[SvTenthSectionController::class,'save']);
        Route::get('/sv-tenth-section/list', [SvTenthSectionController::class,'list']);
        Route::get('/sv-tenth-section/{id}', [SvTenthSectionController::class,'details']);
        Route::delete('/sv-tenth-section/{id}', [SvTenthSectionController::class,'delete']);
        // Service Details Page Eleventh Section
        Route::post('/sv-eleventh-section/save', [SvEleventhSectionController::class,'save']);
        Route::get('/sv-eleventh-section/list', [SvEleventhSectionController::class,'list']);
        Route::get('/sv-eleventh-section/{id}', [SvEleventhSectionController::class,'details']);
        Route::delete('/sv-eleventh-section/{id}', [SvEleventhSectionController::class,'delete']);
        // Service Details Page Twelveth Section
        Route::post('/sv-twelveth-section/save', [SvTwelvethSectionController::class,'save']);
        Route::get('/sv-twelveth-section/list', [SvTwelvethSectionController::class,'list']);
        Route::get('/sv-twelveth-section/{id}', [SvTwelvethSectionController::class,'details']);
        Route::delete('/sv-twelveth-section/{id}', [SvTwelvethSectionController::class,'delete']);
        // Service Testimonial Section 
        Route::post('/testimonial-section/save', [TestimonialSectionController::class,'save']);
        Route::get('/testimonial-section/list', [TestimonialSectionController::class,'list']);
        Route::get('/testimonial-section/{id}', [TestimonialSectionController::class,'details']);
        Route::delete('/testimonial-section/{id}', [TestimonialSectionController::class,'delete']);
        // FAQ Route
        Route::post('/faq/save', [FaqController::class,'save']);
        Route::get('/faq/list', [FaqController::class,'list']);
        Route::get('/faq/{id}', [FaqController::class,'details']);
        Route::delete('/faq/{id}', [FaqController::class,'delete']);

        // HR Compliance First Section
        Route::post('/hr-compliance-first-section/save', [HrComplianceFirstSectionController::class, 'save']);
        Route::get('/hr-compliance-first-section/details', [HrComplianceFirstSectionController::class, 'details']);
        // HR Compliance Second Section
        Route::post('/hr-compliance-second-section/save', [HrComplianceSecondSectionController::class, 'save']);
        Route::get('/hr-compliance-second-section/details', [HrComplianceSecondSectionController::class, 'details']);
        // HR Compliance Third Section
        Route::post('/hr-compliance-third-section/save', [HrComplianceThirdSectionController::class, 'save']);
        Route::get('/hr-compliance-third-section/details', [HrComplianceThirdSectionController::class, 'details']);


        // Sponsorship First Section
        Route::post('/sponsorship-first-section/save', [SponsorshipFirstSectionController::class, 'save']);
        Route::get('/sponsorship-first-section/details', [SponsorshipFirstSectionController::class, 'details']);
        // Sponsorship Second Section
        Route::post('/sponsorship-second-section/save', [SponsorshipSecondSectionController::class, 'save']);
        Route::get('/sponsorship-second-section/list', [SponsorshipSecondSectionController::class, 'list']);
        Route::get('/sponsorship-second-section/{id}', [SponsorshipSecondSectionController::class, 'details']);
        Route::delete('/sponsorship-second-section/{id}', [SponsorshipSecondSectionController::class, 'delete']);
        


        // Contact Query
        Route::get('/contact-query/list', [ContactQueryController::class, 'list']);
        Route::get('/contact-query/{id}', [ContactQueryController::class, 'details']);
        Route::put('/contact-query/{id}', [ContactQueryController::class, 'update']);
        Route::delete('/contact-query/{id}', [ContactQueryController::class, 'delete']);

        //Complaint
        Route::get('/complaint/list', [ComplaintController::class,'list']);
        Route::get('/complaint/{id}', [ComplaintController::class,'details']);
        Route::put('/complaint/{id}', [ComplaintController::class,'update']);
        Route::delete('/complaint/{id}', [ComplaintController::class,'delete']);

        //RTW firsrt section
        Route::post('/rtw-first-section/save', [RtwFirstSectionController::class, 'save']);
        Route::get('/rtw-first-section/list', [RtwFirstSectionController::class, 'list']);

        Route::post('forms/save', [FormController::class, 'save']);
        Route::get('forms', [FormController::class, 'list']);
        Route::put('forms/{id}', [FormController::class, 'update']);
        
        Route::post('questions/save', [FormQuestionController::class, 'save']);
        Route::get('forms/{formId}/questions', [FormQuestionController::class, 'list']);
        Route::get('questions/{id}', [FormQuestionController::class, 'details']);
        Route::put('questions/{id}', [FormQuestionController::class, 'update']);
        Route::delete('questions/{id}', [FormQuestionController::class, 'delete']);

        Route::post('options/save', [QuestionOptionController::class, 'save']);
        Route::get('questions/{questionId}/options', [QuestionOptionController::class, 'list']);
        Route::get('options/{id}', [QuestionOptionController::class, 'details']);
        Route::put('options/{id}', [QuestionOptionController::class, 'update']);
        Route::delete('options/{id}', [QuestionOptionController::class, 'delete']);

        Route::post('submissions/save', [FormSubmissionController::class, 'save']);
        Route::get('submissions', [FormSubmissionController::class, 'list']);
        Route::get('submissions/{id}', [FormSubmissionController::class, 'details']);
        Route::post('submission-answers/save', [SubmissionAnswerController::class, 'save']);
        Route::get('submissions/{submissionId}/answers', [SubmissionAnswerController::class, 'list']);

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
Route::get('/services-home', [ServiceController::class,'home']);
Route::get('/services', [ServiceController::class,'services']);
Route::get('/service/{slug}', [ServiceController::class,'details']);

// FAQ Public Route
Route::get('/faq/{slug}', [FaqController::class,'bySlug']);

// Contact Query Public Route
Route::post('/contact-query', [ContactQueryController::class, 'save']);
// Complaint Public Route
Route::post('/complaint', [ComplaintController::class,'save']);

// Tools Public route 
// RTW
Route::get('/rtw-first-section/details', [RtwFirstSectionController::class, 'details']);
Route::post('public/forms/submit', [PublicFormSubmissionController::class, 'submit']);
Route::get('forms/{id}', [FormController::class, 'details']);

Route::prefix('calculator')->group(function () {
    Route::post('/calculate', [SalaryCalculatorController::class, 'calculate']);
    Route::get('/region/list', [RegionController::class, 'list']);
    Route::get('/tax-code/list', [TaxCodeController::class, 'list']);
    Route::get('/ni-category/list', [NiCategoryController::class, 'list']);
    Route::get('/student-loan-plan/list', [StudentLoanPlanController::class, 'list']);
    Route::get('/pension-option/list', [PensionOptionController::class,'list']);

});





