@extends('backend.layout.app')
@section('content')
    <div class="container py-4">
        <h4 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Edit Company Logo Detail</h4>
        <form action="{{ route('company-logo-details.update', parameters: $detail->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.company.form', ['edit' => true])
        </form>
    </div>
@endsection
