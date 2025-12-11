@extends('layout.user')

@section('content')

    {{-- Hero Section --}}
    <section class="relative h-[70vh] flex items-end">
        <div class="absolute inset-0 overflow-hidden">
            <img src="{{ asset('Group 70.png') }}" class="w-full h-full object-cover" alt="Berita Background">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        </div>

        <div class="relative z-10 text-white pb-16 container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold tracking-widest">BERITA KAMI</h1>
        </div>
    </section>

    {{-- Artikel Utama --}}
    @if($featuredNews)
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8 items-center">

                {{-- Gambar --}}
                <div class="w-full h-72 overflow-hidden rounded-lg">
                    @if($featuredNews->image)
                        <img src="{{ asset('storage/news/' . $featuredNews->image) }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-600">
                            No Image Available
                        </div>
                    @endif
                </div>

                {{-- Konten --}}
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $featuredNews->title }}</h2>


                    <p class="text-gray-600 leading-relaxed">
                        {{ $featuredNews->content ?? Str::limit(strip_tags($featuredNews->content), 300) }}
                    </p>

                    <a href="{{ route('news.show', $featuredNews->id) }}"
                        class="inline-block bg-gray-900 text-white px-5 py-3 rounded-lg hover:bg-gray-800 transition">
                        BACA SELENGKAPNYA
                    </a>
                </div>

            </div>
        </div>
    </section>
    @endif

    {{-- Berita Lainnya --}}
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Berita Lainnya</h2>

            @if($news->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($news as $item)
                <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                    
                    {{-- Gambar --}}
                    <div class="w-full h-48 overflow-hidden">
                        @if($item->image)
                            <img src="{{ asset('storage/news/' . $item->image) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-600 text-sm">
                                No Image
                            </div>
                        @endif
                    </div>

                    {{-- Konten --}}
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $item->title }}</h3>

                        <p class="text-gray-500 text-sm mb-2">
                            {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                        </p>

                        <p class="text-gray-600 mb-4">
                            {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 120) }}
                        </p>

                        <a href="{{ route('news.show', $item->id) }}" class="font-semibold text-gray-800 hover:text-gray-500">
                            Baca selengkapnya →
                        </a>
                    </div>

                </div>
                @endforeach

            </div>

            {{-- Pagination --}}
            @if($news->hasPages())
            <div class="mt-6 text-center">
                {{ $news->links() }}
            </div>
            @endif

            @else
            <p class="text-center text-gray-600">Belum ada berita lainnya.</p>
            @endif

        </div>
    </section>

@endsection
