@extends('backend.layout.app')

@section('content')
    <div class="container py-4">
        <!-- Page header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Website</h4>
            <a href="{{ route('portfolio-website-details.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add New Website
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
                                <th>Name</th>
                                <th>Link</th>
                                <th>Image</th>
                                <th style="width:150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $detail)
                                <tr>
                                    <td>{{ $detail->website_name }}</td>
                                    <td>{{ $detail->website_link }}</td>
                                    <td>
                                        @if ($detail->iamge)
                                            <img src="{{ asset('storage/' . $detail->iamge) }}" alt="photo"
                                                class="img-thumbnail" style="width:60px;height:60px;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    {{-- <a href="{{ route('testimonial-details.edit', $detail->id) }}" --}}



                                    {{-- <form action="{{ route('testimonial-details.destroy', $detail->id) }}" --}}
                                    <td>
                                        <a href="{{ route('portfolio-website-details.edit', $detail->id) }}"
                                            class="btn btn-sm btn-info">
                                            Edit
                                        </a>
                                        <form action="{{ route('portfolio-website-details.destroy', $detail->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this testimonial?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        No website found.
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
