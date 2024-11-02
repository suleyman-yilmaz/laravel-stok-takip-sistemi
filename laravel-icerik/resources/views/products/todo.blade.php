@extends('layouts.app')

@section('title', 'Yapılacaklar')

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
                            <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">Yapılacaklar</h4>
                            <nav aria-label="breadcrumb" class="ms-auto">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item d-flex align-items-center">
                                        <a class="text-muted text-decoration-none d-flex" href="{{route('dashboard')}}">
                                            <iconify-icon icon="solar:home-2-line-duotone" class="fs-6"></iconify-icon>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                            Yapılacaklar
                                        </span>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yan Yana Kartlar -->
            <div class="row mt-4">
                <!-- Yapılacaklar Kartı -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Yapılacaklar</h5>

                            <!-- Yeni İş Ekleme Alanı -->
                            <form id="todo-form" action="{{ route('todo.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" id="todo-id" value="">
                                <div class="input-group mb-3">
                                    <input type="text" name="task" id="todo-input" class="form-control"
                                        placeholder="Yeni görev girin." aria-label="Yeni iş" maxlength="255" required>
                                    <button class="btn btn-primary" type="submit" id="submit-button">Ekle</button>
                                </div>
                            </form>

                            <!-- Dinamik Yapılacak İşler -->
                            <div class="d-flex flex-column gap-2">
                                @foreach ($todos as $todo)
                                <div class="card p-2 d-flex flex-row align-items-center justify-content-between">
                                    <span class="fw-bold">{{ $todo->task }}</span>
                                    <div>
                                        <form action="{{ route('todo.complated') }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{ $todo->id }}">
                                            <button class="btn btn-sm btn-success" type="submit">Tamamla</button>
                                        </form>
                                        <button class="btn btn-sm btn-warning text-white"
                                            onclick="editTask('{{ $todo->id }}', '{{ $todo->task }}')">Düzenle</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Yapıldı Kartı -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Yapıldı</h5>

                            <!-- Dinamik Tamamlanan İşler -->
                            <div class="d-flex flex-column gap-2">
                                @foreach ($completed as $task)
                                <div class="card p-2 d-flex flex-row align-items-center justify-content-between">
                                    <span class="fw-bold">{{ $task->task }}</span>
                                    <form action="{{ route('todo.destroy', $task->id) }}" method="POST"
                                        onsubmit="return confirm('Silmek istediğinize emin misiniz? Silinen Görevler Geri Getirilemez!');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Sil
                                        </button>
                                    </form>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Yan Yana Kartlar Sonu -->
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
    function editTask(id, task) {
        // Görev bilgisini input alanına yerleştir
        document.getElementById('todo-id').value = id;
        document.getElementById('todo-input').value = task;

        // Ekle butonunu Güncelle butonu olarak değiştir
        document.getElementById('submit-button').innerText = 'Güncelle';
        
        // Form action'ını güncelle
        document.getElementById('todo-form').action = "{{ route('todo.update', '') }}/" + id;

        // Formun methodunu PUT olarak ayarlayın
        document.getElementById('todo-form').method = 'POST'; // HTML form methodunu POST olarak ayarlayın
        // PUT metodunu belirtmek için hidden bir input ekleyin
        let hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = '_method'; // Laravel'de PUT için bu adı kullanır
        hiddenInput.value = 'PUT'; // PUT methodunu belirtin
        document.getElementById('todo-form').appendChild(hiddenInput);
    }
</script>
@endsection