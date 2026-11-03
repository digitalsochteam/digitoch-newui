<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductDetails;
use App\Models\ProductPackageSubscription;
use App\Models\ProductPackage;
use Log;


class SliderController extends Controller
{
    public function index()
    {
        $details = Slider::get();
        return view('backend.slider.list', compact('details'));
    }
    public function create()
    {
        // Products with name and slug
        $productList = ProductDetails::get()->mapWithKeys(function ($item) {
            $name = $item->product ?? $item->subcategory;
            $slug = $item->slug ?? \Str::slug($name); // fallback slug
            return [
                $item->id => [
                    'name' => $name,
                    'slug' => $slug
                ]
            ];
        });

        // Packages with name and slug
        $packageList = ProductPackage::select('title', 'id', 'slug')->get()->mapWithKeys(function ($item) {
            return [
                $item->id => [
                    'name' => $item->title,
                    'slug' => $item->slug
                ]
            ];
        });

        return view('backend.slider.create', compact('productList', 'packageList'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image_one' => 'required|image',
            'image_two' => 'required|image',
            'image_symbol' => 'required|image',
            'slug' => 'required|unique:slider,slug',
            "tablename" => "required|string",
            "itemid" => "required|string",
        ]);


        if ($request->hasFile('image_one')) {
            $data['image_one'] = $request->file('image_one')->store('slider_images', 'public');
        }

        if ($request->hasFile('image_two')) {
            $data['image_two'] = $request->file('image_two')->store('slider_images', 'public');
        }


        if ($request->hasFile('image_symbol')) {
            $data['image_symbol'] = $request->file('image_symbol')->store('slider_images', 'public');
        }

        Log::info('Storing Slider:', ['data' => $data]);

        Slider::create($data);

        return redirect()
            ->route('slider-details.index')
            ->with('success', 'Detail created.');
    }

    public function edit(Slider $detail)
    {

        Log::info('Editing Slider Detail:', ['detail' => $detail]);

        // Products with name and slug
        $productList = ProductDetails::get()->mapWithKeys(function ($item) {
            $name = $item->product ?? $item->subcategory;
            $slug = $item->slug ?? \Str::slug($name); // fallback slug
            return [
                $item->id => [
                    'name' => $name,
                    'slug' => $slug
                ]
            ];
        });

        // Packages with name and slug
        $packageList = ProductPackage::select('title', 'id', 'slug')->get()->mapWithKeys(function ($item) {
            return [
                $item->id => [
                    'name' => $item->title,
                    'slug' => $item->slug
                ]
            ];
        });

        //  $package = ProductPackageSubscription::pluck('title', 'product_package_id');
        return view('backend.slider.edit', compact('detail', 'productList', 'packageList'));
    }

    public function update(Request $request, Slider $detail)
    {
        $data = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'image_one' => 'nullable|image',
            'image_two' => 'nullable|image',
            'image_symbol' => 'nullable|image',
            'slug' => 'required|unique:slider,slug,' . $detail->id,
            "tablename" => "nullable|string",
            "itemid" => "nullable|string",
        ]);

        if ($request->hasFile('image_one')) {
            if ($detail->image_one) {
                Storage::disk('public')->delete($detail->image_one);
            }
            $data['image_one'] = $request->file('image_one')->store('slider_images', 'public');
        }

        if ($request->hasFile('image_two')) {
            if ($detail->image_two) {
                Storage::disk('public')->delete($detail->image_two);
            }
            $data['image_two'] = $request->file('image_two')->store('slider_images', 'public');
        }

        if ($request->hasFile('image_symbol')) {
            if ($detail->image_symbol) {
                Storage::disk('public')->delete($detail->image_symbol);
            }
            $data['image_symbol'] = $request->file('image_symbol')->store('slider_images', 'public');
        }

        Log::info('Storing Slider:', ['data' => $data]);

        $detail->update($data);

        return redirect()
            ->route('slider-details.index')
            ->with('success', 'Detail updated.');
    }


    public function destroy(Slider $detail)
    {

        $detail->delete();
        return back()->with('success', 'Detail deleted.');
    }

}