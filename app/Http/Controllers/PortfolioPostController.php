<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PortfolioPost;
use Illuminate\Support\Facades\Storage;

class PortfolioPostController extends Controller
{
    public function index()
    {
        $details = PortfolioPost::get();
        return view('backend.portfolio-posts.list', compact('details'));
    }

    public function create()
    {
        return view('backend.portfolio-posts.create');
    }

    public function getallposts()
    {
        $posts = PortfolioPost::get();
        return view('frontend.post.posts', compact('posts'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image',
        ]);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('post_images', 'public');
        }

        PortfolioPost::create($data);

        return redirect()
            ->route('portfolio-post-details.index')
            ->with('success', 'Detail created.');
    }

    public function edit(PortfolioPost $detail)
    {
        return view('backend.portfolio-posts.edit', compact('detail'));
    }


    public function update(Request $request, PortfolioPost $detail)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            if ($detail->image) {
                Storage::disk('public')->delete($detail->image);
            }
            $data['image'] =
                $request->file('image')->store('post_images', 'public');
        }


        $detail->update($data);

        return redirect()
            ->route('portfolio-post-details.index')
            ->with('success', 'Detail updated.');
    }

    public function destroy(PortfolioPost $detail)
    {

        $detail->delete();
        return back()->with('success', 'Detail deleted.');
    }
}