<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thank You For Contacting Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url(https://cdn.digitalsochmedia.com/thanku.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            min-height: 100vh;
        }

        /* Overlay for better text readability */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(33, 86, 127, 0.85) 0%, rgba(26, 68, 101, 0.75) 100%);
            z-index: 1;
        }

        #outer {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
            padding: 20px;
        }

        #inner {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 60px 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(33, 86, 127, 0.4);
            text-align: center;
            animation: fadeInUp 0.6s ease-out;
            border-top: 5px solid #21567f;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Success checkmark icon */
        .checkmark-circle {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            border-radius: 50%;
            background: linear-gradient(135deg, #21567f 0%, #2d7ab8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            animation: scaleIn 0.5s ease-out 0.2s both;
            box-shadow: 0 5px 20px rgba(33, 86, 127, 0.3);
        }

        @keyframes scaleIn {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        .checkmark {
            width: 35px;
            height: 35px;
            border-right: 4px solid white;
            border-bottom: 4px solid white;
            transform: rotate(45deg);
            animation: drawCheck 0.4s ease-out 0.5s both;
        }

        @keyframes drawCheck {
            from {
                width: 0;
                height: 0;
            }

            to {
                width: 35px;
                height: 35px;
            }
        }

        h1 {
            color: #21567f;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            animation: fadeIn 0.6s ease-out 0.3s both;
        }

        p {
            color: #333;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 40px;
            animation: fadeIn 0.6s ease-out 0.4s both;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Redirect info */
        .redirect-info {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 15px;
            animation: fadeIn 0.6s ease-out 0.5s both;
        }

        /* Progress bar */
        .progress-container {
            width: 100%;
            height: 6px;
            background: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            animation: fadeIn 0.6s ease-out 0.6s both;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #21567f 0%, #2d7ab8 100%);
            border-radius: 10px;
            width: 0%;
            animation: progress 4s linear forwards;
            box-shadow: 0 0 10px rgba(33, 86, 127, 0.5);
        }

        @keyframes progress {
            to {
                width: 100%;
            }
        }

        /* Responsive design */
        @media (max-width: 767px) {
            #inner {
                padding: 40px 30px;
            }

            h1 {
                font-size: 1.8rem;
            }

            p {
                font-size: 1.1rem;
            }

            .checkmark-circle {
                width: 70px;
                height: 70px;
            }

            .checkmark {
                width: 30px;
                height: 30px;
            }
        }

        @media (max-width: 480px) {
            #inner {
                padding: 30px 20px;
            }

            h1 {
                font-size: 1.5rem;
            }

            p {
                font-size: 1rem;
            }

            .checkmark-circle {
                width: 60px;
                height: 60px;
                margin-bottom: 20px;
            }

            .checkmark {
                width: 25px;
                height: 25px;
            }
        }
    </style>
</head>

<body>
    <div id="outer">
        <div id="inner">
            <div class="checkmark-circle">
                <div class="checkmark"></div>
            </div>
            <h1>Thank You For Your Enquiry</h1>
            <p>{{ $message }}</p>
            <div class="redirect-info">Redirecting to homepage in a moment...</div>
            <div class="progress-container">
                <div class="progress-bar"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.setTimeout(function() {
            window.location.href = "{{ url('/') }}";
        }, 4000);
    </script>
</body>

</html>
