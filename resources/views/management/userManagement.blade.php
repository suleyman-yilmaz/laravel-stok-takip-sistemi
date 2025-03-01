@extends('layouts.app')

@section('title', 'Admin Panel')

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
                                <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Kullanıcı Yönetimi</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom">
                        <h4 class="card-title mb-0">Kullanıcılar</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive mb-4 border rounded-1">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                <tr>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">İsim</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Email</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Type</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">Email Doğrulama</h6>
                                    </th>
                                    <th>
                                        <h6 class="fs-4 fw-semibold mb-0">İşlemler</h6>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-3">
                                                    <h6 class="fs-4 fw-semibold mb-0">{{ $user->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="fs-4 fw-semibold mb-0">{{ $user->email }}</h6>
                                        </td>
                                        <td>
                                            <h6 class="fs-4 fw-semibold mb-0">@if($user->type == 1)
                                                    Admin
                                                @else
                                                    EndUser
                                                @endif</h6>
                                        </td>
                                        <td>
                                            <h6 class="fs-4 fw-semibold mb-0">@if($user->email_verified_at)
                                                    <span class="badge bg-success">Doğrulanmış</span>
                                                @else
                                                    <span class="badge bg-danger">Doğrulanmamış</span>
                                                @endif</h6>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <form action="{{ route('admin.user.make.admin', $user->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-primary me-2">
                                                    <i class="ti ti-user fs-6"></i>
                                                </button>
                                                <input type="hidden" name="type" value="@if($user->type == 1) 0 @else 1 @endif">
                                            </form>

                                            <form action="{{ route('admin.user.verify', $user->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm btn-success me-2">
                                                    <i class="ti ti-check fs-6"></i>
                                                </button>
                                                <input type="hidden" name="email_verified_at" value="{{now()}}">
                                            </form>

                                            <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="ti ti-trash fs-6"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
