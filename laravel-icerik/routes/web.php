<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserControlelr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockCardsController;

// Ana sayfaya gelen istekleri yönlendir
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

// Çıkış işlemi
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Giriş ve kayıt sayfalarına erişimi sınırlama
Route::middleware('guest')->group(function () {
    // Giriş sayfası
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    // Giriş işlemi
    Route::post('/login', [LoginController::class, 'login']);

    // Kayıt sayfası
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    // Kayıt işlemi
    Route::post('/register', [RegisterController::class, 'register']);
});

// Yetkilendirme gerektiren rotalar
Route::middleware('auth')->group(function () {
    // Dashboard sayfası
    Route::get('/dashboard', [UserControlelr::class, 'index',])->name('dashboard');

    Route::get('/stock/cards', [StockCardsController::class, 'index'])->name('stock.cards.index');
    Route::get('/stock/cards/create', [StockCardsController::class, 'create'])->name('stock.cards.create');
    Route::post('/stock/cards', [StockCardsController::class, 'store'])->name('stock.cards.store');
    Route::get('/stock/cards/{id}', [StockCardsController::class, 'show'])->name('stock.cards.show');
    Route::get('/stock/cards/{id}/edit', [StockCardsController::class, 'edit'])->name('stock.cards.edit');
    Route::put('/stock/cards/{id}', [StockCardsController::class, 'update'])->name('stock.cards.update');
    Route::delete('/stock/cards/{id}', [StockCardsController::class, 'destroy'])->name('stock.cards.destroy');

    Route::get('/products/stock', function () {
        return view('products.productsStock');
    });

    Route::get('/products/in', function () {
        return view('products.productsIn');
    })->name('products.in');

    Route::get('/products/out', function () {
        return view('products.productsOut');
    });

    Route::get('/help', function () {
        return view('products.help');
    });

    Route::get('/contact', function () {
        return view('products.contact');
    });
});
