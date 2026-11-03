@extends('frontend.layout.app')

@section('title', $blog->meta_title)

@push('extra-head')
    @if (!empty($blog->meta_description))
        {!! $blog->meta_description !!}
    @endif
@endpush

@section('content')
    @include('frontend.layout.page-hero', [
        'title' => 'Blog Post',
        'crumb' => 'Blog',
        'eyebrow' => 'Insights',
    ])

    <section class="ds-section pt-0">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <article class="ds-paper" data-reveal>
                        <div class="ds-paper__media mt-0">
                            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/img/blog/blg1.jpg') }}"
                                alt="{{ $blog->title }}">
                        </div>
                        <span class="ds-meta ds-meta--dark"><i class="fa-regular fa-calendar"></i>
                            {{ $blog->created_at?->format('d M, Y') }}</span>
                        <h2 class="ds-paper__title">{{ $blog->title }}</h2>
                        <div class="ds-prose">
                            {!! $blog->description !!}
                        </div>
                    </article>

                    <div class="ds-tags">
                        <span>Tags:</span>
                        @if (!empty($blog->tags) && is_array($blog->tags))
                            @foreach ($blog->tags as $tag)
                                <span class="ds-tag">{{ $tag }}</span>
                            @endforeach
                        @else
                            <span class="ds-tag">No tags</span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <aside class="ds-sidebar">
                        <div class="ds-widget">
                            <h3 class="ds-widget__title">Recent Posts</h3>
                            @forelse ($recentPosts as $post)
                                <div class="ds-recent">
                                    <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('assets/img/blog/default-thumb.jpg') }}"
                                        alt="{{ $post->title }}" loading="lazy">
                                    <div>
                                        <span class="ds-meta"><i class="fa-regular fa-calendar"></i>
                                            {{ $post->created_at?->format('d M, Y') }}</span>
                                        <h4><a
                                                href="{{ route('blog.show', $post->slug) }}">{{ Str::limit($post->title, 60) }}</a>
                                        </h4>
                                    </div>
                                </div>
                            @empty
                                <p class="mb-0">No recent posts available.</p>
                            @endforelse
                        </div>
                        @include('frontend.layout.sidebar-cta')
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
