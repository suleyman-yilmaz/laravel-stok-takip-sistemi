<?php

namespace App\Http\Controllers;

use App\Models\ProductsIn;
use App\Models\StockCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductsInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stockcards = StockCards::where('user_id', Auth::id())->get();
        $perPage = $request->get('per_page', 10);
        // $productsIn = ProductsIn::where('user_id', Auth::id())->paginate($perPage)->appends($request->except('per_page'));
        $productsIn = ProductsIn::where('user_id', Auth::id())
            ->with('stockCard') // StockCard ilişkisini yükleyin
            ->paginate($perPage) // Sayfalama ekleyin
            ->appends($request->except('per_page')); // Sayfalama parametrelerini koruyun

        return view('products.productsIn', compact('productsIn', 'stockcards'));
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

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'stock_cards_id' => 'required|exists:stock_cards,id',
            'input_amount' => 'required|integer|min:1',
            'entry_price' => 'required|string',
            'total_amount' => 'required|string',
            'input_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new record in the products_in table
        ProductsIn::create([
            'stock_cards_id' => $request->stock_cards_id,
            'user_id' => $userId,
            'input_amount' => $request->input_amount,
            'entry_price' => $request->entry_price,
            'total_amount' => $request->total_amount,
            'input_date' => $request->input_date,
            'description' => $request->description,
        ]);

        // Redirect with success message
        return redirect()->route('products.in.index')
            ->with('success', 'Ürün girişi başarıyla oluşturuldu.');
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
        // products_in tablosunda id var mı kontrol et
        $productIn = ProductsIn::find($id);
        if (!$productIn) {
            return redirect()->route('products.in.index')
                ->with('error', 'Bu işlemi yapmaya yetkiniz yok.');
        }

        // Oturum açan kullanıcının ID'sini al
        $currentUserId = Auth::id();

        // Ürün kullanıcısı kontrolü
        if ($productIn->user_id !== $currentUserId) {
            return redirect()->route('products.in.index')
                ->with('error', 'Bu işlemi yapmaya yetkiniz yok.');
        }

        // StockCards tablosundaki id kontrolü
        $stockCard = StockCards::find($stockid);
        if (!$stockCard || $stockCard->user_id != $currentUserId) {
            return redirect()->route('products.in.index')
                ->with('error', 'Bu işlemi yapmaya yetkiniz yok.');
        }

        // products_in tablosunda stock_cards_id var mı diye kontrol et
        if (!ProductsIn::where('stock_cards_id', $stockid)->exists()) {
            return redirect()->route('products.in.index')
                ->with('error', 'Bu işlemi yapmaya yetkiniz yok.');
        }

        // Her iki kontrolü de geçerse, düzenleme sayfasına yönlendirin
        $stockCards = StockCards::all();
        return view('edit.productInEdit', compact('productIn', 'stockCards'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'input_amount' => 'required|integer|min:1',
            'entry_price' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'input_date' => 'required|date',
            'description' => 'required|string|max:255',
        ]);

        $productIn = ProductsIn::findOrFail($id);
        $productIn->update($request->all());
        return redirect()->route('products.in.index')->with('success', 'Ürün girişi başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productIn = ProductsIn::where('user_id', Auth::id())->findOrFail($id);
        $productIn->delete();

        return redirect()->route('products.in.index')
            ->with('success', 'Ürün girişi başarıyla silindi.');
    }

    /**
     * Search for a product in the products_in table.
     */
    public function searchProduct(Request $request)
    {
        $query = $request->query('query');
        $userId = Auth::id(); // Oturum açmış kullanıcının ID'sini al

        $perPage = $request->get('per_page', 9999999999999999);

        $productsIn = ProductsIn::with('stockCard') // StockCard ilişkisini yükle
            ->where('user_id', $userId);

        // Arama sorgusu varsa, product_name veya stockCard içindeki name üzerinde filtreleme yap
        if (!empty($query)) {
            $productsIn = $productsIn->whereHas('stockCard', function ($queryBuilder) use ($query) {
                $queryBuilder->where('product_name', 'LIKE', '%' . $query . '%'); // stockCards tablosundaki name üzerinde arama
            });
        }

        $productsIn = $productsIn->paginate($perPage);

        return view('products.productsIn', compact('productsIn'));
    }

    /**
     * Search for a product in the stock_cards table.
     */
    public function searchProductIn(Request $request)
    {
        $query = $request->query('query');
        $userId = Auth::id(); // Oturum açmış kullanıcının ID'sini al

        $productsIn = StockCards::where('user_id', $userId)
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('product_name', 'LIKE', '%' . $query . '%');
            })
            ->limit(10) // En fazla 10 sonuç
            ->get(['id', 'product_name']); // Sadece gerekli alanları al

        return response()->json($productsIn);
    }
}
