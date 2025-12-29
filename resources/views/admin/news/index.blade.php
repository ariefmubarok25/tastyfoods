@extends('layout.admin')

@section('title', 'Berita')

@section('content')

<h1 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6">Berita</h1>

<!-- Tombol Tambah -->
<div class="mb-6">
    <a href="{{ route('admin.news.create') }}"
       class="px-4 py-2 bg-gray-800 text-white rounded text-sm md:text-base">
        + Tambah Berita
    </a>
</div>

<div class="bg-white shadow rounded-lg p-4 overflow-x-auto">
    <table class="min-w-full text-sm">
        <thead class="bg-gray-900 border-b">
            <tr>
                <th class="px-3 py-3 text-white text-left">Gambar</th>
                <th class="px-3 py-3 text-white text-left">Judul</th>

                {{-- DISEMBUNYIKAN DI MOBILE --}}
                <th class="px-3 py-3 text-white text-left hidden md:table-cell">
                    Isi Berita
                </th>

                <th class="px-3 py-3 text-white text-left">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($news as $item)
            <tr class="border-b align-top">

                <!-- Gambar -->
                <td class="px-3 py-3">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}"
                             class="w-16 h-16 object-cover rounded">
                    @else
                        <span class="text-gray-400 text-xs">No image</span>
                    @endif
                </td>

                <!-- Judul -->
                <td class="px-3 py-3 font-semibold">
                    {{ $item->title }}
                </td>

                <!-- Isi Berita (desktop only) -->
                <td class="px-3 py-3 text-gray-600 hidden md:table-cell">
                    {{ Str::limit(strip_tags($item->content), 80, '...') }}
                </td>

                <!-- Aksi -->
                <td class="px-3 py-3">
                    <div class="flex flex-col md:flex-row gap-2">
                        <a href="{{ route('admin.news.edit', $item->id) }}"
                           class="px-3 py-1 bg-green-800 text-white rounded text-center text-xs md:text-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.news.destroy', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus berita ini?');">
                            @csrf
                            @method('DELETE')
                            <button
                                class="px-3 py-1 bg-red-700 text-white rounded text-xs md:text-sm w-full">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-6 text-gray-500">
                    Belum ada berita.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $news->links() }}
</div>

@endsection
