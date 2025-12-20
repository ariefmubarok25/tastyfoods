<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;        // USER News
use App\Http\Controllers\GalleryController;     // USER Gallery
use App\Http\Controllers\HomeController;        // USER Home
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\LocationController;


// ==========================
// HALAMAN USER
// ==========================

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tentang
Route::view('/tentang', 'user.about')->name('about');

// Berita
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{id}', [NewsController::class, 'show'])->name('news.show');

// 🔑 ALIAS UNTUK NAVBAR
Route::get('/news', [NewsController::class, 'index'])->name('news');

// Galeri
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Kontak (PAKAI CONTROLLER)
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');



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

    // Contacts
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts');
    Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{id}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
});