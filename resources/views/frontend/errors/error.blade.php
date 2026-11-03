@extends('frontend.layout.app')
@section('title', 'Page Not Found | Digital Soch')
@section('content')
    <section class="ds-404">
        <div class="container">
            <div class="ds-404__code ds-grad-text">404</div>
            <h1>Oops! Page Not Found</h1>
            <p class="mx-auto" style="max-width: 500px">The page you're looking for doesn't exist or has been moved.
                Let's get you back on track.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                <a href="{{ url('/') }}" class="ds-btn"><i class="fa-solid fa-house"></i> Go to Homepage</a>
                <a href="{{ route('contact') }}" class="ds-btn ds-btn--ghost">Contact Us</a>
            </div>
        </div>
    </section>
@endsection
