@extends('frontend.layout.app')

@section('title', $package->meta_title)

@push('extra-head')
    @if (!empty($package->meta_description))
        {!! $package->meta_description !!}
    @endif
@endpush


@section('content')
    @include('frontend.layout.page-hero', [
        'title' => $package->title . ' Package',
        'crumb' => $package->title,
        'eyebrow' => 'Our Pricing Plan',
    ])

    <section class="ds-section pt-0">
        <div class="container">
            <div class="ds-head" data-reveal>
                <h2>Affordable <span class="ds-grad-text">Pricing Packages</span></h2>
                <p>Transparent plans built to deliver results — pick the one that fits your business.</p>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach ($subscriptions as $plan)
                    @php
                        $features = is_array($plan->head) ? $plan->head : json_decode($plan->head, true) ?? [];
                    @endphp
                    <div class="col-lg-4 col-md-6" data-reveal style="--d: {{ ($loop->index % 3) * 0.12 }}s">
                        <div class="ds-price {{ $plan['ispopular'] ? 'is-popular' : '' }}">
                            @if ($plan['ispopular'])
                                <span class="ds-price__ribbon">Popular</span>
                            @endif
                            <div class="ds-price__icon">
                                <img src="{{ Storage::url($plan->image) }}"
                                    alt="{{ $plan->title ?? 'Package' }} image">
                            </div>
                            <h3>{{ $plan->title }}</h3>
                            @if (!empty($plan->description))
                                <p class="ds-price__desc">{{ $plan->description }}</p>
                            @endif

                            @if (!empty($features))
                                <div class="ds-price__label">Feature Option:</div>
                                <ul class="ds-price__list">
                                    @foreach ($features as $feature)
                                        <li>
                                            <span><i class="fa-solid fa-circle-check"></i>{{ $feature['key'] }}</span>
                                            <span>{{ $feature['value'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="flex-grow-1"></div>
                            @endif

                            <a href="#" class="ds-btn {{ $plan['ispopular'] ? '' : 'ds-btn--ghost' }} ds-btn--block"
                                data-bs-toggle="modal" data-bs-target="#myModal">Get Started <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
