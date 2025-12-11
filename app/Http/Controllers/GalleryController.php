<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display gallery page
     */
    public function index()
    {
        // Ambil semua gallery berdasarkan created_at terbaru
        $galleryImages = Gallery::orderBy('created_at', 'desc')->get();

        // Ambil 3 gambar pertama untuk carousel
        $carouselImages = $galleryImages->take(3);

        return view('user.gallery.index', compact('galleryImages', 'carouselImages'));
    }

    /**
     * Debug images for troubleshooting - SESUAI DENGAN ROUTE
     */
    public function debugImages()
    {
        $galleryData = Gallery::all();

        return response()->json([
            'message' => 'Debug Gallery Images from Database',
            'total_items' => $galleryData->count(),
            'data' => $galleryData->map(function($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'image' => $item->image,
                    'description' => $item->description,
                    'image_url' => asset('storage/gallery/' . $item->image),
                    'created_at' => $item->created_at
                ];
            })
        ]);
    }

    /**
     * Additional debug function untuk test
     */
    public function testGallery()
    {
        return response()->json([
            'message' => 'Gallery Controller is working!',
            'route' => 'gallery',
            'method' => 'index',
            'timestamp' => now()
        ]);
    }
}
