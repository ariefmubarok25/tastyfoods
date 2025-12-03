@extends('layout.admin')

@section('title', 'Tambah Foto')

@section('content')

<h1 class="text-3xl font-semibold text-gray-800 mb-8">Tambah Foto</h1>

<div class="bg-white shadow p-6 rounded-lg">
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Judul Foto</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Deskripsi</label>
            <textarea name="description" class="w-full border rounded p-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Upload Foto</label>
            <input type="file" name="image" accept="image/*" required>
        </div>

        <button class="px-5 py-2 bg-blue-600 text-white rounded">Simpan</button>
        <a href="{{ route('admin.gallery.index') }}" class="px-5 py-2 bg-gray-400 text-white rounded">Kembali</a>
    </form>
</div>

@endsection
