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
                                <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">İletişim Destek Talepleri</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card w-100 position-relative overflow-hidden">
                    <div class="px-4 py-3 border-bottom">
                        <h4 class="card-title mb-0">İletişim Destek Talepleri</h4>
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
                                            <h6 class="fs-4 fw-semibold mb-0">Soyisim</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Telefon Numarası</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Email</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Konu</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">Durumu</h6>
                                        </th>
                                        <th>
                                            <h6 class="fs-4 fw-semibold mb-0">İşlemler</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-3">
                                                        <h6 class="fs-4 fw-semibold mb-0">{{ $contact->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="fs-4 fw-semibold mb-0">{{ $contact->surname }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="fs-4 fw-semibold mb-0">{{ $contact->phone_number }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="fs-4 fw-semibold mb-0">{{ $contact->email }}</h6>
                                            </td>
                                            <td>
                                                <h6 class="fs-4 fw-semibold mb-0">{{ $contact->subject }}</h6>
                                            </td>
                                            <td>
                                                @if ($contact->status == 0)
                                                    <span class="badge bg-danger">Yapılacak</span>
                                                @else
                                                    <span class="badge bg-success">Yapıldı</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{ $contact->id }}"><i
                                                        class="ti ti-eye fs-6"></i></a>
                                                <form action="{{ route('admin.contact.destroy', $contact->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Bu mesajı silmek istediğinize emin misiniz?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link text-danger p-0 m-0">
                                                        <i class="ti ti-trash fs-6"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>



                                        <!-- Modal -->
                                        <div class="modal fade" id="detailModal{{ $contact->id }}" tabindex="-1"
                                            aria-labelledby="detailModalLabel{{ $contact->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detailModalLabel{{ $contact->id }}">
                                                            İletişim Detayları</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <strong>İsim:</strong>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            {{ $contact->name }}
                                                        </div>
                                                        <div class="mb-3">
                                                            <strong>Soyisim:</strong> &nbsp; {{ $contact->surname }}
                                                        </div>
                                                        <div class="mb-3">
                                                            <strong>Telefon:</strong> &nbsp;&nbsp;
                                                            {{ $contact->phone_number }}
                                                        </div>
                                                        <div class="mb-3">
                                                            <strong>Email:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            {{ $contact->email }}
                                                        </div>
                                                        <div class="mb-3">
                                                            <strong>Konu:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            {{ $contact->subject }}
                                                        </div>
                                                        <div class="mb-3">
                                                            <strong>Mesaj:</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            {{ $contact->message }}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Kapat</button>
                                                        <form action="{{ route('admin.contact.update', $contact->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="btn {{ $contact->status == 0 ? 'btn-success' : 'btn-danger' }}">
                                                                {{ $contact->status == 0 ? 'Yapıldı Olarak İşaretle' : 'Yapılacak Olarak İşaretle' }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
