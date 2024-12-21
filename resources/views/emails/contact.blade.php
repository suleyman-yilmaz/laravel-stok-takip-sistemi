<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurumsal İletişim Formu Mesajı</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-container {
            max-width: 700px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #004085;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 30px;
        }

        .content p {
            margin: 15px 0;
            line-height: 1.6;
        }

        .content p strong {
            color: #004085;
        }

        .content .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 20px 0;
        }

        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #6c757d;
            border-top: 1px solid #e0e0e0;
        }

        .footer a {
            color: #004085;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Yeni İletişim Bildirimi</h1>
        </div>
        <div class="content">
            <p><strong>İsim:</strong> {{ $details['name'] }}</p>
            <p><strong>Soy İsim:</strong> {{ $details['surname'] }}</p>
            <p><strong>Telefon:</strong> {{ $details['phone_number'] }}</p>
            <p><strong>E-posta:</strong> {{ $details['email'] }}</p>
            <div class="divider"></div>
            <p><strong>Konu:</strong> {{ $details['subject'] }}</p>
            <p><strong>Mesaj:</strong> {{ $details['message'] }}</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 Kurumsal İletişim. Tüm hakları saklıdır.</p>
            <p><a href="#">Gizlilik Politikası</a> | <a href="#">Şartlar ve Koşullar</a></p>
        </div>
    </div>
</body>

</html>
