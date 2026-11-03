@extends('frontend.layout.app')

@section('title',
    'Logo Design Company in Mumbai (Call:07208909232)| Custom Brand Identity | Digital Soch Private
    Limited')

    @push('extra-head')
        <meta name="description"
            content="Creative logo design company in Mumbai. Digital Soch crafts unique, professional logos that define your brand identity and make a lasting impression. (Call:07208909232)" />
        <link rel="canonical" href="https://www.digitalsochmedia.com/logos/" />
        <meta http-equiv="content-language" content="en-us" />
        <meta name="robots" content="index, follow" />
        <meta property="og:locale" content="en_IN" />
        <meta property="og:type" content="website" />
        <meta property="og:title"
            content="Logo Design Company in Mumbai (Call:07208909232)| Custom Brand Identity |Digital Soch Private Limited" />
        <meta property="og:description"
            content="Enhance your brand identity with Digital Soch — expert designers creating modern, memorable logos tailored for your business. (Call:07208909232)" />
        <meta property="og:url" content="https://www.digitalsochmedia.com/logos/" />
        <meta property="og:site_name" content="Digital Soch Private Limited">
        <meta name="geo.position" content="Mumbai">
        <meta name="geo.placename" content="Andheri">
        <meta name="geo.region" content="400053">
        <meta name="revisit-after" content="7 days">
    @endpush

@section('content')
    @include('frontend.layout.page-hero', [
        'title' => 'Portfolio Logos',
        'crumb' => 'Logos',
        'eyebrow' => 'Brand Identity',
    ])

    <section class="ds-section pt-0">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @forelse ($logos as $logo)
                    <div class="col-lg-3 col-md-4 col-6" data-reveal="zoom" style="--d: {{ ($loop->index % 4) * 0.08 }}s">
                        <div class="ds-logo-tile">
                            <img src="{{ $logo->image ? asset('storage/' . $logo->image) : asset('assets/img/default.jpg') }}"
                                alt="{{ $logo->name }}" loading="lazy">
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="ds-empty"><i class="fa-solid fa-pen-nib"></i>
                            <p class="mb-0">No images available yet.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
