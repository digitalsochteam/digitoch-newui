@php
    // Build the services menu once from the product catalogue, reused by desktop + mobile nav.
    $navCategories = [];
    foreach (getCategoryList() as $category) {
        $groups = [];
        $singles = [];
        foreach ($category['subcategories'] ?? [] as $subcategory) {
            $validProducts = array_filter($subcategory['products'] ?? [], fn($p) => !empty($p));
            if (count($validProducts) === 0) {
                continue;
            }
            $first = reset($validProducts);
            if ($first['name'] == null) {
                $singles[] = ['name' => $subcategory['subcategory'], 'slug' => $first['slug']];
            } else {
                $groups[] = ['name' => $subcategory['subcategory'], 'products' => $validProducts];
            }
        }
        $navCategories[] = ['name' => $category['category'], 'groups' => $groups, 'singles' => $singles];
    }
    $navPackages = getPackages();
    $portfolioLinks = [
        ['label' => 'Websites', 'route' => 'website.seeallwebsites'],
        ['label' => 'Logos', 'route' => 'logo.seealllogos'],
        ['label' => 'Videos', 'route' => 'video.seeallvideos'],
        ['label' => 'Posts', 'route' => 'post.seeallposts'],
    ];
    $socialLinks = [
        ['url' => 'https://www.facebook.com/Digital.Soch.Pvt.Ltd/', 'icon' => 'fa-facebook-f', 'label' => 'Facebook'],
        ['url' => 'https://www.instagram.com/digitalsochpvtltd/', 'icon' => 'fa-instagram', 'label' => 'Instagram'],
        ['url' => 'https://x.com/digital_Soch_M', 'icon' => 'fa-x-twitter', 'label' => 'X (Twitter)'],
        ['url' => 'https://www.youtube.com/channel/UCLnmfBKs2zEWqEYJdvU1jKQ', 'icon' => 'fa-youtube', 'label' => 'YouTube'],
    ];
@endphp

<div class="ds-topbar">
    <div class="container">
        <div class="ds-topbar__info">
            <span><i class="fa-solid fa-location-dot"></i> Andheri East, Mumbai - 400093</span>
            <a href="mailto:info@digitalsochmedia.com"><i class="fa-solid fa-envelope"></i>
                info@digitalsochmedia.com</a>
            <a href="tel:02240030857"><i class="fa-solid fa-phone"></i> 022-40030857</a>
        </div>
        <div class="ds-topbar__social">
            <span>Follow Us:</span>
            @foreach ($socialLinks as $social)
                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                    aria-label="Visit our {{ $social['label'] }} page"><i class="fa-brands {{ $social['icon'] }}"></i></a>
            @endforeach
        </div>
    </div>
</div>

