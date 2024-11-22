<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // E-posta adresinin mevcut olup olmadığını kontrol et
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->with('warning', 'Bu e-posta adresine ait bir üyelik mevcut.');
        }

        // Validation kuralları
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

        // Kullanıcı oluştur
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
        ]);

        return redirect()->route('login')->with('success', 'Üyelik başarıyla oluşturuldu.');
    }

}
