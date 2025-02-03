<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Doğrulama kuralları
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kullanıcıyı e-posta ile al
        $user = User::where('email', $request->email)->first();

        // Kullanıcı mevcut mu ve email_verified_at alanı kontrolü
        if ($user && is_null($user->email_verified_at)) {
            return back()->withErrors([
                'email' => 'Hesabınız henüz doğrulanmamış. Lütfen e-postanızı kontrol edin.',
            ]);
        }

        // Giriş bilgilerini doğrula
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Oturum yenile
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Giriş başarılı.');
        }

        // Hatalı giriş için mesaj döndür
        return back()->withErrors([
            'email' => 'E-posta veya şifre yanlış. Lütfen tekrar deneyin.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/') - with('success', 'Çıkış başarılı.');
    }
}
