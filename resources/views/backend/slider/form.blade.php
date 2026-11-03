<div class="mb-3">
    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $detail->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Type Dropdown -->
<div class="mb-3">
    <label for="tablename" class="form-label">Type <span class="text-danger">*</span></label>
    <select class="form-select" id="tablename" name="tablename" required>
        <option value="">-- Select Type --</option>
        <option value="product" {{ old('tablename', $detail->tablename ?? '') == 'product' ? 'selected' : '' }}>Product
        </option>
        <option value="package" {{ old('tablename', $detail->tablename ?? '') == 'package' ? 'selected' : '' }}>Package
        </option>
    </select>
</div>

<!-- Item Dropdown -->
<div class="mb-3">
    <label for="itemid" class="form-label">Select Item <span class="text-danger">*</span></label>
    <select name="itemid" id="itemid" class="form-select" required>
        <option value="" {{ old('itemid', $detail->itemid ?? '') }}>-- Choose --
        </option>
        {{-- Default option is blank; JS will fill in based on selected type --}}
    </select>
</div>

<div class="mb-3">
    <label>Slug For SEO <span class="text-danger">*</span></label>
    <input type="text" name="slug" id="slug" readonly class="form-control"
        value="{{ old('slug', $detail->slug ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
        rows="5" required>{{ old('description', $detail->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Upload Image One --}}
<div class="mb-3">
    <label>Upload Slider Image One {{ isset($edit) ? '(optional)' : '' }}</label>
    <input type="file" name="image_one" id="image_one" class="form-control @error('image_one') is-invalid @enderror"
        {{ isset($edit) ? '' : 'required' }} {{-- make required only if not editing --}} accept="image/*">

    {{-- Show existing image_one (if editing) --}}
    @isset($detail->image_one)
        <img src="{{ asset('storage/' . $detail->image_one) }}" width="120" class="mt-2">
    @endisset

    {{-- Preview newly uploaded image_one --}}
    <div id="imagePreviewContainer" class="mt-2" style="display:none;">
        <img id="imagePreview" src="" alt="Image Preview" width="120">
    </div>
</div>

{{-- Upload Image Two --}}
<div class="mb-3">
    <label>Upload Slider Image Two {{ isset($edit) ? '(optional)' : '' }}</label>
    <input type="file" name="image_two" id="image_two" class="form-control @error('image_two') is-invalid @enderror"
        {{ isset($edit) ? '' : 'required' }} {{-- make required only if not editing --}} accept="image/*">

    {{-- Show existing image_two (if editing) --}}
    @isset($detail->image_two)
        <img src="{{ asset('storage/' . $detail->image_two) }}" width="120" class="mt-2">
    @endisset

    {{-- Preview newly uploaded image_one --}}
    <div id="imagePreviewContainerTwo" class="mt-2" style="display:none;">
        <img id="imagePreviewTwo" src="" alt="Image Preview" width="120">
    </div>
</div>

{{-- Upload Symbol Image --}}
<div class="mb-3">
    <label>Upload Image Symbol {{ isset($edit) ? '(optional)' : '' }}</label>
    <input type="file" name="image_symbol" id="image_symbol"
        class="form-control @error('image_symbol') is-invalid @enderror" {{ isset($edit) ? '' : 'required' }}
        {{-- make required only if not editing --}} accept="image/*">

    {{-- Show existing image_symbol (if editing) --}}
    @isset($detail->image_symbol)
        <img src="{{ asset('storage/' . $detail->image_symbol) }}" width="120" class="mt-2">
    @endisset

    {{-- Preview newly uploaded image_one --}}
    <div id="imagePreviewContainerSymbol" class="mt-2" style="display:none;">
        <img id="imagePreviewSymbol" src="" alt="Image Preview" width="120">
    </div>
</div>


<button type="submit" class="btn btn-primary">
    {{ isset($detail) ? 'Update Slider' : 'Create Slider' }}
</button>

<a href="{{ route('portfolio-website-details.index') }}" class="btn btn-secondary ms-2">Cancel</a>
<script>
    // ---------- Image Preview Logic ----------
    function setupImagePreview(inputId, previewId, containerId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const container = document.getElementById(containerId);

        input.addEventListener('change', function(e) {
            const [file] = e.target.files;
            if (file) {
                preview.src = URL.createObjectURL(file);
                container.style.display = 'block';
            }
        });
    }

    setupImagePreview('image_one', 'imagePreview', 'imagePreviewContainer');
    setupImagePreview('image_two', 'imagePreviewTwo', 'imagePreviewContainerTwo');
    setupImagePreview('image_symbol', 'imagePreviewSymbol', 'imagePreviewContainerSymbol');

    // ---------- Populate Items & Slug ----------
    const products = @json($productList);
    const packages = @json($packageList);

    const typeSelect = document.getElementById('tablename');
    const itemSelect = document.getElementById('itemid');
    const slugInput = document.getElementById('slug');

    function populateItems(type) {
        itemSelect.innerHTML = '<option value="">-- Choose --</option>';
        let items = {};

        if (type === 'product') items = products;
        else if (type === 'package') items = packages;

        for (const [id, data] of Object.entries(items)) {
            const option = document.createElement('option');
            option.value = id;
            option.textContent = data.name; // Access the name property
            itemSelect.appendChild(option);
        }

        // Reset slug when type changes
        slugInput.value = '';
    }

    itemSelect.addEventListener('change', function() {
        const selectedId = this.value;
        const type = typeSelect.value;
        let slug = '';

        if (type === 'product' && products[selectedId]) slug = products[selectedId].slug;
        else if (type === 'package' && packages[selectedId]) slug = packages[selectedId].slug;

        slugInput.value = slug;
    });

    typeSelect.addEventListener('change', function() {
        populateItems(this.value);
    });

    // Pre-select values when editing
    document.addEventListener('DOMContentLoaded', () => {
        const oldType = "{{ old('tablename', $detail->tablename ?? '') }}";
        const oldItem = "{{ old('itemid', $detail->itemid ?? '') }}";

        if (oldType) {
            populateItems(oldType);
            if (oldItem) {
                itemSelect.value = oldItem;

                // Also fill slug
                if (oldType === 'product' && products[oldItem]) slugInput.value = products[oldItem].slug;
                else if (oldType === 'package' && packages[oldItem]) slugInput.value = packages[oldItem].slug;
            }
        }
    });
</script>
