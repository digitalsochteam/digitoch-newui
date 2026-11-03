<div class="mb-3">
    <label for="product_id" class="form-label">Select Product</label>
    <select name="product_id" id="product_id" class="form-select" required>
        <option value="">-- Choose --</option>
        @foreach ($packages as $id => $title)
            <option value="{{ $id }}"
                {{ old('product_id', $detail->product_id ?? '') == $id ? 'selected' : '' }}>
                {{ $title }}
            </option>
        @endforeach
    </select>
</div>

{{-- CATEGORY --}}
<div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select id="category" name="category" class="form-select" required>
        <option value="">-- Choose Category --</option>
        <option value="__new__">+ Add New Category</option>
    </select>

    {{-- Add new category input --}}
    <div id="newCategoryWrapper" class="mt-2 d-none">
        <input type="text" id="new_category" name="new_category" class="form-control"
            placeholder="Enter new category">
        <small id="category-warning" class="text-danger d-none">
            This category already exists.
        </small>
    </div>
</div>

{{-- SUB-CATEGORY --}}
<div class="mb-3">
    <label for="subcategory" class="form-label">Subcategory</label>
    <select id="subcategory" name="subcategory" class="form-select" required>
        <option value="">-- Choose Subcategory --</option>
        <option value="__new__">+ Add New Subcategory</option>
    </select>

    {{-- Add new subcategory input --}}
    <div id="newSubWrapper" class="mt-2 d-none">
        <input type="text" id="new_subcategory" name="new_subcategory" class="form-control"
            placeholder="Enter new subcategory">
        <small id="subcategory-warning" class="text-danger d-none">
            This subcategory already exists in the selected category.
        </small>
    </div>
</div>

<div class="mb-3">
    <label>Slug For SEO</label>
    <input type="text" name="slug" id="slug" class="form-control"
        value="{{ old('slug', $detail->slug ?? '') }}" required>
</div>

<div class="mb-3">
    <label>SEO Title</label>
    <input type="text" name="meta_title" id="meta_title" class="form-control"
        value="{{ old('meta_title', $detail->meta_title ?? '') }}">
</div>

