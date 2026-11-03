@extends('frontend.layout.app')

@section('title', 'About Our Agency (Call:07208909232) | Digital Soch Private Limited')

@push('extra-head')
    <meta name="description"
        content="Learn more about our Mumbai-based digital marketing agency (Call:07208909232) — experts in SEO, social media, PPC, and branding strategies that drive measurable growth and online success." />
    <link rel="canonical" href="https://www.digitalsochmedia.com/about-our-agency/" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="robots" content="index, follow" />
    <meta property="og:locale" content="en_IN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="About Our Agency (Call:07208909232) | Digital Soch Private Limited" />
    <meta property="og:description"
        content="Learn more about our Mumbai-based digital marketing agency (Call:07208909232) — experts in SEO, social media, PPC, and branding strategies that drive measurable growth and online success." />
    <meta property="og:url" content="https://www.digitalsochmedia.com/about-our-agency/" />
    <meta property="og:site_name" content="Digital Soch Private Limited">
    <meta name="geo.position" content="Mumbai">
    <meta name="geo.placename" content="Andheri">
    <meta name="geo.region" content="400053">
    <meta name="revisit-after" content="7 days">
@endpush

@section('content')
    @include('frontend.layout.page-hero', [
        'title' => 'About Us',
        'eyebrow' => 'Who We Are',
        'subtitle' => 'One of the foremost digital marketing companies in Mumbai — trusted for our experience and expertise.',
    ])

    @php
        $expertiseSubcategories = [];
        foreach (getCategoryList() as $category) {
            if ($category['category'] === 'Expertise') {
                foreach ($category['subcategories'] as $subcat) {
                    $expertiseSubcategories[] = $subcat['subcategory'];
                }
            }
        }
        $values = [
            ['icon' => 'ic12.svg', 'title' => 'Our Values', 'desc' => 'We emphasize and strive hard to create a best Website Development, Mobile Application, Ecommerce, SEO solutions with of best quality.'],
            ['icon' => 'ic13.svg', 'title' => 'Our Mission', 'desc' => 'To endeavour a quality and best IT Solution for diverse range of business industries from small to big corporation.'],
            ['icon' => 'ic14.svg', 'title' => 'Our Vision', 'desc' => 'To expand our comprehensive service seamlessly to wide range of customers globally'],
        ];
        $counters = [
            ['icon' => 'fa-chart-line', 'count' => 86, 'suffix' => '%', 'label' => 'Client retention'],
            ['icon' => 'fa-award', 'count' => 15, 'suffix' => '+', 'label' => 'Years of service'],
            ['icon' => 'fa-user-tie', 'count' => 40, 'suffix' => '+', 'label' => 'Professionals'],
            ['icon' => 'fa-users', 'count' => 5000, 'suffix' => '+', 'label' => 'Satisfied Clients'],
        ];
    @endphp

    @if (count($expertiseSubcategories) > 0)
        <div class="ds-marquee" aria-hidden="true">
            <div class="ds-marquee__track">
                @for ($r = 0; $r < 2; $r++)
                    @foreach ($expertiseSubcategories as $subcategory)
                        <span class="ds-marquee__item"><i class="fa-solid fa-star-of-life"></i>
                            {{ $subcategory }}</span>
                    @endforeach
                @endfor
            </div>
        </div>
    @endif

    <section class="ds-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="ds-about__media" data-reveal="left">
                        <span class="ds-about__frame"></span>
                        <div class="ds-about__img">
                            <video autoplay muted loop playsinline preload="metadata"
                                poster="{{ asset('assets/img/about/about-poster.jpg') }}" aria-label="Digital Soch team">
                                <source src="{{ asset('assets/img/about/about-web.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                        <div class="ds-about__exp">
                            <strong class="ds-grad-text">5000+</strong>
                            <span>Satisfied<br>Clients</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-reveal="right">
                    <div class="ds-head ds-head--left mb-4">
                        <span class="ds-eyebrow"><i class="fa-solid fa-circle-info"></i> About Us</span>
                        <h2>Welcome To <span class="ds-grad-text">Digital Soch</span></h2>
                    </div>
                    <p class="ds-lead">DIGITAL SOCH is equipped with a team of trained professionals and latest
                        technology for digital marketing and website designing services in Mumbai.</p>
                    <p>We have a team of experienced and trained professionals whose digital marketing and web designing
                        services in Mumbai are best in the industries such as IT, Hospitality, tour &amp; travel, media,
                        real estate and many more. We focus on providing digital marketing solutions to enhance your
                        online presence, brand awareness and generate a high return on investment.</p>
                    <p>Our panel of experts has helped a number of customers to achieve good search engine ranking by
                        creating and implementing right digital marketing strategies that best suits the specific needs
                        and demands of the customers. DIGITAL SOCH has a right solution for you whether you are looking
                        for SEO, PPC, Social Media Marketing, or Website Designing services that best suit the specific
                        needs and demands of our businesses in Mumbai and other parts of Maharashtra.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ds-section ds-section--alt">
        <div class="container">
            <div class="row g-4">
                @foreach ($values as $value)
                    <div class="col-lg-4 col-md-6" data-reveal style="--d: {{ $loop->index * 0.12 }}s">
                        <div class="ds-card text-center">
                            <span class="ds-feature__icon d-inline-flex mb-4">
                                <img src="{{ asset('assets/img/icon/' . $value['icon']) }}" alt="">
                            </span>
                            <h3 style="font-size:22px">{{ $value['title'] }}</h3>
                            <p class="mb-0">{{ $value['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ds-section ds-section--tight">
        <div class="container">
            <div class="row g-4">
                @foreach ($counters as $counter)
                    <div class="col-lg-3 col-6" data-reveal style="--d: {{ $loop->index * 0.1 }}s">
                        <div class="ds-card text-center">
                            <span class="ds-icon mb-3"><i class="fa-solid {{ $counter['icon'] }}"></i></span>
                            <div class="ds-stat__num" style="font-size:40px"><span
                                    data-count="{{ $counter['count'] }}">0</span>{{ $counter['suffix'] }}</div>
                            <p class="mb-0 mt-1">{{ $counter['label'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ds-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-lg-2" data-reveal="right">
                    <div class="ds-head ds-head--left mb-4">
                        <span class="ds-eyebrow"><i class="fa-solid fa-thumbs-up"></i> Why Choose Us</span>
                        <h2>Increasing <span class="ds-grad-text">Business Success</span></h2>
                    </div>
                    <p>Choose us for our round-the-clock IT support, expert technicians, fast response times, and
                        commitment to customer satisfaction. We deliver tailored solutions that keep your systems running
                        smoothly and securely. With proactive monitoring, reliable service, and years of industry
                        experience, we ensure minimal downtime and maximum efficiency for your business operations.</p>
                    <ul class="ds-check-list">
                        <li><i class="fa-solid fa-check"></i>
                            <div><strong>Expertise &amp; Experience</strong>
                                <p>Decades of proven expertise delivering reliable, professional, and trusted services.</p>
                            </div>
                        </li>
                        <li><i class="fa-solid fa-check"></i>
                            <div><strong>Custom IT Solutions</strong>
                                <p>Tailored IT solutions boosting efficiency, security, and business growth seamlessly.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('contact') }}" class="ds-btn">Get Started <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="col-lg-6 order-lg-1" data-reveal="left">
                    <div class="ds-card p-4">
                        <img class="rounded-4 w-100" src="{{ asset('assets/img/bg/ab-bg2.jpg') }}"
                            alt="Assisting clients get new customers" loading="lazy">
                        <h3 class="mt-4" style="font-size:22px">Assisting Clients Get New Customers Everyday</h3>
                        <p class="mb-0">Digital Soch, one of the foremost Digital Marketing Company in Mumbai, started to
                            offer professional digital marketing services. From setting new quality standards then to
                            creating new landmarks now, we are trusted for our experience and expertise.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
