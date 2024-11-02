@extends('layouts.app')

@section('title', 'Giriş Yap')

@section('styles')
<style>
    .title-text {
        font-size: 48px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
        class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="card mb-0">
                        <div class="card-body">
                            <!-- Logo yerine Stok Takip Sistemi başlığı -->
                            <h1 class="title-text">Stok Takip Sistemi</h1>
                            <!-- <p class="text-center">Your Social Campaigns</p> -->
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-Mail</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Şifre</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Giriş
                                    Yap</button>

                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Üye olmak istiyorum</p>
                                    <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Hesap
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