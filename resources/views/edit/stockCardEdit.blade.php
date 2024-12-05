@extends('layouts.app')

@section('title', 'Stok Kart Düzenleme')

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
                                <form action="{{ route('stock.cards.update', ['id' => $stockCard->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="px-4 py-3 border-bottom d-flex justify-content-between align-items-center">
                                        <h4 class="card-title mb-0">Stok Kartı Düzenleme</h4>
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
                                                    name="product_name" value="{{ $stockCard->product_name }}" required>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label for="exampleInputText2"
                                                class="form-label col-sm-3 col-form-label">Birimi</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="exampleInputText2"
                                                    name="unit" value="{{ $stockCard->unit }}" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9">
                                                <div class="d-flex align-items-center gap-6">
                                                    <button class="btn btn-primary" type="submit">Stok Kartı
                                                        Düzenle</button>
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
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
