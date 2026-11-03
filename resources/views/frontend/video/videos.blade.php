@extends('frontend.layout.app')

@section('title',
    'Corporate & Promotional Video Production in Mumbai (Call:07208909232)| Digital Soch Private
    Limited')

    @push('extra-head')
        <meta name="description"
            content="Professional video production company in Mumbai. We create corporate, branding, and social media videos that tell your story and boost engagement. (Call:07208909232)" />
        <link rel="canonical" href="https://www.digitalsochmedia.com/videos" />
        <meta http-equiv="content-language" content="en-us" />
        <meta name="robots" content="index, follow" />
        <meta property="og:locale" content="en_IN" />
        <meta property="og:type" content="website" />
        <meta property="og:title"
            content="Corporate & Promotional Video Production in Mumbai (Call:07208909232)| Digital Soch Private
    Limited" />
        <meta property="og:description"
            content="Professional video production company in Mumbai. We create corporate, branding, and social media videos that tell your story and boost engagement. (Call:07208909232)" />
        <meta property="og:url" content="https://www.digitalsochmedia.com/videos" />
        <meta property="og:site_name" content="Digital Soch Private Limited">
        <meta name="geo.position" content="Mumbai">
        <meta name="geo.placename" content="Andheri">
        <meta name="geo.region" content="400053">
        <meta name="revisit-after" content="7 days">
    @endpush

@section('content')
    @include('frontend.layout.page-hero', [
        'title' => 'Portfolio Videos',
        'crumb' => 'Videos',
        'eyebrow' => 'Video Production',
    ])

    <section class="ds-section pt-0">
        <div class="container">
            @forelse ($videos as $video)
                <article class="ds-video" data-reveal>
                    <a class="ds-video__media ds-video-pop" href="{{ $video->video_link }}"
                        aria-label="Play {{ $video->company_name }} video">
                        <img src="{{ $video->thumbnail ? asset('storage/' . $video->thumbnail) : asset('assets/img/default.jpg') }}"
                            alt="{{ $video->company_name }} thumbnail" loading="lazy">
                        <span class="ds-play-btn"><i class="fa-solid fa-play"></i></span>
                    </a>
                    <div class="ds-video__body">
                        <span class="ds-eyebrow"><i class="fa-solid fa-video"></i> {{ $video->company_name }}</span>
                        <h3>{{ $video->description }}</h3>
                    </div>
                </article>
            @empty
                <div class="ds-empty"><i class="fa-solid fa-film"></i>
                    <p class="mb-0">No videos available yet.</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection
