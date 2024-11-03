@extends('layouts.app')

@section('title', 'Ürün Girişi Düzenleme')

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
                        <div class="col-lg-12">
                            <div class="card" style="background-color: #f5f5f5;">
                                <form action="{{ route('products.in.update', ['id' => $productIn->id, 'stockid' => $productIn->stock_cards_id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="px-4 py-3 border-bottom">
                                        <h4 class="card-title mb-0">Ürün Girişi Düzenleme</h4>
                                    </div>

                                    <div class="card-body">
                                        
                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Ürün
                                                Adı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText1"
                                                    placeholder="" value="{{ $stockCards->where('id', $productIn->stock_cards_id)->first()->product_name ?? 'Ürün Bulunamadı' }}" required readonly>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="inputAmount" class="form-label col-sm-3 col-form-label">Giriş
                                                Miktarı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputAmount" placeholder=""
                                                    name="input_amount" required value="{{ $productIn->input_amount }}"
                                                    oninput="validateInput(this); calculateTotal()">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="entryPrice" class="form-label col-sm-3 col-form-label">Giriş
                                                Fiyatı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="entryPrice" placeholder=""
                                                    name="entry_price" value="{{ $productIn->entry_price }}" required
                                                    oninput="calculateTotal()">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="totalAmount" class="form-label col-sm-3 col-form-label">Toplam
                                                Tutar</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="totalAmount" placeholder=""
                                                    name="total_amount" value="{{ $productIn->total_amount }}" required
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="startDate" class="form-label col-sm-3 col-form-label">Giriş
                                                Tarihi</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input id="startDate" class="form-control" type="date"
                                                        name="input_date" value="{{ $productIn->input_date }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText29"
                                                class="form-label col-sm-3 col-form-label">Firma</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText3"
                                                    placeholder="" value="{{ $productIn->description }}" name="description"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <div class="d-flex align-items-center gap-6">
                                                    <button class="btn btn-primary" type="submit">Ürün Girişi
                                                        Düzenle</button>
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
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection

@section('scripts')
    <script>
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
