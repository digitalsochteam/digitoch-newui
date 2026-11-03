<div class="mb-3">
    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $detail->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
        value="{{ old('slug', $detail->slug ?? '') }}" required>
    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
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
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
        rows="5">{{ old('description', $detail->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Image {{ isset($detail) ? '(optional)' : '' }}</label>
    <input type="file" name="image" id="image" class="form-control">
    @isset($detail->image)
        <img src="{{ asset('storage/' . $detail->image) }}" width="120" class="mt-2">
    @endisset
</div>


<div class="mt-4">
    <button type="submit" class="btn btn-primary">
        {{ isset($detail) ? 'Update Package' : 'Create Package' }}
    </button>
    <a href="{{ route('package-details.index') }}" class="btn btn-secondary ms-2">Cancel</a>
</div>
