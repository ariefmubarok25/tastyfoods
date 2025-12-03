<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Halaman list semua foto
    public function index()
    {
        $gallery = Gallery::latest()->paginate(12);
        return view('user.gallery.index', compact('gallery'));
    }

    // Halaman detail foto (opsional, kalau mau)
    public function show($id)
    {
        $item = Gallery::findOrFail($id);
        return view('user.gallery.show', compact('item'));
    }
}
