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
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-semibold text-gray-700">
            Admin Panel
        </div>

        <ul class="flex items-center space-x-6">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="text-gray-600 hover:text-black">
                   Dashboard
                </a>
            </li>

            {{-- Berita --}}
            <li>
                <a href="{{ route('admin.news.index') }}"
                   class="text-gray-600 hover:text-black">
                   Berita
                </a>
            </li>

            {{-- Gallery --}}
            <li>
                <a href="{{ route('admin.gallery.index') }}"
                   class="text-gray-600 hover:text-black">
                   Galeri
                </a>
            </li>

            {{-- Lokasi (Tambahan Baru) --}}
            <li>
                <a href="{{ route('admin.location.index') }}"
                   class="text-gray-600 hover:text-black">
                   Lokasi
                </a>
            </li>

        </ul>
    </nav>

    <!-- CONTENT -->
    <div class="max-w-6xl mx-auto py-8 px-4">
        @yield('content')
    </div>

</body>
</html>
