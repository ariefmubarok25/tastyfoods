<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $location = Location::first();

        return view('user.contact.index', compact('location'));
    }

    // Simpan pesan dari form Contact Us
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}