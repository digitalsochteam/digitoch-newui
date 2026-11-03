<?php



namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\ProductDetails;
use App\Models\MainProduct;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $details = ProductDetails::get();
        return view('backend.product.list', compact('details'));
    }

    public function create()
    {
        $packages = MainProduct::pluck('name', 'id');
        return view('backend.product.create', compact('packages'));
    }
    public function show($slug)
    {
        // Log::info('Entering show method with slug: ' . $slug);
        $product = ProductDetails::where('slug', $slug)->first();


        if ($product) {
            $otherProducts = ProductDetails::where('subcategory', $product->subcategory)
                ->where('product', '!=', $product->product)
                ->get(['product', 'slug'])
                ->unique('product')
                ->map(function ($item) {
                    return [
                        'name' => $item->product,
                        'slug' => $item->slug
                    ];
                });

            Log::info('Other Products', ['otherProducts' => $otherProducts]);

            return view('frontend.product.show', compact('product', 'otherProducts'));
        } else {
            return view('frontend.errors.error', []);
        }
    }

    public function store(Request $request)
    {
        // ✅ Validate input, including faqs as an array of question/answer pairs
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'category' => 'required|string|max:255',
            'subcategory' => 'nullable|string|max:255',
            'product' => 'nullable|string|max:255',
            'product_details' => 'nullable|string',
            'position' => 'required|numeric',
            'product_image' => 'required|image|max:2048',
            'product_subheading' => 'required|string',
            'product_detail' => 'required|string',
            'faqs' => 'nullable|array',              // <-- array from dynamic form
            'faqs.*.question' => 'nullable|string',             // optional but recommended
            'faqs.*.answer' => 'nullable|string',
            "slug" => "required|string|unique:product_details,slug",
            "meta_title" => "nullable|string",
            "meta_description" => "nullable|string",
        ]);

        // ✅ Store image
        if ($request->hasFile('product_image')) {
            $data['product_image'] =
                $request->file('product_image')->store('product_images', 'public');
        }

        // ✅ Replace "__new__" placeholders with user input
        if ($data['category'] === '__new__' && $request->filled('new_category')) {
            $data['category'] = $request->new_category;
        }
        if ($data['subcategory'] === '__new__' && $request->filled('new_subcategory')) {
            $data['subcategory'] = $request->new_subcategory;
        }

        // ✅ Convert FAQs to JSON if present and not empty
        if (!empty($data['faqs'])) {
            // Filter out empty FAQ entries
            $validFaqs = array_filter($data['faqs'], function ($faq) {
                return !empty($faq['question']) || !empty($faq['answer']);
            });

            // If we have valid FAQs, encode them; otherwise set to null
            $data['faqs'] = !empty($validFaqs) ? json_encode(array_values($validFaqs)) : null;
        } else {
            $data['faqs'] = null;
        }

        // ✅ Save everything
        ProductDetails::create($data);

        return redirect()
            ->route('product-details.index')
            ->with('success', 'Detail created.');
    }


    public function edit(ProductDetails $detail)
    {

        $packages = MainProduct::pluck('name', 'id');
        return view('backend.product.edit', compact('detail', 'packages'));
    }

    public function update(Request $request, ProductDetails $detail)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'category' => 'required|string|max:255',
            'subcategory' => 'nullable|string|max:255',
            'product' => 'nullable|string|max:255',
            'product_details' => 'nullable|string',
            'position' => 'required|numeric',
            'product_image' => 'nullable|image|max:2048',
            'product_subheading' => 'nullable|string',
            'product_detail' => 'nullable|string',
            'faqs' => 'nullable|array',      // accepts an array of Q&As
            'faqs.*.question' => 'nullable|string',
            'faqs.*.answer' => 'nullable|string',
            "slug" => "required|string|unique:product_details,slug," . $detail->id,
            "meta_title" => "nullable|string",
            "meta_description" => "nullable|string",
        ]);

        // Log::info('Validated Data', ['data' => $data]);

        // ✅ Replace "__new__" placeholders if you use them on the edit form
        if ($data['category'] === '__new__' && $request->filled('new_category')) {
            $data['category'] = $request->new_category;
        }
        if ($data['subcategory'] === '__new__' && $request->filled('new_subcategory')) {
            $data['subcategory'] = $request->new_subcategory;
        }

        // ✅ Handle image replacement
        if ($request->hasFile('product_image')) {
            if ($detail->product_image) {
                Storage::disk('public')->delete($detail->product_image);
            }
            $data['product_image'] =
                $request->file('product_image')->store('product_images', 'public');
        }

        // ✅ Convert FAQs to JSON if present
        // ✅ Convert FAQs to JSON if present and not empty
        if (!empty($data['faqs'])) {
            // Filter out empty FAQ entries
            $validFaqs = array_filter($data['faqs'], function ($faq) {
                return !empty($faq['question']) || !empty($faq['answer']);
            });

            // If we have valid FAQs, encode them; otherwise set to null
            $data['faqs'] = !empty($validFaqs) ? json_encode(array_values($validFaqs)) : null;
        } else {
            $data['faqs'] = null;
        }

        // ✅ Update the record
        $detail->update($data);

        return redirect()
            ->route('product-details.index')
            ->with('success', 'Detail updated.');
    }

    public function destroy(ProductDetails $detail)
    {

        $detail->delete();
        return back()->with('success', 'Detail deleted.');
    }
}