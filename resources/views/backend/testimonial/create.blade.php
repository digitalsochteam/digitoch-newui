@extends('backend.layout.app')
@section('content')
    <div class="container py-4">
        <h4 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Create Testimonial Detail</h4>
        <form action="{{ route('testimonial-details.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.testimonial.form')
        </form>
    </div>
@endsection
