<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Frontend\StripeController;
use App\Http\Controllers\Admin\NewsletterController;

Route::get('/', [AdminController::class, 'dashboard'])->middleware(['auth:admin', 'verified']);
// Route::get('/', [HomeController::class, 'home']);
Route::get('/homepage', [HomeController::class, 'home'])->name('home');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('privacy/policy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('terms-condition', [HomeController::class, 'termsCondition'])->name('termsCondition');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('blogs', [HomeController::class, 'allBlog'])->name('allBlog');
Route::get('blog-details/{slug}', [HomeController::class, 'blogDetails'])->name('blog.details');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('return-policy', [HomeController::class, 'returnPolicy'])->name('returnPolicy');
Route::get('category/{slug}', [HomeController::class, 'categoryProducts'])->name('category.products');
Route::get('product/details/{slug}', [HomeController::class, 'productDetails'])->name('product.details');

Route::post('contact/store', [ContactController::class, 'store'])->name('contact.add');
Route::post('email-subscription/store', [NewsletterController::class, 'store'])->name('subscription.add');

// Cart routes
Route::get('mycart', [HomeController::class, 'cart'])->name('cart');

Route::get('compare-list', [HomeController::class, 'compareList'])->name('compare.list');
Route::get('checkout/success/{id}', [HomeController::class, 'checkoutSuccess'])->name('checkout.success');
Route::get('/{id}/stripe/payment', [StripeController::class, 'stripePayment'])->name('stripe.payment');
Route::post('/stripe/pay', [StripeController::class, 'stripePost'])->name('stripe.pay');


// Shop
Route::post('global-search', [HomeController::class, 'globalSearch'])->name('global.search');


// Route::get('/filter-products', [filterProducts::class, 'filterProducts'])->name('filterProducts');


