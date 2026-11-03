@extends('backend.layout.app')
@section('content')
    <div class="container py-4">
        <h4 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Create Company Logo Detail</h4>
        <form action="{{ route(name: 'company-logo-details.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.company.form')
        </form>
    </div>
@endsection
