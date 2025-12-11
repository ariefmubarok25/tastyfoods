<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;        // USER News
use App\Http\Controllers\GalleryController;     // USER Gallery
use App\Http\Controllers\HomeController;        // USER Home
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\LocationController;

// ==========================
// HALAMAN UTAMA USER
// ==========================

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Tentang (ABOUT)
Route::view('/tentang', 'user.about')->name('about');

// Halaman Berita UNTUK USER
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news', [NewsController::class, 'index'])->name('news'); // Alias untuk navbar

// Halaman Galeri UNTUK USER
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery'); // Alias untuk navbar

// Halaman Kontak
Route::view('/kontak', 'user.contact.index')->name('contact');
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact'); // Alias untuk navbar


// ==========================
// ROUTE HALAMAN ADMIN
// ==========================
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('/', function () {
        $totalNews    = \App\Models\News::count();
        $totalGallery = \App\Models\Gallery::count();

        return view('admin.index', compact('totalNews', 'totalGallery'));
    })->name('dashboard');

    // CRUD Berita UNTUK ADMIN
    Route::resource('news', AdminNewsController::class);

    // CRUD Gallery UNTUK ADMIN
    Route::resource('gallery', AdminGalleryController::class);

    // Lokasi
    Route::get('/location', [LocationController::class, 'index'])->name('location.index');
    Route::get('/location/{location}/edit', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('/location/{location}', [LocationController::class, 'update'])->name('location.update');
});