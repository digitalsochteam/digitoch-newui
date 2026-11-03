@extends('frontend.layout.app')

@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #1e557e;
            --secondary-color: #174564;
            --accent-color: #2667a0;
            --gold-accent: #c49b63;
            --text-primary: #1a1a2e;
            --text-secondary: #4a4a4a;
            --text-muted: #6b6b6b;
            --bg-white: #ffffff;
            --bg-light: #f8f9fa;
            --bg-grey: #e9ecef;
            --border-color: #dee2e6;
            --border-light: #e8e8e8;
        }

        body {
            font-family: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.8;
            color: var(--text-primary);
            background-color: var(--bg-light);
            font-size: 16px;
        }

        .document-container {
            max-width: 1100px;
            margin: 0 auto;
            background: var(--bg-white);
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.08);
        }

        /* Header Section */
        .document-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 4rem 3rem 3rem;
            border-bottom: 4px solid var(--gold-accent);
        }

        .company-info {
            text-align: center;
            margin-bottom: 2rem;
        }

        .company-name {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .company-tagline {
            font-size: 0.95rem;
            opacity: 0.9;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-weight: 300;
        }

        .document-title {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 2rem;
        }

        .document-title h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            letter-spacing: 0.5px;
        }

        .effective-date {
            font-size: 0.9rem;
            opacity: 0.85;
            font-weight: 400;
        }

        /* Main Content */
        .document-content {
            padding: 3.5rem 3rem;
        }

        .preamble {
            font-size: 1.05rem;
            line-height: 1.9;
            color: var(--text-secondary);
            margin-bottom: 3.5rem;
            padding: 2rem;
            background: var(--bg-light);
            border-left: 4px solid var(--gold-accent);
            font-weight: 400;
        }

        /* Section Styling */
        .policy-section {
            margin-bottom: 3.5rem;
        }

        .section-number {
            display: inline-block;
            background: var(--accent-color);
            color: white;
            width: 36px;
            height: 36px;
            line-height: 36px;
            text-align: center;
            border-radius: 4px;
            font-weight: 600;
            font-size: 1rem;
            margin-right: 1rem;
        }

        .section-header {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-color);
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
        }

        .policy-content {
            padding-left: 0;
        }

        .policy-text {
            font-size: 1rem;
            line-height: 1.9;
            color: var(--text-secondary);
            margin-bottom: 1rem;
        }

        .policy-text:last-child {
            margin-bottom: 0;
        }

        /* List Items */
        .policy-list {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }

        .policy-list-item {
            position: relative;
            padding: 1.25rem 1.5rem 1.25rem 3.5rem;
            margin-bottom: 1rem;
            background: var(--bg-white);
            border: 1px solid var(--border-light);
            border-left: 3px solid var(--accent-color);
            transition: all 0.2s ease;
        }

        .policy-list-item:hover {
            border-left-color: var(--gold-accent);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .policy-list-item::before {
            content: '';
            position: absolute;
            left: 1.5rem;
            top: 1.5rem;
            width: 8px;
            height: 8px;
            background: var(--accent-color);
            border-radius: 50%;
        }

        .policy-list-item p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 1rem;
            line-height: 1.8;
        }

        /* Subsection Styling */
        .subsection {
            margin: 2rem 0;
        }

        .subsection-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .subsection-text {
            font-size: 1rem;
            line-height: 1.9;
            color: var(--text-secondary);
            margin-bottom: 0.75rem;
        }

        /* Contact Section */
        .contact-section {
            background: var(--primary-color);
            color: white;
            padding: 3rem;
            margin-top: 3rem;
        }

        .contact-content {
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
        }

        .contact-section h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .contact-section p {
            font-size: 1rem;
            margin-bottom: 1.75rem;
            opacity: 0.9;
            line-height: 1.7;
        }

        .contact-details {
            display: inline-block;
            background: white;
            color: var(--primary-color);
            padding: 1.25rem 2.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .contact-details:hover {
            background: var(--bg-light);
            border-color: var(--gold-accent);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Footer */
        .document-footer {
            background: var(--bg-grey);
            padding: 2.5rem 3rem;
            border-top: 1px solid var(--border-color);
        }

        .footer-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .footer-text {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
        }

        .footer-tagline {
            font-size: 0.95rem;
            color: var(--text-secondary);
            font-weight: 500;
            font-style: italic;
        }

        strong {
            font-weight: 600;
            color: var(--text-primary);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .document-header {
                padding: 2.5rem 1.5rem 2rem;
            }

            .company-name {
                font-size: 1.75rem;
            }

            .document-title h1 {
                font-size: 1.75rem;
            }

            .document-content {
                padding: 2.5rem 1.5rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .policy-list-item {
                padding: 1rem 1rem 1rem 2.5rem;
            }

            .policy-list-item::before {
                left: 1rem;
                top: 1.25rem;
            }

            .contact-section {
                padding: 2rem 1.5rem;
            }

            .section-number {
                width: 32px;
                height: 32px;
                line-height: 32px;
                font-size: 0.9rem;
            }
        }

        @media print {
            body {
                background: white;
            }

            .document-container {
                box-shadow: none;
            }

            .policy-list-item:hover {
                box-shadow: none;
            }

            .contact-details:hover {
                transform: none;
                box-shadow: none;
            }
        }
    </style>
    <!-- Breadcrumb Section -->
    <section id="tz-breadcrumb" class="tz-breadcrumb-sec position-relative"
        data-background="{{ asset('assets/img/bg/bread-bg.jpg') }}">
        <div class="container">
            <div class="tz-breadcrumb-content headline text-center ul-li">
                <h2 class="bread_heading">PRIVACY POLICY</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>PRIVACY POLICY</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="document-content">
        <!-- Preamble -->
        <div class="preamble">
            At Digital Soch Pvt. Ltd., we are committed to protecting your privacy. We understand the importance of keeping
            client information secure and take appropriate measures to safeguard all data shared online.
        </div>

        <!-- Section 1: Information Collected -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">1</span>
                <h2 class="section-title">Information Collected</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">We may collect information depending on the type of service you are availing. This
                    may include:</p>

                <ul class="policy-list">
                    <li class="policy-list-item">
                        <p>Your name</p>
                    </li>
                    <li class="policy-list-item">
                        <p>Address</p>
                    </li>
                    <li class="policy-list-item">
                        <p>Telephone number</p>
                    </li>
                    <li class="policy-list-item">
                        <p>Email address</p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Section 2: Permissions -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">2</span>
                <h2 class="section-title">Permissions</h2>
            </div>
            <div class="policy-content">

                <div class="subsection">
                    <h3 class="subsection-title">Manage External / Internal Storage Access</h3>
                    <p class="subsection-text">Required to store and download reports, invoices, or documents generated
                        through the app.</p>
                    <p class="subsection-text">We access your device's internal storage only to allow you to download
                        reports directly. No personal files from your device are accessed.</p>
                </div>

                <div class="subsection">
                    <h3 class="subsection-title">Dialer Access</h3>
                    <p class="subsection-text">Required to enable direct calling to your Relationship Manager or support
                        team from the app.</p>
                    <p class="subsection-text">We request dialer access so you can easily connect with your Relationship
                        Manager or support team with a single tap. No calls are made without your direct action, and no call
                        data is stored.</p>
                </div>
            </div>
        </section>

        <!-- Section 3: Cookies -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">3</span>
                <h2 class="section-title">Cookies</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">We use cookies to enhance your experience. You may choose not to accept cookies at
                    any time; however, some website functions may be impaired if you do not accept them.</p>
            </div>
        </section>

        <!-- Section 4: Disclosing Information -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">4</span>
                <h2 class="section-title">Disclosing Information</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">We do not disclose any personal information obtained about you to third parties.</p>
            </div>
        </section>

        <!-- Section 5: Changes to this Policy -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">5</span>
                <h2 class="section-title">Changes to this Policy</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">We may update the privacy policy as necessary. We take reasonable steps to notify our
                    customers whenever there is any change to our policy.</p>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section">
            <div class="contact-content">
                <h3>Contacting Us</h3>
                <p>If you have any questions regarding our privacy policy, you can contact us via email:
                    info@digitalsochmedia.com</p>
                <a href="mailto:info@digitalsochmedia.com" class="contact-details">
                    info@digitalsochmedia.com
                </a>
            </div>
        </section>
    </main>
@endsection
