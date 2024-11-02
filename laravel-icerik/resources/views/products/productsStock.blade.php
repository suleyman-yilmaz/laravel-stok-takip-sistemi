@extends('layouts.app')

@section('title', 'Anlık Stok')

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    @include('layouts.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">
        @include('layouts.header')
        <div class="body-wrapper-inner">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="product-list">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center gap-6 mb-9">

                                        <form class="d-flex align-items-center position-relative" method="GET"
                                            action="{{ route('products.stock.searchProductStock', ['query' => '']) }}"
                                            style="width: 100%;">
                                            <input type="text" name="query" class="form-control search-chat py-2 ps-5"
                                                id="text-srh" placeholder="Ürün Adına Göre Sorgula | Ürün Adını Yaz Ve Enter Tuşuna Bas"
                                                oninput="this.form.action='{{ route('products.stock.searchProductStock', '') }}' + '/'"
                                                style="flex: 1; min-width: 200px;">
                                            <!-- Min-width ekleyerek başlangıç genişliğini artırıyoruz -->
                                            <i
                                                class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>

                                            <!-- Reset butonu -->
                                            <a href="{{ route('products.stock.index') }}"
                                                class="btn btn-secondary ms-2">Sıfırla</a>
                                        </form>



                                        <a class="fs-6 text-muted" href="javascript:void(0)" data-bs-toggle="tooltip"
                                            data-bs-placement="top" data-bs-title="Filter list">
                                            <i class="ti ti-filter"></i>
                                        </a>
                                    </div>

                                    <div class="table-responsive border rounded">
                                        <table class="table align-middle text-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Barkod No</th>
                                                    <th scope="col">Ürün Adı</th>
                                                    <th scope="col">Birimi</th>
                                                    <th scope="col">Giren Miktar</th>
                                                    <th scope="col">Çıkan Miktar</th>
                                                    <th scope="col">Mevcut Miktar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($vw_anlik->isEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-center">Kayıt yok</td>
                                                </tr>
                                                @else
                                                @foreach ($vw_anlik as $current)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="ms-3">
                                                                <h6 class="fw-semibold mb-0 fs-4">
                                                                    {{ $current->id }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="fw-semibold mb-0 fs-4">
                                                                {{ $current->product_name }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mb-0 ms-2">
                                                                {{ $current->unit }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mb-0 fs-4">
                                                                {{ $current->input_amount }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mb-0 fs-4">
                                                                {{ $current->output_amount }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mb-0 fs-4">
                                                                {{ $current->current_amount }}
                                                            </h6>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="d-flex align-items-center justify-content-end py-1">
                                            <p class="mb-0 fs-2">Rows per page:</p>
                                            <select
                                                class="form-select w-auto ms-0 ms-sm-2 me-8 me-sm-4 py-1 pe-7 ps-2 border-0"
                                                aria-label="Default select example">
                                                <option selected="">5</option>
                                                <option value="1">10</option>
                                                <option value="2">25</option>
                                            </select>
                                            <p class="mb-0 fs-2">1–5 of 12</p>
                                            <nav aria-label="...">
                                                <ul class="pagination justify-content-center mb-0 ms-8 ms-sm-9">
                                                    <li class="page-item p-1">
                                                        <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center"
                                                            href="javascript:void(0)">
                                                            <i class="ti ti-chevron-left"></i>
                                                        </a>
                                                    </li>
                                                    <li class="page-item p-1">
                                                        <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center"
                                                            href="javascript:void(0)">
                                                            <i class="ti ti-chevron-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>

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

@endsection