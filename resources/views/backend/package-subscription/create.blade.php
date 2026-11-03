@extends('backend.layout.app')
@section('content')
    <div class="container py-4">
        <h4 style="font-size: 24px; font-weight: 700; margin-bottom: 20px;">Create Package Subscription Detail</h4>
        <form action="{{ route(name: 'package-subscription-details.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('backend.package-subscription.form')
        </form>
    </div>
@endsection
