@extends('frontend.layout.app')

@section('title',
    'Digital Marketing Company in Mumbai (Call:07208909232) | Digital Marketing Company in Andheri |
    Digital Soch Private Limited')


    @push('extra-head')
        <meta name="description"
            content=" Top Digital Marketing Company in Mumbai (Call:07208909232) offering SEO, PPC, and social media solutions to boost your online presence and grow your brand." />
        <link rel="canonical" href="https://www.digitalsochmedia.com/" />
        <meta http-equiv="content-language" content="en-us" />
        <meta name="robots" content="index, follow" />
        <meta property="og:locale" content="en_IN" />
        <meta property="og:type" content="website" />
        <meta property="og:title"
            content="Digital Marketing Company in Mumbai (Call:07208909232) | Digital Marketing Company in Andheri | Digital Soch Private Limited " />
        <meta property="og:description"
            content=" Top Digital Marketing Company in Mumbai (Call:07208909232) offering SEO, PPC, and social media solutions to boost your online presence and grow your brand." />
        <meta property="og:url" content="https://www.digitalsochmedia.com/" />
        <meta property="og:site_name" content="Digital Soch Private Limited">
        <meta name="geo.position" content="Mumbai">
        <meta name="geo.placename" content="Andheri">
        <meta name="geo.region" content="400053">
        <meta name="revisit-after" content="7 days">
    @endpush

@section('content')
    @php
        $features = [
            ['icon' => '1.jpg', 'title' => 'Adword', 'desc' => 'We manage and optimize your advertising campaigns across Google, Meta, and LinkedIn – ensuring every click counts. Get higher conversions, lower costs, and detailed performance insights.'],
            ['icon' => '2.jpg', 'title' => 'SEO', 'desc' => 'Enhance your website\'s visibility with tailored SEO strategies. We focus on quality content, site performance, and authority building to drive sustainable, long-term growth.'],
            ['icon' => '3.jpg', 'title' => 'ERP Solutions', 'desc' => 'As a reliable ERP application development company in Mumbai, We offers the best quality enterprise resourcing planning (ERP) software and application development bespoke to your businesses at reasonable prices.'],
            ['icon' => '4.jpg', 'title' => 'Ecommerce Website', 'desc' => 'Driven by an intense desire to attain maximum client satisfaction, our team of ecommerce website designers design these website to make it a point that the online shopping becomes a rich exalted experience for the end-user.'],
            ['icon' => '5.jpg', 'title' => 'Domain & Hosting Service', 'desc' => 'Our hosting services also guarantee optimized performance of your website, we provide hosting services for linux, Amazon and windows servers'],
            ['icon' => '6.jpg', 'title' => 'SMS Marketing', 'desc' => 'We work on various popular web development platforms, Systems developed at Digital Soch are fully responsive and tailored to specific and different business needs and innovation'],
            ['icon' => '7.jpg', 'title' => 'Email Marketing', 'desc' => 'Email marketing has the power to speak instantly and directly to your customers and can form a vital part in your online marketing strategy, it is cost effective and ensures your business stands out'],
            ['icon' => '8.jpg', 'title' => 'Whatsapp Marketing', 'desc' => 'It allows businesses to easily interact with customers by using tools to automate, sort and quickly respond to messages, you can save and reuse messages to answer common question more effectively'],
        ];
        $chips = [
            ['icon' => 'fa-magnifying-glass-chart', 'label' => 'SEO'],
            ['icon' => 'fa-google', 'label' => 'Google Ads', 'brand' => true],
            ['icon' => 'fa-share-nodes', 'label' => 'Social Media Marketing'],
            ['icon' => 'fa-laptop-code', 'label' => 'Website Design'],
            ['icon' => 'fa-cart-shopping', 'label' => 'Ecommerce'],
            ['icon' => 'fa-gears', 'label' => 'ERP Solutions'],
            ['icon' => 'fa-whatsapp', 'label' => 'WhatsApp Marketing', 'brand' => true],
            ['icon' => 'fa-server', 'label' => 'Domain & Hosting'],
        ];
        $stats = [
            ['icon' => 'fa-users', 'count' => 5000, 'suffix' => '+', 'label' => 'Satisfied Clients'],
            ['icon' => 'fa-award', 'count' => 15, 'suffix' => '+', 'label' => 'Years of Service'],
            ['icon' => 'fa-user-tie', 'count' => 40, 'suffix' => '+', 'label' => 'Professionals'],
            ['icon' => 'fa-chart-line', 'count' => 86, 'suffix' => '%', 'label' => 'Client Retention'],
        ];
        $steps = [
            ['icon' => 'fa-magnifying-glass', 'title' => 'Discover', 'desc' => 'We learn your business, audience and competition to find the biggest growth opportunities.'],
            ['icon' => 'fa-chess', 'title' => 'Strategy', 'desc' => 'A custom digital plan across SEO, ads, social and web — built around your goals and budget.'],
            ['icon' => 'fa-rocket', 'title' => 'Execute', 'desc' => 'Our specialists launch campaigns, design and develop — fast, polished and on brand.'],
            ['icon' => 'fa-chart-pie', 'title' => 'Grow', 'desc' => 'We track, report and optimise continuously so your ROI keeps climbing month after month.'],
        ];
    @endphp

    {{-- ================= HERO ================= --}}
    <section class="ds-hero ds-hero--video">
        <video class="ds-hero__video" autoplay muted loop playsinline preload="auto"
            poster="{{ asset('assets/img/hero/hero-video-poster.jpg') }}" aria-hidden="true">
            <source src="{{ asset('assets/img/hero/hero-video-web.mp4') }}" type="video/mp4">
        </video>
        <span class="ds-hero__overlay"></span>
        <span class="ds-hero__glow ds-hero__glow--1"></span>
        <span class="ds-hero__glow ds-hero__glow--2"></span>
        <div class="container">
            <div class="ds-hero-slider swiper">
                <div class="swiper-wrapper">
                    @forelse ($sliders as $slider)
                        @php
                            $words = preg_split('/\s+/', trim($slider->title ?? ''));
                            $highlightCount = count($words) > 4 ? 2 : 1;
                            $titleStart = implode(' ', array_slice($words, 0, -$highlightCount));
                            $titleEnd = implode(' ', array_slice($words, -$highlightCount));
                            $sliderLink = $slider->tablename == 'product' ? route('product.show', $slider->slug) : route('package.show', $slider->slug);
                        @endphp
                        <div class="swiper-slide">
                            <div class="ds-hero-slide">
                                <div class="ds-hero__text">
                                    <span class="ds-eyebrow"><i class="fa-solid fa-bolt"></i> Welcome to Digital Soch
                                        Private Limited</span>
                                    @if ($loop->first)
                                        <h1>{{ $titleStart }} <span class="ds-grad-text">{{ $titleEnd }}</span></h1>
                                    @else
                                        <h2 class="ds-hero__title">{{ $titleStart }} <span class="ds-grad-text">{{ $titleEnd }}</span></h2>
                                    @endif
                                    <p>{{ $slider->description }}</p>
                                    <div class="ds-hero__btns">
                                        <a href="{{ $sliderLink }}" class="ds-btn">Get Started <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                        <a href="#" class="ds-btn ds-btn--ghost" data-bs-toggle="modal"
                                            data-bs-target="#myModal"><i class="fa-solid fa-message"></i> Free
                                            Consultation</a>
                                    </div>
                                    <div class="ds-hero__trust">
                                        <span class="ds-stars"><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                                        <span>Google Partner Agency &middot; Trusted by 5000+ clients</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="ds-hero-slide">
                                <div class="ds-hero__text">
                                    <span class="ds-eyebrow"><i class="fa-solid fa-bolt"></i> Welcome to Digital Soch
                                        Private Limited</span>
                                    <h1>Grow Your Business <span class="ds-grad-text">Digitally</span></h1>
                                    <p>SEO, Google Ads, social media marketing and website design that bring you more
                                        traffic, leads and sales.</p>
                                    <div class="ds-hero__btns">
                                        <a href="{{ route('contact') }}" class="ds-btn">Get Started <i
                                                class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            @if ($sliders->count() > 1)
                <div class="ds-hero__controls">
                    <button type="button" class="ds-arrow ds-hero__prev" aria-label="Previous slide"><i
                            class="fa-solid fa-arrow-left"></i></button>
                    <div class="ds-hero__dots ds-dots swiper-pagination"></div>
                    <button type="button" class="ds-arrow ds-hero__next" aria-label="Next slide"><i
                            class="fa-solid fa-arrow-right"></i></button>
                </div>
            @endif

            <ul class="ds-chips">
                @foreach ($chips as $chip)
                    <li><i class="{{ !empty($chip['brand']) ? 'fa-brands' : 'fa-solid' }} {{ $chip['icon'] }}"></i>
                        {{ $chip['label'] }}</li>
                @endforeach
            </ul>

            <div class="ds-stats">
                <h5 class="ds-stats__label">Why Clients Trust Us :</h5>
                @foreach ($stats as $stat)
                    <div class="ds-stat" data-reveal style="--d: {{ $loop->index * 0.1 }}s">
                        <span class="ds-stat__icon"><i class="fa-solid {{ $stat['icon'] }}"></i></span>
                        <div>
                            <span class="ds-stat__num"><span
                                    data-count="{{ $stat['count'] }}">0</span>{{ $stat['suffix'] }}</span>
                            <span class="ds-stat__txt">{{ $stat['label'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= MARQUEE ================= --}}
    <div class="ds-marquee" aria-hidden="true">
        <div class="ds-marquee__track">
            @for ($r = 0; $r < 2; $r++)
                @foreach ($features as $feature)
                    <span class="ds-marquee__item"><i class="fa-solid fa-star-of-life"></i>
                        {{ $feature['title'] }}</span>
                @endforeach
            @endfor
        </div>
    </div>

    {{-- ================= ABOUT ================= --}}
    <section class="ds-section" id="about">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="ds-about__media" data-reveal="left">
                        <span class="ds-about__frame"></span>
                        <div class="ds-about__img">
                            <video autoplay muted loop playsinline preload="metadata"
                                poster="{{ asset('assets/img/about/about-poster.jpg') }}" aria-label="About Digital Soch">
                                <source src="{{ asset('assets/img/about/about-web.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                        <a class="ds-about__play ds-video-pop" href="https://www.youtube.com/watch?v=fhxJcuDtCBU"
                            rel="noopener">
                            <span class="ds-play-btn"><i class="fa-solid fa-play"></i></span>
                            Watch Our Story
                        </a>
                        <div class="ds-about__exp">
                            <strong class="ds-grad-text">15+</strong>
                            <span>Years of<br>Experience</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-reveal="right">
                    <div class="ds-head ds-head--left mb-0">
                        <span class="ds-eyebrow"><i class="fa-solid fa-circle-info"></i> About Us</span>
                        <h2>Choose Digital Soch as your <span class="ds-grad-text">Digital Partner</span></h2>
                    </div>
                    <p class="ds-lead mt-3">Experience the difference with Digital Soch – a trusted name among digital
                        marketing agencies in Mumbai.</p>
                    <ul class="ds-check-list">
                        <li>
                            <i class="fa-solid fa-check"></i>
                            <div>
                                <strong>Specialised &amp; Customised Service</strong>
                                <p>At Digital Soch, we focus on helping businesses expand their customer base through
                                    highly targeted and cost-efficient campaigns. Our digital marketing expertise in
                                    Mumbai is widely recognized, and our growing portfolio of satisfied clients reflects
                                    our ability to design strategies that deliver measurable results and enhance
                                    customer engagement.</p>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-check"></i>
                            <div>
                                <strong>Comprehensive Digital Marketing Solutions</strong>
                                <p>Coordinating multiple marketing agencies can be complex and time-consuming. Digital
                                    Soch simplifies this process by offering a complete range of digital marketing
                                    services under one roof. From strategy and execution to analysis and optimization,
                                    we ensure that every aspect of your online presence works seamlessly to achieve your
                                    business objectives.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('about') }}" class="ds-btn">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= HOW IT WORKS ================= --}}
    <section class="ds-section ds-section--alt">
        <div class="container">
            <div class="ds-head" data-reveal>
                <span class="ds-eyebrow"><i class="fa-solid fa-route"></i> How It Works</span>
                <h2>A Simple, Proven <span class="ds-grad-text">Growth Process</span></h2>
                <p>From first call to measurable results — here's how we turn your goals into growth.</p>
            </div>
            <div class="ds-steps">
                @foreach ($steps as $step)
                    <div class="ds-card ds-step" data-reveal style="--d: {{ $loop->index * 0.12 }}s">
                        <span class="ds-step__num">0{{ $loop->iteration }}</span>
                        <span class="ds-icon"><i class="fa-solid {{ $step['icon'] }}"></i></span>
                        <h3>{{ $step['title'] }}</h3>
                        <p>{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= SERVICES (products) ================= --}}
    <section class="ds-section" id="services">
        <div class="container">
            <div class="ds-head" data-reveal>
                <span class="ds-eyebrow"><i class="fa-solid fa-layer-group"></i> Our Services</span>
                <h2>Our Unique <span class="ds-grad-text">Services</span></h2>
                <p>Our team is dedicated to delivering exceptional IT solutions tailored to meet the unique needs of each
                    client.</p>
            </div>
            <div class="row g-4">
                @foreach ($selectedProducts as $product)
                    <div class="col-lg-4 col-md-6" data-reveal style="--d: {{ ($loop->index % 3) * 0.12 }}s">
                        <article class="ds-service">
                            <a href="{{ route('product.show', $product->slug) }}" class="ds-service__img">
                                <span class="ds-service__tag">{{ $product->subcategory }}</span>
                                <img src="{{ Storage::url($product->product_image) }}" alt="{{ $product->product }}"
                                    width="400" height="300" loading="lazy" decoding="async">
                            </a>
                            <div class="ds-service__body">
                                <h3><a
                                        href="{{ route('product.show', $product->slug) }}">{{ $product->product ?? $product->subcategory }}</a>
                                </h3>
                                <p>{{ Str::limit($product->product_subheading, 120) }}</p>
                                <a href="{{ route('product.show', $product->slug) }}" class="ds-link">Read More <i
                                        class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= FEATURES ================= --}}
    <section class="ds-section ds-section--alt">
        <div class="container">
            <div class="ds-head" data-reveal>
                <span class="ds-eyebrow"><i class="fa-solid fa-wand-magic-sparkles"></i> Our Unique Features</span>
                <h2>Discover What We <span class="ds-grad-text">Do Best</span></h2>
            </div>
            <div class="row g-4">
                @foreach ($features as $feature)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-reveal style="--d: {{ ($loop->index % 4) * 0.1 }}s">
                        <div class="ds-card ds-feature">
                            <span class="ds-feature__icon">
                                <img src="{{ asset('assets/img/icon/' . $feature['icon']) }}"
                                    alt="{{ $feature['title'] }}" width="64" height="64" loading="lazy"
                                    decoding="async">
                            </span>
                            <h3>{{ $feature['title'] }}</h3>
                            <p>{{ $feature['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= CONSULTANCY CTA ================= --}}
    <section class="ds-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-reveal="left">
                    <div class="ds-head ds-head--left mb-4">
                        <span class="ds-eyebrow"><i class="fa-solid fa-handshake"></i> Book A Consultancy</span>
                        <h2>Our mission is to look after the financial best interests with <span
                                class="ds-grad-text">automation</span></h2>
                    </div>
                    <ul class="ds-check-list">
                        <li><i class="fa-solid fa-check"></i>
                            <div><strong>Data-driven campaigns</strong>
                                <p>Every rupee tracked, every lead measured.</p>
                            </div>
                        </li>
                        <li><i class="fa-solid fa-check"></i>
                            <div><strong>Dedicated account manager</strong>
                                <p>One point of contact who knows your business.</p>
                            </div>
                        </li>
                        <li><i class="fa-solid fa-check"></i>
                            <div><strong>Transparent reporting</strong>
                                <p>Clear monthly reports through our client app &amp; CRM.</p>
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('contact') }}" class="ds-btn">Book a Service <i
                                class="fa-solid fa-arrow-right"></i></a>
                        <a href="tel:+917208909232" class="ds-btn ds-btn--ghost"><i class="fa-solid fa-phone"></i>
                            07208909232</a>
                    </div>
                </div>
                <div class="col-lg-6" data-reveal="right">
                    <div class="row g-3">
                        <div class="col-6">
                            <img class="rounded-4 w-100 mb-3" src="{{ asset('assets/img/about/cta1.jpg') }}"
                                alt="Digital marketing team" width="400" height="500" loading="lazy">
                            <img class="rounded-4 w-100" src="{{ asset('assets/img/about/cta3.jpg') }}"
                                alt="Campaign planning" width="400" height="500" loading="lazy">
                        </div>
                        <div class="col-6 pt-5">
                            <img class="rounded-4 w-100 mb-3" src="{{ asset('assets/img/about/cta2.jpg') }}"
                                alt="Website design" width="400" height="500" loading="lazy">
                            <img class="rounded-4 w-100" src="{{ asset('assets/img/about/cta4.jpg') }}"
                                alt="Analytics" width="400" height="500" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= TESTIMONIALS ================= --}}
    <section class="ds-section ds-section--alt">
        <div class="container">
            <div class="ds-head" data-reveal>
                <span class="ds-eyebrow"><i class="fa-solid fa-comments"></i> Testimonial</span>
                <h2>Our Clients Share Their <span class="ds-grad-text">Success Stories</span></h2>
            </div>
            <div class="ds-testi-slider swiper" data-reveal>
                <div class="swiper-wrapper">
                    @forelse ($testimonials as $t)
                        <div class="swiper-slide">
                            <div class="ds-card ds-testi">
                                <i class="fa-solid fa-quote-right ds-testi__quote"></i>
                                <div class="ds-testi__stars">
                                    @for ($i = 1; $i <= $t->star; $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                </div>
                                <p class="ds-testi__text">"{{ $t->review }}"</p>
                                <div class="ds-testi__author">
                                    <img src="{{ $t->image ? asset('storage/' . $t->image) : asset('assets/img/testimonial/default.jpg') }}"
                                        alt="{{ $t->name }}" width="54" height="54" loading="lazy">
                                    <div>
                                        <h4>{{ $t->name }}</h4>
                                        <span>{{ $t->designation }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="ds-card text-center">
                                <p class="mb-0">No testimonials available at the moment.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            @if ($testimonials->count() > 1)
                <div class="ds-slider-nav">
                    <button type="button" class="ds-arrow ds-testi__prev" aria-label="Previous testimonial"><i
                            class="fa-solid fa-arrow-left"></i></button>
                    <button type="button" class="ds-arrow ds-testi__next" aria-label="Next testimonial"><i
                            class="fa-solid fa-arrow-right"></i></button>
                </div>
            @endif
        </div>
    </section>

    {{-- ================= CLIENTS ================= --}}
    <section class="ds-section--tight">
        <div class="container">
            <div class="ds-head mb-4" data-reveal>
                <span class="ds-eyebrow"><i class="fa-solid fa-building"></i> Our Clients</span>
                <h2>Brands That <span class="ds-grad-text">Trust Us</span></h2>
            </div>
        </div>
        <div class="ds-marquee ds-marquee--plain ds-marquee--reverse">
            <div class="ds-marquee__track">
                @for ($r = 0; $r < 2; $r++)
                    @for ($i = 1; $i <= 11; $i++)
                        <div class="ds-logo-item">
                            <img src="{{ asset('assets/img/company/' . $i . '.jpg') }}" alt="Client logo"
                                width="200" height="100" loading="lazy" decoding="async">
                        </div>
                    @endfor
                @endfor
            </div>
        </div>
    </section>

    {{-- ================= BLOG ================= --}}
    <section class="ds-section">
        <div class="container">
            <div class="ds-head" data-reveal>
                <span class="ds-eyebrow"><i class="fa-solid fa-newspaper"></i> Recent Blog Post</span>
                <h2>Read Our <span class="ds-grad-text">Latest Blog</span></h2>
                <p>Our team is dedicated to delivering exceptional IT solutions tailored to meet the unique needs of each
                    client.</p>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse ($blogs as $blog)
                    <div class="col-lg-4 col-md-6" data-reveal style="--d: {{ $loop->index * 0.12 }}s">
                        <article class="ds-post">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="ds-post__img">
                                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/img/blog/blg1.jpg') }}"
                                    alt="{{ $blog->title }}" width="400" height="250" loading="lazy"
                                    decoding="async">
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
                            <p class="mb-0">No blog posts available right now. Please check back soon.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($blogs->count() > 0)
                <div class="text-center mt-5">
                    <a href="{{ route('blog.seeallblogs') }}" class="ds-btn ds-btn--ghost">View All Blogs <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            @endif
        </div>
    </section>
@endsection
