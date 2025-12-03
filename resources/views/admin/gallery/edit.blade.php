@extends('layout.admin')

@section('title', 'Edit Foto')

@section('content')

<h1 class="text-3xl font-semibold text-gray-800 mb-8">Edit Foto</h1>

<div class="bg-white shadow p-6 rounded-lg">
    <form action="{{ route('admin.gallery.update', $gallery->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Judul Foto</label>
            <input type="text" name="title" class="w-full border rounded p-2" value="{{ $gallery->title }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Deskripsi</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $gallery->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Foto Sekarang</label>
            <img src="{{ asset('storage/' . $gallery->image) }}" class="w-40 h-auto rounded border">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Ganti Foto (opsional)</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <button class="px-5 py-2 bg-blue-600 text-white rounded">Update</button>
        <a href="{{ route('admin.gallery.index') }}" class="px-5 py-2 bg-gray-400 text-white rounded">Kembali</a>
    </form>
</div>

@endsection
