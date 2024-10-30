<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SiteController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\User\Api\UserApiController;
use App\Http\Controllers\Admin\Api\CategoryApiController;

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

Route::middleware(['restrict_ip'])->group(function () {
    Route::post('/register', [UserApiController::class, 'register']);
    Route::post('/login', [UserApiController::class, 'login']);
    Route::post('/reset-password/{token}', [UserApiController::class, 'reset']);
    Route::post('/forgot-password', [UserApiController::class, 'forgotPassword']);
    Route::get('blog-categories', [SiteController::class, 'blogCategories']);
    Route::get('blog-category/{slug}', [SiteController::class, 'categoryWiseBlogs']);
    Route::get('all-blogs', [SiteController::class, 'allBlog'])->name('allBlog');
    Route::get('blog-details/{slug}', [SiteController::class, 'blogDetails'])->name('blog.details');
    Route::get('faq-categories', [SiteController::class, 'faqCategories']);
    Route::get('faq-category/{slug}', [SiteController::class, 'categoryWiseFaqs']);
    Route::get('all-faqs', [SiteController::class, 'allFaq'])->name('allfaq');
    Route::post('contact/store', [ContactController::class, 'store'])->name('contact.add');
    Route::post('email-subscription/store', [NewsletterController::class, 'store'])->name('subscription.add');
    Route::get('settings-info', [SiteController::class, 'settingsInfo'])->name('settings.info');
    Route::get('all-clients', [SiteController::class, 'allClients'])->name('allClients');
    Route::get('all-team-members', [SiteController::class, 'allTeamMember'])->name('allTeamMember');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [UserApiController::class, 'logout']);
        Route::post('/change-password', [UserApiController::class, 'updatePassword']);
        Route::get('/profile', [UserApiController::class, 'profile']);
        Route::put('/profile', [UserApiController::class, 'editProfile']);
    });
});
