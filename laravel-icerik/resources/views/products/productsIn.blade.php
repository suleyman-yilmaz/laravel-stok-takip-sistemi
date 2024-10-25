@extends('layouts.app')

@section('title', 'Ürün Girişi')

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
                <div class="container-fluid" style="background-color: white; border-radius: 30px;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card" style="background-color: #f5f5f5;">
                                <form action="">
                                    <div class="px-4 py-3 border-bottom">
                                        <h4 class="card-title mb-0">Ürün Girişi</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Ürün
                                                Adı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText1"
                                                    placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Giriş
                                                Miktarı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText2"
                                                    placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Giriş
                                                Fiyatı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText2"
                                                    placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Toplam
                                                Tutar</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText2"
                                                    placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="startDate" class="form-label col-sm-3 col-form-label">Giriş
                                                Tarihi</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input id="startDate" class="form-control" type="date" required>
                                                    <script>
                                                        // Sayfa yüklendiğinde bugünün tarihini input alanına yerleştirir
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            var today = new Date();
                                                            var day = String(today.getDate()).padStart(2, '0');
                                                            var month = String(today.getMonth() + 1).padStart(2, '0'); // Ocak ayı 0 olarak kabul edildiği için +1
                                                            var year = today.getFullYear();
                                                            var currentDate = year + '-' + month + '-' + day;
                                                            document.getElementById('startDate').value = currentDate;
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText29"
                                                class="form-label col-sm-3 col-form-label">Açıklama</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control p-7" name="" id="exampleInputText29" cols="20" rows="1" placeholder=""
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <div class="d-flex align-items-center gap-6">
                                                    <button class="btn btn-primary" type="submit">Giriş Yap</button>
                                                    <a href="/products/in" class="btn bg-danger-subtle text-danger">İptal
                                                        et</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive border rounded-1">
                                        <table class="table">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th>Barkod No</th>
                                                    <th>Ürün Adı</th>
                                                    <th>İşlem</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Nigam</td>
                                                    <td><a href="" class="text-primary">Ekle</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="card-body">
                                <div class="product-list">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center gap-6 mb-9">
                                                <form class="position-relative">
                                                    <input type="text" class="form-control search-chat py-2 ps-5"
                                                        id="text-srh" placeholder="Search Product">
                                                    <i
                                                        class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                                                </form>
                                                <a class="fs-6 text-muted" href="javascript:void(0)"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Filter list">
                                                    <i class="ti ti-filter"></i>
                                                </a>
                                            </div>
                                            <div class="table-responsive border rounded">
                                                <table class="table align-middle text-nowrap mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Barkod No</th>
                                                            <th scope="col">Ürün Adı</th>
                                                            <th scope="col">Giren Miktar</th>
                                                            <th scope="col">Birimi</th>
                                                            <th scope="col">Alış Fiyatı</th>
                                                            <th scope="col">Toplam Tutar</th>
                                                            <th scope="col">Giriş Tarihi</th>
                                                            <th scope="col">Firma</th>
                                                            <th scope="col">İşlemler</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="ms-3">
                                                                        <h6 class="fw-semibold mb-0 fs-4">1
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h6 class="mb-0">Test Ürün</h6>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="mb-0 fs-4">75</h6>
                                                                </div>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="mb-0 ms-2">AD</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="mb-0 ms-2">100.00</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="mb-0 ms-2">7500.00</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="mb-0 ms-2">2024-10-10</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="mb-0 ms-2">Firma</h6>
                                                                </div>
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
                                                                                href=""><i
                                                                                    class="fs-4 ti ti-edit"></i>Düzenle</a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="dropdown-item d-flex align-items-center gap-3"
                                                                                href=""><i
                                                                                    class="fs-4 ti ti-trash"></i>Sil</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
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
            </div>
        </div>
    </div>

@endsection
