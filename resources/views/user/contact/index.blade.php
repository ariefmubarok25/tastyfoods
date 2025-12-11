@extends('layout.user')

@section('title', 'Kontak Kami')

@section('content')

<!-- Hero Section -->
<section class="relative h-[70vh] flex items-center justify-center">
    <div class="absolute inset-0">
        <img src="{{ asset('monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" 
             alt="Kontak Kami Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <div class="relative z-10 text-center text-white">
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold uppercase tracking-wide">
            KONTAK KAMI
        </h1>
    </div>
</section>



<!-- Map Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto rounded-2xl overflow-hidden shadow-lg">

            @if ($location->src_link)
                <iframe src="{{ $location->src_link }}"
                        width="100%" height="450" style="border:0;"
                        allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            @else
                <div class="p-6 bg-gray-100 text-center text-gray-600">
                    Belum ada lokasi yang disetting.
                </div>
            @endif

        </div>
    </div>
</section>

@endsection
