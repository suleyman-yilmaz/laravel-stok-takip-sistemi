@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">


    @include('layouts.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        @include('layouts.header')
        <!--  Header End -->

        <div class="body-wrapper-inner">
            <div class="container-fluid">

                <div class="card">
                    <div class="position-relative">
                        <img class="card-img-top" src="../assets/images/backgrounds/profilebg.jpg" alt="Card image cap"
                            style="max-height: 450px">
                        <div class="card-img-overlay p-4">
                            <div class="text-white mt-3">
                                <h2 class="display-6 fw-bold">Hoş geldin, xxx</h2>
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
                                <p class="fs-3 mb-0 opacity-75">Pazar 15-10-2024</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-bg-white">
                        <div class="row">
                            <div class="col-12">
                                <div class="row text-center">
                                    <div class="col-6 col-md-2 border-end">
                                        <div class="mb-2">Pazartesi</div>
                                        <i class="ti ti-cloud fs-9 mb-2"></i>
                                        <div>
                                            24°
                                            <span>C</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-2 border-end">
                                        <div class="mb-2">Salı</div>
                                        <i class="ti ti-cloud fs-9 mb-2"></i>
                                        <div>
                                            21°
                                            <span>C</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-2 border-end">
                                        <div class="mb-2">Çarşamba</div>
                                        <i class="ti ti-sun-high fs-9 mb-2"></i>
                                        <div>
                                            25°
                                            <span>C</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-2 border-end">
                                        <div class="mb-2">Perşembe</div>
                                        <i class="ti ti-cloud-fog fs-9 mb-2"></i>
                                        <div>
                                            20°
                                            <span>C</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-2 border-end">
                                        <div class="mb-2">Cuma</div>
                                        <i class="ti ti-cloud-storm fs-9 mb-2"></i>
                                        <div>
                                            18°
                                            <span>C</span>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-2">
                                        <div class="mb-2">Cumartesi</div>
                                        <i class="ti ti-cloud-rain fs-9 mb-2"></i>
                                        <div>
                                            14°
                                            <span>C</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Genel Çizelge</h5>
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
                                                    <iconify-icon icon="solar:users-group-rounded-bold-duotone"
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
                                                            href="/products/in"><i class="fs-4 ti ti-plus"></i>Ürün
                                                            girişi yap</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row align-items-end justify-content-between">
                                            <div class="col-5">
                                                <h2 class="mb-6 fs-8">4</h2>
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
                                                    <iconify-icon icon="solar:wallet-2-line-duotone"
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
                                                            href="/products/out"><i class="fs-4 ti ti-plus"></i>Ürün
                                                            çıkışı yap</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-between pt-4">
                                            <div class="col-5">
                                                <h2 class="mb-6 fs-8 text-nowrap">3</h2>
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
                        <div class="card w-100 overflow-hidden">
                            <div class="card-body pb-0">
                                <h4 class="fs-4 mb-1 card-title">Popüler Ürünler</h4>
                                <p class="mb-0 card-subtitle">En fazla işlem yapılmış ürünler aşağıda listelenir.</p>
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
                                                                    href="/products/in"><i
                                                                        class="fs-4 ti ti-plus"></i>Giriş Yap</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center gap-3"
                                                                    href="/products/out"><i
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
                            <div class="card-body">
                                <div class="d-flex mb-3 justify-content-between align-items-center">
                                    <h4 class="mb-0 card-title">Genel Rapor</h4>
                                    <!-- <div class="dropdown">
                                          <button id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"
                                            class="rounded-circle btn-transparent rounded-circle btn-sm px-1 btn shadow-none">
                                            <i class="ti ti-dots-vertical fs-6"></i>
                                          </button>
                                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Action</a></li>
                                            <li>
                                              <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                                            </li>
                                            <li>
                                              <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                                            </li>
                                          </ul>
                                        </div> -->
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-center justify-content-between py-10 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="rounded-circle-shape bg-primary-subtle me-3 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="solar:card-2-outline"></iconify-icon>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fs-3">Stok Kartı Sayısı</h6>
                                            </div>
                                        </div>
                                        <span
                                            class="badge rounded-pill fw-medium fs-2 d-flex align-items-center bg-success-subtle text-success text-end"><i
                                                class=""></i>160</span>
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between py-10 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="rounded-circle-shape bg-danger-subtle me-3 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="solar:wallet-2-line-duotone"
                                                    class="fs-7 text-danger"></iconify-icon>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fs-3">Girişi Yapılmış Ürün Sayısı</h6>
                                            </div>
                                        </div>
                                        <span
                                            class="badge rounded-pill fw-medium fs-2 d-flex align-items-center bg-success-subtle text-success text-end"><i
                                                class=""></i>125</span>
                                    </li>

                                    <li class="d-flex align-items-center justify-content-between py-10 border-bottom">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="rounded-circle-shape bg-secondary-subtle me-3 rounded-pill d-inline-flex align-items-center justify-content-center">
                                                <iconify-icon icon="solar:course-up-line-duotone"
                                                    class="fs-7 text-secondary"></iconify-icon>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fs-3">Çıkışı Yapılmış Ürün Sayısı</h6>
                                            </div>
                                        </div>
                                        <span
                                            class="badge rounded-pill fw-medium fs-2 d-flex align-items-center bg-success-subtle text-success text-end"><i
                                                class=""></i>106</span>
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