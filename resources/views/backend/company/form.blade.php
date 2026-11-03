<div class="mb-3">
    <label for="name" class="form-label">Name </label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $detail->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description </label>
    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
        name="description" value="{{ old('description', $detail->description ?? '') }}">
    @error('description')
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
    {{ isset($detail) ? 'Update Company Logo' : 'Add Company Logo' }}
</button>
<a href="{{ route('company-logo-details.index') }}" class="btn btn-secondary ms-2">Cancel</a>
