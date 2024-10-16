<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login'); // Ana sayfaya gelen istekleri /login sayfasına yönlendir
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/stock/cards', function () {
    return view('products.stockCards');
});

Route::get('/products/stock', function () {
    return view('products.productsStock');
});

Route::get('/products/in', function () {
    return view('products.productsIn');
});

Route::get('/products/out', function () {
    return view('products.productsOut');
});

Route::get('/help', function () {
    return view('products.help');
});

Route::get('/contact', function () {
    return view('products.contact');
});
