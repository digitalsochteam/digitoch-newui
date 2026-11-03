<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thank You for Contacting Us</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f9fafc;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 25px 30px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #df1b25;
        }

        p {
            line-height: 1.6;
        }

        .highlight {
            color: #29378f;
            font-weight: 600;
        }

        .footer {
            margin-top: 25px;
            font-size: 13px;
            color: #777;
            text-align: center;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Thank You, {{ $name }}!</h2>
        <p>We've received your enquiry regarding <span class="highlight">“{{ $subject }}”</span>.</p>
        <p>Our team will review your message and get back to you at <strong>{{ $email }}</strong> or on your
            phone <strong>{{ $phone }}</strong> as soon as possible.</p>
        <p>Here's a copy of your message:</p>
        <blockquote style="border-left: 3px solid #df1b25; margin: 15px 0; padding-left: 10px; color: #555;">
            {{ $messageBody }}
        </blockquote>
        <p>We appreciate you reaching out to <strong>Digital Soch Pvt. Ltd.</strong></p>

        <div class="footer">
            <p>Warm regards,<br>Digital Soch Team</p>
            <p>© {{ date('Y') }} Digital Soch Pvt. Ltd. | All Rights Reserved.</p>
        </div>
    </div>
</body>

</html>
