<div class="mb-3">
    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $detail->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
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

{{-- <div class="mb-3">
    <label for="description">Description <span class="text-danger">*</span></label>
    <textarea id="description" name="description" class="form-control summernote" rows="4">{{ old('description', $detail->description ?? '') }}</textarea>
</div> --}}

<div class="mb-3">
    <label for="description">Description <span class="text-danger">*</span></label>
    <textarea id="description" name="description" class="form-control" rows="4">
        {{ old('description', $detail->description ?? '') }}
    </textarea>
</div>

{{-- <div class="mb-3">
    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
        rows="15" required>{{ old('description', $detail->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div> --}}

<div class="mb-3">
    @php
        $tags = old('tags', isset($detail->tags) ? implode(',', $detail->tags) : '');
        Log::info('Tags value: ' . $tags);
    @endphp
    <label for="tags" class="form-label">Tags (comma-separated)</label>
    <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags"
        value="{{ old('tags', isset($detail->tags) ? implode(',', $detail->tags) : '') }}">
    @error('tags')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="text-muted">Example: laravel,php,tutorial</small>
</div>


<div class="mb-3">
    <label for="image" class="form-label">Image {{ isset($detail) ? '(optional)' : '' }}</label>
    <input type="file" name="image" id="image" class="form-control">
    @isset($detail->image)
        <img src="{{ asset('storage/' . $detail->image) }}" width="120" class="mt-2">
    @endisset
</div>

<button type="submit" class="btn btn-primary">
    {{ isset($detail) ? 'Update Blog' : 'Create Blog' }}
</button>
<a href="{{ route('blog-details.index') }}" class="btn btn-secondary ms-2">Cancel</a>
