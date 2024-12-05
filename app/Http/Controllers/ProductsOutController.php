<?php

namespace App\Http\Controllers;

use App\Models\ProductsOut;
use App\Models\StockCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductsOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stockcards = StockCards::where('user_id', Auth::id())->get();
        // Sayfa başına gösterilecek satır sayısını al
        $perPage = $request->get('per_page', 10); // Varsayılan olarak 5 satır göster

        // Sayfalandırmayı uygulayın
        $productsOut = ProductsOut::where('user_id', Auth::id())
            ->with('stockCard')
            ->paginate($perPage)
            ->appends($request->except('per_page'));

        return view('products.productsOut', compact('productsOut', 'stockcards'));
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
        $userId = Auth::id();

        $validator = Validator::make($request->all(), [
            'stock_cards_id' => 'required|exists:stock_cards,id',
            'output_amount' => 'required|integer|min:1',
            'output_price' => 'required|string',
            'total_amount' => 'required|string',
            'output_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        ProductsOut::create([
            'stock_cards_id' => $request->stock_cards_id,
            'user_id' => $userId,
            'output_amount' => $request->output_amount,
            'output_price' => $request->output_price,
            'total_amount' => $request->total_amount,
            'output_date' => $request->output_date,
            'description' => $request->description,
        ]);

        return redirect()->route('products.out.index')
            ->with('success', 'Ürün çıkışı başarıyla kaydedildi.');
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
    public function edit(string $id, string $stockid)
    {
        $productOut = ProductsOut::find($id);

        if (!$productOut) {
            return redirect()->route('products.out.index')
                ->with('error', 'Ürün çıkışı bulunamadı.');
        }

        $currentUserId = Auth::id();

        if ($productOut->user_id !== $currentUserId) {
            return redirect()->route('products.out.index')
                ->with('error', 'Bu işlemi yapmaya yetkiniz yok.');
        }

        $stockCard = StockCards::find($stockid);
        if (!$stockCard || $stockCard->user_id !== $currentUserId) {
            return redirect()->route('products.out.index')
                ->with('error', 'Bu işlemi yapmaya yetkiniz yok.');
        }

        if (!ProductsOut::where('stock_cards_id', $stockid)->exists()) {
            return redirect()->route('products.out.index')
                ->with('error', 'Bu işlemi yapmaya yetkiniz yok.');
        }

        $stockCards = StockCards::all();

        return view('edit.productOutEdit', compact('productOut', 'stockCards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'output_amount' => 'required|integer|min:1', // Pozitif tamsayı olmalı
            'output_price' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı
            'total_amount' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı, genellikle otomatik hesaplanır
            'output_date' => 'required|date', // Geçerli bir tarih formatı
            'description' => 'required|string|max:255', // Boş olabilir, ancak maksimum 255 karakter içermeli
        ]);

        $productOut = ProductsOut::findOrFail($id); // ID'ye göre kaydı bul
        $productOut->update($request->all()); // Kaydı güncelle
        return redirect()->route('products.out.index')->with('success', 'Ürün çıkışı başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productOut = ProductsOut::where('user_id', Auth::id())->findOrFail($id);
        $productOut->delete();

        return redirect()->route('products.out.index')
            ->with('success', 'Ürün çıkışı başarıyla silindi.');
    }

    /**
     * Search for a product in the products_out table.
     */
    public function searchProduct(Request $request)
    {
        $query = $request->query('query');
        $userId = Auth::id(); // Oturum açmış kullanıcının ID'sini al

        // Sayfa başına gösterilecek sonuç sayısını al, varsayılan olarak 5 ayarla
        $perPage = $request->get('per_page', 9999999999999999);

        // Kullanıcının ürün çıkışlarını al
        $productsOut = ProductsOut::with('stockCard')
            ->where('user_id', $userId);

        // Eğer arama sorgusu varsa product_name'e göre filtreleme yapıyoruz
        if (!empty($query)) {
            $productsOut = $productsOut->whereHas('stockCard', function ($queryBuilder) use ($query) {
                $queryBuilder->where('product_name', 'LIKE', '%' . $query . '%');
            });
        }

        // Sayfalama uyguluyoruz
        $productsOut = $productsOut->paginate($perPage);
        return view('products.productsOut', compact('productsOut'));
    }

    /**
     * Search for a product in the stock_cards table.
     */
    public function searchProductOut(Request $request)
    {
        $query = $request->query('query');
        $userId = Auth::id(); // Oturum açmış kullanıcının ID'sini al

        $productsOut = StockCards::where('user_id', $userId)
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('product_name', 'LIKE', '%' . $query . '%');
            })
            ->limit(10) // En fazla 10 sonuç
            ->get(['id', 'product_name']); // Sadece gerekli alanları al

        return response()->json($productsOut);
    }
}
