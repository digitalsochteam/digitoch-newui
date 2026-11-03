@extends('backend.layout.app')
@section('content')
    <div class="container py-4">
        <h4 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Edit Post Detail</h4>
        <form action="{{ route('portfolio-post-details.update', parameters: $detail->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.portfolio-posts.form', ['edit' => true])
        </form>
    </div>
@endsection
