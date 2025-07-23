<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\FrontHomepageController;
use App\Http\Controllers\Front\FrontAboutUsController;
use App\Http\Controllers\Front\FrontProductController;
use App\Http\Controllers\Front\FrontServicesController;
use App\Http\Controllers\Front\FrontFaqController;
use App\Http\Controllers\Front\FrontCareerController;
use App\Http\Controllers\Front\FrontContactController;
use App\Http\Controllers\Front\FrontPortfolioController;
use App\Http\Controllers\Front\FrontProjectsController;
use App\Http\Controllers\Front\FrontProductCategoryController;
use App\Http\Controllers\Front\FrontProductSubcategoryController;
use App\Http\Controllers\Front\FrontProjectCategoryController;
use App\Http\Controllers\Front\FrontProjectSubcategoryController;
use App\Http\Controllers\Front\FrontSearchController;

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

use App\Http\Middleware\SetLocale;

Route::middleware(['web', SetLocale::class])->group(function () {

    Route::get('/', [FrontHomepageController::class, 'index'])->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Admin Routes
    Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/home', [AdminHomepageController::class, 'index'])->name('admin_home');
        Route::resource('/products', AdminProductController::class);
        Route::resource('/about', AdminAboutController::class);
        Route::resource('/faq', AdminFaqController::class);
        Route::resource('/slider', AdminSliderController::class);
        Route::resource('portfolio', AdminPortfolioController::class);
        Route::resource('services', AdminServicesController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('product_categories', AdminProductCategoriesController::class);
        Route::resource('product_subcategories', AdminProductSubcategoriesController::class);
        Route::resource('/projects', AdminProjectsController::class);
        Route::resource('/projects_categories', AdminProjectsCategoriesController::class);
        Route::resource('/projects_subcategories', AdminProjectsSubcategoriesController::class);
        Route::resource('/categories', AdminCategoriesController::class);
        Route::resource('features', AdminFeaturesController::class);
        Route::resource('stats', AdminStatsController::class);
        Route::resource('setting', AdminWebsiteSettingController::class);
        Route::resource('gallery', AdminGalleryController::class);
    });

    // Front Routes
    Route::resource('about', FrontAboutUsController::class);
    Route::resource('product', FrontProductController::class);
    Route::resource('product-category', FrontProductCategoryController::class);
    Route::resource('product-subcategory', FrontProductSubcategoryController::class);
    Route::resource('services', FrontServicesController::class);
    Route::resource('faq', FrontFaqController::class);
    Route::resource('career', FrontCareerController::class);
    Route::resource('contact', FrontContactController::class);
    Route::resource('portfolio', FrontPortfolioController::class);
    Route::resource('projects', FrontProjectsController::class);
    Route::resource('projects-category', FrontProjectCategoryController::class);
    Route::resource('projects-subcategory', FrontProjectSubcategoryController::class);

    // Search Routes
    Route::get('/search', [FrontSearchController::class, 'search'])->name('search');
    Route::get('/search_results', [FrontSearchController::class, 'searchResults'])->name('search.results');

    // Language Switching Route
    Route::get('lang/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'ar'])) {
            session(['locale' => $locale]); // Store the locale in session
            app()->setLocale($locale);      // Set application locale
        }
        return redirect()->back();
    })->name('change.language');
});

require __DIR__ . '/auth.php';
