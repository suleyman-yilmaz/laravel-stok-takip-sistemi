<?php

namespace App\Http\Controllers;

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

        // Kullanıcıyı doğrulama
        $credentials = $request->only('email', 'password');

        // Şifre ve e-posta ile giriş denemesi
        if (Auth::attempt($credentials)) {
            // Oturum yenile
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Giriş başarılı.');
        }

        // Şifre yanlışsa özel hata mesajı döndür
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
