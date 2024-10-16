@extends('layouts.app')

@section('title', 'Yardım')

@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layouts.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('layouts.header')
            <!--  Header End -->

            <!-- Video Cards Section -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                        alt="Video Thumbnail">
                                    <h5 class="card-title mt-3">Stok Kartı Nasıl Oluşturulur?</h5>
                                    <p class="card-text">Stok Takip Sistemi / Stok Kartı İşlemleri</p>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal"
                                        data-ytid="13-sRkfTq2Y">Watch Video</button>
                                </div>
                            </div>
                        </div>

                        <!-- Video Modal -->
                        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="videoModalLabel">Watch Video</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="ratio ratio-16x9">
                                            <iframe id="videoFrame" src="https://youtu.be/13-sRkfTq2Y" frameborder="0"
                                                allowfullscreen></iframe>
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
