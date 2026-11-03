@extends('frontend.layout.app')

@section('title', 'Website Design & Development Company in Mumbai (Call:07208909232)| Digital Soch Private Limited')

@push('extra-head')
    <meta name="description"
        content="Professional website design and development services in Mumbai. Digital Soch builds responsive, SEO-friendly, and high-converting websites tailored to your business goals. (Call:07208909232)" />
    <link rel="canonical" href="https://www.digitalsochmedia.com/websites/" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="robots" content="index, follow" />
    <meta property="og:locale" content="en_IN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Website Design & Development Company in Mumbai | Digital Soch Private Limited" />
    <meta property="og:description"
        content="Build your online presence with Digital Soch — experts in website design, UI/UX, and SEO-friendly development for businesses across India. (Call:07208909232)" />
    <meta property="og:url" content="https://www.digitalsochmedia.com/websites/" />
    <meta property="og:site_name" content="Digital Soch Private Limited">
    <meta name="geo.position" content="Mumbai">
    <meta name="geo.placename" content="Andheri">
    <meta name="geo.region" content="400053">
    <meta name="revisit-after" content="7 days">
@endpush

@section('content')
    @include('frontend.layout.page-hero', [
        'title' => 'Portfolio Website',
        'crumb' => 'Website',
        'eyebrow' => 'Our Work',
        'subtitle' => 'We Serve 690+ Clients Around The Globe',
    ])

    <section class="ds-section pt-0">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @forelse ($websites as $website)
                    <div class="col-lg-6" data-reveal style="--d: {{ ($loop->index % 2) * 0.12 }}s">
                        <article class="ds-work">
                            <div class="ds-work__img">
                                <img src="{{ $website->iamge ? asset('storage/' . $website->iamge) : asset('assets/img/default.jpg') }}"
                                    alt="{{ $website->name }}" loading="lazy">
                                <a class="ds-work__pdf" href="{{ asset('storage/' . $website->file) }}" target="_blank"
                                    rel="noopener noreferrer" aria-label="View PDF"><i class="fa-solid fa-file-pdf"></i></a>
                            </div>
                            <div class="ds-work__body">
                                <h3><a href="{{ asset('storage/' . $website->file) }}" target="_blank"
                                        rel="noopener noreferrer">{{ $website->name }}</a></h3>
                                <p>{{ Str::limit($website->description, 120, '...') }}</p>
                                <div>
                                    <a href="{{ $website->website_link }}" target="_blank" rel="noopener noreferrer"
                                        class="ds-btn ds-btn--ghost ds-btn--sm">Explore Website <i
                                            class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                </div>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="ds-empty"><i class="fa-solid fa-laptop-code"></i>
                            <p class="mb-0">No websites available yet.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
