@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')

<h1 class="text-3xl font-semibold text-gray-800 mb-8">Dashboard Admin</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- Card 1: Total Berita -->
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-700">Total Berita</h3>
        <p class="text-3xl font-bold text-blue-600 mt-2">
            {{ $totalNews }}
        </p>
    </div>

    <!-- Card 2: Total Galeri -->
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-700">Total Galeri</h3>
        <p class="text-3xl font-bold text-green-600 mt-2">
            {{ $totalGallery }}
        </p>
    </div>

</div>

@endsection
