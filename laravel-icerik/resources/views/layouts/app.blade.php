<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stok Takip Sistemi | @yield('title')</title>
    {{-- favicon --}}
    <link rel="shortcut icon" type="image/png" href="/assets/images/logos/favicon.png" />
    {{-- css --}}
    <link rel="stylesheet" href="/assets/css/styles.min.css" />
    {{-- script --}}
    <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/sidebarmenu.js"></script>
    <script src="/assets/js/app.min.js"></script>
    <script src="/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="/assets/js/dashboard.js"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

    <style>
        .logo-text {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            /* İstediğiniz renk */
            text-decoration: none;
            /* Alt çizgiyi kaldırmak için */
        }

        .title-text {
            font-size: 48px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* İframe stil ayarları */
        #map {
            height: 400px;
            /* Harita yüksekliği */
            width: 100%;
            /* Harita genişliği */
            border: none;
            /* Kenarlık yok */
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            /* Simge ve metni dikey olarak ortalar */
            padding: 0.5rem 1rem;
            /* Alan eklemek için */
            font-size: 0.9rem;
            /* Metin boyutunu ayarlamak için */
        }

        .dropdown-item iconify-icon {
            margin-right: 0.5rem;
            /* Simge ile metin arasında boşluk bırakmak için */
            width: 20px;
            /* Simge boyutunu ayarlamak için */
            height: 20px;
            /* Simge boyutunu ayarlamak için */
        }
    </style>
</head>

<body>
    @yield('content')
</body>

</html>
