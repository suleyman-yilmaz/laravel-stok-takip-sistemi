<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Giriş yapan kullanıcıyı kontrol et
        if (Auth::check()) {
            // Kullanıcının ID'sini al
            $userId = Auth::id();

            // Admin tablosunda user_id = 1 olan bir kayıt var mı diye kontrol et
            $isAdmin = DB::table('admin')->where('user_id', $userId)->exists();

            // Eğer user_id 1 olan admin tablosunda kayıt varsa, yönlendirmeye izin ver
            if ($isAdmin && $userId == 1) {
                return $next($request);
            }
        }

        // Koşullar sağlanmazsa başka bir sayfaya yönlendir
        return redirect()->route('dashboard');
    }
}
