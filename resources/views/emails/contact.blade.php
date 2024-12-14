<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>İletişim Formu Mesajı</title>
</head>
<body>
    <h1>İletişim Formundan Yeni Mesaj Var!</h1>
    <p><strong>İsim:</strong> {{ $details['name'] }}</p>
    <p><strong>Soy İsim:</strong> {{ $details['surname'] }}</p>
    <p><strong>Telefon:</strong> {{ $details['phone_number'] }}</p>
    <p><strong>E-posta:</strong> {{ $details['email'] }}</p>
    <p><strong>Konu:</strong> {{ $details['subject'] }}</p>
    <p><strong>Mesaj:</strong> {{ $details['message'] }}</p>
</body>
</html>
