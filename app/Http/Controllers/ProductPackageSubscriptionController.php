<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductPackageSubscription;
use App\Models\ProductPackage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductDetails;

class ProductPackageSubscriptionController extends Controller
{
    public function index()
    {
        $details = ProductPackageSubscription::get();
        return view('backend.package-subscription.list', compact('details'));
    }

    public function create()
    {
        $packages = ProductPackage::pluck('slug', 'id');
        return view('backend.package-subscription.create', compact('packages', ));
    }

    public function show($slug)
    {
        $package = ProductPackage::where('slug', $slug)->first();

        if (!$package) {
            return view('frontend.errors.error', []);
        }

        $subscriptions = ProductPackageSubscription::where('product_package_id', $package->id)->get();
        return view('frontend.package.show', compact('package', 'subscriptions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_package_id' => 'required|exists:productpackages,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ispopular' => 'required|boolean',
            'head' => 'nullable|array',
            'head.*.key' => 'nullable|string',
            'head.*.value' => 'nullable|string',
            'color' => 'required|string|max:20',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] =
                $request->file('image')->store('subscription_images', 'public');
        }


        if (!empty($data['head'])) {
            // $data['head'] = json_encode($data['head']);


            // Filter out empty FAQ entries
            $validHead = array_filter($data['head'], function ($head) {
                return !empty($head['key']) || !empty($head['value']);
            });

            // If we have valid FAQs, encode them; otherwise set to null
            $data['faqs'] = !empty($validHead) ? json_encode(array_values($validHead)) : null;
        } else {
            $data['head'] = null;
        }


        ProductPackageSubscription::create($data);

        return redirect()->route('package-subscription-details.index')
            ->with('success', 'Subscription created successfully.');
    }


    public function edit(ProductPackageSubscription $detail)
    {

        $packages = ProductPackage::pluck('slug', 'id');
        return view('backend.package-subscription.edit', compact('detail', 'packages'));
    }
    public function update(Request $request, ProductPackageSubscription $detail)
    {
        Log::info('Route parameter subscription ID: ', ['id' => $detail->id]);


        $data = $request->validate([
            'product_package_id' => 'required|exists:productpackages,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ispopular' => 'required|boolean',
            'head' => 'nullable|array',
            'head.*.key' => 'nullable|string',
            'head.*.value' => 'nullable|string',
            'color' => 'nullable|string|max:20',
        ]);

        // ✅ Handle image replacement
        if ($request->hasFile('image')) {
            if ($detail->image) {
                Storage::disk('public')->delete($detail->image);
            }
            $data['image'] = $request->file('image')->store('subscription_images', 'public');
        }

        Log::info('Before normalization: ', $data);

        if (!empty($data['head'])) {
            $data['head'] = json_encode($data['head']);
        }

        Log::info('Validated data (normalized): ', $data);

        // ✅ Update
        $detail->update($data);

        return redirect()->route('package-subscription-details.index')
            ->with('success', 'Subscription updated successfully.');
    }

    public function destroy(ProductPackageSubscription $detail)
    {

        $detail->delete();
        return back()->with('success', 'Detail deleted.');
    }
}