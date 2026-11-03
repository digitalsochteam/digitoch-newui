@extends('backend.layout.app')
@section('content')
    <div class="container py-4">
        <h4 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Create Website Detail</h4>
        <form action="{{ route('portfolio-website-details.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.portfolio-websites.form')
        </form>
    </div>
@endsection
