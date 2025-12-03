<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::latest()->paginate(10);
        return view('admin.gallery.index', compact('gallery'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'nullable',
            'image'       => 'required|image|max:10240',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $path,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title'       => 'required',
            'description' => 'nullable',
            'image'       => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('image')) {

            // hapus gambar lama
            if ($gallery->image && file_exists(public_path('storage/' . $gallery->image))) {
                unlink(public_path('storage/' . $gallery->image));
            }

            $path = $request->file('image')->store('gallery', 'public');
            $gallery->image = $path;
        }

        $gallery->title       = $request->title;
        $gallery->description = $request->description;
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image && file_exists(public_path('storage/' . $gallery->image))) {
            unlink(public_path('storage/' . $gallery->image));
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil dihapus!');
    }
}
