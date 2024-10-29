<?php

namespace App\Http\Controllers;

use App\Models\StockCards;
use Illuminate\Http\Request;

class StockCardsController extends Controller
{
    public function index()
    {
        $stockCards = StockCards::all(); // Tüm kayıtları alın
        return view('products.stockCards', compact('stockCards')); // Görüntüle
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Form verilerini doğrulama
        $request->validate([
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
        ]);

        // Yeni stok kartı oluşturma
        StockCards::create([
            'product_name' => $request->product_name,
            'unit' => $request->unit,
            'status' => true,
        ]);

        // Başarılı bir şekilde kayıt yapıldıktan sonra yönlendirme
        return redirect()->route('stock.cards.index')->with('success', 'Stok kartı başarıyla oluşturuldu.');
    }

    public function show(string $id)
    {
        $stockCard = StockCards::findOrFail($id); // Kartı bul
        return view('stockCards.show', compact('stockCard')); // Görüntüle
    }

    public function edit(string $id)
    {
        $stockCard = StockCards::findOrFail($id); // Kartı bul
        return view('products.stockCards', compact('stockCard')); // Düzenleme formunu göster
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'barcode' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'unit' => 'required|string|max:100',
        ]);

        $stockCard = StockCards::findOrFail($id); // Kartı bul
        $stockCard->update($request->all()); // Güncelle
        return redirect()->route('stock.cards.index')->with('success', 'Stok kartı başarıyla güncellendi.');
    }

    public function destroy(string $id)
    {
        $stockCard = StockCards::findOrFail($id); // Kartı bul
        $stockCard->delete(); // Sil
        return redirect()->route('stock.cards.index')->with('success', 'Stok kartı başarıyla silindi.');
    }
}
