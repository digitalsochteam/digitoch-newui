@extends('frontend.layout.app')

@section('content')
    @include('frontend.layout.page-hero', [
        'title' => 'Bank Account Details',
        'crumb' => 'Digital Soch Private Limited',
        'eyebrow' => 'Pay Securely',
    ])

    @php
        $banks = [
            ['name' => 'YES BANK LTD', 'rows' => [
                'Account Name' => 'DIGITAL SOCH PRIVATE LIMITED',
                'Account Number' => '020163700001300',
                'IFSC Code' => 'YESB0000201',
            ]],
            ['name' => 'HDFC BANK', 'rows' => [
                'Account Holder' => 'DIGITAL SOCH PRIVATE LIMITED',
                'Account Number' => '50200049513153',
                'IFSC Code' => 'HDFC0000542',
                'Branch' => 'KAMALA MILLS',
            ]],
        ];
    @endphp

    <section class="ds-section pt-0">
        <div class="container">
            <div class="row g-5 align-items-start">
                <div class="col-lg-4 col-md-6 mx-auto" data-reveal="left">
                    <div class="ds-qr">
                        <img src="{{ asset('assets/img/service/qr-code-three.jpg') }}" alt="Digital Soch payment QR code">
                    </div>
                    <p class="text-center mt-3 mb-0"><i class="fa-solid fa-qrcode me-2"></i>Scan with any UPI app to pay</p>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        @foreach ($banks as $bank)
                            <div class="col-md-6" data-reveal style="--d: {{ $loop->index * 0.12 }}s">
                                <div class="ds-card ds-bank">
                                    <div class="ds-bank__head">
                                        <i class="fa-solid fa-building-columns"></i>
                                        <h3>{{ $bank['name'] }}</h3>
                                    </div>
                                    <dl class="ds-bank__rows">
                                        @foreach ($bank['rows'] as $label => $value)
                                            <div class="ds-bank__row">
                                                <dt>{{ $label }}</dt>
                                                <dd>{{ $value }}</dd>
                                            </div>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
