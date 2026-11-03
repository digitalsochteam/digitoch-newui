<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioVideo;
use Illuminate\Support\Facades\Storage;

class PortfolioVideoController extends Controller
{
    public function index()
    {
        $details = PortfolioVideo::get();
        return view('backend.portfolio-videos.list', compact('details'));
    }

    public function create()
    {
        $websites = PortfolioVideo::pluck('company_name', 'id');
        return view('backend.portfolio-videos.create', compact('websites'));
    }

    public function getallvideos()
    {
        $videos = PortfolioVideo::get();
        return view('frontend.video.videos', compact('videos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'nullable|string',
            'description' => 'nullable|string',
            'video_link' => 'nullable|url',
            'thumbnail' => 'nullable|image',
        ]);


        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('video_files', 'public');
        }

        PortfolioVideo::create($data);

        return redirect()
            ->route('portfolio-video-details.index')
            ->with('success', 'Detail created.');
    }


    public function edit(PortfolioVideo $detail)
    {
        $videos = PortfolioVideo::pluck('company_name', 'id');
        return view('backend.portfolio-videos.edit', compact('detail', 'videos'));
    }

    public function update(Request $request, PortfolioVideo $detail)
    {
        $data = $request->validate([
            'company_name' => 'nullable|string',
            'description' => 'nullable|string',
            'video_link' => 'nullable|url',
            'thumbnail' => 'nullable|image',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($detail->thumbnail) {
                Storage::disk('public')->delete($detail->thumbnail);
            }
            $data['thumbnail'] =
                $request->file('thumbnail')->store('video_files', 'public');
        }


        $detail->update($data);

        return redirect()
            ->route('portfolio-video-details.index')
            ->with('success', 'Detail updated.');
    }

    public function destroy(PortfolioVideo $detail)
    {

        $detail->delete();
        return back()->with('success', 'Detail deleted.');
    }
}