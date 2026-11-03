{{-- Upload Image --}}
<div class="mb-3">
    <label>Upload Post Image {{ isset($edit) ? '(optional)' : '' }}</label>
    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
        {{ isset($edit) ? '' : 'required' }} {{-- make required only if not editing --}} accept="image/*">

    {{-- Show existing image (if editing) --}}
    @isset($detail->image)
        <img src="{{ asset('storage/' . $detail->image) }}" width="120" class="mt-2">
    @endisset

    {{-- Preview newly uploaded image --}}
    <div id="imagePreviewContainer" class="mt-2" style="display:none;">
        <img id="imagePreview" src="" alt="Image Preview" width="120">
    </div>
</div>

<button type="submit" class="btn btn-primary">
    {{ isset($detail) ? 'Update Post' : 'Create Post' }}
</button>
<a href="{{ route('portfolio-website-details.index') }}" class="btn btn-secondary ms-2">Cancel</a>

{{-- Image preview script --}}
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const [file] = e.target.files;
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(file);
            document.getElementById('imagePreviewContainer').style.display = 'block';
        }
    });
</script>
