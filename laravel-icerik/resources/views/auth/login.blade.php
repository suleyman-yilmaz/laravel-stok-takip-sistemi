@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <!-- Logo yerine Stok Takip Sistemi başlığı -->
                                <h1 class="title-text">Stok Takip Sistemi</h1>
                                <!-- <p class="text-center">Your Social Campaigns</p> -->
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">E-Mail</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Şifre</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Bu cihazı hatırla
                                            </label>
                                        </div>
                                        <a class="text-primary fw-bold" href="./index.html">Şifremi unuttum</a>
                                    </div>
                                    <a href="/dashboard" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Giriş
                                        Yap</a>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Üye olmak istiyorum</p>
                                        <a class="text-primary fw-bold ms-2" href="/register">Hesap
                                            oluştur</a>
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
