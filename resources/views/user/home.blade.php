@php 
    $navbar_type = 'home';
@endphp

@extends('layout.user')

@section('title', 'Home')

@section('content')

<!-- Hero Section (Overlap Navbar + 50% Right Image) -->
<section class="relative h-screen flex items-center overflow-hidden bg-gray-100">

    <!-- Background Right 50% -->
    <div class="absolute top-0 right-0 w-1/2 h-full">
        <img src="{{ asset('storage/user/hero_home.png') }}"
             class="w-full h-full object-cover object-top"
             alt="Hero Image">
    </div>

    <!-- Text Content -->
    <div class="relative z-10 container mx-auto px-20">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-light mb-4">
            ____<br>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-light mb-4">
            HEALTHY <br>
                <span class="font-bold">TASTY FOOD</span>
            </h1>

            <p class="text-lg mb-8 max-w-lg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae mauris vel massa fermentum tincidunt. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
            </p>

            <a href="{{ route('about') }}" class="bg-gray-900 text-white px-8 py-4 rounded-lg font-semibold hover:bg-gray-800 transition duration-300 inline-block">
                TENTANG KAMI
            </a>
        </div>
    </div>

</section>




<!-- Tentang Kami Section -->
<section class="py-16 pb-40 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-3xl font-bold text-gray-900 mb-4">TENTANG KAMI</h2>
            <div class="w-20 h-1 bg-primary mx-auto mb-8"></div>
            <p class="text-lg text-gray-600 leading-relaxed">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae mauris vel massa fermentum tincidunt. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
            </p>
            <div class="w-20 h-1 bg-primary mx-auto mb-8"></div>
            <h2 class="text-3xl md:text-3xl font-bold text-gray-900 mb-4">_________</h2>

        </div>
    </div>
</section>

<section
    class="pt-32 pb-20 -mt-32 bg-gray-900 bg-cover bg-top"
    style="background-image: url('{{ asset('storage/user/Group70@2x.png') }}')">

    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">

            @foreach ($galleries as $item)
            <div class="bg-white rounded-2xl shadow-lg p-6 pt-20 text-center relative hover:shadow-xl transition duration-300">

                {{-- Foto lingkaran mengambang --}}
                <div class="w-40 h-40 rounded-full overflow-hidden absolute top-[-5rem] left-1/2 -translate-x-1/2 shadow-lg">
                    <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover">
                </div>

                {{-- Judul --}}
                <h3 class="text-xl font-bold text-gray-900 mb-3 mt-2">
                    {{ $item->title }}
                </h3>

                {{-- Deskripsi --}}
                <p class="text-gray-600 text-sm">
                    {{ $item->description }}
                </p>

            </div>
            @endforeach

        </div>
    </div>
</section>



<!-- Berita Kami Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-3xl font-bold text-center text-gray-900 mb-12">BERITA KAMI</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @if($featuredNews)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="h-[500px] overflow-hidden flex items-center justify-center bg-gray-100">
                    @if($featuredNews->image)
                        <img src="{{ asset('storage/' . $featuredNews->image) }}" alt="{{ $featuredNews->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="bg-gradient-to-br from-green-200 to-blue-200 w-full h-full flex items-center justify-center">
                            <span class="text-gray-600">No Image</span>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $featuredNews->title }}</h3>
                    <p class="text-gray-600 mb-4">
                        {{ $featuredNews->excerpt ?? Str::limit(strip_tags($featuredNews->content), 150) }}
                    </p>
                    <a href="{{ route('news.show', $featuredNews->id) }}" class="text-primary font-semibold hover:text-orange-700 transition duration-300">
                        Baca selengkapnya →
                    </a>
                </div>
            </div>
            @endif

            <div class="grid grid-cols-2 gap-4">
                @foreach($latestNews as $news)
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 overflow-hidden">
                    <div class="h-40 overflow-hidden">
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        @else
                            <div class="bg-gradient-to-br from-gray-200 to-gray-300 w-full h-full flex items-center justify-center">
                                <span class="text-gray-500 text-sm">No Image</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-3">
                        <h4 class="font-bold text-gray-900 mb-2 text-sm line-clamp-2">{{ $news->title }}</h4>
                        <p class="text-gray-600 text-xs mb-2 line-clamp-2 leading-relaxed">
                            {{ Str::limit(strip_tags($news->excerpt ?? $news->content), 70) }}
                        </p>
                        <a href="{{ route('news.show', $item->id) }}"
                        class="font-semibold text-orange-500 hover:text-orange-600 transition">
                            Baca selengkapnya
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Galeri Kami Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-3xl font-bold text-center text-gray-900 mb-12">GALERI KAMI</h2>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
            @foreach($galleryImages as $image)
            <div class="aspect-square rounded-xl overflow-hidden">
                @if($image->image)
                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->image_alt_text ?? 'Gallery Image' }}" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                        <span class="text-gray-500 text-sm">No Image</span>
                    </div>
                @endif
            </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route('gallery') }}" class="bg-gray-900 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-800 transition duration-300 inline-block">
                LIHAT LEBIH BANYAK
            </a>
        </div>
    </div>
</section>

@endsection