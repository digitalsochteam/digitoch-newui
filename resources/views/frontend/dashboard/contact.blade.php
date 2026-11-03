@extends('frontend.layout.app')

@section('title', 'Contact Us 07208909232 | Digital Soch Private Limited')

@push('extra-head')
    <meta name="description"
        content="Get in touch with Digital Soch Private Limited — your trusted digital marketing partner in Mumbai. (Call 07208909232) or email us to discuss your business goals." />
    <link rel="canonical" href="https://www.digitalsochmedia.com/contact-information" />
    <meta http-equiv="content-language" content="en-us" />
    <meta name="robots" content="index, follow" />
    <meta property="og:locale" content="en_IN" />
    <meta property="og:type" content="website" />
    <meta property="og:title"
        content="Contact Digital Soch | Digital Marketing Agency in Mumbai (Call:07208909232) | Digital Soch Private
    Limited" />
    <meta property="og:description"
        content="Get in touch with Digital Soch Private Limited — your trusted digital marketing partner in Mumbai. (Call 07208909232) or email us to discuss your business goals." />
    <meta property="og:url" content="https://www.digitalsochmedia.com/contact-information" />
    <meta property="og:site_name" content="Digital Soch Private Limited">
    <meta name="geo.position" content="Mumbai">
    <meta name="geo.placename" content="Andheri">
    <meta name="geo.region" content="400053">
    <meta name="revisit-after" content="7 days">
@endpush

@section('content')
    @include('frontend.layout.page-hero', [
        'title' => 'Contact Us',
        'eyebrow' => 'Get In Touch',
        'subtitle' => 'Have a project in mind? We would love to hear from you.',
    ])

    @php
        $contactCards = [
            ['icon' => 'fa-location-dot', 'title' => 'Mumbai (Head Office)', 'text' => '105, Ackruti Star, MIDC Central Road, Andheri East, Mumbai - 400093'],
            ['icon' => 'fa-location-dot', 'title' => 'Pune', 'text' => 'Balaji Complex, Office Number 301A, Opp Salave Garden Iskon Temple - Gangadham Rd, Pune, Maharashtra 411048'],
            ['icon' => 'fa-envelope', 'title' => 'Email Address', 'html' => '<a href="mailto:info@digitalsochmedia.com">info@digitalsochmedia.com</a><br><a href="mailto:support@digitalsochmedia.com">support@digitalsochmedia.com</a>'],
            ['icon' => 'fa-clock', 'title' => 'Business Hours', 'text' => 'Monday - Friday: 9:00 AM - 6:00 PM, Saturday - Sunday: Closed'],
        ];
    @endphp

    <section class="ds-section pt-0">
        <div class="container">
            <div class="row g-4">
                @foreach ($contactCards as $card)
                    <div class="col-lg-3 col-md-6" data-reveal style="--d: {{ $loop->index * 0.1 }}s">
                        <div class="ds-card ds-contact-card">
                            <span class="ds-icon"><i class="fa-solid {{ $card['icon'] }}"></i></span>
                            <div>
                                <h3>{{ $card['title'] }}</h3>
                                @if (isset($card['html']))
                                    <p>{!! $card['html'] !!}</p>
                                @else
                                    <p>{{ $card['text'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row g-4 mt-2">
                <div class="col-lg-7" data-reveal="left">
                    <div class="ds-form-wrap">
                        <div class="ds-head ds-head--left mb-4">
                            <span class="ds-eyebrow"><i class="fa-solid fa-paper-plane"></i> Contact Us</span>
                            <h2>Let's Start <span class="ds-grad-text">Creating Together!</span></h2>
                        </div>
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="row g-0 gx-3">
                                <div class="col-md-6">
                                    <input type="text" name="first_name" placeholder="First Name*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" placeholder="Last Name*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="Your Email*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone" placeholder="Phone Number*" required>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="subject" placeholder="Your Subject*" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" placeholder="Write your message*" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="ds-btn">Send Message <i
                                            class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5" data-reveal="right">
                    <div class="ds-map h-100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.754275298654!2d72.86789617618025!3d19.118432882094897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c9b60f18b0cd%3A0xd709987cd37f659!2sDigital%20Soch%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1759219228130!5m2!1sen!2sin"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" title="Digital Soch office location"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
