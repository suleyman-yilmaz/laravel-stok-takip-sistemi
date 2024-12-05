<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contacts;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        return view('management.adminDashboard', compact(
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

    public function updateAll(Request $request)
    {
        // Başlıkları güncelleme
        foreach ($request->titles as $id => $title) {
            $about = About::find($id);
            if ($about) {
                $about->title = $title;
                $about->save();
            }
        }

        // Açıklamaları güncelleme
        foreach ($request->descriptions as $id => $description) {
            $about = About::find($id);
            if ($about) {
                $about->description = $description;
                $about->save();
            }
        }

        return redirect()->back()->with('success', 'Başlıklar ve açıklamalar güncellendi.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function contact()
    {
        $contacts = Contacts::all();
        return view('management.adminContact', compact('contacts'));
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
    public function updateContact(Request $request, string $id)
    {
        $contact = Contacts::findOrFail($id);

        // Status değerini tersine çevir
        $contact->status = $contact->status == 0 ? 1 : 0;

        // Güncellemeyi kaydet
        $contact->save();

        // Geri yönlendirme
        return redirect()->back()->with('success', 'Durum başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Mesaj başarıyla silindi.');
    }
}
