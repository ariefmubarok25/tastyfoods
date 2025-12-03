@extends('layout.admin')

@section('title', 'Tambah Berita')

@section('content')

<h1 class="text-3xl font-semibold text-gray-800 mb-8">Tambah Berita</h1>

<div class="bg-white shadow rounded-lg p-6">

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Judul Berita</label>
            <input type="text" name="title"
                   class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-200"
                   placeholder="Masukkan judul berita" required>
        </div>

        {{-- Isi Berita --}}
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Isi Berita</label>
            <textarea name="content" rows="6"
                      class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-200"
                      placeholder="Masukkan isi berita" required></textarea>
        </div>

        {{-- Gambar --}}
        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Foto Berita</label>
            <input type="file" name="image" accept="image/*"
                   class="block w-full text-gray-700">
        </div>

        {{-- Tombol --}}
        <div class="flex items-center space-x-3">
            <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Simpan
            </button>

            <a href="{{ route('admin.news.index') }}"
               class="px-5 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection
