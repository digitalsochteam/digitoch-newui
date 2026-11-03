@extends('backend.layout.app')

@section('content')
    <div class="container py-4">

        <!-- Header & Add Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Product Details</h4>
            <a href="{{ route('product-details.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add New Product
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
                                <th style="width:80px;">Position</th>
                                <th>Package Category</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Product</th>
                                <th style="width:150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $detail)
                                <tr>
                                    <td>{{ $detail->position }}</td>
                                    <td>{{ $detail->products->name ?? '—' }}</td>
                                    <td>{{ $detail->category }}</td>
                                    <td>{{ $detail->subcategory }}</td>
                                    <td>{{ $detail->product }}</td>
                                    <td>
                                        <a href="{{ route('product-details.edit', $detail->id) }}"
                                            class="btn btn-sm btn-info me-1">
                                            Edit
                                        </a>
                                        <form action="{{ route('product-details.destroy', $detail->id) }}" method="POST"
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
                                        No product details found.
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
