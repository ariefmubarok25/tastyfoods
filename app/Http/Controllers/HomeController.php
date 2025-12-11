<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        // Featured news untuk section Berita Kami
        $featuredNews = News::orderBy('created_at', 'desc')->first();

        // Latest news (4 berita terbaru selain featured)
        $latestNews = News::when($featuredNews, function($query) use ($featuredNews) {
                return $query->where('id', '!=', $featuredNews->id);
            })
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // Gallery images
        $galleries = Gallery::orderBy('created_at', 'asc')->take(4)->get();
        $galleryImages = Gallery::orderBy('created_at', 'desc')->take(6)->get();

        return view('user/home', compact('featuredNews', 'latestNews', 'galleryImages', 'galleries'));
    }

    // Method untuk debug gambar
    public function debugImages()
    {
        $news = News::all();

        echo "<h1>Debug Images - Home (Public Folder)</h1>";

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

        // Cek gallery images juga
        $gallery = Gallery::all();
        echo "<h1>Debug Images - Gallery (Public Folder)</h1>";

        foreach($gallery as $item) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>";
            echo "ID: " . $item->id . "<br>";
            echo "Title: " . ($item->title ?? 'No Title') . "<br>";
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
