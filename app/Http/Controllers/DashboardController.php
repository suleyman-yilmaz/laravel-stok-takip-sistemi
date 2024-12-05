<?php

namespace App\Http\Controllers;

use App\Models\ProductsIn;
use App\Models\ProductsOut;
use App\Models\StockCards;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id(); // Oturum açmış kullanıcının ID'sini al
            $userName = Auth::user()->name; // Kullanıcı adı
            $userGender = Auth::user()->gender;

            $totalUsersCount = User::count();
            $totalUserTodoCount = Todo::where('user_id', $userId)->where('status', 0)->count(); // status'u 1 olanlar

            // Kullanıcının bu ay girişi yapılan ürün sayısı (input_date ile)
            $currentMonthProductInCount = ProductsIn::where('user_id', $userId)
                ->whereYear('input_date', date('Y')) // Mevcut yılı kontrol et
                ->whereMonth('input_date', date('m')) // Mevcut ayı kontrol et
                ->count();

            // Kullanıcının bu yıl girişi yapılan ürün sayısı (input_date ile)
            $currentYearProductInCount = ProductsIn::where('user_id', $userId)
                ->whereYear('input_date', date('Y')) // Mevcut yılı kontrol et
                ->count();

            $currentMonthProductOutCount = ProductsOut::where('user_id', $userId)
                ->whereYear('output_date', date('Y')) // Mevcut yılı kontrol et
                ->whereMonth('output_date', date('m')) // Mevcut ayı kontrol et
                ->count();

            $currentYearProductOutCount = ProductsOut::where('user_id', $userId)
                ->whereYear('output_date', date('Y')) // Mevcut yılı kontrol et
                ->count();

            // Yalnızca oturum açmış kullanıcının kayıtlarını göster
            $stockCartTotalCount = StockCards::where('user_id', $userId)->count(); // Kullanıcının stok kartı sayısı
            $productInTotalCount = ProductsIn::where('user_id', $userId)->count(); // Kullanıcının girişi yapılmış ürün sayısı
            $productOutTotalCount = ProductsOut::where('user_id', $userId)->count(); // Kullanıcının çıkışı yapılmış ürün sayısı
            $todayProductInCount = ProductsIn::where('user_id', $userId)
                ->whereDate('created_at', date('Y-m-d'))
                ->count(); // Kullanıcının bugün girişi yapılan ürün sayısı
            $todayProductOutCount = ProductsOut::where('user_id', $userId)
                ->whereDate('created_at', date('Y-m-d'))
                ->count(); // Kullanıcının bugün çıkışı yapılan ürün sayısı

            $totalEntryPrice = ProductsIn::where('user_id', $userId)->sum('total_amount'); // Kullanıcının toplam girdi fiyatı
            $totalOutputPrice = ProductsOut::where('user_id', $userId)->sum('total_amount'); // Kullanıcının toplam çıktı fiyatı

            $totalDifference = 0;
            $message = '';
            $messageClass = '';

            // Popüler ürünleri sorgularken de user_id'ye göre filtreleme
            $popularProducts = StockCards::where('user_id', $userId) // Oturum açmış kullanıcıya ait stok kartları
                ->withCount(['productsIn', 'productsOut']) // Giriş ve çıkış sayıları
                ->with(['productsIn' => function ($query) use ($userId) {
                    $query->where('user_id', $userId); // Kullanıcıya ait ürün girişleri
                }, 'productsOut' => function ($query) use ($userId) {
                    $query->where('user_id', $userId); // Kullanıcıya ait ürün çıkışları
                }])
                ->having(function ($query) {
                    $query->having('products_in_count', '>=', 10) // 10 veya daha fazla ürün girişi
                        ->orHaving('products_out_count', '>=', 10); // 10 veya daha fazla ürün çıkışı
                })
                ->get();


            if ($totalEntryPrice > $totalOutputPrice) {
                $message = 'Zarardasınız';
                $messageClass = 'text-danger'; // Kırmızı
                $totalDifference = $totalEntryPrice - $totalOutputPrice;
            } elseif ($totalOutputPrice > $totalEntryPrice) {
                $message = 'Kârdasınız';
                $messageClass = 'text-success'; // Yeşil
                $totalDifference = $totalOutputPrice - $totalEntryPrice;
            } else {
                $message = 'Eşit';
                $messageClass = 'text-primary'; // Mavi
            }

            // Verileri formatlama
            $totalDifference = number_format($totalDifference, 2, ',', '.');
            $totalEntryPrice = number_format($totalEntryPrice, 2, ',', '.');
            $totalOutputPrice = number_format($totalOutputPrice, 2, ',', '.');

            return view('dashboard', compact(
                'userName',
                'userGender',
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
                'popularProducts',
                'totalUsersCount',
                'totalUserTodoCount',
                'currentMonthProductInCount', // Ay için girişi yapılan ürün sayısı
                'currentYearProductInCount', // Yıl için girişi yapılan ürün sayısı
                'currentMonthProductOutCount',
                'currentYearProductOutCount',
            ));
        }

        // Eğer kullanıcı oturum açmamışsa giriş sayfasına yönlendirme
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProductEntry(Request $request)
    {
        $request->validate([
            'stock_cards_id' => 'required|integer|exists:stock_cards,id', // stock_cards tablosunda mevcut olmalı
            'input_amount' => 'required|integer|min:1', // Pozitif tamsayı olmalı
            'entry_price' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı
            'total_amount' => 'required|numeric|min:0', // Pozitif bir sayı (decimal) olmalı, genellikle otomatik hesaplanır
            'input_date' => 'required|date', // Geçerli bir tarih formatı
            'description' => 'required|string|max:255', // Boş olabilir, ancak maksimum 255 karakter içermeli
        ]);

        $userId = Auth::id();

        $stockCards = StockCards::where('id', $request->stock_cards_id)->where('user_id', $userId)->first();

        if (!$stockCards) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bu stok kartını ekleme yetkiniz yok.',
            ], 403); // Yetkisiz erişim
        }

        // Yordamı çağır ve parametreleri geçir
        DB::statement('CALL sp_products_in(?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $request->stock_cards_id,
            $request->input_amount,
            $request->entry_price,
            $request->total_amount,
            $request->input_date,
            $request->description,
            $userId, // Kullanıcı ID'sini ekliyoruz
            now(), // created_at için şu anki zaman
            now(), // updated_at için de şu anki zaman
        ]);

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
