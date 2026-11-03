  {{-- Website Name --}}
  <div class="mb-3">
      <label for="website_name" class="form-label">Website Name</label>
      <input type="text" name="website_name" id="website_name"
          class="form-control @error('website_name') is-invalid @enderror" placeholder="Enter website name"
          value="{{ old('website_name', $detail->website_name ?? '') }}">
      @error('website_name')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  {{-- Website Link --}}
  <div class="mb-3">
      <label for="website_link" class="form-label">Website Link</label>
      <input type="url" name="website_link" id="website_link"
          class="form-control @error('website_link') is-invalid @enderror" placeholder="https://example.com"
          value="{{ old('website_link', $detail->website_link ?? '') }}">
      @error('website_link')
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

  {{-- Upload File --}}
  <div class="mb-3">
      <label>Attach File {{ isset($edit) ? '(optional)' : '' }}</label>
      <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">

      {{-- Preview uploaded file if exists --}}
      @isset($detail->file)
          @php
              $filePath = asset('storage/' . $detail->file);
              $extension = pathinfo($detail->file, PATHINFO_EXTENSION);
          @endphp

          <div class="mt-3">
              @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                  <img src="{{ $filePath }}" width="120" class="img-thumbnail">
              @elseif (in_array(strtolower($extension), ['pdf']))
                  <iframe src="{{ $filePath }}" width="100%" height="400px"></iframe>
              @else
                  <a href="{{ $filePath }}" target="_blank" class="btn btn-outline-primary">
                      View Uploaded File
                  </a>
              @endif
          </div>
      @endisset

      @error('file')
          <div class="invalid-feedback">{{ $message }}</div>
      @enderror
  </div>

  {{-- Upload Image --}}
  <div class="mb-3">
      <label>Upload Website Image {{ isset($edit) ? '(optional)' : '' }}</label>
      <input type="file" name="iamge" id="iamge" class="form-control @error('iamge') is-invalid @enderror">
      @isset($detail->iamge)
          <img src="{{ asset('storage/' . $detail->iamge) }}" width="120" class="mt-2">
      @endisset
  </div>


  <button type="submit" class="btn btn-primary">
      {{ isset($detail) ? 'Update Website' : 'Create Website' }}
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
