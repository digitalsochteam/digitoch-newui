<div class="quote-popup-wrapper">
    <button class="popup-trigger-btn {{ $buttonClass }}" onclick="openQuotePopup()">
        {{ $buttonText }}
    </button>

    <div class="popup-overlay" id="quotePopupOverlay" onclick="closeQuotePopupOnOverlay(event)">
        <div class="popup-container">
            <div class="popup-header">
                <h2 class="popup-title">{{ $title }}</h2>
                <button class="popup-close-btn" onclick="closeQuotePopup()">&times;</button>
            </div>
            <div class="popup-body">
                <form class="popup-form" action="" method="POST" onsubmit="handleQuoteSubmit(event)">
                    @csrf

                    <div class="popup-form-group">
                        <label class="popup-label" for="fullName">Full Name *</label>
                        <input type="text" name="full_name" id="fullName" class="popup-input" required
                            value="{{ old('full_name') }}">
                        @error('full_name')
                            <span class="popup-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="popup-form-group">
                        <label class="popup-label" for="address">Address *</label>
                        <input type="text" name="address" id="address" class="popup-input" required
                            value="{{ old('address') }}">
                        @error('address')
                            <span class="popup-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="popup-form-group">
                        <label class="popup-label" for="city">City *</label>
                        <input type="text" name="city" id="city" class="popup-input" required
                            value="{{ old('city') }}">
                        @error('city')
                            <span class="popup-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="popup-form-group">
                        <label class="popup-label" for="mobile">Mobile *</label>
                        <input type="tel" name="mobile" id="mobile" class="popup-input" required
                            value="{{ old('mobile') }}">
                        @error('mobile')
                            <span class="popup-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="popup-form-group">
                        <label class="popup-label" for="email">Email *</label>
                        <input type="email" name="email" id="email" class="popup-input" required
                            value="{{ old('email') }}">
                        @error('email')
                            <span class="popup-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="popup-form-group">
                        <label class="popup-label" for="subject">Subject *</label>
                        <input type="text" name="subject" id="subject" class="popup-input" required
                            value="{{ old('subject') }}">
                        @error('subject')
                            <span class="popup-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="popup-form-group">
                        <label class="popup-label" for="message">Message *</label>
                        <textarea name="message" id="message" class="popup-textarea" required>{{ old('message') }}</textarea>
                        @error('message')
                            <span class="popup-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="popup-submit-btn">Submit Request</button>
                </form>
            </div>
        </div>
    </div>



</div>



