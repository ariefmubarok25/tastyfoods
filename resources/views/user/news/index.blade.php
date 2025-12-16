@extends('layout.user')

@section('content')

    {{-- Hero Section --}}
   <section class="relative h-[35vh] md:h-[70vh] flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/user/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

       <div class="relative z-10 text-white container mx-auto px-4 pl-20">
            <h1 class="text-4xl md:text-5xl font-bold tracking-widest">
                BERITA KAMI
            </h1>
        </div>
    </section>


    {{-- Artikel Utama --}}
@if($featuredNews)
<section class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-10 items-center">

        {{-- Kolom gambar --}}
        <div class="md:pl-6">
            <div class="w-full aspect-[4/3] overflow-hidden rounded-xl">
                <img src="{{ asset('storage/' . $featuredNews->image) }}"
                    class="w-full h-full object-cover">
            </div>
        </div>


            {{-- Konten --}}
            <div class="space-y-4">
                <h2 class="text-3xl font-bold text-gray-800">
                    {{ $featuredNews->title }}
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    {{ $featuredNews->excerpt ?? Str::limit(strip_tags($featuredNews->content), 300) }}
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
    <section class="py-12 bg-white">
        <div class="container mx-auto px-12">
            <h2 class="text-3xl font-bold text-left text-gray-800 mb-8">BERITA LAINNYA</h2>

            @if($news->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">

                @foreach($news as $item)
                <div class="bg-white border rounded-lg overflow-hidden shadow-sm">
                    
                    {{-- Gambar --}}
                    <div class="w-full h-48 overflow-hidden">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-600 text-sm">
                                No Image
                            </div>
                        @endif
                    </div>

                    {{-- Konten --}}
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $item->title }}</h3>

                        <p class="text-gray-600 mb-4">
                            {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 120) }}
                        </p>

                        <a href="{{ route('news.show', $item->id) }}"
                        class="font-semibold text-orange-500 hover:text-orange-600 transition">
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
