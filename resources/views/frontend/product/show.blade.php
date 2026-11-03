@extends('frontend.layout.app')


@section('title', $product->meta_title)

@push('extra-head')
    @if (!empty($product->meta_description))
        {!! $product->meta_description !!}
    @endif
@endpush

@section('content')
    @php
        $productTitle = $product->product ?? $product->subcategory;
        $faqs = is_array($product->faqs) ? $product->faqs : json_decode($product->faqs, true) ?? [];
    @endphp

    @include('frontend.layout.page-hero', [
        'title' => $productTitle,
        'eyebrow' => $product->subcategory,
    ])

    <section class="ds-section pt-0">
        <div class="container">
            <div class="row g-5">
                <div class="{{ $otherProducts->isNotEmpty() ? 'col-lg-8' : 'col-lg-12' }}">
                    <div class="ds-paper" data-reveal>
                        <h2 class="ds-paper__title">{{ $productTitle }}</h2>
                        @if (!empty($product->product_subheading))
                            <p class="ds-paper__subhead">{{ $product->product_subheading }}</p>
                        @endif
                        <div class="ds-prose">
                            {!! $product->product_detail !!}
                        </div>

                        @if (!empty($product->product_image))
                            <div class="ds-paper__media">
                                <img src="{{ Storage::url($product->product_image) }}"
                                    alt="{{ $product->product ?? 'Product' }} image">
                            </div>
                        @endif

                        @if (!empty($product->product_details))
                            <div class="ds-prose">
                                {!! $product->product_details !!}
                            </div>
                        @endif
                    </div>

                    @if (!empty($faqs))
                        <div class="mt-5" data-reveal>
                            <div class="ds-head ds-head--left mb-4">
                                <span class="ds-eyebrow"><i class="fa-solid fa-circle-question"></i> FAQ</span>
                                <h2>Frequently Asked <span class="ds-grad-text">Questions</span></h2>
                            </div>
                            <div class="accordion ds-faq" id="accordionExample_{{ $product->id }}">
                                @foreach ($faqs as $index => $faq)
                                    @php
                                        $headingId = 'heading' . $index;
                                        $collapseId = 'collapse' . $index;
                                    @endphp
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="{{ $headingId }}">
                                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#{{ $collapseId }}"
                                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                aria-controls="{{ $collapseId }}">
                                                {{ $faq['question'] ?? '' }}
                                            </button>
                                        </h3>
                                        <div id="{{ $collapseId }}"
                                            class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                            aria-labelledby="{{ $headingId }}"
                                            data-bs-parent="#accordionExample_{{ $product->id }}">
                                            <div class="accordion-body">{{ $faq['answer'] ?? '' }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                @if ($otherProducts->isNotEmpty())
                    <div class="col-lg-4">
                        <aside class="ds-sidebar">
                            <div class="ds-widget">
                                <h3 class="ds-widget__title">Other Products</h3>
                                <ul class="ds-widget__links">
                                    @foreach ($otherProducts as $otherProduct)
                                        <li>
                                            <a href="{{ route('product.show', $otherProduct['slug']) }}">
                                                <span>{{ $otherProduct['name'] }}</span>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @include('frontend.layout.sidebar-cta')
                        </aside>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
