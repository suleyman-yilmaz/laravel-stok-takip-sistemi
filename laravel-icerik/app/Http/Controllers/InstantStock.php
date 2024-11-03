<?php

namespace App\Http\Controllers;

use App\Models\CurrentStock;
use Illuminate\Http\Request;

class InstantStock extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $vw_anlik = CurrentStock::paginate($perPage); // Tüm kayıtları alın
        return view('products.productsStock', compact('vw_anlik')); // Görüntüle
    }

    public function searchProduct(Request $request)
    {
        $query = $request->query('query');

        // Sayfa başına gösterilecek sonuç sayısını al, varsayılan olarak 5 ayarla
        $perPage = $request->get('per_page', 9999999999999999);

        if (empty($query)) {
            $vw_anlik = CurrentStock::all();
        } else {
            $vw_anlik = CurrentStock::where('product_name', 'LIKE', '%' . $query . '%');
        }

        $vw_anlik = $vw_anlik->paginate($perPage);

        return view('products.productsStock', compact('vw_anlik'));
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
