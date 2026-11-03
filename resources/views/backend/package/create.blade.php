@extends('backend.layout.app')
@section('content')
    <div class="container py-4">
        <h4 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Create Package Detail</h4>
        <form action="{{ route(name: 'package-details.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.package.form')
        </form>
    </div>
@endsection
