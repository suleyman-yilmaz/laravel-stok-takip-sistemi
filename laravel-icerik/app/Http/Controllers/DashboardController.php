<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsIn;
use App\Models\ProductsOut;
use Illuminate\Support\Facades\Auth;
use App\Models\StockCards;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $userName = Auth::user()->name; // Oturum açmış kullanıcının adı
            $stockCartTotalCount = StockCards::count(); // Toplam stok kartı sayısını al
            $productInTotalCount = ProductsIn::count(); // Toplam girişi yapılmış ürün sayısını al
            $productOutTotalCount = ProductsOut::count(); // Toplam çıkışı yapılmış ürün sayısını al
            $todayProductInCount = ProductsIn::whereDate('created_at', date('Y-m-d'))->count(); // Bugün girişi yapılmış ürün sayısını al
            $todayProductOutCount = ProductsOut::whereDate('created_at', date('Y-m-d'))->count(); // Bugün çıkışı yapılmış ürün sayısını al
            return view('dashboard', compact('userName', 'stockCartTotalCount', 'productInTotalCount', 'productOutTotalCount', 'todayProductInCount', 'todayProductOutCount')); // Kullanıcı adını görünüme gönderin
        }

        // Eğer kullanıcı oturum açmamışsa, başka bir sayfaya yönlendirin
        return redirect('/login');
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
