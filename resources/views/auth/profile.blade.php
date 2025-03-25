@extends('layouts.app')

@section('title', 'Profilim')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .card-subtitle {
            font-size: 1.1em;
        }
    </style>
@endsection

@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.sidebar')
        <div class="body-wrapper">
            @include('layouts.header')
            <div class="container-fluid">
                <div class="card card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="d-sm-flex align-items-center justify-space-between">
                                <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Profilim</h4>
                                <nav aria-label="breadcrumb" class="ms-auto">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item d-flex align-items-center">
                                            <a class="text-muted text-decoration-none d-flex"
                                                href="{{ route('dashboard.index') }}">
                                                <iconify-icon icon="solar:home-2-line-duotone"
                                                    class="fs-6"></iconify-icon>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                                Profilim
                                            </span>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card overflow-hidden">
                    <div class="card-body p-0">
                        <img src="{{ asset('assets/images/backgrounds/profilebg.jpg') }}" alt="materialm-img"
                            class="img-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-4 order-lg-1 order-2">
                                <div class="d-flex align-items-center justify-content-around m-4">
                                    <div class="text-center">
                                        <h4 class="mb-0 fw-semibold lh-1">
                                            {{ $user->email }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                                <div class="mt-n5">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <div class="d-flex align-items-center justify-content-center round-110">
                                            <div
                                                class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                                                <img src="@if ($user->gender == '1') {{ asset('assets/images/profile/user-1.jpg') }}
                                                            @else {{ asset('assets/images/profile/user-2.jpg') }} @endif"
                                                    alt="materialm-img" class="w-100 h-100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h5 class="mb-0">{{ $user->name }}</h5><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 order-last">
                                <ul
                                    class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-end my-3 mx-4 pe-4 gap-3">
                                    <li>
                                        <a class="d-flex align-items-center justify-content-center btn btn-primary p-2 fs-4 rounded-circle"
                                            href="https://www.linkedin.com/in/suleyman-yilmaz-888634251/" target="_blank"
                                            width="30" height="30">
                                            <i class="ti ti-brand-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                            href="https://www.suleymanyilmaz.me" target="_blank">
                                            <i class="ti ti-brand-dribbble"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn btn-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle"
                                            href="mailto:suleymanymz50@gmail.com" target="_blank">
                                            <i class="ti ti-brand-gmail"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.update') }}" class="btn btn-primary text-nowarp">
                                            Profili Düzenle
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <ul class="nav nav-pills user-profile-tab justify-content-end mt-2 bg-primary-subtle rounded-2 rounded-top-0"
                            id="pills-tab" role="tablist">
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card shadow-none border">
                                    <div class="card-body">
                                        <h4 class="mb-3">Sistem Hakkında</h4>
                                        <p class="card-subtitle">
                                            Merhaba <strong style="color: black">{{ $user->name }},</strong><br>
                                            {{ $aboutDescription1->description }}
                                        </p>
                                        <p class="card-subtitle mt-3">
                                            <strong>{{ $aboutTitle1->title }}</strong>
                                        </p>
                                        <ul class="card-subtitle">
                                            <li>
                                                <strong>{{ $aboutTitle2->title }}</strong>
                                                {{ $aboutDescription2->description }}
                                            </li><br>
                                            <li>
                                                <strong>{{ $aboutTitle3->title }}</strong>
                                                {{ $aboutDescription3->description }}
                                            </li><br>
                                            <li>
                                                <strong>{{ $aboutTitle4->title }}</strong>
                                                {{ $aboutDescription4->description }}
                                            </li><br>
                                            <li>
                                                <strong>{{ $aboutTitle5->title }}</strong>
                                                {{ $aboutDescription5->description }}
                                            </li><br>
                                            <li>
                                                <strong>{{ $aboutTitle6->title }}</strong>
                                                {{ $aboutDescription6->description }}
                                            </li>
                                        </ul>
                                        <div class="vstack gap-3 mt-4">
                                            {{-- <div class="hstack gap-6">
                                            <i class="ti ti-briefcase text-dark fs-6"></i>
                                            <h6 class="mb-0">ZeroOne Soft</h6>
                                        </div> --}}
                                            <div class="hstack gap-6">
                                                <i class="ti ti-mail text-dark fs-6"></i>
                                                <a href="mailto:suleymanymz50@gmail.com">
                                                    <h6 class="mb-0">suleymanymz50@gmail.com</h6>
                                                </a>
                                            </div>
                                            {{-- <div class="hstack gap-6">
                                            <i class="ti ti-device-desktop text-dark fs-6"></i>
                                            <a href="https://suleyman-yilmaz-portfolio.vercel.app/" target="_blank">
                                                <h6 class="mb-0">suleyman-yilmaz-portfolio.vercel.app</h6>
                                            </a>
                                        </div> --}}
                                            <div class="hstack gap-6">
                                                <i class="ti ti-map-pin text-dark fs-6"></i>
                                                <a href="https://maps.app.goo.gl/wHbyN6D4UHQ7CxRc7" target="_blank">
                                                    <h6 class="mb-0">Nevşehir</h6>
                                                </a>
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
