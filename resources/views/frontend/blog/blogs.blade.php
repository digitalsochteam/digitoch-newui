@extends('frontend.layout.app')

@section('title',
    'Digital Marketing Blogs & Insights (Call:07208909232)| Digital Soch Private
    Limited')

    @push('extra-head')
        <meta name="description"
            content="Explore the latest blogs from Digital Soch Private Limited — expert insights on digital marketing, SEO, social media, branding, and online growth strategies that help your business succeed. (Call:07208909232)" />
        <link rel="canonical" href="https://digitalsochmedia.com/blogs" />
        <meta http-equiv="content-language" content="en-us" />
        <meta name="robots" content="index, follow" />
        <meta property="og:locale" content="en_IN" />
        <meta property="og:type" content="website" />
        <meta property="og:title"
            content="Digital Marketing Blogs & Insights (Call:07208909232)| Digital Soch Private
    Limited" />
        <meta property="og:description"
            content="Explore the latest blogs from Digital Soch Private Limited — expert insights on digital marketing, SEO, social media, branding, and online growth strategies that help your business succeed. (Call:07208909232)" />
        <meta property="og:url" content="https://digitalsochmedia.com/blogs" />
        <meta property="og:site_name" content="Digital Soch Private Limited">
        <meta name="geo.position" content="Mumbai">
        <meta name="geo.placename" content="Andheri">
        <meta name="geo.region" content="400053">
        <meta name="revisit-after" content="7 days">
    @endpush

@section('content')
    @include('frontend.layout.page-hero', [
        'title' => 'Read Our Blogs',
        'crumb' => 'Blog',
        'eyebrow' => 'Blog Posts',
        'subtitle' => 'Our team is dedicated to delivering exceptional IT solutions tailored to meet the unique needs of each client.',
    ])

    <section class="ds-section pt-0">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @forelse ($blogs as $blog)
                    <div class="col-lg-4 col-md-6" data-reveal style="--d: {{ ($loop->index % 3) * 0.12 }}s">
                        <article class="ds-post">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="ds-post__img">
                                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/img/blog/blg1.jpg') }}"
                                    alt="{{ $blog->title }}" loading="lazy" decoding="async">
                            </a>
                            <div class="ds-post__body">
                                <span class="ds-meta"><i class="fa-regular fa-calendar"></i>
                                    {{ $blog->created_at?->format('d M, Y') }}</span>
                                <h3><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                <a class="ds-link" href="{{ route('blog.show', $blog->slug) }}">Read Details <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="ds-empty">
                            <i class="fa-regular fa-newspaper"></i>
                            <p class="mb-0">No blog posts available right now. Please check back soon.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
