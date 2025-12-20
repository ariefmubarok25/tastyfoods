@extends('layout.admin')

@section('title', 'Gallery')

@section('content')

<h1 class="text-3xl font-semibold text-gray-800 mb-8">Gallery</h1>

<!-- Tombol Tambah -->
<div class="mb-6">
    <a href="{{ route('admin.gallery.create') }}"
       class="px-4 py-2 bg-gray-800 text-white rounded">
        + Tambah Foto
    </a>
</div>

<div class="bg-white shadow rounded-lg p-4">
    <table class="min-w-full">
        <thead class="bg-gray-900 border-b">
            <tr>
                <th class="px-4 py-3 text-white text-left">Foto</th>
                <th class="px-4 py-3 text-white text-left">Judul</th>
                <th class="px-4 py-3 text-white text-left">Deskripsi</th> {{-- Tambahan --}}
                <th class="px-4 py-3 text-white text-left">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($gallery as $item)
            <tr class="border-b">
                <td class="px-4 py-3">
                    <img src="{{ asset('storage/' . $item->image) }}" class="w-20 h-20 object-cover rounded">
                </td>

                <td class="px-4 py-3 font-semibold">
                    {{ $item->title }}
                </td>

                {{-- Kolom Deskripsi --}}
                <td class="px-4 py-3 text-gray-600">
                    {{ $item->description ?? '-' }}
                </td>

                <td class="px-4 py-3">
                    <a href="{{ route('admin.gallery.edit', $item->id) }}"
                       class="px-3 py-1 bg-green-800 text-white rounded">Edit</a>

                    <form action="{{ route('admin.gallery.destroy', $item->id) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Hapus foto ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-700 text-white rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-6">Belum ada foto.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $gallery->links() }}
</div>

@endsection
