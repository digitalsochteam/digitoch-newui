<!DOCTYPE html>
<html lang="en" class="no-js">
@include('frontend.layout.head')

<body class="ds-body">

    @include('frontend.layout.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.layout.footer')

    <!-- Floating actions -->
    <a href="https://api.whatsapp.com/send?phone=917208909232" class="ds-fab ds-fab--wa" target="_blank"
        rel="noopener" aria-label="Chat with us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="#" class="ds-fab ds-fab--quote" data-bs-toggle="modal" data-bs-target="#myModal"
        aria-label="Get a Quote">
        <i class="fa-solid fa-message"></i> <span>Get a Quote</span>
    </a>

    <button type="button" class="ds-fab ds-fab--top" aria-label="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Quote Modal -->
    <div class="modal fade ds-modal" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="ds-modal__head">
                    <span class="ds-eyebrow"><i class="fa-solid fa-bolt"></i> Free Consultation</span>
                    <h2 id="myModalLabel">Get a <span class="ds-grad-text">Free Quote</span></h2>
                    <p>Tell us about your project and our experts will get back to you shortly.</p>
                    <button class="ds-modal__close" type="button" data-bs-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="ds-modal__body">
                    <form action="{{ route('quote-lead-details.store') }}" method="POST">
                        @csrf
                        <input type="text" name="fullname" id="fullName" class="ds-input" required
                            value="{{ old('fullname') }}" placeholder="Full Name">
                        @error('fullname')
                            <span class="ds-error">{{ $message }}</span>
                        @enderror

                        <input type="text" name="city" id="city" class="ds-input" required
                            value="{{ old('city') }}" placeholder="City">
                        @error('city')
                            <span class="ds-error">{{ $message }}</span>
                        @enderror

                        <div class="ds-form-row">
                            <div>
                                <input type="tel" name="mobile" id="mobile" class="ds-input" required
                                    value="{{ old('mobile') }}" placeholder="Mobile" pattern="[0-9]{10}"
                                    title="Enter 10 digit mobile number">
                                @error('mobile')
                                    <span class="ds-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <input type="email" name="email" id="email" class="ds-input" required
                                    value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                    <span class="ds-error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <input type="text" name="subject" id="subject" class="ds-input" required
                            value="{{ old('subject') }}" placeholder="Subject">
                        @error('subject')
                            <span class="ds-error">{{ $message }}</span>
                        @enderror

                        <textarea name="message" id="message" class="ds-input" placeholder="Message" required>{{ old('message') }}</textarea>
                        @error('message')
                            <span class="ds-error">{{ $message }}</span>
                        @enderror

                        <button type="submit" class="ds-btn ds-btn--block">Submit Request <i
                                class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.layout.script')
</body>

</html>
