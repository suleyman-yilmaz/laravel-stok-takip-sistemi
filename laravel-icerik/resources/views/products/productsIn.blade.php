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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
