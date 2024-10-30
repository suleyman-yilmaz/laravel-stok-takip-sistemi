<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsOut;
use App\Models\StockCards;

class ProductsOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productsOut = ProductsOut::all(); // Tüm kayıtları alın
        $stockCards = StockCards::all(); // Tüm kayıtları alın
        return view('products.productsOut', compact('productsOut', 'stockCards')); // Görüntüle
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'stock_cards_id' => 'required|integer|exists:stock_cards,id', // stock_cards tablosunda mevcut olmalı
            'output_amount' => 'required|integer|min:1', // Pozitif tamsayı olmalı
            'output_price' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı
            'total_amount' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı, genellikle otomatik hesaplanır
            'output_date' => 'required|date', // Geçerli bir tarih formatı
            'description' => 'required|string|max:255', // Boş olabilir, ancak maksimum 255 karakter içermeli
        ]);

        // Yeni çıkış oluşturma
        ProductsOut::create([
            'stock_cards_id' => $request->stock_cards_id,
            'output_amount' => $request->output_amount,
            'output_price' => $request->output_price,
            'total_amount' => $request->total_amount,
            'output_date' => $request->output_date,
            'description' => $request->description,
        ]);

        // Başarılı bir şekilde kayıt yapıldıktan sonra yönlendirme
        return redirect()->route('products.out.index')->with('success', 'Ürün çıkışı başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productOut = ProductsOut::findOrFail($id); // ID'ye göre kaydı bul
        $productOut->delete(); // Kaydı sil
        return redirect()->route('products.out.index')->with('success', 'Ürün çıkışı başarıyla silindi.');
    }
}
