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
                                <a href="{{route('stock.cards.index')}}" class="card-text">Stok Takip Sistemi / Stok
                                    Kartı İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Stok Kartı Nasıl Silinir?</h5>
                                <a href="{{route('stock.cards.index')}}" class="card-text">Stok Takip Sistemi / Stok
                                    Kartı İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Stok Kartı Nasıl Düzenlenir?</h5>
                                <a href="{{route('stock.cards.index')}}" class="card-text">Stok Takip Sistemi / Stok
                                    Kartı İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Anlık Stok Ürün Adına Göre Nasıl Sorgulanır?</h5>
                                <a href="{{route('products.stock.index')}}" class="card-text">Stok Takip Sistemi / Anlık
                                    Stok İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Ürün Girişi Nasıl Yapılır?</h5>
                                <a href="{{route('products.in.index')}}" class="card-text">Stok Takip Sistemi / Ürün
                                    Giriş İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Ürün Girişi Silme İşlemi Nasıl Yapılır?</h5>
                                <a href="{{route('products.in.index')}}" class="card-text">Stok Takip Sistemi / Ürün
                                    Giriş İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Ürün Girişi Düzenleme İşlemi Nasıl Yapılır?</h5>
                                <a href="{{route('products.in.index')}}" class="card-text">Stok Takip Sistemi / Ürün
                                    Giriş İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Ürün Girişi Ürün Adına Göre Nasıl Sorgulanır?</h5>
                                <a href="{{route('products.in.index')}}" class="card-text">Stok Takip Sistemi / Ürün
                                    Giriş Sorgulama İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Ürün Çıkışı Nasıl Yapılır?</h5>
                                <a href="{{route('products.out.index')}}" class="card-text">Stok Takip Sistemi / Ürün
                                    Çıkış İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Ürün Çıkışı Silme İşlemi Nasıl Yapılır?</h5>
                                <a href="{{route('products.out.index')}}" class="card-text">Stok Takip Sistemi / Ürün
                                    Çıkış İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Ürün Çıkışı Düzenleme İşlemi Nasıl Yapılır?</h5>
                                <a href="{{route('products.out.index')}}" class="card-text">Stok Takip Sistemi / Ürün
                                    Çıkış İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Ürün Çıkışı Ürün Adına Göre Nasıl Sorgulanır?</h5>
                                <a href="{{route('products.out.index')}}" class="card-text">Stok Takip Sistemi / Ürün
                                    Çıkışı Sorgulama İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">İletişim - Destek Sayfasında Talep Nasıl Gönderilir?</h5>
                                <a href="{{route('contact.index')}}" class="card-text">Stok Takip Sistemi / Destek Talep
                                    İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Stok Kartı Nasıl Oluşturulur?</h5>
                                <a href="/stock/cards" class="card-text">Stok Takip Sistemi / Stok Kartı İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Stok Kartı Nasıl Oluşturulur?</h5>
                                <a href="/stock/cards" class="card-text">Stok Takip Sistemi / Stok Kartı İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="https://img.youtube.com/vi/13-sRkfTq2Y/maxresdefault.jpg" class="card-img-top"
                                    alt="Video Thumbnail">
                                <h5 class="card-title mt-3">Stok Kartı Nasıl Oluşturulur?</h5>
                                <a href="/stock/cards" class="card-text">Stok Takip Sistemi / Stok Kartı İşlemleri</a>
                                <p></p>
                                <button class="btn btn-primary openVideo" data-bs-toggle="modal"
                                    data-bs-target="#videoModal" data-ytid="13-sRkfTq2Y">Videoyu İzle</button>
                            </div>
                        </div>
                    </div>

                    <!-- Video Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <!-- Changed modal-lg to modal-xl for a larger size -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="videoModalLabel">Videoyu İzleyip İlgili Adımları
                                        Uygulayabilirsiniz</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="ratio ratio-16x9">
                                        <iframe id="videoFrame" src="" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
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

    @section('scripts')
    <script>
        $(document).on('click', '.openVideo', function () {
            var videoId = $(this).data('ytid');
            var videoSrc = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&vq=hd1080';
            $('#videoFrame').attr('src', videoSrc);
        });

        $('#videoModal').on('hidden.bs.modal', function () {
            $('#videoFrame').attr('src', '');
        });
    </script>
    @endsection