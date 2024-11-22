<?php

namespace App\Http\Controllers;

use App\Models\StockCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockCardsController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $stockCards = StockCards::where('user_id', Auth::id())->paginate($perPage)->appends($request->except('per_page'));
        return view('products.stockCards', compact('stockCards'));
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
            'user_id' => Auth::id(), // Oturum açmış kullanıcının ID'sini kaydet
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
        return view('edit.stockCardEdit', compact('stockCard')); // Düzenleme formunu göster
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
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

        // Kayıtları kontrol et
        $hasProductsIn = $stockCard->productsIn()->exists();
        $hasProductsOut = $stockCard->productsOut()->exists();

        // Uygun mesajı belirle
        if ($hasProductsIn && $hasProductsOut) {
            return redirect()->route('stock.cards.index')->with('warning', 'Bu ürüne ait giren ve çıkan kayıtlar bulunuyor. Silme işlemi gerçekleştirilemez.');
        } elseif ($hasProductsIn) {
            return redirect()->route('stock.cards.index')->with('warning', 'Bu ürüne ait giren kayıtlar bulunuyor. Silme işlemi gerçekleştirilemez.');
        } elseif ($hasProductsOut) {
            return redirect()->route('stock.cards.index')->with('warning', 'Bu ürüne ait çıkan kayıtlar bulunuyor. Silme işlemi gerçekleştirilemez.');
        }

        $stockCard->delete(); // Sil
        return redirect()->route('stock.cards.index')->with('success', 'Stok kartı başarıyla silindi.');
    }

    public function searchProduct(Request $request)
    {
        $query = $request->query('query');
        $userId = Auth::id(); // Oturum açmış kullanıcının ID'sini al

        // Sayfa başına gösterilecek sonuç sayısını al, varsayılan olarak 5 ayarla
        $perPage = $request->get('per_page', 9999999999999999);

        $stockCards = StockCards::where('user_id', $userId);

        if (!empty($query)) {
            $stockCards->where('product_name', 'LIKE', '%' . $query . '%');
        }

        $stockCards = $stockCards->paginate($perPage);

        return view('products.stockCards', compact('stockCards'));
    }

}
