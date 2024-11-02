<?php

namespace App\Http\Controllers;

use App\Models\CurrentStock;
use Illuminate\Http\Request;

class InstantStock extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vw_anlik = CurrentStock::all(); // Tüm kayıtları alın
        return view('products.productsStock', compact('vw_anlik')); // Görüntüle
    }

    public function searchProduct(Request $request)
    {
        $query = $request->query('query');

        if (empty($query)) {
            $vw_anlik = CurrentStock::all();
        } else {
            $vw_anlik = CurrentStock::where('product_name', 'LIKE', '%' . $query . '%')->get();
        }

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
