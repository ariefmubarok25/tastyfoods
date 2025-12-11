@extends('layout.user')

@section('title', 'Galeri')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-[70vh] flex items-end">
        <div class="absolute inset-0">
            <img src="{{ asset('Group 70.png') }}" class="w-full h-full object-cover" alt="Galeri Background">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="relative z-10 text-white pb-16 container mx-auto px-4">
            <h1 class="text-4xl md:text-6xl font-bold uppercase tracking-wider">
                GALERI KAMI
            </h1>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($galleryImages as $image)
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="{{ asset('storage/gallery/' . $image->image) }}"
                             class="w-full h-72 object-cover hover:scale-105 transition-transform duration-500">
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