<div class="mb-3">
    <label for="meta_description" class="form-label">Product SEO Meta Tags</label>
    <textarea name="meta_description" id="meta_description" class="form-control" rows="8" {{-- adjust rows for default height --}}>{{ old('meta_description', $detail->meta_description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Product</label>
    <input type="text" name="product" id="product" class="form-control"
        value="{{ old('product', $detail->product ?? '') }}">
</div>

<div class="mb-3">
    <label for="product_subheading" class="form-label">Product Subheading</label>
    <textarea name="product_subheading" id="product_subheading" class="form-control" rows="8" {{-- adjust rows for default height --}}
        required>{{ old('product_subheading', $detail->product_subheading ?? '') }}</textarea>
</div>


<div class="mb-3">
    <label for="product_detail" class="form-label">Product Detail</label>
    <textarea name="product_detail" id="product_detail" class="form-control" rows="8" {{-- adjust rows for default height --}} required>{{ old('product_detail', $detail->product_detail ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Position</label>
    <input type="number" name="position" class="form-control" step="0.01"
        value="{{ old('position', $detail->position ?? 0) }}">
</div>

<div class="mb-3">
    <label>Thumbnail {{ isset($edit) ? '(optional)' : '' }}</label>
    <input type="file" name="product_image" class="form-control">
    @isset($detail->product_image)
        <img src="{{ asset('storage/' . $detail->product_image) }}" width="120" class="mt-2">
    @endisset
</div>


<div class="mb-3">
    <label>Description</label>
    <textarea id="product_details" name="product_details" class="form-control summernote" rows="4">{{ old('product_details', $detail->product_details ?? '') }}</textarea>
</div>

<div id="faq-container">
    @php
        // $detail will be null on create
        $faqs =
            isset($detail) && $detail->faqs
                ? (is_array($detail->faqs)
                    ? $detail->faqs
                    : json_decode($detail->faqs, true))
                : [];

    @endphp
    @forelse ($faqs as $i =>$faq)
        <div class="faq-item mb-4 border p-3 rounded">
            <input type="text" name="faqs[{{ $i }}][question]" class="form-control mb-2"
                value="{{ $faq['question'] ?? '' }}" placeholder="Question">
            <textarea name="faqs[{{ $i }}][answer]" class="form-control mb-2" placeholder="Answer">{{ $faq['answer'] ?? '' }}</textarea>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-success btn-sm add-faq">Add FAQ</button>
                @if ($i > 0)
                    <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                @endif
            </div>
        </div>
    @empty
        {{-- If no FAQ exists, render a single empty row --}}
        <div class="faq-item mb-4 border p-3 rounded">
            <input type="text" name="faqs[0][question]" class="form-control mb-2" placeholder="Question">
            <textarea name="faqs[0][answer]" class="form-control mb-2" placeholder="Answer"></textarea>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-success btn-sm add-faq">Add FAQ</button>
            </div>
        </div>
    @endforelse
</div>

<button type="submit" class="btn btn-primary">
    {{ isset($detail) ? 'Update Product' : 'Create Product' }}
</button>
<a href="{{ route('testimonial-details.index') }}" class="btn btn-secondary ms-2">Cancel</a>


@php
    $categoryTree = array_values(getCategoryList()); // helper data
@endphp


<script>
    // Data from backend
    const categoryTree = @json($categoryTree);
    const currentCategory = @json(old('category', $detail->category ?? ''));
    const currentSubcategory = @json(old('subcategory', $detail->subcategory ?? ''));
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categorySelect = document.getElementById('category');
        const subcategorySelect = document.getElementById('subcategory');

        const newCatWrap = document.getElementById('newCategoryWrapper');
        const newCatInput = document.getElementById('new_category');
        const catWarning = document.getElementById('category-warning');

        const newSubWrap = document.getElementById('newSubWrapper');
        const newSubInput = document.getElementById('new_subcategory');
        const subWarning = document.getElementById('subcategory-warning');

        /* ---------- 1. Fill Category Dropdown ---------- */
        categoryTree.forEach(cat => {
            const opt = document.createElement('option');
            opt.value = cat.name;
            opt.textContent = cat.name;
            categorySelect.appendChild(opt);
        });

        /* ---------- 2. Prefill Category & Subcategory ---------- */
        if (currentCategory) {
            categorySelect.value = currentCategory;
            // populate subcategories for this category
            populateSubcategories(currentCategory, function() {
                if (currentSubcategory) {
                    subcategorySelect.value = currentSubcategory;
                }
            });
        }

        /* ---------- 3. When Category Changes ---------- */
        categorySelect.addEventListener('change', function() {
            const val = this.value;

            // reset subcategory list
            subcategorySelect.innerHTML =
                `<option value="">-- Choose Subcategory --</option>
             <option value="__new__">+ Add New Subcategory</option>`;

            newCatWrap.classList.add('d-none');
            newCatInput.value = '';
            newCatInput.required = false;
            catWarning.classList.add('d-none');

            if (val === '__new__') {
                newCatWrap.classList.remove('d-none');
                newCatInput.required = true;
                return;
            }

            populateSubcategories(val);
        });

        /* ---------- 4. When Subcategory Changes ---------- */
        subcategorySelect.addEventListener('change', function() {
            const val = this.value;

            newSubWrap.classList.add('d-none');
            newSubInput.value = '';
            newSubInput.required = false;
            subWarning.classList.add('d-none');

            if (val === '__new__') {
                newSubWrap.classList.remove('d-none');
                newSubInput.required = true;
            }
        });

        /* ---------- 5. Duplicate Checks ---------- */
        newCatInput.addEventListener('input', function() {
            const val = this.value.trim().toLowerCase();
            const exists = categoryTree.some(c => c.category.toLowerCase() === val);
            catWarning.classList.toggle('d-none', !exists);
        });

        newSubInput.addEventListener('input', function() {
            const currentCat = categorySelect.value;
            const val = this.value.trim().toLowerCase();
            const selectedCat = categoryTree.find(c => c.category === currentCat);
            const exists = selectedCat?.subcategories.some(
                sc => sc.subcategory.toLowerCase() === val
            );
            subWarning.classList.toggle('d-none', !exists);
        });

        /* ---------- 6. Helper: Populate Subcategories ---------- */
        function populateSubcategories(categoryName, callback) {
            subcategorySelect.innerHTML =
                `<option value="">-- Choose Subcategory --</option>
             <option value="__new__">+ Add New Subcategory</option>`;

            const selectedCat = categoryTree.find(c => c.category === categoryName);
            if (selectedCat) {
                selectedCat.subcategories.forEach(sc => {
                    const opt = document.createElement('option');
                    opt.value = sc.subcategory;
                    opt.textContent = sc.subcategory;
                    subcategorySelect.appendChild(opt);
                });
            }
            if (typeof callback === 'function') callback();
        }

    });


    document.getElementById('product_id').addEventListener('change', function() {
        let selectedText = this.options[this.selectedIndex].text;
        document.getElementById('product').value = selectedText !== "-- Choose --" ? selectedText : "";
    });

    let index = 1;
    const container = document.getElementById('faq-container');

    // Event delegation: handle clicks on Add / Remove inside faq-container
    container.addEventListener('click', (e) => {
        // Add new FAQ
        if (e.target.classList.contains('add-faq')) {
            const item = document.createElement('div');
            item.classList.add('faq-item', 'mb-4', 'border', 'p-3', 'rounded');

            item.innerHTML = `
            <input type="text" name="faqs[${index}][question]" class="form-control mb-2" placeholder="Question">
            <textarea name="faqs[${index}][answer]" class="form-control mb-2" placeholder="Answer"></textarea>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-success btn-sm add-faq">Add FAQ</button>
                <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
            </div>
        `;

            container.appendChild(item);
            index++;
        }

        // Remove FAQ
        if (e.target.classList.contains('remove-faq')) {
            e.target.closest('.faq-item').remove();
        }
    });
</script>
