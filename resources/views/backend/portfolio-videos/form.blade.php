  {{-- Website Name --}}
  <div class="mb-3">
      <label for="company_name" class="form-label">Website Name</label>
      <input type="text" name="company_name" id="company_name"
          class="form-control @error('company_name') is-invalid @enderror" placeholder="Enter Company Name"
          value="{{ old('company_name', $detail->company_name ?? '') }}">
      @error('company_name')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  {{-- Website Link --}}
  <div class="mb-3">
      <label for="video_link" class="form-label">Video Link</label>
      <input type="url" name="video_link" id="video_link"
          class="form-control @error('video_link') is-invalid @enderror" placeholder="https://example.com"
          value="{{ old('video_link', $detail->video_link ?? '') }}">
      @error('video_link')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  {{-- Description --}}
  <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea name="description" id="description" rows="4"
          class="form-control @error('description') is-invalid @enderror" placeholder="Write a short description...">{{ old('description', $detail->description ?? '') }}</textarea>
      @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  {{-- Upload Image --}}
  <div class="mb-3">
      <label>Upload Thmbnail Image {{ isset($edit) ? '(optional)' : '' }}</label>
      <input type="file" name="thumbnail" id="thumbnail"
          class="form-control @error('thumbnail') is-invalid @enderror">
      @isset($detail->thumbnail)
          <img src="{{ asset('storage/' . $detail->thumbnail) }}" width="120" class="mt-2">
      @endisset
  </div>


  <button type="submit" class="btn btn-primary">
      {{ isset($detail) ? 'Update Video' : 'Create Video' }}
  </button>
  <a href="{{ route('portfolio-website-details.index') }}" class="btn btn-secondary ms-2">Cancel</a>
  {{-- Optional image preview script --}}
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
