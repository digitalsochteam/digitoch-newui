@extends('backend.layout.app')

@section('content')
    <div class="container py-4">
        <!-- Page header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Blogs</h4>
            <a href="{{ route('blog-details.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Add New Blog
            </a>
        </div>

        <!-- Success message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Blogs table -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                {{-- <th>Tag</th> --}}
                                <th style="width:150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $detail)
                                <tr>
                                    <td>
                                        @if ($detail->image)
                                            <img src="{{ asset('storage/' . $detail->image) }}" alt="blog image"
                                                class="img-thumbnail" style="width:60px;height:60px;object-fit:cover;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $detail->title }}</td>
                                    <td class="text-truncate" style="max-width: 300px;">
                                        {{ Str::limit($detail->description, 100) }}
                                    </td>
                                    {{-- <td>
                                        @if (!empty($detail->tags))
                                            @foreach ($detail->tags as $tag)
                                                <span class="badge bg-secondary">{{ $tag }}</span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">No Tags</span>
                                        @endif
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('blog-details.edit', $detail->id) }}" class="btn btn-sm btn-info">
                                            Edit
                                        </a>
                                        <form action="{{ route('blog-details.destroy', $detail->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this blog?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        No blogs found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination (optional) -->
            @if (method_exists($details, 'links'))
                <div class="card-footer">
                    {{ $details->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
