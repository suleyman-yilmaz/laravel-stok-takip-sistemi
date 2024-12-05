<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type === 1) {
            return $next($request); // Kullanıcı türü 1 ise devam et
        }

        // Yetkisiz kullanıcıyı yönlendir veya hata döndür
        return redirect()->route('dashboard.index')->with('error', 'Bu alana erişim yetkiniz yok.');
    }
}
