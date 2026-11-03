<div class="mb-3">
    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $detail->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation"
        name="designation" value="{{ old('designation', $detail->designation ?? '') }}" required>
    @error('designation')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="review" class="form-label">Review <span class="text-danger">*</span></label>
    <textarea class="form-control @error('review') is-invalid @enderror" id="review" name="review" rows="4"
        required>{{ old('review', $detail->review ?? '') }}</textarea>
    @error('review')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="star" class="form-label">Star Rating (1-5) <span class="text-danger">*</span></label>
    <select class="form-select @error('star') is-invalid @enderror" id="star" name="star" required>
        <option value="" disabled {{ old('star', $detail->star ?? '') === '' ? 'selected' : '' }}>Select
        </option>
        @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ old('star', $detail->star ?? '') == $i ? 'selected' : '' }}>
                {{ $i }} Star{{ $i > 1 ? 's' : '' }}
            </option>
        @endfor
    </select>
    @error('star')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label>Image {{ isset($edit) ? '(optional)' : '' }}</label>
    <input type="file" name="image" class="form-control">
    @isset($detail->image)
        <img src="{{ asset('storage/' . $detail->image) }}" width="120" class="mt-2">
    @endisset
</div>

<button type="submit" class="btn btn-primary">
    {{ isset($detail) ? 'Update Testimonial' : 'Create Testimonial' }}
</button>
<a href="{{ route('testimonial-details.index') }}" class="btn btn-secondary ms-2">Cancel</a>
