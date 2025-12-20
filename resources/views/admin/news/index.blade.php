@extends('layout.admin')

@section('title', 'Berita')

@section('content')

<h1 class="text-3xl font-semibold text-gray-800 mb-8">Berita</h1>

<!-- Tombol Tambah -->
<div class="mb-6">
    <a href="{{ route('admin.news.create') }}"
       class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-blue-700">
        + Tambah Berita
    </a>
</div>

<div class="bg-white shadow rounded-lg p-4">
    <table class="min-w-full">
        <thead class="bg-gray-900 border-b">
            <tr>
                <th class="px-4 py-3 text-white text-left">Gambar</th>
                <th class="px-4 py-3 text-white text-left">Judul</th>
                <th class="px-4 py-3 text-white text-left">Isi Berita</th> {{-- Tambahan --}}
                <th class="px-4 py-3 text-white text-left">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($news as $item)
            <tr class="border-b">

                <!-- Gambar -->
                <td class="px-4 py-3">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-20 h-20 object-cover rounded">
                    @else
                        <span class="text-gray-400">Tidak ada gambar</span>
                    @endif
                </td>

                <!-- Judul -->
                <td class="px-4 py-3 font-semibold">
                    {{ $item->title }}
                </td>

                <!-- Isi Berita (dipendekkan) -->
                <td class="px-4 py-3 text-gray-600">
                    {{ Str::limit(strip_tags($item->content), 80, '...') }}
                </td>

                <!-- Aksi -->
                <td class="px-4 py-3">
                    <a href="{{ route('admin.news.edit', $item->id) }}"
                       class="px-3 py-1 bg-green-800 text-white rounded">Edit</a>

                    <form action="{{ route('admin.news.destroy', $item->id) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Hapus berita ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-700 text-white rounded">Hapus</button>
                    </form>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-6">Belum ada berita.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $news->links() }}
</div>

@endsection