@once
    <style>
        .popup-trigger-btn {
            padding: 16px 48px;
            font-size: 18px;
            font-weight: 600;
            background: linear-gradient(135deg, #0b3c66 0%, #094a7a 100%);
            color: #fff;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(11, 60, 102, 0.3);
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        @media (max-width: 768px) {
            .popup-trigger-btn {
                padding: 14px 36px;
                font-size: 16px;
            }
        }

        .popup-trigger-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(11, 60, 102, 0.5);
            background: linear-gradient(135deg, #094a7a 0%, #0b3c66 100%);
        }

        .popup-trigger-btn:active {
            transform: translateY(-1px);
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(11, 60, 102, 0.85) 0%, rgba(9, 74, 122, 0.85) 100%);
            z-index: 1000;
            backdrop-filter: blur(8px);
            padding: 20px;
        }

        .popup-overlay.popup-active {
            display: flex;
            justify-content: center;
            align-items: center;
            animation: popup-fadeIn 0.4s ease;
        }

        @keyframes popup-fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .popup-container {
            background: #ffffff;
            border-radius: 24px;
            width: 95%;
            max-width: 750px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            animation: popup-slideUp 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @media (max-width: 768px) {
            .popup-container {
                width: 95%;
                max-width: 100%;
                border-radius: 20px;
            }
        }

        @media (max-width: 480px) {
            .popup-container {
                width: 100%;
                border-radius: 16px;
                max-height: 100vh;
            }
        }

        @keyframes popup-slideUp {
            from {
                transform: translateY(60px) scale(0.95);
                opacity: 0;
            }

            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        .popup-header {
            background: linear-gradient(135deg, #0b3c66 0%, #094a7a 100%);
            color: white;
            padding: 35px 30px;
            border-radius: 24px 24px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(11, 60, 102, 0.2);
            position: relative;
            overflow: hidden;
        }

        .popup-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: popup-shine 3s infinite;
        }

        @keyframes popup-shine {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(-20px, -20px);
            }
        }

        @media (max-width: 768px) {
            .popup-header {
                padding: 28px 24px;
                border-radius: 20px 20px 0 0;
            }
        }

        @media (max-width: 480px) {
            .popup-header {
                padding: 24px 20px;
                border-radius: 16px 16px 0 0;
            }
        }

        .popup-title {
            font-size: 28px;
            font-weight: 700;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .popup-title {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .popup-title {
                font-size: 20px;
            }
        }

        .popup-close-btn {
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            font-size: 24px;
            cursor: pointer;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .popup-close-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: rotate(90deg);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .popup-body {
            padding: 40px 35px;
            background: linear-gradient(to bottom, #ffffff 0%, #f8f9fa 100%);
            border-radius: 0 0 24px 24px;
        }

        @media (max-width: 768px) {
            .popup-body {
                padding: 32px 28px;
            }
        }

        @media (max-width: 480px) {
            .popup-body {
                padding: 28px 20px;
            }
        }

        .popup-form-group {
            margin-bottom: 24px;
            position: relative;
        }

        @media (max-width: 480px) {
            .popup-form-group {
                margin-bottom: 20px;
            }
        }

        .popup-label {
            display: block;
            margin-bottom: 10px;
            color: #2c3e50;
            font-weight: 600;
            font-size: 15px;
            letter-spacing: 0.3px;
        }

        .popup-label::after {
            content: '';
            display: inline-block;
            width: 3px;
            height: 3px;
            background: #0b3c66;
            border-radius: 50%;
            margin-left: 4px;
            vertical-align: middle;
        }

        .popup-input,
        .popup-textarea {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e1e8ed;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Arial, sans-serif;
            background: #ffffff;
            color: #2c3e50;
        }

        @media (max-width: 480px) {

            .popup-input,
            .popup-textarea {
                padding: 12px 16px;
                font-size: 16px;
            }
        }

        .popup-input:focus,
        .popup-textarea:focus {
            outline: none;
            border-color: #0b3c66;
            box-shadow: 0 0 0 4px rgba(11, 60, 102, 0.1);
            background: #ffffff;
            transform: translateY(-1px);
        }

        .popup-input:hover,
        .popup-textarea:hover {
            border-color: #b8c5d1;
        }

        .popup-textarea {
            resize: vertical;
            min-height: 120px;
            line-height: 1.6;
        }

        .popup-error {
            color: #e74c3c;
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 500;
        }

        .popup-error::before {
            content: '⚠';
            font-size: 14px;
        }

        .popup-submit-btn {
            width: 100%;
            padding: 18px 20px;
            background: linear-gradient(135deg, #0b3c66 0%, #094a7a 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 6px 20px rgba(11, 60, 102, 0.3);
            position: relative;
            overflow: hidden;
        }

        .popup-submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .popup-submit-btn:hover::before {
            left: 100%;
        }

        .popup-submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(11, 60, 102, 0.5);
            background: linear-gradient(135deg, #094a7a 0%, #0b3c66 100%);
        }

        .popup-submit-btn:active {
            transform: translateY(-1px);
        }

        @media (max-width: 480px) {
            .popup-submit-btn {
                padding: 16px 18px;
                font-size: 16px;
            }
        }

        /* Custom Scrollbar */
        .popup-container::-webkit-scrollbar {
            width: 8px;
        }

        .popup-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 0 24px 24px 0;
        }

        .popup-container::-webkit-scrollbar-thumb {
            background: #0b3c66;
            border-radius: 10px;
        }

        .popup-container::-webkit-scrollbar-thumb:hover {
            background: #094a7a;
        }
    </style>

    <script>
        function openQuotePopup() {
            const overlay = document.getElementById('quotePopupOverlay');
            overlay.classList.add('popup-active');
            document.body.style.overflow = 'hidden';
            document.body.style.position = 'fixed';
            document.body.style.width = '100%';
        }

        function closeQuotePopup() {
            const overlay = document.getElementById('quotePopupOverlay');
            overlay.classList.remove('popup-active');
            document.body.style.overflow = '';
            document.body.style.position = '';
            document.body.style.width = '';
        }

        function closeQuotePopupOnOverlay(event) {
            if (event.target.id === 'quotePopupOverlay') {
                closeQuotePopup();
            }
        }

        function handleQuoteSubmit(event) {
            // Let the form submit naturally to Laravel
            // You can add custom validation or AJAX here if needed
        }

        // Close popup on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const overlay = document.getElementById('quotePopupOverlay');
                if (overlay && overlay.classList.contains('popup-active')) {
                    closeQuotePopup();
                }
            }
        });

        // Prevent scroll on overlay, only allow scroll in popup container
        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.getElementById('quotePopupOverlay');
            if (overlay) {
                overlay.addEventListener('wheel', function(e) {
                    e.preventDefault();
                }, {
                    passive: false
                });

                overlay.addEventListener('touchmove', function(e) {
                    e.preventDefault();
                }, {
                    passive: false
                });
            }
        });
    </script>



@endonce
