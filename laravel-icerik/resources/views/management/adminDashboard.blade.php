@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.sidebar')
        <div class="body-wrapper">
            @include('layouts.header')
            <div class="body-wrapper-inner">
                <div class="container-fluid" style="background-color: white; border-radius: 30px;">
                    <form action="{{ route('admin.updateAll') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="px-4 py-3 border-bottom">
                                        <h4 class="card-title mb-0">Başlıklar</h4>
                                    </div>

                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <label for="exampleInputname" class="form-label">Başlık 1</label>
                                            <input type="text" class="form-control" id="exampleInputname" placeholder=""
                                                name="titles[1]" value="{{ $aboutTitle1->title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleInputtext1" class="form-label">Başlık 2</label>
                                            <input type="text" class="form-control" id="exampleInputtext1" placeholder=""
                                                name="titles[2]" value="{{ $aboutTitle2->title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleInputtext2" class="form-label">Başlık 4</label>
                                            <input type="text" class="form-control" id="exampleInputtext2" placeholder=""
                                                name="titles[3]" value="{{ $aboutTitle3->title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleInputtext2" class="form-label">Başlık 4</label>
                                            <input type="text" class="form-control" id="exampleInputtext3" placeholder=""
                                                name="titles[4]" value="{{ $aboutTitle4->title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleInputtext2" class="form-label">Başlık 5</label>
                                            <input type="text" class="form-control" id="exampleInputtext4" placeholder=""
                                                name="titles[5]" value="{{ $aboutTitle5->title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleInputtext2" class="form-label">Başlık 6</label>
                                            <input type="text" class="form-control" id="exampleInputtext5" placeholder=""
                                                name="titles[6]" value="{{ $aboutTitle6->title }}">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="px-4 py-3 border-bottom">
                                        <h4 class="card-title mb-0">Açıklamalar</h4>
                                    </div>

                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <label class="form-label">Açıklama 1</label>
                                            <textarea class="form-control p-7" name="descriptions[1]" id="" cols="20" rows="5" placeholder="">{{ $aboutDescription1->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Açıklama 2</label>
                                            <textarea class="form-control p-7" name="descriptions[2]" id="" cols="20" rows="5" placeholder="">{{ $aboutDescription2->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Açıklama 3</label>
                                            <textarea class="form-control p-7" name="descriptions[3]" id="" cols="20" rows="5" placeholder="">{{ $aboutDescription3->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Açıklama 4</label>
                                            <textarea class="form-control p-7" name="descriptions[4]" id="" cols="20" rows="5"
                                                placeholder="">{{ $aboutDescription4->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Açıklama 5</label>
                                            <textarea class="form-control p-7" name="descriptions[5]" id="" cols="20" rows="5"
                                                placeholder="">{{ $aboutDescription5->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Açıklama 6</label>
                                            <textarea class="form-control p-7" name="descriptions[6]" id="" cols="20" rows="5"
                                                placeholder="">{{ $aboutDescription6->description }}</textarea>
                                        </div>
                                        <button class="btn btn-primary">Güncelle</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
    </div>
@endsection
