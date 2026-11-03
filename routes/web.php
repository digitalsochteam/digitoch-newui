<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CompanyLogoController;
use App\Http\Controllers\QuoteLeadController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductPackageController;
use App\Http\Controllers\ProductPackageSubscriptionController;
use App\Http\Controllers\PortfolioWebsiteController;
use App\Http\Controllers\PortfolioVideoController;
use App\Http\Controllers\BackDashboardController;
use App\Http\Controllers\PortfolioPostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;


Route::fallback(function () {
    return response()->view('frontend.errors.error', [], 404);
});

Route::get('/', [DashboardController::class, 'index'])->name('frontend.dashboard.index');

Route::get('/about-our-agency', function () {
    return view('frontend.dashboard.about');
})->name('about');

Route::get('/contact-information', function () {
    return view('frontend.dashboard.contact');
})->name('contact');

Route::get('/cancellation-refund-policy', function () {
    return view('frontend.dashboard.cancellation_refund_policy');
})->name('cancellationrefundpolicy');

Route::get('/terms-and-conditions', function () {
    return view('frontend.dashboard.termsandcondition');
})->name('termsandcondition');

Route::get('/privacy-policy', function () {
    return view('frontend.dashboard.privacypolicy');
})->name('privacypolicy');

Route::get('/thank-you', function () {
    return view('frontend.dashboard.thanku');
})->name('thankyou');


Route::get('/scan-qr-code', function () {
    return view('frontend.dashboard.qrcode');
})->name('qrcode');

Route::post('/contact/send', [ContactController::class, 'secnd'])->name('contact.send');



Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/package/{id}', [ProductPackageSubscriptionController::class, 'show'])->name('package.show');

Route::get('/blogs', [BlogController::class, 'getallblogs'])->name('blog.seeallblogs');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/websites', [PortfolioWebsiteController::class, 'getallwebsites'])->name('website.seeallwebsites');
Route::get('/logos', [CompanyLogoController::class, 'getalllogos'])->name('logo.seealllogos');
Route::get('/videos', [PortfolioVideoController::class, 'getallvideos'])->name('video.seeallvideos');
Route::get('/posts', [PortfolioPostController::class, 'getallposts'])->name('post.seeallposts');

// Backend Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('quoteleaddetails')->name('quote-lead-details.')->group(function () {
    Route::get('/', [QuoteLeadController::class, 'index'])->name('index');
    Route::get('/create', [QuoteLeadController::class, 'create'])->name('create');
    Route::post('/', [QuoteLeadController::class, 'store'])->name('store');
    Route::get('/{detail}/edit', [QuoteLeadController::class, 'edit'])->name('edit');
    Route::put('/{detail}', [QuoteLeadController::class, 'update'])->name('update');
    Route::delete('/{detail}', [QuoteLeadController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('backend')->group(function () {
        Route::get('/', action: [BackDashboardController::class, 'dashboard'])->name('backend.dashboard');
        Route::get('/dashboard', [BackDashboardController::class, 'dashboard'])->name('dashboard.index');

        Route::prefix('productdetails')->name('product-details.')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/', [ProductController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [ProductController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [ProductController::class, 'update'])->name('update');
            Route::delete('/{detail}', [ProductController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('testimonialdetails')->name('testimonial-details.')->group(function () {
            Route::get('/', [TestimonialController::class, 'index'])->name('index');
            Route::get('/create', [TestimonialController::class, 'create'])->name('create');
            Route::post('/', [TestimonialController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [TestimonialController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [TestimonialController::class, 'update'])->name('update');
            Route::delete('/{detail}', [TestimonialController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('blogdetails')->name('blog-details.')->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('index');
            Route::get('/create', [BlogController::class, 'create'])->name('create');
            Route::post('/', [BlogController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [BlogController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [BlogController::class, 'update'])->name('update');
            Route::delete('/{detail}', [BlogController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('packagedetails')->name('package-details.')->group(function () {
            Route::get('/', [ProductPackageController::class, 'index'])->name('index');
            Route::get('/create', [ProductPackageController::class, 'create'])->name('create');
            Route::post('/', [ProductPackageController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [ProductPackageController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [ProductPackageController::class, 'update'])->name('update');
            Route::delete('/{detail}', [ProductPackageController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('packagesubscriptiondetails')->name('package-subscription-details.')->group(function () {
            Route::get('/', [ProductPackageSubscriptionController::class, 'index'])->name('index');
            Route::get('/create', [ProductPackageSubscriptionController::class, 'create'])->name('create');
            Route::post('/', [ProductPackageSubscriptionController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [ProductPackageSubscriptionController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [ProductPackageSubscriptionController::class, 'update'])->name('update');
            Route::delete('/{detail}', [ProductPackageSubscriptionController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('companylogodetails')->name('company-logo-details.')->group(function () {
            Route::get('/', [CompanyLogoController::class, 'index'])->name('index');
            Route::get('/create', [CompanyLogoController::class, 'create'])->name('create');
            Route::post('/', [CompanyLogoController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [CompanyLogoController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [CompanyLogoController::class, 'update'])->name('update');
            Route::delete('/{detail}', [CompanyLogoController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('portfoliowebsitedetails')->name('portfolio-website-details.')->group(function () {
            Route::get('/', [PortfolioWebsiteController::class, 'index'])->name('index');
            Route::get('/create', [PortfolioWebsiteController::class, 'create'])->name('create');
            Route::post('/', [PortfolioWebsiteController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [PortfolioWebsiteController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [PortfolioWebsiteController::class, 'update'])->name('update');
            Route::delete('/{detail}', [PortfolioWebsiteController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('portfoliovideodetails')->name('portfolio-video-details.')->group(function () {
            Route::get('/', [PortfolioVideoController::class, 'index'])->name('index');
            Route::get('/create', [PortfolioVideoController::class, 'create'])->name('create');
            Route::post('/', [PortfolioVideoController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [PortfolioVideoController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [PortfolioVideoController::class, 'update'])->name('update');
            Route::delete('/{detail}', [PortfolioVideoController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('portfoliopostdetails')->name('portfolio-post-details.')->group(function () {
            Route::get('/', [PortfolioPostController::class, 'index'])->name('index');
            Route::get('/create', [PortfolioPostController::class, 'create'])->name('create');
            Route::post('/', [PortfolioPostController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [PortfolioPostController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [PortfolioPostController::class, 'update'])->name('update');
            Route::delete('/{detail}', [PortfolioPostController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('sliderdetails')->name('slider-details.')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('index');
            Route::get('/create', [SliderController::class, 'create'])->name('create');
            Route::post('/', [SliderController::class, 'store'])->name('store');
            Route::get('/{detail}/edit', [SliderController::class, 'edit'])->name('edit');
            Route::put('/{detail}', [SliderController::class, 'update'])->name('update');
            Route::delete('/{detail}', [SliderController::class, 'destroy'])->name('destroy');
        });

    });
});