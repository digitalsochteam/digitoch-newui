{{-- Inner page hero. Params: $title, $crumb (optional), $eyebrow (optional), $subtitle (optional) --}}
<section class="ds-page-hero">
    <div class="container">
        @if (!empty($eyebrow))
            <span class="ds-eyebrow"><i class="fa-solid fa-bolt"></i> {{ $eyebrow }}</span>
        @endif
        <h1>{{ $title }}</h1>
        @if (!empty($subtitle))
            <p>{{ $subtitle }}</p>
        @endif
        <ul class="ds-crumbs">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>{{ $crumb ?? $title }}</li>
        </ul>
    </div>
</section>
