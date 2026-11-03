<div class="mb-3">
    <label for="product_package_id" class="form-label">Select Package</label>
    <select name="product_package_id" id="product_package_id" class="form-select" required>
        <option value="">-- Choose --</option>
        @foreach ($packages as $id => $title)
            <option value="{{ $id }}"
                {{ old('product_package_id', $detail->product_package_id ?? '') == $id ? 'selected' : '' }}>
                {{ $title }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $detail->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
        rows="5">{{ old('description', $detail->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="color">Choose Color:</label>
    <input type="color" name="color" id="color" class="form-control form-control-color"
        value="{{ old('color', $detail->color ?? '') }}">
</div>


<div class="mb-3">
    <label for="image" class="form-label">Image {{ isset($detail) ? '(optional)' : '' }}</label>
    <input type="file" name="image" id="image" class="form-control">
    @isset($detail->image)
        <img src="{{ asset('storage/' . $detail->image) }}" width="120" class="mt-2">
    @endisset
</div>

<div class="mb-3">
    <label for="ispopular" class="form-label">Is Popular?</label>
    <select name="ispopular" id="ispopular" class="form-select">
        <option value="0" {{ old('ispopular', $detail->ispopular ?? 0) == 0 ? 'selected' : '' }}>False</option>
        <option value="1" {{ old('ispopular', $detail->ispopular ?? 0) == 1 ? 'selected' : '' }}>True</option>
    </select>
</div>

<div class="mb-3">
    <label for="head" class="form-label">Features</label>

    <div id="key-value-wrapper">
        @php
            $heads = [];

            if (isset($detail) && $detail->head) {
                if (is_array($detail->head)) {
                    // already array
                    $heads = $detail->head;
                } elseif (is_string($detail->head)) {
                    // decode JSON string
                    $decoded = json_decode($detail->head, true);
                    $heads = is_array($decoded) ? $decoded : [];
                }
            }
        @endphp
        @forelse ($heads as $i => $head)
            <div class="row g-3 key-value-item mb-2">
                <div class="col-md-5">
                    <input type="text" name="head[{{ $i }}][key]" class="form-control"
                        value="{{ $head['key'] ?? '' }}" placeholder="Enter Key (e.g. Adwords)">
                </div>
                <div class="col-md-5">
                    <input type="text" name="head[{{ $i }}][value]" class="form-control"
                        value="{{ $head['value'] ?? '' }}" placeholder="Enter Value (e.g. 25000)">
                </div>
                <div class="col-md-2 d-flex">
                    <button type="button" class="btn btn-danger remove-item w-100">Remove</button>
                </div>
            </div>
        @empty
            <div class="row g-3 key-value-item mb-2">
                <div class="col-md-5">
                    <input type="text" name="head[0][key]" class="form-control"
                        placeholder="Enter Key (e.g. Adwords)">
                </div>
                <div class="col-md-5">
                    <input type="text" name="head[0][value]" class="form-control"
                        placeholder="Enter Value (e.g. 25000)">
                </div>
                <div class="col-md-2 d-flex">
                    <button type="button" class="btn btn-danger remove-item w-100">Remove</button>
                </div>
            </div>
        @endforelse
    </div>

    <button type="button" id="add-more" class="btn btn-outline-primary mt-3">+ Add More</button>
</div>


<div class="mt-4">
    <button type="submit" class="btn btn-primary">
        {{ isset($detail) ? 'Update Subscription' : 'Create Subscription' }}
    </button>
    <a href="{{ route('package-subscription-details.index') }}" class="btn btn-secondary ms-2">Cancel</a>
</div>

<script>
    let index = {{ count($heads) > 0 ? count($heads) : 1 }};

    document.getElementById('add-more').addEventListener('click', function() {
        let wrapper = document.getElementById('key-value-wrapper');

        let newItem = document.createElement('div');
        newItem.classList.add('row', 'g-3', 'key-value-item', 'mb-2');

        newItem.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="head[${index}][key]" class="form-control" placeholder="Enter Key" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="head[${index}][value]" class="form-control" placeholder="Enter Value" required>
            </div>
            <div class="col-md-2 d-flex">
                <button type="button" class="btn btn-danger remove-item w-100">Remove</button>
            </div>
        `;

        wrapper.appendChild(newItem);
        index++;
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.key-value-item').remove();
        }
    });
</script>
