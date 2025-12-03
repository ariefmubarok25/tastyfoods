@extends('layout.user')
@section('title', 'Home')

@section('content')

{{-- HERO SECTION --}}
<section class="max-w-7xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-2 gap-10">
    
    <div class="flex flex-col justify-center">
        <h1 class="text-4xl font-bold leading-tight text-gray-900 mb-4">
            Healthy & Tasty Food
        </h1>
        <p class="text-gray-600 mb-6">
            Nikmati makanan sehat yang lezat dan bergizi untuk mendukung gaya hidup seimbang.
        </p>
        <a href="{{ route('gallery.index') }}" 
           class="bg-black text-white px-6 py-3 rounded shadow hover:bg-gray-800 w-max">
            Lihat Menu Kami
        </a>
    </div>

    <div>
        <img src="/images/hero.jpg" class="w-full rounded-xl shadow-lg" alt="">
    </div>

</section>

{{-- TENTANG KAMI --}}
<section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Healthy Tasty Food adalah layanan makanan sehat dengan cita rasa lezat dan bahan berkualitas.
        </p>
    </div>
</section>

{{-- 4 CARD DARI GALERI --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-2xl font-bold mb-8 text-center">Kenapa Memilih Kami?</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        @foreach ($galleries as $item)
        <div class="bg-white rounded-xl shadow p-4">
            <img src="{{ asset('storage/' . $item->src_link) }}" 
                 class="w-full h-40 object-cover rounded-md mb-3">
            <h3 class="font-semibold text-lg">{{ $item->title ?? 'Judul' }}</h3>
            <p class="text-gray-600 text-sm mt-2">
                {{ Str::limit($item->description ?? 'Deskripsi singkat...', 70) }}
            </p>
        </div>
        @endforeach

    </div>
</section>

{{-- BERITA --}}
<section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-8 text-center">Berita Kami</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            @foreach ($news as $item)
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <img src="{{ asset('storage/' . $item->image) }}"
                     class="w-full h-40 object-cover">

                <div class="p-4">
                    <h3 class="font-semibold text-lg">{{ $item->title }}</h3>
                    <p class="text-gray-600 text-sm mt-2">{{ Str::limit($item->description, 80) }}</p>

                    <a href="{{ route('news.show', $item->id) }}"
                       class="text-blue-600 text-sm mt-3 block hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- GALERI 6 FOTO --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-2xl font-bold mb-8 text-center">Galeri Kami</h2>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($gallery_all as $item)
        <img src="{{ asset('storage/' . $item->src_link) }}" 
             class="w-full h-48 object-cover rounded-xl shadow">
        @endforeach
    </div>

    <div class="text-center mt-8">
        <a href="{{ route('gallery.index') }}"
           class="bg-black text-white px-6 py-3 rounded hover:bg-gray-800">
            Lihat Lebih Banyak
        </a>
    </div>
</section>

@endsection
