<?php

namespace App\Http\Controllers;

use App\Models\StockCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $stockCards = StockCards::where('user_id', Auth::id())->paginate($perPage)->appends($request->except('per_page'));
        return view('products.stockCards', compact('stockCards'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stockCard = StockCards::findOrFail($id); // Kartı bul

        if (!$stockCard) {
            return redirect()->route('stock.cards.index')
                ->with('error', 'Stok Kartı Bulunamadı.');
        }

        $currentUserId = Auth::id();

        if ($stockCard->user_id !== $currentUserId) {
            return redirect()->route('stock.cards.index')
                ->with('error', 'Bu işlemi yapmaya yetkiniz yok.');
        }
        return view('edit.stockCardEdit', compact('stockCard')); // Düzenleme formunu göster
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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

    public function showUserStockLevels()
    {
        // Giriş yapmış kullanıcının ID'sini alın
        $userId = Auth::id();

        // Stok kartları için ilgili giriş ve çıkışları, yalnızca kullanıcıya ait olanları al
        $stockCards = StockCards::with(['productsIn' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }, 'productsOut' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
            ->where('user_id', $userId)
            ->get();

        $stockData = $stockCards->map(function ($stockCard) {
            $totalInput = $stockCard->productsIn->sum(function ($productIn) {
                return (int) $productIn->input_amount;
            });

            $totalOutput = $stockCard->productsOut->sum(function ($productOut) {
                return (int) $productOut->output_amount;
            });

            $currentStock = $totalInput - $totalOutput;

            return [
                'stock_card_id' => $stockCard->id,
                'product_name' => $stockCard->product_name,
                'unit' => $stockCard->unit,
                'total_input' => $totalInput,
                'total_output' => $totalOutput,
                'current_stock' => $currentStock,
            ];
        });

        return view('products.productsStock', compact('stockData'));
    }

    public function searchProductInstantStock(Request $request)
    {
        $userId = Auth::id();
        $search = $request->input('search');

        $stockCardsQuery = StockCards::with(['productsIn' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }, 'productsOut' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
            ->where('user_id', $userId);

        if (!empty($search)) {
            $stockCardsQuery->where('product_name', 'like', '%' . $search . '%');
        }

        $stockData = $stockCardsQuery->get()->map(function ($stockCard) {
            $totalInput = $stockCard->productsIn->sum(function ($productIn) {
                return (int) $productIn->input_amount;
            });

            $totalOutput = $stockCard->productsOut->sum(function ($productOut) {
                return (int) $productOut->output_amount;
            });

            $currentStock = $totalInput - $totalOutput;

            return [
                'stock_card_id' => $stockCard->id,
                'product_name' => $stockCard->product_name,
                'unit' => $stockCard->unit,
                'total_input' => $totalInput,
                'total_output' => $totalOutput,
                'current_stock' => $currentStock,
            ];
        });

        return view('products.productsStock', compact('stockData', 'search'));
    }

}
