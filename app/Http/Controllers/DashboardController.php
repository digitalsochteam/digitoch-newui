<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CompanyLogo;
use App\Models\Testimonial;
use App\Models\ProductDetails;
use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use App\Models\ProductPackage;
use App\Models\ProductPackageSubscription;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index()
    {
        // Cache duration in minutes
        $cacheDuration = 5;

        // Get products with unique subcategories (limit 6)
        $selectedProducts = Cache::remember('selected_products', $cacheDuration, function () {
            $allProducts = ProductDetails::inRandomOrder()->get();

            $selectedProducts = [];
            $usedSubcategories = [];

            foreach ($allProducts as $product) {
                if (!in_array($product->subcategory, $usedSubcategories)) {
                    $selectedProducts[] = $product;
                    $usedSubcategories[] = $product->subcategory;
                }
                if (count($selectedProducts) >= 6) {
                    break;
                }
            }
            return $selectedProducts;
        });

        // Get all blogs


        $blogs = Cache::remember('all_blogs', $cacheDuration, function () {
            return Blog::orderBy('created_at', 'desc')->take(3)->get();
        });

        // Get random testimonials (limit 3)
        $testimonials = Cache::remember('testimonials_random', $cacheDuration, function () {
            return Testimonial::inRandomOrder()->take(3)->get();
        });

        // Get company logos
        $companyLogo = Cache::remember('company_logos', $cacheDuration, function () {
            return CompanyLogo::get();
        });

        // Get sliders
        $sliders = Cache::remember('sliders', $cacheDuration, function () {
            return Slider::get();
        });

        return view('frontend.dashboard.index', compact(
            'selectedProducts',
            'blogs',
            'testimonials',
            'companyLogo',
            'sliders'
        ));
    }






    // public function index()
    // {
    //     // ✅ Step 1: Select only needed fields (reduces DB payload)
    //     $allProducts = ProductDetails::select('id', 'name', 'slug', 'subcategory', 'image')
    //         ->inRandomOrder()
    //         ->get();

    //     // ✅ Step 2: Efficiently pick up to 6 unique subcategories
    //     $selectedProducts = collect();
    //     $usedSubcategories = [];

    //     foreach ($allProducts as $product) {
    //         if (!in_array($product->subcategory, $usedSubcategories)) {
    //             $selectedProducts->push($product);
    //             $usedSubcategories[] = $product->subcategory;
    //         }
    //         if ($selectedProducts->count() >= 6)
    //             break;
    //     }

    //     // ✅ Step 3: Query only what you display
    //     $blogs = Blog::latest()->take(3)->get(['id', 'title', 'slug', 'thumbnail', 'created_at']);
    //     $testimonials = Testimonial::inRandomOrder()->take(3)->get(['id', 'name', 'message', 'rating']);
    //     $companyLogo = CompanyLogo::take(10)->get(['id', 'image', 'url']);
    //     $sliders = Slider::latest()->take(5)->get(['id', 'title', 'description', 'image_one', 'image_two', 'image_symbol', 'tablename', 'slug']);

    //     // ✅ Step 4: Cache heavy data (optional but powerful)
    //     // cache for 10 minutes
    //     // use: php artisan cache:clear if you change content
    //     $sliders = cache()->remember('homepage_sliders', 600, fn() => Slider::latest()->take(5)->get());
    //     $testimonials = cache()->remember('homepage_testimonials', 600, fn() => Testimonial::inRandomOrder()->take(3)->get());
    //     $companyLogo = cache()->remember('homepage_companyLogo', 600, fn() => CompanyLogo::take(10)->get());

    //     return view('frontend.dashboard.index', compact('selectedProducts', 'blogs', 'testimonials', 'companyLogo', 'sliders'));
    // }


}