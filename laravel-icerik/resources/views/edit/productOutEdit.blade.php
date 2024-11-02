@extends('layouts.app')

@section('title', 'Ürün Çıkışı Düzenleme')

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
                            <div class="card" style="background-color: #f5f5f5;">
                                <form action="{{ route('products.out.update', ['id' => $productOut->id, 'stockid' => $productOut->stock_cards_id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="px-4 py-3 border-bottom">
                                        <h4 class="card-title mb-0">Ürün Çıkışı Düzenleme</h4>
                                    </div>

                                    <div class="card-body">

                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">Ürün
                                                Adı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText1"
                                                    placeholder="" value="{{ $stockCards->where('id', $productOut->stock_cards_id)->first()->product_name ?? 'Ürün Bulunamadı' }}" required readonly>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="output_amount" class="form-label col-sm-3 col-form-label">Çıkış
                                                Miktarı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="output_amount" placeholder=""
                                                    name="output_amount" required value="{{ $productOut->output_amount }}"
                                                    oninput="validateInput(this); updateTotal()">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="output_price" class="form-label col-sm-3 col-form-label">Çıkış
                                                Fiyatı</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="output_price" placeholder=""
                                                    name="output_price" value="{{ $productOut->output_price }}" required oninput="updateTotal()">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="total_amount" class="form-label col-sm-3 col-form-label">Toplam
                                                Tutar</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="total_amount" placeholder=""
                                                    name="total_amount" value="{{ $productOut->total_amount }}" required readonly>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="startDate" class="form-label col-sm-3 col-form-label">Çıkış
                                                Tarihi</label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <input id="startDate" class="form-control" type="date"
                                                        name="output_date" value="{{ $productOut->output_date }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="description"
                                                class="form-label col-sm-3 col-form-label">Açıklama</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="description" placeholder=""
                                                    name="description" value="{{ $productOut->description }}" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <div class="d-flex align-items-center gap-6">
                                                    <button class="btn btn-primary" type="submit">Ürün Çıkışı Düzenle</button>
                                                    <a href="{{ route('products.out.index') }}"
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
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function validateInput(input) {
            // Geçerli bir tam sayı olup olmadığını kontrol et
            input.value = input.value.replace(/[^0-9]/g, '');
        }

        function updateTotal() {
            const amount = document.getElementById('output_amount').value;
            const price = document.getElementById('output_price').value;

            // Değerleri tam sayıya dönüştür
            const amountInt = parseInt(amount) || 0;
            const priceFloat = parseFloat(price) || 0;

            // Toplamı hesapla
            const total = amountInt * priceFloat;

            // Toplam tutarı göster
            document.getElementById('total_amount').value = total.toFixed(2); // İki ondalık haneli olarak göster
        }
    </script>
@endsection
