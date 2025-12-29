<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Tasty Food</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-white">

    {{-- ===================== NAVBAR ===================== --}}
    @php
        $type = $navbar_type ?? 'black';
        $textColor = $type === 'home' ? 'text-black' : 'text-white';
        $menuPosition = $type === 'home' ? '' : 'w-full ml-auto space-x-10';
        $logoColor = $type === 'home' ? 'text-black' : 'text-white';
    @endphp

    <nav x-data="{ open: false }"
     class="absolute top-0 left-0 w-full z-50 px-6 md:px-10 py-6 md:flex md:items-center">

    <div class="flex {{$menuPosition}} items-center justify-between">

        {{-- LOGO --}}
    <div class="text-white md:{{$textColor}} text-lg font-semibold {{ $logoColor }} ml-2 md:ml-10">
        TASTY FOOD
    </div>



        {{-- BUTTON HAMBURGER (MOBILE) --}}
        <button id="menuBtn" class="md:hidden text-white focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        {{-- MENU DESKTOP --}}
        <ul class="hidden md:flex pl-14 space-x-10 {{$textColor}} font-medium text-sm">
            <li><a href="{{ route('home') }}" class="hover:opacity-70">HOME</a></li>
            <li><a href="{{ route('about') }}" class="hover:opacity-70">TENTANG</a></li>
            <li><a href="{{ route('news') }}" class="hover:opacity-70">BERITA</a></li>
            <li><a href="{{ route('gallery') }}" class="hover:opacity-70">GALERI</a></li>
            <li><a href="{{ route('contact') }}" class="hover:opacity-70">KONTAK</a></li>
        </ul>
    </div>

    {{-- MENU MOBILE --}}
    <div id="mobileMenu"
         class="hidden md:hidden mt-6 bg-white rounded-xl shadow-lg p-6">

        <ul class="flex flex-col space-y-4 text-gray-800 font-medium">
            <li><a href="{{ route('home') }}">HOME</a></li>
            <li><a href="{{ route('about') }}">TENTANG</a></li>
            <li><a href="{{ route('news') }}">BERITA</a></li>
            <li><a href="{{ route('gallery') }}">GALERI</a></li>
            <li><a href="{{ route('contact') }}">KONTAK</a></li>
        </ul>
    </div>

</nav>


    {{-- ===================== PAGE CONTENT ===================== --}}
    <main>
        @yield('content')
    </main>


    {{-- ===================== FOOTER ===================== --}}
   {{-- ===================== FOOTER ===================== --}}
<footer class="bg-gray-900 text-white py-16 px-6 md:px-10">

    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-5 gap-8">

        {{-- Company Info --}}
        <div class="col-span-2 md:col-span-2">
            <h2 class="text-2xl font-bold mb-4">Tasty Food</h2>
            <p class="text-gray-300 mb-6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit...
            </p>
            <div class="flex space-x-4">
                <div class="w-10 h-10 rounded-full overflow-hidden">
                    <img src="{{ asset('storage/user/001-facebook.png') }}"
                        alt="Icon 1"
                        class="w-full h-full object-cover">
                </div>
                <div class="w-10 h-10 rounded-full overflow-hidden">
                    <img src="{{ asset('storage/user/002-twitter.png') }}"
                        alt="Icon 2"
                        class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        {{-- Useful Links --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">Useful Links</h3>
            <ul class="space-y-2 text-gray-300">
                <li>Blog</li>
                <li>Hewan</li>
                <li>Galeri</li>
                <li>Testimonial</li>
            </ul>
        </div>

        {{-- Privacy --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">Privacy</h3>
            <ul class="space-y-2 text-gray-300">
                <li>Karir</li>
                <li>Tentang Kami</li>
                <li>Kontak Kami</li>
                <li>Servis</li>
            </ul>
        </div>

        {{-- Contact Info --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">Contact Info</h3>

            <ul class="space-y-3 text-gray-300">
                <li class="flex items-center space-x-3">
                    <img src="{{ asset('storage/user/ic_markunread_24px.png') }}" class="w-4 h-4">
                    <span>tastyfood@gmail.com</span>
                </li>

                <li class="flex items-center space-x-3">
                    <img src="{{ asset('storage/user/ic_call_24px.png') }}" class="w-4 h-4">
                    <span>+62 812 3456 7890</span>
                </li>

                <li class="flex items-center space-x-3">
                    <img src="{{ asset('storage/user/ic_place_24px.png') }}" class="w-4 h-4">
                    <span>Kota Bandung, Jawa Barat</span>
                </li>
            </ul>
        </div>


    </div>
    
    <p class="text-center text-gray-400 mt-12 text-sm">
        Copyright ©2023 All rights reserved
    </p>
    
</footer>





    {{-- ===================== PAGE SCRIPTS ===================== --}}
    @stack('scripts')
    
<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    document.querySelectorAll('#mobileMenu a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });
</script>

</body>
</html>