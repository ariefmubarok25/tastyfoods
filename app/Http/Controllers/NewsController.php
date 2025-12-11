<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        // Ambil berita terbaru sebagai featured news
        $featuredNews = News::orderBy('created_at', 'desc')->first();

        // Berita lainnya (exclude featured news)
        $news = News::when($featuredNews, function($query) use ($featuredNews) {
                return $query->where('id', '!=', $featuredNews->id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('user.news.index', compact('featuredNews', 'news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('user.news.show', compact('news'));
    }

    // Method untuk debug gambar
    public function debugImages()
    {
        $news = News::all();

        echo "<h1>Debug Images - News (Public Folder)</h1>";

        foreach($news as $item) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "ID: " . $item->id . "<br>";
            echo "Title: " . $item->title . "<br>";
            echo "Image Path: " . $item->image . "<br>";

            // Cek file exists di public folder
            $path = public_path($item->image);
            echo "Full Path: " . $path . "<br>";
            echo "File Exists: " . (file_exists($path) ? 'YES' : 'NO') . "<br>";
            echo "URL: " . asset($item->image) . "<br>";

            // Coba tampilkan gambar
            if ($item->image && file_exists($path)) {
                echo "<img src='" . asset($item->image) . "' style='max-width: 200px;'><br>";
            } else {
                echo "<span style='color: red;'>Gambar tidak ditemukan</span><br>";
            }

            echo "</div>";
        }
    }
}
