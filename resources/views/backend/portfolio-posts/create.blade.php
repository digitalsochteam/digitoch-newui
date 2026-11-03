@extends('backend.layout.app')
@section('content')
    <div class="container py-4">
        <h4 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Create Post Detail</h4>
        <form action="{{ route('portfolio-post-details.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.portfolio-posts.form')
        </form>
    </div>
@endsection
