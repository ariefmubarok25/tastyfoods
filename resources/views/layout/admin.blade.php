<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav x-data="{ open: false }" class="bg-black px-6 py-4">

    <div class="flex justify-between items-center">
        <!-- LOGO -->
        <div class="text-xl font-semibold text-white">
            Admin Panel
        </div>

        <!-- HAMBURGER (MOBILE) -->
        <button @click="open = !open"
                class="md:hidden text-white focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- MENU DESKTOP -->
        <ul class="hidden md:flex items-center space-x-6">
            <li><a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-300">Dashboard</a></li>
            <li><a href="{{ route('admin.news.index') }}" class="text-white hover:text-gray-300">Berita</a></li>
            <li><a href="{{ route('admin.gallery.index') }}" class="text-white hover:text-gray-300">Galeri</a></li>
            <li><a href="{{ route('admin.location.index') }}" class="text-white hover:text-gray-300">Lokasi</a></li>
            <li><a href="{{ route('admin.contacts') }}" class="text-white hover:text-gray-300">Pesan</a></li>

            <li>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button onclick="return confirm('Yakin ingin logout?')"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <!-- MENU MOBILE -->
    <div x-show="open" x-transition
         class="md:hidden mt-4 bg-white rounded-lg shadow-lg p-4">

        <ul class="flex flex-col space-y-4 text-gray-800">
            <li><a href="{{ route('admin.dashboard') }}" class="block">Dashboard</a></li>
            <li><a href="{{ route('admin.news.index') }}" class="block">Berita</a></li>
            <li><a href="{{ route('admin.gallery.index') }}" class="block">Galeri</a></li>
            <li><a href="{{ route('admin.location.index') }}" class="block">Lokasi</a></li>
            <li><a href="{{ route('admin.contacts') }}" class="block">Pesan</a></li>

            <li>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button onclick="return confirm('Yakin ingin logout?')"
                            class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

</nav>

<!-- CONTENT -->
<div class="max-w-6xl mx-auto py-8 px-4">
    @yield('content')
</div>

<!-- Alpine.js -->
<script src="//unpkg.com/alpinejs" defer></script>

</body>
</html>
