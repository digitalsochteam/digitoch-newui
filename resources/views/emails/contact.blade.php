<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Enquiry</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f8f9fc;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            background: #ffffff;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #eee;
        }

        .header {
            background-color: #df1b25;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 0.5px;
        }

        .content {
            padding: 25px;
            line-height: 1.6;
        }

        .content p {
            margin: 8px 0;
        }

        .content strong {
            color: #29378f;
        }

        .footer {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            font-size: 13px;
            color: #777;
        }

        .footer a {
            color: #df1b25;
            text-decoration: none;
            font-weight: 500;
        }

        @media only screen and (max-width: 600px) {
            .content {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h2>📩 New Contact Enquiry</h2>
        </div>
        <div class="content">
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Phone:</strong> {{ $phone }}</p>
            <p><strong>Subject:</strong> {{ $subject }}</p>
            <hr style="border: none; border-top: 1px solid #eee; margin: 15px 0;">
            <p><strong>Message:</strong></p>
            <p style="background: #f9f9f9; padding: 15px; border-radius: 5px; white-space: pre-line;">
                {{ $messageBody }}
            </p>
        </div>
        <div class="footer">
            <p>This enquiry was sent via the <strong>Digital Soch Media</strong> website.</p>
            <p><a href="https://digitalsochmedia.in" target="_blank">Visit Website</a></p>
        </div>
    </div>
</body>

</html>
