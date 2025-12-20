@extends('layout.user')

@section('title', 'Kontak Kami')

@section('content')

<!-- Hero Section -->
   <section class="relative h-[35vh] md:h-[70vh] flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/user/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

       <div class="relative z-10 text-white container mx-auto px-4 pl-20">
            <h1 class="text-4xl md:text-5xl font-bold tracking-widest">
                KONTAK KAMI
            </h1>
        </div>
    </section>

<!-- Formulir Kontak -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-left text-gray-800 mb-8">
            KONTAK KAMI
        </h2>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

                <!-- Kolom Kiri -->
                <div class="space-y-4">
                    <input type="text" name="subject" required
                           class="w-full px-4 py-7 border border-black rounded-lg"
                           placeholder="Subject">

                    <input type="text" name="name" required
                           class="w-full px-4 py-7 border border-black rounded-lg"
                           placeholder="Name">

                    <input type="email" name="email" required
                           class="w-full px-4 py-7 border border-black rounded-lg"
                           placeholder="Email">
                </div>

                <!-- Kolom Kanan -->
                <textarea name="message" rows="10" required
                          class="w-full px-4 py-4 border border-black rounded-lg"
                          placeholder="Message"></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-gray-900 text-white py-4 rounded-lg font-semibold 
                           hover:bg-gray-800 transition duration-300">
                KIRIM
            </button>
        </form>
    </div>
</section>




<!-- Info Kontak -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-3 gap-12 max-w-6xl mx-auto">

            <!-- EMAIL -->
            <div class="text-center">
                <img src="{{ asset('storage/user/Group 66.png') }}" 
                     alt="Email Icon" 
                     class="w-14 h-14 object-contain mx-auto mb-4">
                
                <h3 class="text-lg font-semibold text-gray-900 mb-2 uppercase">EMAIL</h3>
                <p class="text-gray-600 break-words">tastyfood@gmail.com</p>
            </div>

            <!-- PHONE -->
            <div class="text-center">
                <img src="{{ asset('storage/user/Group 67.png') }}" 
                     alt="Phone Icon" 
                     class="w-14 h-14 object-contain mx-auto mb-4">
                
                <h3 class="text-lg font-semibold text-gray-900 mb-2 uppercase">PHONE</h3>
                <p class="text-gray-600">+62 812 3456 7890</p>
            </div>

            <!-- LOCATION -->
            <div class="text-center">
                <img src="{{ asset('storage/user/Group 68.png') }}" 
                     alt="Location Icon" 
                     class="w-14 h-14 object-contain mx-auto mb-4">
                
                <h3 class="text-lg font-semibold text-gray-900 mb-2 uppercase">LOCATION</h3>
                <p class="text-gray-600">Kota Bandung, Jawa Barat</p>
            </div>

        </div>
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
