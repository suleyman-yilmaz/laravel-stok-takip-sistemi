<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutDescription;
use App\Models\AboutTitle;
use App\Models\ProductsIn;
use App\Models\ProductsOut;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserControlelr extends Controller
{
    use AuthorizesRequests; // Bu satırı ekleyin
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $userName = Auth::user()->name;
            $email = Auth::user()->email;
            $totalEntryPrice = ProductsIn::sum('total_amount');
            $totalOutputPrice = ProductsOut::sum('total_amount');
            $aboutTitle1 = About::where('id', 1)->first();
            $aboutTitle2 = About::where('id', 2)->first();
            $aboutTitle3 = About::where('id', 3)->first();
            $aboutTitle4 = About::where('id', 4)->first();
            $aboutTitle5 = About::where('id', 5)->first();
            $aboutTitle6 = About::where('id', 6)->first();

            $aboutDescription1 = About::where('id', 1)->first();
            $aboutDescription2 = About::where('id', 2)->first();
            $aboutDescription3 = About::where('id', 3)->first();
            $aboutDescription4 = About::where('id', 4)->first();
            $aboutDescription5 = About::where('id', 5)->first();
            $aboutDescription6 = About::where('id', 6)->first();

            return view('auth.profile', compact(
                'userName',
                'email',
                'totalEntryPrice',
                'totalOutputPrice',
                'aboutTitle1',
                'aboutTitle2',
                'aboutTitle3',
                'aboutTitle4',
                'aboutTitle5',
                'aboutTitle6',
                'aboutDescription1',
                'aboutDescription2',
                'aboutDescription3',
                'aboutDescription4',
                'aboutDescription5',
                'aboutDescription6'
            ));
        }
    }

    // ''

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
    // Request $request, string $id
    public function update()
    {
        $user = Auth::user(); // Giriş yapmış kullanıcıyı alıyoruz.
        $this->authorize('update', $user);

        return view('auth.updateProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'old_password' => 'required',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::find(Auth::id());

        // Eski şifreyi doğrula
        if (!Hash::check($request->old_password, $user->password)) {
            throw ValidationException::withMessages([
                'old_password' => 'Eski şifre doğru değil.',
            ]);
        }

        // İsim ve e-posta güncelleme
        $user->name = $request->name;
        $user->email = $request->email;

        // Yeni şifre varsa güncelle
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
