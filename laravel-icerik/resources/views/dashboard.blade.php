@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">


        @include('layouts.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('layouts.header')
            <div class="body-wrapper-inner">
                <div class="container-fluid">

                    <div class="card" style="border-radius: 28px">
                        <div class="position-relative">
                            <img class="card-img-top" src="{{ asset('assets/images/backgrounds/profilebg.jpg') }}"
                                alt="Card image cap" style="max-height: 450px">
                            <div class="card-img-overlay p-4">
                                <div class="text-white mt-3">
                                    <h2 class="display-6 fw-bold">Hoş geldin, {{ $userName }}</h2>
                                    <span>
                                        <iconify-icon icon="solar:cloud-sun-bold-duotone" class="display-4"></iconify-icon>
                                    </span>
                                    <div class="mb-2 mt-4">
                                        <span class="display-6">20°
                                            <span class="fs-6">C</span>
                                        </span>
                                        <span class="fs-6">/</span>
                                        <span class="fs-6">7°
                                            <span>C</span>
                                        </span>
                                    </div>
                                    <p id="todayDate" class="fs-3 mb-0 opacity-75"></p>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-bg-white" id="hava-durumu">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row text-center" id="days-container">
                                        <!-- Günler buraya JavaScript ile eklenecek -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  Row 1 -->
                    <div class="row">
                        <div class="col-lg-8 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body" id="genel-cizelge">
                                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                        <div class="mb-3 mb-sm-0">
                                            <h5 class="card-title fw-semibold" id="genel-cizelge-yazi">Finansal Rapor</h5>
                                        </div>
                                    </div>

                                    <div class="card-body text-center">
                                        <h4 class="text-center fs-5 text-info">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;" class="{{ $messageClass }}">
                                                    {{ $message }}</font>
                                            </font>
                                        </h4>
                                        <h2 class="fs-7">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $totalDifference }}</font>
                                            </font>
                                        </h2>
                                        <div class="row pt-2 pb-2">
                                            <!-- Column -->
                                            <div class="col text-center align-self-center">
                                                <div data-label="20%" class="css-bar mb-0 css-bar-primary css-bar-20">
                                                    <i class="display-6 ti ti-currency-lira"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-6 border-end">
                                                <h4 class="fs-5 mb-0">
                                                    <i class="ti ti-chevron-up fs-6 text-success"></i>
                                                    <br>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            {{ $totalOutputPrice }}
                                                        </font>
                                                    </font>
                                                </h4>
                                            </div>
                                            <div class="col-6">
                                                <h4 class="fs-5 mb-0">
                                                    <i class="ti ti-chevron-down fs-6 text-danger"></i>
                                                    <br>
                                                    <font style="vertical-align: inherit;">
                                                        <font style="vertical-align: inherit;">
                                                            {{ $totalEntryPrice }}
                                                        </font>
                                                    </font>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card bg-danger-subtle shadow-none w-100">
                                        <div class="card-body">
                                            <div class="d-flex mb-10 pb-1 justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-6">
                                                    <div
                                                        class="rounded-circle-shape bg-danger px-3 py-2 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                        <iconify-icon icon="gg:enter" class="fs-7 text-white">
                                                        </iconify-icon>
                                                    </div>
                                                    <h6 class="mb-0 fs-4 fw-medium text-muted">
                                                        Bu gün giren ürün sayısı
                                                    </h6>
                                                </div>
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ti ti-dots-vertical fs-6"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                                href="{{ route('products.in.index') }}"><i
                                                                    class="fs-4 ti ti-plus"></i>Ürün
                                                                girişi yap</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row align-items-end justify-content-between">
                                                <div class="col-5">
                                                    <h2 class="mb-6 fs-8">
                                                        {{ $todayProductInCount > 0 ? $todayProductInCount : '0' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card bg-secondary-subtle shadow-none w-100">
                                        <div class="card-body">
                                            <div class="d-flex mb-10 pb-1 justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-6">
                                                    <div
                                                        class="rounded-circle-shape bg-secondary px-3 py-2 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                        <iconify-icon icon="fluent:sign-out-20-regular"
                                                            class="fs-7 text-white"></iconify-icon>
                                                    </div>
                                                    <h6 class="mb-0 fs-4 fw-medium text-muted">
                                                        Bu gün çıkan ürün sayısı
                                                    </h6>
                                                </div>
                                                <div class="dropdown dropstart">
                                                    <a href="javascript:void(0)" class="text-muted"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="ti ti-dots-vertical fs-6"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                                href="{{ route('products.out.index') }}"><i
                                                                    class="fs-4 ti ti-plus"></i>Ürün
                                                                çıkışı yap</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row align-items-center justify-content-between pt-4">
                                                <div class="col-5">
                                                    <h2 class="mb-6 fs-8 text-nowrap">
                                                        {{ $todayProductOutCount > 0 ? $todayProductOutCount : '0' }}
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 d-flex align-items-stretch">
                            <div class="card w-100 overflow-hidden" id="popular-urun">
                                <div class="card-body pb-0">
                                    <h4 class="fs-4 mb-1 card-title" id="popular-urun-yazi">Popüler Ürünler</h4>
                                    <p class="mb-0 card-subtitle" id="popular-urun-yazi-1">En fazla işlem yapılmış ürünler
                                        aşağıda listelenir.</p>
                                </div>
                                <div data-simplebar class="position-relative">
                                    <div class="table-responsive products-tabel" data-simplebar>
                                        <table class="table text-nowrap mb-0 align-middle table-hover">
                                            <thead class="fs-4">
                                                <tr>
                                                    <th class="fs-3 px-4">Ürün Adı</th>
                                                    <th class="fs-3">İşlem Sayısı</th>
                                                    <th class="fs-3"></th>
                                                    <th class="fs-3">İşlemler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($popularProducts as $product)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center product">
                                                                <div class="ms-3 product-title">
                                                                    <h6 class="fs-3 mb-0 text-truncate-2">
                                                                        {{ $product->product_name }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="mb-0 fs-4">
                                                                @if ($product->products_in_count + $product->products_out_count >= 15)
                                                                    {{ $product->products_in_count + $product->products_out_count }}
                                                                @endif
                                                            </h5>
                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown dropstart">
                                                                <a href="javascript:void(0)" class="text-muted"
                                                                    id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="ti ti-dots-vertical fs-6"></i>
                                                                </a>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton">
                                                                    <li>
                                                                        <a class="dropdown-item d-flex align-items-center gap-3"
                                                                            href="javascript:void(0)"
                                                                            data-product-id="{{ $product->id }}"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#productEntryModal"
                                                                            onclick="openEntryModal({{ $product->id }})">
                                                                            <i class="fs-4 ti ti-plus"></i>Giriş Yap
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item d-flex align-items-center gap-3"
                                                                            href="javascript:void(0)"
                                                                            data-product-id="{{ $product->id }}"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#productExitModal"
                                                                            onclick="openExitModal({{ $product->id }})">
                                                                            <i class="fs-4 ti ti-edit"></i>Çıkış Yap
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>


                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Ürün Girişi Modal -->
                        <div class="modal fade" id="productEntryModal" tabindex="-1"
                            aria-labelledby="productEntryModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productEntryModalLabel">Ürün Girişi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="productEntryForm">
                                            @csrf
                                            <input type="hidden" name="product_id" id="entry_product_id">
                                            <div class="mb-3">
                                                <label for="entry_quantity" class="form-label">Giriş Miktarı</label>
                                                <input type="number" class="form-control" id="entry_quantity"
                                                    name="entry_quantity" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="entry_price" class="form-label">Giriş Fiyatı</label>
                                                <input type="number" class="form-control" id="entry_price"
                                                    name="entry_price" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="entry_total" class="form-label">Toplam Tutar</label>
                                                <input type="number" class="form-control" id="entry_total"
                                                    name="entry_total" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="entry_date" class="form-label">Giriş Tarihi</label>
                                                <input id="entry_date" type="date" class="form-control"
                                                    name="entry_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="entry_company" class="form-label">Firma</label>
                                                <input type="text" class="form-control" id="entry_company"
                                                    name="entry_company" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kapat</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="submitEntryForm()">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Ürün Çıkışı Modal -->
                        <div class="modal fade" id="productExitModal" tabindex="-1"
                            aria-labelledby="productExitModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productExitModalLabel">Ürün Çıkışı</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="productExitForm">
                                            @csrf
                                            <input type="hidden" name="product_id" id="exit_product_id">
                                            <div class="mb-3">
                                                <label for="exit_quantity" class="form-label">Çıkış Miktarı</label>
                                                <input type="number" class="form-control" id="exit_quantity"
                                                    name="exit_quantity" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exit_reason" class="form-label">Çıkış Fiyatı</label>
                                                <input type="number" class="form-control" id="exit_reason"
                                                    name="exit_reason" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exit_reason" class="form-label">Toplam Tutar</label>
                                                <input type="number" class="form-control" id="exit_reason"
                                                    name="exit_reason" required readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="output_date" class="form-label">Çıkış Tarihi</label>
                                                <input id="output_date" type="date" class="form-control"
                                                    name="entry_date" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exit_company" class="form-label">Açıklama</label>
                                                <input type="text" class="form-control" id="exit_company"
                                                    name="exit_company" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kapat</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="submitExitForm()">Kaydet</button>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body" id="genel-rapor">
                                    <div class="d-flex mb-3 justify-content-between align-items-center">
                                        <h4 class="mb-0 card-title" id="genel-rapor-yazi">Genel Ürün Raporu</h4>
                                    </div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex align-items-center justify-content-between py-10 border-bottom">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="rounded-circle-shape bg-primary-subtle me-3 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                    <iconify-icon class="fs-7 text-primary" icon="solar:card-outline"
                                                        width="18" height="18"
                                                        style="color: black"></iconify-icon>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-3" id="stok-karti-sayisi">Stok Kartı Sayısı</h6>
                                                </div>
                                            </div>
                                            <span
                                                class="badge rounded-pill fw-medium fs-2 d-flex align-items-center bg-success-subtle text-success text-end">
                                                <i class="">
                                                    @if ($stockCartTotalCount <= 0)
                                                        Kayıt yok
                                                    @endif
                                                </i>
                                                @if ($stockCartTotalCount > 0)
                                                    {{ $stockCartTotalCount }}
                                                @endif
                                            </span>
                                        </li>

                                        <li class="d-flex align-items-center justify-content-between py-10 border-bottom">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="rounded-circle-shape bg-danger-subtle me-3 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                    <iconify-icon icon="codicon:sign-in" class="fs-7 text-danger">
                                                    </iconify-icon>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-3" id="genel-rapor-2">Girişi Yapılmış Ürün Sayısı
                                                    </h6>
                                                </div>
                                            </div>
                                            <span
                                                class="badge rounded-pill fw-medium fs-2 d-flex align-items-center bg-success-subtle text-success text-end">
                                                <i class="">
                                                    @if ($productInTotalCount <= 0)
                                                        Kayıt Yok
                                                    @endif
                                                </i>
                                                @if ($productInTotalCount > 0)
                                                    {{ $productInTotalCount }}
                                                @endif
                                            </span>
                                        </li>

                                        <li class="d-flex align-items-center justify-content-between py-10 border-bottom">
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="rounded-circle-shape bg-secondary-subtle me-3 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                    <iconify-icon icon="majesticons:door-exit"
                                                        class="fs-7 text-secondary">
                                                    </iconify-icon>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1 fs-3" id="genel-rapor-3">Çıkışı Yapılmış Ürün Sayısı
                                                    </h6>
                                                </div>
                                            </div>
                                            <span
                                                class="badge rounded-pill fw-medium fs-2 d-flex align-items-center bg-success-subtle text-success text-end">
                                                <i class="">
                                                    @if ($productOutTotalCount <= 0)
                                                        Kayıt Yok
                                                    @endif
                                                </i>
                                                @if ($productOutTotalCount > 0)
                                                    {{ $productOutTotalCount }}
                                                @endif
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
    </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const daysContainer = document.getElementById("days-container");
            const daysOfWeek = ["Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi"];
            const icons = ["ti ti-cloud", "ti ti-cloud", "ti ti-sun-high", "ti ti-cloud-fog", "ti ti-cloud-storm",
                "ti ti-cloud-rain"
            ];
            const temperatures = [24, 21, 25, 20, 18, 14]; // Örnek sıcaklıklar

            const today = new Date().getDay(); // Bugünün gün sırasını al
            for (let i = 0; i < 6; i++) {
                const dayIndex = (today + i + 1) % 7; // Haftanın günü sırasını hesapla
                const dayName = daysOfWeek[dayIndex];
                const icon = icons[i % icons.length];
                const temp = temperatures[i % temperatures.length];

                const dayElement = `
            <div class="col-6 col-md-2 ${i < 5 ? 'border-end' : ''}">
                <div class="mb-2">${dayName}</div>
                <i class="${icon} fs-9 mb-2"></i>
                <div>${temp}°<span>C</span></div>
            </div>
            `;
                daysContainer.insertAdjacentHTML("beforeend", dayElement);
            }
        });

        function setTodayDate() {
            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0'); // Ocak ayı 0 olarak kabul edildiği için +1
            var year = today.getFullYear();
            var currentDate = year + '-' + month + '-' + day;

            // Tarih alanını günün tarihi ile doldur
            document.getElementById('entry_date').value = currentDate;
            document.getElementById('output_date').value = currentDate;
        }



        const days = ["Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi"];

        const today = new Date();

        const dayName = days[today.getDay()];
        const day = String(today.getDate()).padStart(2, '0'); // Günü 2 basamaklı hale getirin
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Ayı 2 basamaklı hale getirin
        const year = today.getFullYear();

        const formattedDate = `${dayName} ${day}-${month}-${year}`;

        document.getElementById("todayDate").textContent = formattedDate;

        function openEntryModal(productId) {
            document.getElementById('entry_product_id').value = productId;
            document.getElementById('productEntryForm').reset(); // Formu sıfırla
            setTodayDate(); // Bugünün tarihini ayarla
        }

        function openExitModal(productId) {
            document.getElementById('exit_product_id').value = productId;
            document.getElementById('productExitForm').reset(); // Formu sıfırla
            setTodayDate(); // Bugünün tarihini ayarla
        }

        function submitEntryForm() {
            // Formu gönderme işlemi burada yapılacak
        }

        function submitExitForm() {
            // Formu gönderme işlemi burada yapılacak
        }
    </script>
@endsection
