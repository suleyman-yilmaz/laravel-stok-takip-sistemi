<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stok Takip Sistemi | @yield('title')</title>
    {{-- favicon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon-32x32.png') }}" />
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/css/jquery.ui.css')}}">
    {{-- script --}}
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    <!-- solar icons -->
    <script src="{{ asset('assets/js/iconify-icon.min.js') }}"></script>

    <!-- jQuery Kütüphanesi -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>



    <style>
        .logo-text {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            /* İstediğiniz renk */
            text-decoration: none;
            /* Alt çizgiyi kaldırmak için */
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

    @yield('styles')
</head>

<body>
    @yield('content')
    @yield('scripts')
</body>

</html>
