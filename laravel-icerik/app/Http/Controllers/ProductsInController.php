<?php

namespace App\Http\Controllers;

use App\Models\ProductsIn;
use App\Models\StockCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productsIn = ProductsIn::all(); // Tüm kayıtları alın
        return view('products.productsIn', compact('productsIn', )); // Görüntüle
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
            'input_amount' => 'required|integer|min:1', // Pozitif tamsayı olmalı
            'entry_price' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı
            'total_amount' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı, genellikle otomatik hesaplanır
            'input_date' => 'required|date', // Geçerli bir tarih formatı
            'description' => 'required|string|max:255', // Boş olabilir, ancak maksimum 255 karakter içermeli
        ]);

        // Yordamı çağır ve parametreleri geçir
        DB::statement('CALL sp_products_in(?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->stock_cards_id,
            $request->input_amount,
            $request->entry_price,
            $request->total_amount,
            $request->input_date,
            $request->description,
            now(), // created_at için şu anki zaman
            now(), // updated_at için de şu anki zaman
        ]);

        // Başarılı bir şekilde kayıt yapıldıktan sonra yönlendirme
        return redirect()->route('products.in.index')->with('success', 'Ürün girişi başarıyla oluşturuldu.');
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
        $productIn = ProductsIn::findOrFail($id);
        $stockCards = StockCards::all();
        return view('edit.productInEdit', compact('productIn', 'stockCards'));
    }

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
        // Yordamı çağır ve parametre olarak ürün ID'sini geç
        $deleted = DB::statement('CALL sp_products_in_delete(?)', [$id]);

        // Eğer silme işlemi başarılıysa yönlendir
        if ($deleted) {
            return redirect()->route('products.in.index')->with('success', 'Ürün girişi başarıyla silindi.');
        } else {
            return redirect()->route('products.in.index')->with('error', 'Ürün girişi silinirken bir hata oluştu.');
        }
    }

    public function searchProduct(Request $request)
    {
        $query = $request->query('query');

        // Tüm kayıtları view_products_in ve stock_cards tablosunu birleştirerek alıyoruz
        $productsIn = ProductsIn::join('stock_cards', 'view_products_in.stock_cards_id', '=', 'stock_cards.id')
            ->select('view_products_in.*', 'stock_cards.product_name', 'stock_cards.unit');

        // Eğer arama sorgusu varsa product_name'e göre filtreleme yapıyoruz
        if (!empty($query)) {
            $productsIn = $productsIn->where('stock_cards.product_name', 'LIKE', '%' . $query . '%');
        }

        // Veritabanından verileri çekiyoruz
        $productsIn = $productsIn->get();

        // Görüntüleme
        return view('products.productsIn', compact('productsIn'));
    }

}
