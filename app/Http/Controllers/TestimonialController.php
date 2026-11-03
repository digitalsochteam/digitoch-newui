<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Log;

class TestimonialController extends Controller
{
    public function index()
    {
        $details = Testimonial::get();
        return view('backend.testimonial.list', compact('details'));
    }

    public function create()
    {
        $testimonials = Testimonial::pluck('name', 'id');
        return view('backend.testimonial.create', compact('testimonials'));
    }

    public function store(Request $request)
    {
        // ✅ Validate input, including faqs as an array of question/answer pairs
        $data = $request->validate([
            'review' => 'required|string',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'star' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image',
        ]);

        // ✅ Store image
        if ($request->hasFile('image')) {
            $data['image'] =
                $request->file('image')->store('testimonial_images', 'public');
        }


        // ✅ Save everything
        Testimonial::create($data);

        return redirect()
            ->route('testimonial-details.index')
            ->with('success', 'Detail created.');
    }

    public function edit(Testimonial $detail)
    {
        // Log::info('Testimonial Edit:', ['testimonial' => $detail])
        return view('backend.testimonial.edit', compact('detail'));
    }

    public function update(Request $request, Testimonial $detail)
    {
        // ✅ Validate input, including faqs as an array of question/answer pairs
        $data = $request->validate([
            'review' => 'required|string',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'star' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image',
        ]);

        // ✅ Store image
        if ($request->hasFile('image')) {
            $data['image'] =
                $request->file('image')->store('testimonial_images', 'public');
        }

        // ✅ Save everything
        $detail->update($data);

        return redirect()
            ->route('testimonial-details.index')
            ->with('success', 'Detail updated.');
    }

    public function destroy(Testimonial $detail)
    {

        $detail->delete();
        return back()->with('success', 'Detail deleted.');
    }
}