@extends('layouts.app')

@section('title', 'Email Doğrula')

@section('content')
    <div id="main-wrapper">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body pt-5">
                                <div class="mb-5 text-center">
                                    <p>E-postanıza bir doğrulama kodu gönderdik. E-postanıza gönderilen kodu aşağıdaki
                                        alana girin.</p>
                                    <h6 class="fw-bolder"></h6>
                                </div>
                                <form method="POST" action="{{ route('verify.email.post') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="verification_code" class="form-label fw-semibold">6 haneli güvenlik
                                            kodunuzu yazın</label>
                                        <div class="d-flex align-items-center gap-2 gap-sm-3">
                                            <input type="text" class="form-control code-input" maxlength="1"
                                                   oninput="moveToNext(this, 1)">
                                            <input type="text" class="form-control code-input" maxlength="1"
                                                   oninput="moveToNext(this, 2)">
                                            <input type="text" class="form-control code-input" maxlength="1"
                                                   oninput="moveToNext(this, 3)">
                                            <input type="text" class="form-control code-input" maxlength="1"
                                                   oninput="moveToNext(this, 4)">
                                            <input type="text" class="form-control code-input" maxlength="1"
                                                   oninput="moveToNext(this, 5)">
                                            <input type="text" class="form-control code-input" maxlength="1"
                                                   oninput="moveToNext(this, 6)">
                                        </div>
                                    </div>
                                    <input type="hidden" name="verification_code" id="verification_code">
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4">Hesabımı Doğrula
                                    </button>
                                </form>

                                <script>
                                    function moveToNext(currentInput, index) {
                                        const codeInputs = document.querySelectorAll('.code-input');
                                        const verificationCodeInput = document.getElementById('verification_code');

                                        // Otomatik geçiş
                                        if (currentInput.value && index < codeInputs.length) {
                                            codeInputs[index].focus();
                                        }

                                        // Kullanıcı "backspace" yaparsa geri dön
                                        if (currentInput.value === "" && index > 1) {
                                            codeInputs[index - 2].focus();
                                        }

                                        // Tüm kodu birleştir ve gizli inputa yaz
                                        let code = "";
                                        codeInputs.forEach((input) => {
                                            code += input.value;
                                        });
                                        verificationCodeInput.value = code;
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dark-transparent sidebartoggler"></div>
@endsection
