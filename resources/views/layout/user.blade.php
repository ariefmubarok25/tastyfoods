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
        $menuPosition = $type === 'home' ? 'space-x-8' : 'ml-auto space-x-10';
        $logoColor = $type === 'home' ? 'text-black' : 'text-white';
    @endphp

    <nav class="absolute top-0 left-0 w-full z-50 py-6 px-10 flex items-center">

        {{-- LOGO --}}
        <div class="text-2xl font-bold {{ $logoColor }} ml-10">
            TASTY FOOD
        </div>

        {{-- MENU --}}
        <ul class="flex {{ $menuPosition }} {{$textColor}} font-medium text-lg ml-20">
            <li><a href="{{ route('home') }}" class="hover:opacity-70">HOME</a></li>
            <li><a href="{{ route('about') }}" class="hover:opacity-70">TENTANG</a></li>
            <li><a href="{{ route('news') }}" class="hover:opacity-70">BERITA</a></li>
            <li><a href="{{ route('gallery') }}" class="hover:opacity-70">GALERI</a></li>
            <li><a href="{{ route('contact') }}" class="hover:opacity-70">KONTAK</a></li>
        </ul>
    </nav>


    {{-- ===================== PAGE CONTENT ===================== --}}
    <main>
        @yield('content')
    </main>


    {{-- ===================== FOOTER ===================== --}}
    <footer class="bg-gray-900 text-white mt-20 py-16 px-10">

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-10">

            {{-- Company Info --}}
            <div>
                <h2 class="text-2xl font-bold mb-4">Tasty Food</h2>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>

                <div class="flex space-x-4">
                    <div class="w-10 h-10 bg-blue-700 rounded-full"></div>
                    <div class="w-10 h-10 bg-blue-400 rounded-full"></div>
                </div>
            </div>

            {{-- Useful Links --}}
            <div>
                <h3 class="text-xl font-semibold mb-4">Useful links</h3>
                <ul class="space-y-2">
                    <li><a class="hover:text-gray-400">Blog</a></li>
                    <li><a class="hover:text-gray-400">Hewan</a></li>
                    <li><a class="hover:text-gray-400">Galeri</a></li>
                    <li><a class="hover:text-gray-400">Testimonial</a></li>
                </ul>
            </div>

            {{-- Privacy --}}
            <div>
                <h3 class="text-xl font-semibold mb-4">Privacy</h3>
                <ul class="space-y-2">
                    <li><a class="hover:text-gray-400">Karir</a></li>
                    <li><a class="hover:text-gray-400">Tentang Kami</a></li>
                    <li><a class="hover:text-gray-400">Kontak Kami</a></li>
                    <li><a class="hover:text-gray-400">Servis</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h3 class="text-xl font-semibold mb-4">Contact Info</h3>

                <ul class="space-y-3 text-gray-300">
                    <li class="flex items-center space-x-2">
                        <span>📧</span>
                        <span>tastyfood@gmail.com</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span>📞</span>
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span>📍</span>
                        <span>Kota Bandung, Jawa Barat</span>
                    </li>
                </ul>
            </div>

        </div>

        <p class="text-center text-gray-400 mt-12">
            Copyright ©2023 All rights reserved
        </p>

    </footer>

    {{-- ===================== PAGE SCRIPTS ===================== --}}
    @stack('scripts')

</body>
</html>
