<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        // 4 card (Tentang Kami bagian foto)
        $galleries = Gallery::latest()->take(4)->get();

        // 4 berita terbaru
        $news = News::latest()->take(4)->get();

        // 6 galeri bagian bawah
        $gallery_all = Gallery::latest()->take(6)->get();

        return view('user.home', compact('galleries', 'news', 'gallery_all'));
    }
}
