<?php

namespace App\Http\Controllers;

use App\Models\CurrentStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstantStock extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // per_page'yi bir kez alıyoruz
        $perPage = $request->get('per_page', 10);
    
        // Sayfalandırma işlemi ve diğer parametrelerin korunması
        $vw_anlik = CurrentStock::where('user_id', Auth::id())
            ->paginate($perPage)
            ->appends($request->except('per_page'));  // 'per_page' parametresini dışarıda bırakıyoruz
    
        return view('products.productsStock', compact('vw_anlik'));
    }
    
    


    public function searchProduct(Request $request)
    {
        $query = $request->query('query');
        $userId = Auth::id(); // Oturum açmış kullanıcının ID'sini al

        // Sayfa başına gösterilecek sonuç sayısını al, varsayılan olarak 10 ayarla
        $perPage = $request->get('per_page', 9999999999999999);

        // Kullanıcı ID'sine göre başlangıç sorgusunu oluştur
        $vw_anlik = CurrentStock::where('user_id', $userId);

        if (!empty($query)) {
            // Ürün adına göre filtrele
            $vw_anlik->where('product_name', 'LIKE', '%' . $query . '%');
        }

        $vw_anlik = $vw_anlik->paginate($perPage); // Sonuçları sayfalandır

        return view('products.productsStock', compact('vw_anlik')); // Görüntüle
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
        //
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
        //
    }
}
