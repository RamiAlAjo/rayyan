<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Front Controllers
use App\Http\Controllers\Front\FrontHomepageController;
use App\Http\Controllers\Front\FrontAboutUsController;
use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\FrontProductCategoryController;
use App\Http\Controllers\Front\FrontProductSubcategoryController;
use App\Http\Controllers\Front\FrontServicesController;
use App\Http\Controllers\Front\FrontFaqController;
use App\Http\Controllers\Front\FrontCareerController;
use App\Http\Controllers\Front\FrontContactController;
use App\Http\Controllers\Front\FrontPortfolioController;
use App\Http\Controllers\Front\FrontProjectsController;
use App\Http\Controllers\Front\FrontProjectCategoryController;
use App\Http\Controllers\Front\FrontProjectSubcategoryController;
use App\Http\Controllers\Front\FrontSearchController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminHomepageController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminServicesController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProductCategoriesController;
use App\Http\Controllers\Admin\AdminProductSubcategoriesController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminFeaturesController;
use App\Http\Controllers\Admin\AdminWebsiteSettingController;
use App\Http\Controllers\Admin\AdminGalleryController;
use App\Http\Controllers\Admin\AdminProjectsController;
use App\Http\Controllers\Admin\AdminProjectsCategoriesController;
use App\Http\Controllers\Admin\AdminProjectsSubcategoriesController;
use App\Http\Controllers\Admin\AdminStatsController;

// Homepage
Route::get('/', [FrontHomepageController::class, 'index'])->name('home');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================
// Admin Routes
// ============================
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/home', [AdminHomepageController::class, 'index'])->name('home');

        // Admin Resources
        Route::resource('products', AdminProductController::class);
        Route::resource('about', AdminAboutController::class);
        Route::resource('faq', AdminFaqController::class);
        Route::resource('slider', AdminSliderController::class);
        Route::resource('portfolio', AdminPortfolioController::class);
        Route::resource('services', AdminServicesController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('product_categories', AdminProductCategoriesController::class);
        Route::resource('product_subcategories', AdminProductSubcategoriesController::class);
        Route::resource('projects', AdminProjectsController::class);
        Route::resource('projects_categories', AdminProjectsCategoriesController::class);
        Route::resource('projects_subcategories', AdminProjectsSubcategoriesController::class);
        Route::resource('categories', AdminCategoriesController::class);
        Route::resource('features', AdminFeaturesController::class);
        Route::resource('stats', AdminStatsController::class);
        Route::resource('setting', AdminWebsiteSettingController::class);
        Route::resource('gallery', AdminGalleryController::class);
    });

// ============================
// Frontend Routes
// ============================

// About
Route::resource('about', FrontAboutUsController::class);

// Product Routes
Route::resource('product', FrontProductController::class);
Route::resource('product-category', FrontProductCategoryController::class);
Route::resource('product-subcategory', FrontProductSubcategoryController::class);

// Services, FAQ, Career, Contact
Route::resource('services', FrontServicesController::class);
Route::resource('faq', FrontFaqController::class);
Route::resource('career', FrontCareerController::class);
Route::resource('contact', FrontContactController::class);

// Portfolio
Route::resource('portfolio', FrontPortfolioController::class);

// Projects
Route::resource('projects', FrontProjectsController::class);
Route::resource('projects-category', FrontProjectCategoryController::class);
Route::resource('projects-subcategory', FrontProjectSubcategoryController::class);

// Search
Route::get('/search', [FrontSearchController::class, 'search'])->name('search');
Route::get('/search_results', [FrontSearchController::class, 'searchResults'])->name('search.results');

// Authentication Routes
require __DIR__ . '/auth.php';
