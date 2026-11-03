@extends('backend.layout.app')
@section('content')
    <div class="container py-4">

        <!-- Header & Add Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Packages</h4>
            <a href="{{ route('package-details.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add New Package
            </a>
        </div>

        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Table -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Image</th>
                                <th>Slug</th>
                                <th>Title</th>
                                <th style="width:150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $detail)
                                <tr>
                                    <td>
                                        @if ($detail->image)
                                            <img src="{{ asset('storage/' . $detail->image) }}" alt="package image"
                                                class="img-thumbnail" style="width:60px;height:60px;object-fit:cover;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $detail->slug }}</td>
                                    <td>{{ $detail->title }}</td>
                                    <td>
                                        <a href="{{ route('package-details.edit', $detail->id) }}"
                                            class="btn btn-sm btn-info me-1">
                                            Edit
                                        </a>
                                        <form action="{{ route('package-details.destroy', $detail->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Delete this product detail?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        No packages found.
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
