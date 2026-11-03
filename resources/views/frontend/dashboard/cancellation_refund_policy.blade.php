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

        /* List Items */
        .policy-list {
            list-style: none;
            padding: 0;
            margin: 0;
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

        /* Notice Box */
        .notice-box {
            background: #fffbf0;
            border: 1px solid #f0e5cc;
            border-left: 4px solid #d4a574;
            padding: 2rem;
            margin: 2.5rem 0;
        }

        .notice-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f0e5cc;
        }

        .notice-icon {
            width: 32px;
            height: 32px;
            background: #d4a574;
            color: white;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            font-weight: 700;
            font-size: 1.125rem;
        }

        .notice-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #5c4a2a;
            margin: 0;
        }

        .notice-content {
            color: #6b5a3d;
        }

        /* Commitment Section */
        .commitment-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 2.5rem;
            margin: 3rem 0;
            border: 1px solid var(--border-color);
            border-top: 4px solid var(--accent-color);
        }

        .commitment-section h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 1.25rem;
            font-weight: 700;
        }

        .commitment-section p {
            color: var(--text-secondary);
            font-size: 1.05rem;
            line-height: 1.9;
            margin: 0;
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

        .divider-line {
            width: 60px;
            height: 3px;
            background: var(--gold-accent);
            margin: 1.5rem auto;
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
                <h2 class="bread_heading">Cancellation & Refund Policy</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Cancellation & Refund Policy</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Policy Content -->
    <main class="document-content">
        <!-- Preamble -->
        <div class="preamble">
            We at Digital Soch Pvt. Ltd. believe that all client interactions ought to be equitable, open, and
            understandable. Our cancellation and refund policy is designed to ensure accountability and mutual respect while
            offering a smooth and trouble-free experience.
        </div>

        <!-- Section 1: Cancellation Policy -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">1</span>
                <h2 class="section-title">Cancellation Policy</h2>
            </div>
            <div class="policy-content">
                <ul class="policy-list">
                    <li class="policy-list-item">
                        <p>Within <strong>seven (7) days of placing their order</strong>, customers may submit a
                            cancellation request via email to <strong>accounts@digitalsochmedia.com</strong>.</p>
                    </li>
                    <li class="policy-list-item">
                        <p>Our accounts department will examine and validate the cancellation as soon as we receive the
                            request.</p>
                    </li>
                    <li class="policy-list-item">
                        <p>Only after receiving written confirmation from our team will a cancellation be deemed
                            legitimate.</strong>.</p>
                    </li>
                    <li class="policy-list-item">
                        <p>Only prior to the project's execution can cancellations be made. Cancellation requests won't be
                            accepted once the project has begun, such as when the campaign, content, or strategy is put into
                            action.</p>
                    </li>
                    <li class="policy-list-item">
                        <p>This guarantees that our professionals' time, money, and experience are valued and paid for.</p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Section 2: Refund Policy -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">2</span>
                <h2 class="section-title">Refund Policy</h2>
            </div>
            <div class="policy-content">
                <ul class="policy-list">
                    <li class="policy-list-item">
                        <p>In the case of monthly service packages, the performance of the current month is reviewed before
                            processing payments for the subsequent month.</p>
                    </li>
                    <li class="policy-list-item">
                        <p>Except in rare circumstances where both parties acknowledge service non-delivery, refunds are not
                            available once the project or campaign has started.</p>
                    </li>
                    <li class="policy-list-item">
                        <p>Customers should be aware that as these depend on a variety of outside variables like algorithms,
                            audience behavior, and market trends, Digital Soch cannot guarantee fixed results like traffic
                            volumes, keyword rankings, or lead conversions.</p>
                    </li>
                    <li class="policy-list-item">
                        <p>As a result, refund requests that are based on traffic or ranking metrics cannot be processed.
                        </p>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Section 3: Important Information -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">3</span>
                <h2 class="section-title">Important Information</h2>
            </div>
            <div class="policy-content">
                <div class="notice-box">
                    <div class="notice-header">
                        <div class="notice-icon">!</div>
                        <h3 class="notice-title">Please Note</h3>
                    </div>
                    <div class="notice-content">
                        <ul class="policy-list">
                            <li class="policy-list-item">
                                <p>To guarantee correct documentation, all refund and cancellation requests must be sent by
                                    official email.</p>
                            </li>
                            <li class="policy-list-item">
                                <p>If applicable, refunds won't be processed until our finance team has thoroughly reviewed
                                    and verified them.</p>
                            </li>
                            <li class="policy-list-item">
                                <p>To prevent any future inconvenience, we advise clients to review project deliverables,
                                    timelines, and strategies prior to starting payments.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section 4: Our Commitment -->
        <section class="policy-section">
            <div class="commitment-section">
                <h3>Our Commitment to Excellence</h3>
                <div class="divider-line"></div>
                <p>We at <strong> Digital Soch Pvt. Ltd. </strong> are committed to upholding an equitable, open, and moral
                    business
                    environment. Our guidelines are designed to safeguard our clients as well as our creative teams,
                    guaranteeing that every partnership is based on professionalism and trust.
                </p>
                <br />
                <p>Please email us at <strong> accounts@digitalsochmedia.com </strong> with any inquiries or clarifications
                    about refunds or
                    cancellations. To help you with your question, our support staff will get back to you right away.</p>
                <br />
                <p><strong> Digital Soch Pvt. Ltd. </strong> Establishing trust via openness and creativity.</p>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section">
            <div class="contact-content">
                <h3>Questions or Clarifications?</h3>
                <p>For any inquiries regarding cancellations or refunds, please contact our support department. Our support
                    team is committed to providing prompt and professional assistance.</p>
                <a href="mailto:accounts@digitalsochmedia.com" class="contact-details">
                    accounts@digitalsochmedia.com
                </a>
            </div>
        </section>
    </main>
@endsection
