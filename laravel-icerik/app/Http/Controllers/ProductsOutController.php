<?php

namespace App\Http\Controllers;

use App\Models\ProductsOut;
use App\Models\StockCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $productsOut = ProductsOut::where('user_id', Auth::id())->paginate($perPage);

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
        $request->validate([
            'stock_cards_id' => 'required|integer|exists:stock_cards,id', // stock_cards tablosunda mevcut olmalı
            'output_amount' => 'required|integer|min:1', // Pozitif tamsayı olmalı
            'output_price' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı
            'total_amount' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı, genellikle otomatik hesaplanır
            'output_date' => 'required|date', // Geçerli bir tarih formatı
            'description' => 'required|string|max:255', // Boş olabilir, ancak maksimum 255 karakter içermeli
        ]);

        $userId = Auth::id();
        $stockCards = StockCards::where('id', $request->stock_cards_id)->where('user_id', $userId)->first();

        if (!$stockCards) {
            return redirect()->route('products.out.index')->with('error', 'Bu stok kartını ekleme yetkiniz yok.');
        }

        // Yordamı çağır ve parametreleri geçir
        DB::statement('CALL sp_products_out(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->stock_cards_id,
            $request->output_amount,
            $request->output_price,
            $request->total_amount,
            $request->output_date,
            $request->description,
            $userId, // Kullanıcı ID'sini ekliyoruz
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
        $userId = Auth::id(); // Oturum açmış kullanıcının ID'sini al

        // Sayfa başına gösterilecek sonuç sayısını al, varsayılan olarak 5 ayarla
        $perPage = $request->get('per_page', 9999999999999999);

        // Kullanıcının ürün çıkışlarını al
        $productsOut = ProductsOut::where('user_id', $userId);

        // Eğer arama sorgusu varsa product_name'e göre filtreleme yapıyoruz
        if (!empty($query)) {
            $productsOut = $productsOut->where('product_name', 'LIKE', '%' . $query . '%');
        }

        // Sayfalama uyguluyoruz
        $productsOut = $productsOut->paginate($perPage);
        
        $stockcards = StockCards::where('user_id', Auth::id())->get();


        return view('products.productsOut', compact('productsOut', 'stockcards'));
    }

    public function searchProductOut(Request $request)
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
