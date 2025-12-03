<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\HomeController;

// ==========================
// HALAMAN UTAMA USER
// ==========================

// Home Page (ambil dari HomeController)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Berita
Route::get('/berita', [NewsController::class, 'userIndex'])->name('news.index');
Route::get('/berita/{id}', [NewsController::class, 'show'])->name('news.show');

// Halaman Galeri
Route::get('/galeri', [GalleryController::class, 'userIndex'])->name('gallery.index');

// Halaman Kontak (opsional, jika ada)
Route::view('/kontak', 'user.contact')->name('contact');


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

    // CRUD Berita
    Route::resource('news', NewsController::class);

    // CRUD Gallery
    Route::resource('gallery', GalleryController::class);

    // Lokasi — tidak ada create, hanya index & edit
    Route::get('/location', [LocationController::class, 'index'])->name('location.index');
    Route::get('/location/{location}/edit', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('/location/{location}', [LocationController::class, 'update'])->name('location.update');
});
