<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validation mesajları
        $validationMessages = [
            'name.required' => 'İsim alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi girin.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.min' => 'Şifreniz en az 8 karakter uzunluğunda olmalıdır.',
            'password.confirmed' => 'Şifre onayı hatalıdır.',
            'gender.required' => 'Cinsiyet alanı zorunludur.',
        ];

        // Validation işlemi
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required|in:0,1',
        ], $validationMessages);

        // Doğrulama hatalarını kontrol et
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Doğrulama kodunu oluştur (6 haneli)
        $verificationCode = random_int(100000, 999999);

        // Kullanıcı oluştur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'verification_code' => $verificationCode,
        ]);
        // E-posta gönder
        Mail::send('emails.verify', ['code' => $verificationCode], function ($message) use ($user) {
            $message->to($user->email)->subject('E-Posta Doğrulama Kodu');
        });
        
        session(['email_verification_pending' => true]);

        // Doğrulama ekranına yönlendir
        return redirect()->route('verify.email')->with('success', 'Doğrulama kodu e-posta adresinize gönderildi.');
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|digits:6',
        ]);

        $user = User::where('verification_code', $request->verification_code)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Girilen doğrulama kodu geçersiz.');
        }

        $user->update([
            'email_verified_at' => now(),
            'verification_code' => null,
        ]);

        return redirect('/dashboard')->with('success', 'E-posta adresiniz başarıyla doğrulandı.');
    }
}
