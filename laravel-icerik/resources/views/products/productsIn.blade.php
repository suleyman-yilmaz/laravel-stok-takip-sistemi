@extends('layouts.app')

@section('title', 'Ürün Girişi')

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('layouts.sidebar')
    <div class="body-wrapper">
        @include('layouts.header')
        <div class="body-wrapper-inner">
            <div class="container-fluid" style="background-color: white; border-radius: 30px;">
                <div class="row">
                    {{-- Mesajlar burada, formdan bağımsız --}}
                    @if (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('warning') }}
                        <button type="button" class="btn-close" aria-label="Close"
                            onclick="this.parentElement.style.display='none';"></button>
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" aria-label="Close"
                            onclick="this.parentElement.style.display='none';"></button>
                    </div>
                    @endif
                    <div class="col-lg-6">
                        <div class="card" style="background-color: #f5f5f5;">
                            <form action="{{ route('products.in.store') }}" method="POST">
                                @csrf
                                <div class="px-4 py-3 border-bottom">
                                    <h4 class="card-title mb-0">Ürün Girişi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4 row align-items-center">
                                        <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Ürün
                                            Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputText1"
                                                placeholder="" name="stock_cards_id" required>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label for="inputAmount" class="form-label col-sm-3 col-form-label">Giriş
                                            Miktarı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputAmount" placeholder=""
                                                name="input_amount" required
                                                oninput="validateInput(this); calculateTotal()">
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label for="entryPrice" class="form-label col-sm-3 col-form-label">Giriş
                                            Fiyatı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="entryPrice" placeholder=""
                                                name="entry_price" required oninput="calculateTotal()">
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label for="totalAmount" class="form-label col-sm-3 col-form-label">Toplam
                                            Tutar</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="totalAmount" placeholder=""
                                                name="total_amount" required readonly>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label for="startDate" class="form-label col-sm-3 col-form-label">Giriş
                                            Tarihi</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input id="startDate" class="form-control" type="date" name="input_date"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label for="exampleInputText29"
                                            class="form-label col-sm-3 col-form-label">Firma</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputText3"
                                                placeholder="" name="description" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <div class="d-flex align-items-center gap-6">
                                                <button class="btn btn-primary" type="submit">Giriş Yap</button>
                                                <a href="{{ route('products.in.index') }}"
                                                    class="btn bg-danger-subtle text-danger">İptal
                                                    et</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                                <th>Birimi</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Nigam</td>
                                                <td>AD</td>
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

                                            <form class="d-flex position-relative" method="GET"
                                                action="{{ route('products.in.searchProductStock', ['query' => '']) }}"
                                                style="width: 100%;">
                                                <input type="text" name="query"
                                                    class="form-control search-chat py-2 ps-5" id="text-srh"
                                                    placeholder="Ürün Adına Göre Sorgula | Ürün Adını Yaz Ve Enter Tuşuna Bas"
                                                    oninput="this.form.action='{{ route('products.in.searchProductStock', '') }}' + '/'">
                                                <i
                                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>

                                                <!-- Reset butonu -->
                                                <a href="{{ route('products.in.index') }}"
                                                    class="btn btn-secondary ms-2">Sıfırla</a>
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
                                                    @if ($productsIn->isEmpty())
                                                    <tr>
                                                        <td colspan="9" class="text-center">Kayıt yok</td>
                                                    </tr>
                                                    @else
                                                    @foreach ($productsIn as $productIn)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="ms-3">
                                                                    <h6 class="fw-semibold mb-0 fs-4">
                                                                        {{ $productIn->stock_cards_id }}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h6 class="mb-0">
                                                                {{ $productIn->product_name ?? 'Ürün Bulunamadı' }}
                                                            </h6>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h6 class="mb-0 fs-4">
                                                                    {{ $productIn->input_amount }}
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h6 class="mb-0 ms-2">
                                                                    {{ $productIn->unit ?? 'Ürün Bulunamadı' }}
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h6 class="mb-0 ms-2">
                                                                    {{ $productIn->entry_price }}
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h6 class="mb-0 ms-2">
                                                                    {{ $productIn->total_amount }}
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h6 class="mb-0 ms-2">
                                                                    {{ $productIn->input_date }}
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <h6 class="mb-0 ms-2">
                                                                    {{ $productIn->description }}
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="dropdown dropstart">
                                                                <a href="javascript:void(0)" class="text-muted"
                                                                    id="dropdownMenuButton{{ $productIn->id }}"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ti ti-dots-vertical fs-6"></i>
                                                                </a>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton{{ $productIn->id }}">
                                                                    <li>
                                                                        <a class="dropdown-item d-flex align-items-center gap-3"
                                                                            href="{{ route('products.in.edit', ['id' => $productIn->id, 'stockid' => $productIn->stock_cards_id]) }}">
                                                                            <i class="fs-4 ti ti-edit"></i>Düzenle
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('products.in.destroy', $productIn->id) }}"
                                                                            method="POST"
                                                                            onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item d-flex align-items-center gap-3">
                                                                                <i class="fs-4 ti ti-trash"></i>Sil
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
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

@section('scripts')
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

        function validateInput(input) {
            // Geçerli bir tam sayı olup olmadığını kontrol et
            input.value = input.value.replace(/[^0-9]/g, '');
        }

        function calculateTotal() {
            // Giriş miktarını ve giriş fiyatını al
            var inputAmount = document.getElementById('inputAmount').value;
            var entryPrice = document.getElementById('entryPrice').value;

            // Sayılara dönüştür
            var amount = parseFloat(inputAmount) || 0; // Eğer geçerli bir sayı değilse 0 olarak ayarla
            var price = parseFloat(entryPrice) || 0; // Eğer geçerli bir sayı değilse 0 olarak ayarla

            // Toplam tutarı hesapla
            var totalAmount = amount * price;

            // Toplam tutarı input alanına yazdır
            document.getElementById('totalAmount').value = totalAmount.toFixed(2); // 2 ondalık basamak ile göster
        }
</script>
@endsection