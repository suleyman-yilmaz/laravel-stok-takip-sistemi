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
                        <img class="card-img-top" src="{{asset('assets/images/backgrounds/profilebg.jpg')}}"
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
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body" id="genel-cizelge">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold" id="genel-cizelge-yazi">Genel Çizelge</h5>
                                    </div>
                                    <div>
                                        <select class="form-select">
                                            <option value="1">Yıl</option>
                                            <option value="2">Ay</option>
                                            <option value="3">Gün</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="sales-profit"></div>
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
                                                    <iconify-icon icon="gg:enter"
                                                        class="fs-7 text-white"></iconify-icon>
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
                                                            href="{{route('products.in.index')}}"><i
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
                                                <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical fs-6"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-3"
                                                            href="{{route('products.out.index')}}"><i
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
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center product">
                                                        <div class="ms-3 product-title">
                                                            <h6 class="fs-3 mb-0 text-truncate-2">
                                                                Test Ürün
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="mb-0 fs-4">
                                                        45 <span class="text-muted"></span>
                                                    </h5>
                                                    <p class="text-muted mb-2"></p>
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
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                                    href="{{route('products.in.index')}}"><i
                                                                        class="fs-4 ti ti-plus"></i>Giriş Yap</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                                    href="{{route('products.out.index')}}"><i
                                                                        class="fs-4 ti ti-edit"></i>Çıkış Yap</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body" id="genel-rapor">
                                <div class="d-flex mb-3 justify-content-between align-items-center">
                                    <h4 class="mb-0 card-title" id="genel-rapor-yazi">Genel Rapor</h4>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-center justify-content-between py-10 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="rounded-circle-shape bg-primary-subtle me-3 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon class="fs-7 text-primary" icon="solar:card-outline"
                                                    width="18" height="18" style="color: black"></iconify-icon>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fs-3" id="stok-karti-sayisi">Stok Kartı Sayısı</h6>
                                            </div>
                                        </div>
                                        <span
                                            class="badge rounded-pill fw-medium fs-2 d-flex align-items-center bg-success-subtle text-success text-end">
                                            <i class="">
                                                @if ($stockCartTotalCount <= 0) Kayıt yok @endif </i>
                                                    @if ($stockCartTotalCount > 0)
                                                    {{ $stockCartTotalCount }}
                                                    @endif
                                        </span>
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between py-10 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="rounded-circle-shape bg-danger-subtle me-3 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="codicon:sign-in"
                                                    class="fs-7 text-danger"></iconify-icon>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fs-3" id="genel-rapor-2">Girişi Yapılmış Ürün Sayısı
                                                </h6>
                                            </div>
                                        </div>
                                        <span
                                            class="badge rounded-pill fw-medium fs-2 d-flex align-items-center bg-success-subtle text-success text-end">
                                            <i class="">
                                                @if ($productInTotalCount <= 0) Kayıt Yok @endif </i>
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
                                                    class="fs-7 text-secondary"></iconify-icon>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fs-3" id="genel-rapor-3">Çıkışı Yapılmış Ürün Sayısı
                                                </h6>
                                            </div>
                                        </div>
                                        <span
                                            class="badge rounded-pill fw-medium fs-2 d-flex align-items-center bg-success-subtle text-success text-end">
                                            <i class="">
                                                @if ($productOutTotalCount <= 0) Kayıt Yok @endif </i>
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
    <div class="py-6 px-6 text-center">
        <p class="mb-0 fs-4">Developed by <a href="https://suleyman-yilmaz-portfolio.vercel.app/" target="_blank"
                class="pe-1 text-primary text-decoration-underline">Süleyman Yılmaz</a>
        </p>
        <p class="mb-0 fs-4">Design by <a href="https://www.wrappixel.com/" target="_blank"
                class="pe-1 text-primary text-decoration-underline">Wrappixel.com</a>
        </p>
    </div>
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
            const icons = ["ti ti-cloud", "ti ti-cloud", "ti ti-sun-high", "ti ti-cloud-fog", "ti ti-cloud-storm", "ti ti-cloud-rain"
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


        const days = ["Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi"];

        const today = new Date();

        const dayName = days[today.getDay()];
        const day = String(today.getDate()).padStart(2, '0'); // Günü 2 basamaklı hale getirin
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Ayı 2 basamaklı hale getirin
        const year = today.getFullYear();

        const formattedDate = `${dayName} ${day}-${month}-${year}`;

        document.getElementById("todayDate").textContent = formattedDate;
</script>
@endsection