<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioWebsite;
use Illuminate\Support\Facades\Storage;

class PortfolioWebsiteController extends Controller
{
    public function index()
    {
        $details = PortfolioWebsite::get();
        return view('backend.portfolio-websites.list', compact('details'));
    }

    public function create()
    {
        $websites = PortfolioWebsite::pluck('website_name', 'id');
        return view('backend.portfolio-websites.create', compact('websites'));
    }

    public function getallwebsites()
    {
        $websites = PortfolioWebsite::get();
        return view('frontend.website.websites', compact('websites'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'website_name' => 'nullable|string|max:255',
            'website_link' => 'nullable|url',
            'description' => 'nullable|string',
            'file' => 'nullable|file',
            'iamge' => 'nullable|image',
        ]);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('portfolio_files', 'public');
        }

        if ($request->hasFile('iamge')) {
            $data['iamge'] = $request->file('iamge')->store('portfolio_images', 'public');
        }

        PortfolioWebsite::create($data);

        return redirect()
            ->route('portfolio-website-details.index')
            ->with('success', 'Detail created.');
    }

    public function edit(PortfolioWebsite $detail)
    {
        $websites = PortfolioWebsite::pluck('website_name', 'id');
        return view('backend.portfolio-websites.edit', compact('detail', 'websites'));
    }

    public function update(Request $request, PortfolioWebsite $detail)
    {
        $data = $request->validate([
            'website_name' => 'nullable|string|max:255',
            'website_link' => 'nullable|url',
            'description' => 'nullable|string',
            'file' => 'nullable|file',
            'iamge' => 'nullable|image',
        ]);

        if ($request->hasFile('file')) {
            if ($detail->file) {
                Storage::disk('public')->delete($detail->file);
            }
            $data['file'] =
                $request->file('file')->store('portfolio_images', 'public');
        }


        if ($request->hasFile('iamge')) {
            if ($detail->iamge) {
                Storage::disk('public')->delete($detail->iamge);
            }
            $data['iamge'] =
                $request->file('iamge')->store('portfolio_images', 'public');
        }


        $detail->update($data);

        return redirect()
            ->route('portfolio-website-details.index')
            ->with('success', 'Detail updated.');
    }

    public function destroy(PortfolioWebsite $detail)
    {

        $detail->delete();
        return back()->with('success', 'Detail deleted.');
    }
}