@extends('layouts.app')

@section('title', 'Stok Kartı')

@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layouts.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('layouts.header')
            <div class="body-wrapper-inner">
                <div class="container-fluid" style="background-color: white; border-radius: 30px;">
                    <div class="row">
                        <div class="col-lg-12">

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

                            <div class="card">
                                <form action="{{ route('stock.cards.store') }}" method="POST">
                                    @csrf
                                    <div class="px-4 py-3 border-bottom d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0">Stok Kartı Girişi</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="mb-4 row align-items-center">
                                            {{-- <label for="exampleInputText1"
                                            class="form-label col-sm-3 col-form-label">Barkod
                                            No</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputText1"
                                                placeholder="" name="id" required>
                                        </div> --}}
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">Ürün
                                                Adı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText2"
                                                    placeholder="" name="product_name" required>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText2"
                                                class="form-label col-sm-3 col-form-label">Birimi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText2"
                                                    placeholder="" name="unit" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <div class="d-flex align-items-center gap-6">
                                                    <button class="btn btn-primary" type="submit">Stok Kartı
                                                        Oluştur</button>
                                                    <a href="{{ route('stock.cards.index') }}"
                                                        class="btn bg-danger-subtle text-danger">İptal
                                                        et</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="container-fluid" id="search-results">
                            <div class="card-body">
                                <div class="product-list">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-center gap-6 mb-9">

                                                <form class="d-flex align-items-center position-relative" method="GET"
                                                    action="{{ route('stock.cards.searchProduct', ['query' => '']) }}"
                                                    style="width: 100%;">
                                                    <input type="text" name="query"
                                                        class="form-control search-chat py-2 ps-5" id="text-srh"
                                                        placeholder="Ürün Adına Göre Sorgula | Ürün Adını Yaz Ve Enter Tuşuna Bas"
                                                        oninput="this.form.action='{{ route('stock.cards.searchProduct', '') }}' + '/' + this.value;"
                                                        style="flex: 1; min-width: 200px;">
                                                    <i
                                                        class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>

                                                    <!-- Reset butonu -->
                                                    <a href="{{ route('stock.cards.index') }}"
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
                                                            <th scope="col">Birimi</th>
                                                            <th scope="col">İşlemler</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @if ($stockCards->isEmpty())
                                                            <tr>
                                                                <td colspan="4" class="text-center">Kayıt yok</td>
                                                            </tr>
                                                        @else
                                                            @foreach ($stockCards as $stockCard)
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="ms-3">
                                                                                <h6 class="fw-semibold mb-0 fs-4">
                                                                                    {{ $stockCard->id }}
                                                                                </h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h6 class="mb-0">
                                                                            {{ $stockCard->product_name }}
                                                                        </h6>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <h6 class="mb-0 ms-2">
                                                                                {{ $stockCard->unit }}
                                                                            </h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="dropdown dropstart">
                                                                            <a href="javascript:void(0)"
                                                                                class="text-muted"
                                                                                id="dropdownMenuButton{{ $stockCard->id }}"
                                                                                data-bs-toggle="dropdown"
                                                                                aria-expanded="false">
                                                                                <i class="ti ti-dots-vertical fs-6"></i>
                                                                            </a>
                                                                            <ul class="dropdown-menu"
                                                                                aria-labelledby="dropdownMenuButton{{ $stockCard->id }}">
                                                                                <li>
                                                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                                                        href="{{ route('stock.cards.edit', $stockCard->id) }}">
                                                                                        <i
                                                                                            class="fs-4 ti ti-edit"></i>Düzenle</a>
                                                                                </li>
                                                                                <li>
                                                                                    <form
                                                                                        action="{{ route('stock.cards.destroy', $stockCard->id) }}"
                                                                                        method="POST"
                                                                                        onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                            class="dropdown-item d-flex align-items-center gap-3">
                                                                                            <i
                                                                                                class="fs-4 ti ti-trash"></i>Sil
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
                                                    <p class="mb-0 fs-2">Sayfa başına:</p>
                                                    <form action="{{ route('stock.cards.index') }}" method="GET"
                                                        class="d-flex align-items-center">
                                                        <select name="per_page" onchange="this.form.submit()"
                                                            class="form-select w-auto ms-0 ms-sm-2 me-8 me-sm-4 py-1 pe-7 ps-2 border-0"
                                                            aria-label="Default select example">
                                                            <option value="10"
                                                                {{ request('per_page') == 10 ? 'selected' : '' }}>10
                                                            </option>
                                                            <option value="25"
                                                                {{ request('per_page') == 25 ? 'selected' : '' }}>25
                                                            </option>
                                                            <option value="50"
                                                                {{ request('per_page') == 50 ? 'selected' : '' }}>50
                                                            </option>
                                                            <option value="100"
                                                                {{ request('per_page') == 100 ? 'selected' : '' }}>100
                                                            </option>
                                                        </select>
                                                    </form>

                                                    <p class="mb-0 fs-2">
                                                        {{ $stockCards->firstItem() }}-{{ $stockCards->lastItem() }} of
                                                        {{ $stockCards->total() }}
                                                    </p>
                                                    <nav aria-label="...">
                                                        <ul class="pagination justify-content-center mb-0 ms-8 ms-sm-9">
                                                            <li
                                                                class="page-item p-1 {{ $stockCards->onFirstPage() ? 'disabled' : '' }}">
                                                                <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center"
                                                                    href="{{ $stockCards->previousPageUrl() }}&per_page={{ request('per_page') }}">
                                                                    <i class="ti ti-chevron-left"></i>
                                                                </a>
                                                            </li>
                                                            <li
                                                                class="page-item p-1 {{ $stockCards->hasMorePages() ? '' : 'disabled' }}">
                                                                <a class="page-link border-0 rounded-circle text-dark fs-6 round-32 d-flex align-items-center justify-content-center"
                                                                    href="{{ $stockCards->nextPageUrl() }}&per_page={{ request('per_page') }}">
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
            @include('layouts.footer')
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // URL'de 'query' parametresi varsa scroll işlemi yap
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('query')) {
                scrollToSearchResults();
            }
        });

        function scrollToSearchResults() {
            const searchResultsElement = document.getElementById("search-results");
            if (searchResultsElement) {
                searchResultsElement.scrollIntoView({
                    behavior: "smooth"
                });
            }
        }
    </script>
@endsection
