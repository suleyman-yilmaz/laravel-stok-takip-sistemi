<?php

namespace App\Http\Controllers;

use App\Models\ProductsIn;
use App\Models\ProductsOut;
use App\Models\StockCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $totalEntryPrice = ProductsIn::sum('total_amount');
            $totalOutputPrice = ProductsOut::sum('total_amount');
            $totalDifference = 0;
            // Mesajı ve rengini belirle
            $message = '';
            $messageClass = ''; // Mesaj için CSS sınıfı

            $popularProducts = StockCards::withCount(['productsIn', 'productsOut'])
            ->having('products_in_count', '>=', 15)
            ->orHaving('products_out_count', '>=', 15)
            ->get();

            if ($totalEntryPrice > $totalOutputPrice) {
                $message = 'Zarardasınız';
                $messageClass = 'text-danger'; // Kırmızı
                $totalDifference = $totalEntryPrice - $totalOutputPrice;
            } elseif ($totalOutputPrice > $totalEntryPrice) {
                $message = 'Kârdesiniz';
                $messageClass = 'text-success'; // Yeşil
                $totalDifference = $totalOutputPrice - $totalEntryPrice;
            } else {
                $message = 'Eşit';
                $messageClass = 'text-primary'; // Mavi
                $totalDifference = 0;
            }

            // 2 ondalık basamağa yuvarla
            $totalDifference = number_format($totalDifference, 2, ',', '.');
            $totalEntryPrice = number_format($totalEntryPrice, 2, ',', '.');
            $totalOutputPrice = number_format($totalOutputPrice, 2, ',', '.');

            return view('dashboard', compact(
                'userName',
                'stockCartTotalCount',
                'productInTotalCount',
                'productOutTotalCount',
                'todayProductInCount',
                'todayProductOutCount',
                'totalEntryPrice',
                'totalOutputPrice',
                'totalDifference',
                'message',
                'messageClass',
                'popularProducts'
            ));
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
