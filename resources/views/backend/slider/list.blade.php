@extends('backend.layout.app')

@section('content')
    <div class="container py-4">
        <!-- Page header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Slider</h4>
            <a href="{{ route('slider-details.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add New Slider
            </a>
        </div>


        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Testimonials table -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th style="width:150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $detail)
                                <tr>
                                    <td>{{ $detail->title }}</td>
                                    <td>{{ $detail->slug }}</td>
                                    <td>
                                        @if ($detail->image_symbol)
                                            <img src="{{ asset('storage/' . $detail->image_symbol) }}" alt="photo"
                                                class="img-thumbnail" style="width:60px;height:60px;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('slider-details.edit', $detail->id) }}"
                                            class="btn btn-sm btn-info">
                                            Edit
                                        </a>
                                        <form action="{{ route('slider-details.destroy', $detail->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this slider?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        No slider found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
