@extends('layout.user')

@section('title', 'Tentang Kami')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-[70vh] flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="{{ asset('monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="relative z-10 text-center text-white">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold uppercase tracking-wide">
                TENTANG KAMI
            </h1>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">TASTY FOOD</h2>
                    <div class="space-y-6 text-gray-600 leading-relaxed">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt...
                        </p>
                        <p>
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit...
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="aspect-square rounded-2xl shadow-md overflow-hidden">
                        <img src="{{ asset('brooke-lark-oaz0raysASk-unsplash.jpg') }}" class="w-full h-full object-cover hover:scale-105 transition">
                    </div>
                    <div class="aspect-square rounded-2xl shadow-md overflow-hidden">
                        <img src="{{ asset('sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" class="w-full h-full object-cover hover:scale-105 transition">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Visi Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="grid grid-cols-2 gap-4">
                    <div class="aspect-square rounded-2xl shadow-md overflow-hidden">
                        <img src="{{ asset('fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" class="w-full h-full object-cover hover:scale-105 transition">
                    </div>
                    <div class="aspect-square rounded-2xl shadow-md overflow-hidden">
                        <img src="{{ asset('michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" class="w-full h-full object-cover hover:scale-105 transition">
                    </div>
                </div>

                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">VISI</h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate...</p>
                        <p>Sed ut perspiciatis unde omnis iste natus error...</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Misi Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">MISI</h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate...</p>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur...</p>
                    </div>
                </div>

                <div>
                    <div class="aspect-[4/3] rounded-2xl shadow-lg overflow-hidden">
                        <img src="{{ asset('sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" class="w-full h-full object-cover hover:scale-105 transition">
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
