<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstantStock;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsInController;
use App\Http\Controllers\ProductsOutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StockCardsController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserControlelr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [UserControlelr::class, 'index'])->name('profile.index');

    Route::get('/stock/cards', [StockCardsController::class, 'index'])->name('stock.cards.index');
    Route::get('/stock/cards/create', [StockCardsController::class, 'create'])->name('stock.cards.create');
    Route::post('/stock/cards', [StockCardsController::class, 'store'])->name('stock.cards.store');
    Route::get('/stock/cards/{id}', [StockCardsController::class, 'show'])->name('stock.cards.show');
    Route::get('/stock/cards/{id}/edit', [StockCardsController::class, 'edit'])->name('stock.cards.edit');
    Route::put('/stock/cards/{id}', [StockCardsController::class, 'update'])->name('stock.cards.update');
    Route::delete('/stock/cards/{id}', [StockCardsController::class, 'destroy'])->name('stock.cards.destroy');
    Route::get('/stock/cards/search/{query?}', [StockCardsController::class, 'searchProduct'])->name('stock.cards.searchProduct');

    Route::get('/products/stock', [InstantStock::class, 'index'])->name('products.stock.index');
    Route::get('/products/stock/search/{query?}', [InstantStock::class, 'searchProduct'])->name('products.stock.searchProductStock');

    Route::get('/products/in', [ProductsInController::class, 'index'])->name('products.in.index');
    Route::post('/products/in', [ProductsInController::class, 'store'])->name('products.in.store');
    Route::get('/products/in/{id}/edit/{stockid}', [ProductsInController::class, 'edit'])->name('products.in.edit');
    Route::put('/products/in/{id}/{stockid}', [ProductsInController::class, 'update'])->name('products.in.update');
    Route::delete('/products/in/{id}', [ProductsInController::class, 'destroy'])->name('products.in.destroy');
    Route::get('/products/in/search/{query?}', [ProductsInController::class, 'searchProduct'])->name('products.in.searchProductStock');

    Route::get('/products/out', [ProductsOutController::class, 'index'])->name('products.out.index');
    Route::post('/products/out', [ProductsOutController::class, 'store'])->name('products.out.store');
    Route::get('/products/out/{id}/edit/{stockid}', [ProductsOutController::class, 'edit'])->name('products.out.edit');
    Route::put('/products/out/{id}/{stockid}', [ProductsOutController::class, 'update'])->name('products.out.update');
    Route::delete('/products/out/{id}', [ProductsOutController::class, 'destroy'])->name('products.out.destroy');
    Route::get('/products/out/search/{query?}', [ProductsOutController::class, 'searchProduct'])->name('products.out.searchProductStock');

    Route::get('/todo', [ToDoController::class, 'index'])->name('todo.index');
    Route::post('/todo', [ToDoController::class, 'store'])->name('todo.store');
    Route::put('/todo', [ToDoController::class, 'complated'])->name('todo.complated');
    Route::put('/todo/{id}', [ToDoController::class, 'update'])->name('todo.update');
    Route::delete('todo/{id}', [ToDoController::class, 'destroy'])->name('todo.destroy');

    
    Route::get('/help', function () {
        return view('products.help');
    })->name('help.index');

    Route::get('/contact', function () {
        return view('products.contact');
    })->name('contact.index');
});
