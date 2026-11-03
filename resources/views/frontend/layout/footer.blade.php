<footer class="ds-footer">
    <div class="container">
        <div class="ds-cta mb-5" data-reveal>
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2>Ready to grow your business online?</h2>
                    <p>Let's build a digital strategy that brings you more traffic, leads and sales.</p>
                </div>
                <div class="col-lg-5">
                    <div class="ds-cta__actions">
                        <a href="#" class="ds-btn" data-bs-toggle="modal" data-bs-target="#myModal">Get a Free
                            Proposal <i class="fa-solid fa-arrow-right"></i></a>
                        <a href="tel:+917208909232" class="ds-btn ds-btn--ghost"><i class="fa-solid fa-phone"></i> Call
                            Us</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-5 pt-5">
            <div class="col-lg-4 col-md-12">
                <div class="ds-footer__brand">
                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <a href="{{ url('/') }}" class="ds-logo">
                            <img src="{{ asset('assets/img/logo/logo.png') }}" alt="company logo" width="190"
                                height="40">
                        </a>
                        <a href="https://www.google.com/partners/agency?id=1250360958" target="_blank"
                            rel="noopener" class="ds-partner d-inline-block mb-4">
                            <img src="{{ asset('assets/img/logo/partner-badge-two.png') }}" alt="partner badge">
                        </a>
                    </div>
                    <p>DIGITAL SOCH is equipped with a team of trained professionals and latest technology for digital
                        marketing and website designing services in Mumbai. We serve industries such as IT,
                        Hospitality, tour &amp; travel, media, real estate and many more — enhancing your online
                        presence, brand awareness and return on investment.</p>
                    <div class="ds-social">
                        <a href="https://www.facebook.com/Digital.Soch.Pvt.Ltd/" target="_blank"
                            rel="noopener noreferrer" aria-label="Visit our Facebook page"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/digitalsochpvtltd/" target="_blank"
                            rel="noopener noreferrer" aria-label="Visit our Instagram profile"><i
                                class="fa-brands fa-instagram"></i></a>
                        <a href="https://x.com/digital_Soch_M" target="_blank" rel="noopener noreferrer"
                            aria-label="Visit our Twitter profile"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="https://www.youtube.com/channel/UCLnmfBKs2zEWqEYJdvU1jKQ" target="_blank"
                            rel="noopener noreferrer" aria-label="Visit our YouTube channel"><i
                                class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <h4>Quick Links</h4>
                <ul class="ds-footer__links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('blog.seeallblogs') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('qrcode') }}">Pay / QR Code</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <h4>Portfolio</h4>
                <ul class="ds-footer__links">
                    <li><a href="{{ route('website.seeallwebsites') }}">Websites</a></li>
                    <li><a href="{{ route('logo.seealllogos') }}">Logos</a></li>
                    <li><a href="{{ route('video.seeallvideos') }}">Videos</a></li>
                    <li><a href="{{ route('post.seeallposts') }}">Posts</a></li>
                    @foreach (getPackages()->take(2) as $package)
                        <li><a
                                href="{{ route('package.show', strtolower(str_replace(' ', '-', $package->slug))) }}">{{ $package->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-4 col-md-4">
                <h4>Contact Us</h4>
                <ul class="ds-footer__contact">
                    <li><i class="fa-solid fa-location-dot"></i>
                        <span>105, Akruti Star, MIDC Central Rd, Kondivita, Andheri East, Mumbai, Maharashtra
                            400093</span>
                    </li>
                    <li><i class="fa-solid fa-location-dot"></i>
                        <span>Balaji Complex, Office Number 301A, Opp Salave Garden Iskon Temple - Gangadham Rd, Pune,
                            Maharashtra 411048</span>
                    </li>
                    <li><i class="fa-solid fa-phone"></i>
                        <span><a href="tel:02240030857">022-40030857</a> / <a href="tel:1800120444445">1800-1204-444-45</a>
                            (Toll Free)</span>
                    </li>
                    <li><i class="fa-solid fa-envelope"></i>
                        <span><a href="mailto:info@digitalsochmedia.com">info@digitalsochmedia.com</a><br>
                            <a href="mailto:support@digitalsochmedia.com">support@digitalsochmedia.com</a></span>
                    </li>
                </ul>
                <div class="ds-footer__btns">
                    <a href="{{ route('qrcode') }}" class="ds-btn ds-btn--ghost ds-btn--sm"><i
                            class="fa-solid fa-qrcode"></i> QR Code</a>
                    <a href="https://crm.digitalsochmedia.com/login" target="_blank" rel="noopener"
                        class="ds-btn ds-btn--ghost ds-btn--sm"><i class="fa-solid fa-lock"></i> CRM Login</a>
                </div>
                <div class="ds-footer__apps">
                    <a href="https://play.google.com/store/apps/details?id=com.digital.soch.Customer"
                        target="_blank" rel="noopener">
                        <img src="{{ asset('assets/img/logo/playstore.svg') }}" alt="Google Play Store"></a>
                    <a href="https://apps.apple.com/us/app/digital-soch-customer/id6746125451" target="_blank"
                        rel="noopener">
                        <img src="{{ asset('assets/img/logo/appstore.svg') }}" alt="App Store"></a>
                </div>
            </div>
        </div>

        <div class="ds-footer__bottom">
            <p>Copyright &copy; {{ date('Y') }} Digital Soch Pvt. Ltd. All Rights Reserved.</p>
            <ul class="ds-footer__legal">
                <li><a href="{{ route('cancellationrefundpolicy') }}">Cancellation &amp; Refund Policy</a></li>
                <li><a href="{{ route('termsandcondition') }}">Terms And Conditions</a></li>
                <li><a href="{{ route('privacypolicy') }}">Privacy Policy</a></li>
            </ul>
        </div>
    </div>
</footer>
