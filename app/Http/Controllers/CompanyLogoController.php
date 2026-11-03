<?php

namespace App\Http\Controllers;

use App\Models\CompanyLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyLogoController extends Controller
{
    public function index()
    {
        $details = CompanyLogo::get();
        return view('backend.company.list', compact('details'));
    }

    public function create()
    {
        $comapny = CompanyLogo::pluck('name', 'id');
        return view('backend.company.create', compact('comapny'));
    }

    public function getalllogos()
    {
        $logos = CompanyLogo::get();
        return view('frontend.logo.logos', compact('logos'));
    }

    public function store(Request $request)
    {
        // ✅ Validate input, including faqs as an array of question/answer pairs
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image',
        ]);


        // ✅ Store image
        if ($request->hasFile(key: 'image')) {
            $data['image'] =
                $request->file('image')->store('company_images', 'public');
        }
        // ✅ Save everything
        CompanyLogo::create($data);
        return redirect()
            ->route('company-logo-details.index')
            ->with('success', 'Detail created.');

    }

    public function edit(CompanyLogo $detail)
    {
        return view('backend.company.edit', compact('detail'));
    }

    public function update(Request $request, CompanyLogo $detail)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $newImage = $request->file('image')->store('company_images', 'public');

            if ($detail->image) {
                Storage::disk('public')->delete($detail->image);
            }

            $data['image'] = $newImage;
        }

        $detail->update($data);

        return redirect()
            ->route('company-logo-details.index')
            ->with('success', 'Detail updated successfully.');
    }


    public function destroy(CompanyLogo $detail)
    {

        $detail->delete();
        return back()->with('success', 'Detail deleted.');
    }
}