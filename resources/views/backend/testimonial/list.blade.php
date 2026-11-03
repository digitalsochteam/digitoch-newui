@extends('backend.layout.app')

@section('content')
    <div class="container py-4">
        <!-- Page header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Testimonials</h4>
            <a href="{{ route('testimonial-details.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add New Testimonial
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
                                <th>Designation</th>
                                <th>Star</th>
                                <th>Image</th>
                                <th style="width:150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $detail)
                                <tr>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ $detail->designation }}</td>
                                    <td>
                                        @for ($i = 1; $i <= $detail->star; $i++)
                                            ⭐
                                        @endfor
                                    </td>
                                    <td>
                                        @if ($detail->image)
                                            <img src="{{ asset('storage/' . $detail->image) }}" alt="photo"
                                                class="img-thumbnail" style="width:60px;height:60px;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('testimonial-details.edit', $detail->id) }}"
                                            class="btn btn-sm btn-info">
                                            Edit
                                        </a>
                                        <form action="{{ route('testimonial-details.destroy', $detail->id) }}"
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
                                        No testimonials found.
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
