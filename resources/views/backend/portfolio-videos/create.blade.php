@extends('backend.layout.app')
@section('content')
    <div class="container py-4">
        <h4 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Create Video Detail</h4>
        <form action="{{ route('portfolio-video-details.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.portfolio-videos.form')
        </form>
    </div>
@endsection
