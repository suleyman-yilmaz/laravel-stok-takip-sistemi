@extends('layouts.app')

@section('title', 'Profil Güncelleme')

@section('content')
@include('layouts.sidebar')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('layouts.sidebar')
    <div class="body-wrapper">
        @include('layouts.header')
        <div class="body-wrapper-inner">
            <div class="container-fluid" style="background-color: white; border-radius: 30px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="px-4 py-3 border-bottom">
                                <h4 class="card-title mb-0">Profil Güncelle</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('profile.updateProfile')}}" method="POST">
                                    @csrf
                                    <div class="mb-4 row align-items-center">
                                        <label for="exampleInputText1" class="form-label col-sm-3 col-form-label">İsim</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputText1" value="{{ $user->name }}" name="name">
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label for="exampleInputText2" class="form-label col-sm-3 col-form-label">E-Mail</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="exampleInputText2" value="{{ $user->email }}" name="email">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label col-sm-3 col-form-label">Cinsiyet</label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gender0" value="0" {{ $user->gender == 0 ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="gender0">Kız</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="gender1" value="1" {{ $user->gender == 1 ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="gender1">Erkek</label>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="mb-4 row align-items-center">
                                        <label for="old_password" class="form-label col-sm-3 col-form-label">Eski Şifre</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="old_password" name="old_password" required>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label for="new_password" class="form-label col-sm-3 col-form-label">Yeni Şifre</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label for="new_password_confirmation" class="form-label col-sm-3 col-form-label">Yeni Şifre Onay</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary">Güncelle</button>
                                            <a href="{{ route('profile.index') }}" class="btn btn-danger">İptal Et</a>
                                        </div>
                                    </div>
                                </form>
                                
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