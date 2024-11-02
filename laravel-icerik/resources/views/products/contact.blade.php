@extends('layouts.app')

@section('title', 'İletişim')

@section('styles')
<style>
    /* İframe stil ayarları */
    #map {
        height: 400px;
        /* Harita yüksekliği */
        width: 100%;
        /* Harita genişliği */
        border: none;
        /* Kenarlık yok */
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
            <div class="card">
                <div class="card-body text-center">
                    <!-- text-center ile içeriği ortala -->

                    <iframe id="map"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49867.2284892962!2d34.63082493188981!3d38.6327410960004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152a6e4566fe8181%3A0x59d53f1bc98af56c!2zTmV2xZ9laGlyLCBOZXbFn2VoaXIgTWVya2V6L05ldsWfZWhpcg!5e0!3m2!1str!2str!4v1728938712160!5m2!1str!2str"
                        allowfullscreen="" loading="lazy" style="border-radius: 25px; width: 100%; height: 500px;">
                    </iframe>

                    <div class="col-lg-8 mx-auto mt-4">
                        <!-- mx-auto ile yatayda ortala -->
                        <div class="bg-white p-7 rounded-1">
                            <form>
                                <div class="d-flex flex-column gap-sm-7 gap-3">
                                    <div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
                                        <div class="d-flex flex-column flex-grow-1 gap-2">
                                            <label for="Fname" class="fs-3 fw-semibold">
                                                İsim *
                                            </label>
                                            <input type="text" name="Fname" id="Fname" placeholder="İsim"
                                                class="form-control" required>
                                        </div>
                                        <div class="d-flex flex-column flex-grow-1 gap-2">
                                            <label for="Lname" class="fs-3 fw-semibold">
                                                Soyisim *
                                            </label>
                                            <input type="text" name="Lname" id="Lname" placeholder="Soyisim"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
                                        <div class="d-flex flex-column flex-grow-1 gap-2">
                                            <label for="phone" class="fs-3 fw-semibold">
                                                Telefon Numarası *
                                            </label>
                                            <input type="phone" name="phone" id="phone" placeholder="000 000 00 00"
                                                class="form-control" required>
                                        </div>
                                        <div class="d-flex flex-column flex-grow-1 gap-2">
                                            <label for="email" class="fs-3 fw-semibold">
                                                E-Mail *
                                            </label>
                                            <input type="email" name="email" id="email" placeholder="Email"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-sm-row flex-column gap-sm-7 gap-3">
                                        <div class="d-flex flex-column flex-grow-1 gap-2">
                                            <label for="konu" class="fs-3 fw-semibold">
                                                Konu *
                                            </label>
                                            <input type="text" name="konu" id="konu" placeholder="Konu"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column gap-2">
                                        <label for="message" class="fs-3 fw-semibold">Mesajınız</label>
                                        <textarea name="message" id="message" class="form-control" rows="5"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="submit" class="btn btn-primary mt-sm-7 mt-3 px-9 py-6">Gönder</button>
                                </div>
                            </form>
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