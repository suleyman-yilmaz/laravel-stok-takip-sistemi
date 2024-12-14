<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contacts::create($request->all());

        $details = [
            'name' => $request->name,
            'surname' => $request->surname,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('suleymanymz50@gmail.com')->send(new ContactForm($details));
        return redirect()->back()->with('success', 'Mesaj başarıyla gönderildi.');
    }
}
