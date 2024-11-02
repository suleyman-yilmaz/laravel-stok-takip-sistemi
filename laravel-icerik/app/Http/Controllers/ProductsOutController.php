<?php

namespace App\Http\Controllers;

use App\Models\ProductsOut;
use App\Models\StockCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Yordamı çağır ve parametreleri geçir
        DB::statement('CALL sp_products_out(?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->stock_cards_id,
            $request->output_amount,
            $request->output_price,
            $request->total_amount,
            $request->output_date,
            $request->description,
            now(), // created_at için şu anki zaman
            now(), // updated_at için de şu anki zaman
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
    public function edit(string $id, string $stockid)
    {
        $productOut = ProductsOut::findOrFail($id); // ID'ye göre kaydı bul
        $stockCards = StockCards::all(); // Tüm kayıtları alın
        return view('edit.productOutEdit', compact('productOut', 'stockCards')); // Görüntüle
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
        // Yordamı çağır ve parametre olarak ürün ID'sini geç
        $deleted = DB::statement('CALL sp_products_out_delete(?)', [$id]);

        // Eğer silme işlemi başarılıysa yönlendir
        if ($deleted) {
            return redirect()->route('products.out.index')->with('success', 'Ürün çıkışı başarıyla silindi.');
        } else {
            return redirect()->route('products.out.index')->with('error', 'Ürün çıkışı silinirken bir hata oluştu.');
        }
    }

    public function searchProduct(Request $request)
    {
        $query = $request->query('query');

        // Tüm kayıtları view_products_out ve stock_cards tablosunu birleştirerek alıyoruz
        $productsOut = ProductsOut::join('stock_cards', 'vw_products_out.stock_cards_id', '=', 'stock_cards.id')
            ->select('vw_products_out.*', 'stock_cards.product_name', 'stock_cards.unit');

        // Eğer arama sorgusu varsa product_name'e göre filtreleme yapıyoruz
        if (!empty($query)) {
            $productsOut = $productsOut->where('stock_cards.product_name', 'LIKE', '%' . $query . '%');
        }

        // Veritabanından verileri çekiyoruz
        $productsOut = $productsOut->get();

        // Görüntüleme
        return view('products.productsOut', compact('productsOut'));
    }

}
