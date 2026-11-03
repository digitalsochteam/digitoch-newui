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

        /* Info Box */
        .info-box {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            border-left: 4px solid var(--accent-color);
            padding: 2rem;
            margin: 2rem 0;
        }

        .info-box p {
            color: var(--secondary-color);
            font-size: 1rem;
            line-height: 1.9;
            margin: 0;
        }

        /* Highlight Box */
        .highlight-box {
            background: var(--bg-light);
            border: 2px solid var(--border-color);
            padding: 2rem;
            margin: 2rem 0;
            border-radius: 4px;
        }

        .highlight-box h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.25rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .highlight-box p {
            color: var(--text-secondary);
            font-size: 1rem;
            line-height: 1.9;
            margin: 0;
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
    <section id="tz-breadcrumb" class="tz-breadcrumb-sec position-relative"
        data-background="{{ asset('assets/img/bg/bread-bg.jpg') }}">
        <div class="container">
            <div class="tz-breadcrumb-content headline text-center ul-li">
                <h2 class="bread_heading">TERMS & CONDITIONS</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>TERMS & CONDITIONS</li>
                </ul>
            </div>
        </div>
    </section>
    <main class="document-content">
        <!-- Preamble -->
        <div class="preamble">
            If you are looking for a strategic partner for your digital marketing needs, then you can contact us. The
            services or features available through this website are an entity of the company. By using this site, you agree
            to the terms and conditions of this site. If you do not agree with the terms and conditions, then please do not
            use the website. All the materials present on the site are not the property of any third party and are protected
            by copyright law worldwide.
        </div>

        <div class="preamble">
            Digital Soch does not grant any express rights under any patents, trademarks, copyrights, or trade secret
            information. If you find any content/images/copyright belonging to you or any other party, you can write to us,
            and we will immediately remove it. We value long-term customer relationships and aim to maintain high-end
            business relations with our clients.
        </div>

        <!-- Section 1: Limited License -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">1</span>
                <h2 class="section-title">Limited License</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">Digital Soch grants you a non-exclusive, non-transferable, limited right to access.
                    You agree not to interrupt or attempt to interrupt the operations of the site in any manner.</p>
            </div>
        </section>

        <!-- Section 2: "As Is" Disclaimer -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">2</span>
                <h2 class="section-title">"As Is" and "As Available" Disclaimer</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">The Service is provided "AS IS" and "AS AVAILABLE" with all faults and defects. We do
                    not provide any warranty of any kind. Without limitation, Digital Soch does not guarantee that the
                    service will meet your requirements, operate without interruption, meet performance standards, or be
                    error-free. No assurance is given that any errors or defects will be corrected.</p>
            </div>
        </section>

        <!-- Section 3: Links to Other Websites -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">3</span>
                <h2 class="section-title">Links to Other Websites</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">Our website may contain links to third-party websites not owned or controlled by
                    Digital Soch Pvt. Ltd.. We are not responsible for the content, privacy policies, or practices of any
                    third-party websites or services. You agree that Digital Soch shall not be liable for any damage or loss
                    caused by using such third-party services.</p>
            </div>
        </section>

        <!-- Section 4: Governing Law -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">4</span>
                <h2 class="section-title">Governing Law</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">The laws of the country, excluding conflict of law rules, shall govern these Terms
                    and your use of the Service. Your use of the Application may also be subject to other local, state,
                    national, or international laws.</p>
            </div>
        </section>

        <!-- Section 5: Dispute Resolution -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">5</span>
                <h2 class="section-title">Dispute Resolution</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">If you have any dispute regarding the services rendered by Digital Soch, you agree to
                    first resolve the issue formally or informally by contacting the company.</p>
            </div>
        </section>

        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">6</span>
                <h2 class="section-title">Google Ads MCC Account Policy</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">Our company uses a centralized Google MCC (My Client Center) account to manage and
                    operate all client advertising campaigns.
                    This MCC account is internal, proprietary, and confidential to the company.
                    For security, compliance, and operational reasons, MCC-level access shall not be provided or shared with
                    any client under any circumstances.</p>
            </div>
        </section>

        <!-- Section 6: Changes to Terms -->
        <section class="policy-section">
            <div class="section-header">
                <span class="section-number">7</span>
                <h2 class="section-title">Changes To These Terms & Conditions</h2>
            </div>
            <div class="policy-content">
                <p class="policy-text">We reserve the right to modify these Terms and Conditions at any time. Notice will be
                    provided whenever changes are made. If you continue to access or use our services, you agree to be bound
                    by the revised terms. If you disagree with the revised conditions, please stop using the website or
                    services immediately.</p>
            </div>
        </section>



        <!-- Contact Section -->
        <section class="contact-section">
            <div class="contact-content">
                <h3>Contacting Us</h3>
                <p>If you have any questions regarding the Terms and Conditions, please contact us at
                    info@digitalsochmedia.com.</p>
                <a href="mailto:info@digitalsochmedia.com" class="contact-details">
                    info@digitalsochmedia.com
                </a>
            </div>
        </section>
    </main>
@endsection