<header class="ds-header">
    <div class="container">
        <div class="ds-header__inner">
            <a href="{{ url('/') }}" class="ds-logo" aria-label="Digital Soch home">
                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="Digital Soch logo" width="190"
                    height="40">
            </a>

            <nav class="ds-nav" aria-label="Main navigation">
                <ul class="ds-nav__list">
                    <li class="ds-nav__item">
                        <a href="{{ url('/') }}"
                            class="ds-nav__link {{ request()->is('/') ? 'is-active' : '' }}">Home</a>
                    </li>
                    <li class="ds-nav__item">
                        <a href="{{ route('about') }}"
                            class="ds-nav__link {{ request()->routeIs('about') ? 'is-active' : '' }}">About</a>
                    </li>

                    @foreach ($navCategories as $navCategory)
                        <li class="ds-nav__item">
                            <a class="ds-nav__link" tabindex="0">{{ $navCategory['name'] }} <i
                                    class="fa-solid fa-angle-down"></i></a>

                            @if (count($navCategory['groups']) > 0)
                                <div class="ds-drop ds-drop--mega">
                                    <div class="ds-mega">
                                        @if (count($navCategory['singles']) > 0)
                                            <div class="ds-mega__singles">
                                                @foreach ($navCategory['singles'] as $single)
                                                    <a class="ds-mega__single"
                                                        href="{{ route('product.show', $single['slug']) }}">{{ $single['name'] }}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                        @foreach ($navCategory['groups'] as $group)
                                            <div class="ds-mega__group">
                                                <span class="ds-mega__title">{{ $group['name'] }}</span>
                                                <ul class="ds-drop__list">
                                                    @foreach ($group['products'] as $product)
                                                        <li><a
                                                                href="{{ route('product.show', $product['slug']) }}">{{ $product['name'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @elseif (count($navCategory['singles']) > 0)
                                <div class="ds-drop">
                                    <ul class="ds-drop__list">
                                        @foreach ($navCategory['singles'] as $single)
                                            <li><a
                                                    href="{{ route('product.show', $single['slug']) }}">{{ $single['name'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach

                    <li class="ds-nav__item">
                        <a class="ds-nav__link" tabindex="0">Portfolio <i class="fa-solid fa-angle-down"></i></a>
                        <div class="ds-drop">
                            <ul class="ds-drop__list">
                                @foreach ($portfolioLinks as $link)
                                    <li><a href="{{ route($link['route']) }}">{{ $link['label'] }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>

                    <li class="ds-nav__item">
                        <a class="ds-nav__link" tabindex="0">Packages <i class="fa-solid fa-angle-down"></i></a>
                        @if ($navPackages->count() > 0)
                            <div class="ds-drop">
                                <ul class="ds-drop__list">
                                    @foreach ($navPackages as $package)
                                        <li><a
                                                href="{{ route('package.show', strtolower(str_replace(' ', '-', $package->slug))) }}">{{ $package->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>

                    <li class="ds-nav__item">
                        <a href="{{ route('blog.seeallblogs') }}"
                            class="ds-nav__link {{ request()->routeIs('blog.*') ? 'is-active' : '' }}">Blog</a>
                    </li>
                    <li class="ds-nav__item">
                        <a href="{{ route('contact') }}"
                            class="ds-nav__link {{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact</a>
                    </li>
                </ul>
            </nav>

            <div class="ds-header__actions">
                <a href="https://client.digitalsochmedia.com/login" target="_blank" rel="noopener"
                    class="ds-btn ds-btn--ghost ds-btn--sm"><i class="fa-solid fa-lock"></i> Login</a>
                <a href="#" class="ds-btn ds-btn--sm" data-bs-toggle="modal" data-bs-target="#myModal"><i
                        class="fa-solid fa-bolt"></i> Get Quote</a>
                <a href="https://www.google.com/partners/agency?id=1250360958" target="_blank" rel="noopener"
                    class="ds-partner"><img src="{{ asset('assets/img/logo/partner-badge-two.png') }}"
                        alt="Google Partner badge"></a>
                <button class="ds-burger" type="button" data-drawer-open aria-label="Open mobile menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Drawer -->
<div class="ds-drawer" aria-hidden="true">
    <div class="ds-drawer__overlay" data-drawer-close></div>
    <aside class="ds-drawer__panel" aria-label="Mobile navigation">
        <div class="ds-drawer__top">
            <a href="{{ url('/') }}" class="ds-logo"><img src="{{ asset('assets/img/logo/logo.png') }}"
                    alt="Digital Soch logo"></a>
            <button class="ds-drawer__close" type="button" data-drawer-close aria-label="Close menu">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <ul class="ds-mnav">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>

            @foreach ($navCategories as $navCategory)
                <li>
                    <details>
                        <summary>{{ $navCategory['name'] }}</summary>
                        <ul>
                            @foreach ($navCategory['singles'] as $single)
                                <li><a
                                        href="{{ route('product.show', $single['slug']) }}">{{ $single['name'] }}</a>
                                </li>
                            @endforeach
                            @foreach ($navCategory['groups'] as $group)
                                <li>
                                    <details>
                                        <summary>{{ $group['name'] }}</summary>
                                        <ul>
                                            @foreach ($group['products'] as $product)
                                                <li><a
                                                        href="{{ route('product.show', $product['slug']) }}">{{ $product['name'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </details>
                                </li>
                            @endforeach
                        </ul>
                    </details>
                </li>
            @endforeach

            <li>
                <details>
                    <summary>Portfolio</summary>
                    <ul>
                        @foreach ($portfolioLinks as $link)
                            <li><a href="{{ route($link['route']) }}">{{ $link['label'] }}</a></li>
                        @endforeach
                    </ul>
                </details>
            </li>

            @if ($navPackages->count() > 0)
                <li>
                    <details>
                        <summary>Packages</summary>
                        <ul>
                            @foreach ($navPackages as $package)
                                <li><a
                                        href="{{ route('package.show', strtolower(str_replace(' ', '-', $package->slug))) }}">{{ $package->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </details>
                </li>
            @endif

            <li><a href="{{ route('blog.seeallblogs') }}">Blog</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>

        <div class="ds-drawer__cta">
            <a href="#" class="ds-btn" data-bs-toggle="modal" data-bs-target="#myModal" data-drawer-close><i
                    class="fa-solid fa-bolt"></i> Get a Free Quote</a>
            <a href="https://client.digitalsochmedia.com/login" target="_blank" rel="noopener"
                class="ds-btn ds-btn--ghost"><i class="fa-solid fa-lock"></i> Login</a>
        </div>

        <div class="ds-drawer__social">
            @foreach ($socialLinks as $social)
                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer"
                    aria-label="Visit our {{ $social['label'] }} page"><i class="fa-brands {{ $social['icon'] }}"></i></a>
            @endforeach
        </div>
    </aside>
</div>
