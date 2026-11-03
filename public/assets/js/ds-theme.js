/* Digital Soch — frontend theme behaviour */
(function () {
    'use strict';

    document.documentElement.classList.remove('no-js');

    function ready(fn) {
        if (document.readyState !== 'loading') {
            fn();
        } else {
            document.addEventListener('DOMContentLoaded', fn);
        }
    }

    ready(function () {
        var body = document.body;

        // Sticky header + back-to-top
        var header = document.querySelector('.ds-header');
        var toTop = document.querySelector('.ds-fab--top');
        function onScroll() {
            var y = window.scrollY || window.pageYOffset;
            if (header) header.classList.toggle('is-scrolled', y > 40);
            if (toTop) toTop.classList.toggle('is-visible', y > 600);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
        if (toTop) {
            toTop.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // Mobile drawer
        var drawer = document.querySelector('.ds-drawer');
        function setDrawer(open) {
            if (!drawer) return;
            drawer.classList.toggle('is-open', open);
            drawer.setAttribute('aria-hidden', open ? 'false' : 'true');
            body.classList.toggle('ds-lock', open);
        }
        document.querySelectorAll('[data-drawer-open]').forEach(function (btn) {
            btn.addEventListener('click', function () { setDrawer(true); });
        });
        document.querySelectorAll('[data-drawer-close]').forEach(function (btn) {
            btn.addEventListener('click', function () { setDrawer(false); });
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') setDrawer(false);
        });

        // Sliders
        if (window.Swiper) {
            if (document.querySelector('.ds-hero-slider')) {
                new Swiper('.ds-hero-slider', {
                    loop: document.querySelectorAll('.ds-hero-slider .swiper-slide').length > 1,
                    effect: 'fade',
                    fadeEffect: { crossFade: true },
                    speed: 900,
                    autoplay: { delay: 6000, disableOnInteraction: false },
                    pagination: { el: '.ds-hero__dots', clickable: true },
                    navigation: { nextEl: '.ds-hero__next', prevEl: '.ds-hero__prev' }
                });
            }
            if (document.querySelector('.ds-testi-slider')) {
                new Swiper('.ds-testi-slider', {
                    loop: false,
                    spaceBetween: 24,
                    speed: 700,
                    autoplay: { delay: 5000, disableOnInteraction: false },
                    navigation: { nextEl: '.ds-testi__next', prevEl: '.ds-testi__prev' },
                    slidesPerView: 1,
                    breakpoints: {
                        768: { slidesPerView: 2 },
                        1200: { slidesPerView: 3 }
                    }
                });
            }
        }

        // Video popups
        if (window.jQuery && jQuery.fn.magnificPopup) {
            jQuery('.ds-video-pop').magnificPopup({
                type: 'iframe',
                removalDelay: 200,
                mainClass: 'mfp-fade'
            });
        }

        // Reveal on scroll + counters
        var counters = document.querySelectorAll('[data-count]');
        function runCounter(el) {
            var target = parseFloat(el.getAttribute('data-count')) || 0;
            var decimals = (el.getAttribute('data-count').split('.')[1] || '').length;
            var start = null;
            var duration = 1800;
            function step(ts) {
                if (!start) start = ts;
                var p = Math.min((ts - start) / duration, 1);
                var eased = 1 - Math.pow(1 - p, 3);
                el.textContent = (target * eased).toFixed(decimals);
                if (p < 1) requestAnimationFrame(step);
            }
            requestAnimationFrame(step);
        }

        var revealEls = document.querySelectorAll('[data-reveal]');
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;
                    var el = entry.target;
                    if (el.hasAttribute('data-count')) {
                        runCounter(el);
                    } else {
                        el.classList.add('is-in');
                    }
                    io.unobserve(el);
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
            revealEls.forEach(function (el) { io.observe(el); });
            counters.forEach(function (el) { io.observe(el); });
        } else {
            revealEls.forEach(function (el) { el.classList.add('is-in'); });
        }

        // Auto-open quote modal after 30 seconds (once per page view)
        setTimeout(function () {
            var modalEl = document.getElementById('myModal');
            if (!modalEl || !window.bootstrap || modalEl.classList.contains('show')) return;
            if (document.querySelector('.modal.show')) return;
            bootstrap.Modal.getOrCreateInstance(modalEl).show();
        }, 30000);
    });
})();
