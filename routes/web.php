<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsInController;
use App\Http\Controllers\ProductsOutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StockCardsController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserControlelr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('verify/email', function () {
    return view('auth.verifyEmail');
})->middleware('email.verification.pending')->name('verify.email');

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

    Route::post('verify/email', [RegisterController::class, 'verifyEmail'])->name('verify.email.post');

    // Kayıt işlemi
    Route::post('/register', [RegisterController::class, 'register']);
});

// Yetkilendirme gerektiren rotalar
Route::middleware('auth')->group(function () {
    //     // Admin Dashboard sayfası

    Route::prefix('admin')->middleware('check.if.admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/contact', [AdminController::class, 'contact'])->name('admin.contact');
        Route::delete('/contact/{id}', [AdminController::class, 'destroy'])->name('admin.contact.destroy');
        Route::put('/contact/{id}', [AdminController::class, 'updateContact'])->name('admin.contact.update');
        Route::put('/updateAll', [AdminController::class, 'updateAll'])->name('admin.updateAll');
    });


    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::post('/in', [DashboardController::class, 'storeProductEntry'])->name('product.in');
        Route::post('/out', [DashboardController::class, 'storeProductExit'])->name('product.out');
    });


    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [UserControlelr::class, 'index'])->name('index');
        Route::get('/update', [UserControlelr::class, 'update'])->name('update');
        Route::post('/update-password', [UserControlelr::class, 'updateProfile'])->name('updateProfile');
    });


    Route::prefix('stock/cards')->name('stock.cards.')->group(function () {
        Route::get('/', [StockCardsController::class, 'index'])->name('index');
        Route::post('/', [StockCardsController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [StockCardsController::class, 'edit'])->name('edit');
        Route::put('/{id}', [StockCardsController::class, 'update'])->name('update');
        Route::delete('/{id}', [StockCardsController::class, 'destroy'])->name('destroy');
        Route::get('/search/{query?}', [StockCardsController::class, 'searchProduct'])->name('searchProduct');
    });


    Route::prefix('products/stock')->name('products.stock.')->group(function () {
        Route::get('/', [StockCardsController::class, 'showUserStockLevels'])->name('index');
        Route::get('/search/{query?}', [StockCardsController::class, 'searchProductInstantStock'])->name('searchProductStock');
    });


    Route::prefix('products/in')->name('products.in.')->group(function () {
        Route::get('/', [ProductsInController::class, 'index'])->name('index');
        Route::post('/', [ProductsInController::class, 'store'])->name('store');
        Route::get('/{id}/edit/{stockid}', [ProductsInController::class, 'edit'])->name('edit');
        Route::put('/{id}/{stockid}', [ProductsInController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductsInController::class, 'destroy'])->name('destroy');
        Route::get('/search/{query?}', [ProductsInController::class, 'searchProduct'])->name('searchProductStock');

        Route::get('/api/search', [ProductsInController::class, 'searchProductIn'])->name('search');
    });

    Route::prefix('products/out')->name('products.out.')->group(function () {
        Route::get('/', [ProductsOutController::class, 'index'])->name('index');
        Route::post('/', [ProductsOutController::class, 'store'])->name('store');
        Route::get('/{id}/edit/{stockid}', [ProductsOutController::class, 'edit'])->name('edit');
        Route::put('/{id}/{stockid}', [ProductsOutController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductsOutController::class, 'destroy'])->name('destroy');
        Route::get('/search/{query?}', [ProductsOutController::class, 'searchProduct'])->name('searchProductStock');

        Route::get('/api/search', [ProductsOutController::class, 'searchProductOut'])->name('search');
    });

    Route::prefix('todo')->name('todo.')->group(function () {
        Route::get('/', [TodoController::class, 'index'])->name('index');
        Route::post('/', [TodoController::class, 'store'])->name('store');
        Route::put('/', [TodoController::class, 'complated'])->name('complated');
        Route::put('/{id}', [TodoController::class, 'update'])->name('update');
        Route::delete('/{id}', [TodoController::class, 'destroy'])->name('destroy');
    });

    Route::get('/help', function () {
        return view('products.help');
    })->name('help.index');

    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/', [ContactsController::class, 'index'])->name('index');
        Route::post('/', [ContactsController::class, 'store'])->name('store');
    });
});
