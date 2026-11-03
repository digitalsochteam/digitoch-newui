<?php

namespace App\Http\Controllers;

use App\Models\ProductPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPackageController extends Controller
{
    public function index()
    {
        $details = ProductPackage::get();
        return view('backend.package.list', compact('details'));
    }

    public function create()
    {
        $testimonials = ProductPackage::pluck('title', 'id');
        return view('backend.package.create', compact('testimonials'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:productpackages,slug',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "meta_title" => "nullable|string",
            "meta_description" => "nullable|string",
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] =
                $request->file('image')->store('productpackages', 'public');
        }

        ProductPackage::create($data);

        return redirect()
            ->route('package-details.index')
            ->with('success', 'Detail created.');
    }

    public function edit(ProductPackage $detail)
    {

        return view('backend.package.edit', compact('detail'));
    }

    public function update(Request $request, ProductPackage $detail)
    {
        $request->validate([
            'slug' => 'nullable|unique:productpackages,slug,' . $detail->id,
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "meta_title" => "nullable|string",
            "meta_description" => "nullable|string",
        ]);

        $data = $request->all();


        if ($request->hasFile('image')) {
            if ($detail->image) {
                Storage::disk('public')->delete($detail->image);
            }
            $data['product_image'] =
                $request->file('image')->store('productpackages', 'public');
        }

        $detail->update($data);

        return redirect()
            ->route('package-details.index')
            ->with('success', 'Detail created.');
    }

    public function destroy(ProductPackage $detail)
    {

        $detail->delete();
        return back()->with('success', 'Detail deleted.');
    }

}