@extends('layout.admin')

@section('title', 'Edit Berita')

@section('content')

<h1 class="text-3xl font-semibold text-gray-800 mb-8">Edit Berita</h1>

<div class="bg-white shadow rounded-lg p-6">

    <form action="{{ route('admin.news.update', $news->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Judul Berita</label>
            <input type="text" 
                   name="title" 
                   value="{{ old('title', $news->title) }}"
                   class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-200"
                   required>
        </div>

        {{-- Isi Berita --}}
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Isi Berita</label>
            <textarea name="content" 
                      rows="6"
                      class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-200"
                      required>{{ old('content', $news->content) }}</textarea>
        </div>

        {{-- Gambar lama --}}
        @if ($news->image)
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Foto Lama</label>
            <img src="{{ asset('storage/' . $news->image) }}" 
                 class="w-40 h-auto rounded border">
        </div>
        @endif

        {{-- Upload gambar baru --}}
        <div class="mb-6">
            <label class="block text-gray-700 mb-2">Ganti Foto (opsional)</label>
            <input type="file" 
                   name="image" 
                   accept="image/*"
                   class="block w-full text-gray-700">
            <p class="text-sm text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengganti.</p>
        </div>

        {{-- Tombol --}}
        <div class="flex items-center space-x-3">
            <button type="submit"
                    class="px-5 py-2 bg-green-800 text-white rounded hover:bg-blue-700">
                Update
            </button>

            <a href="{{ route('admin.news.index') }}"
               class="px-5 py-2 bg-gray-600 text-white rounded hover:bg-gray-500">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection
