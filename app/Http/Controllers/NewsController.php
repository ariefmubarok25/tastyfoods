<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Tampilkan semua berita
    public function index()
    {
        $news = News::latest()->paginate(9);
        return view('user.news.index', compact('news'));
    }

    // Tampilkan detail berita
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('user.news.show', compact('news'));
    }
}
