@extends('layout.admin')

@section('title', 'Lokasi Kampus')

@section('content')

<h1 class="text-3xl font-semibold mb-6">Lokasi</h1>

@if($location->src_link)
    <iframe 
        src="{{ $location->src_link }}" 
        width="100%" 
        height="450"
        style="border:0;"
        allowfullscreen=""
        loading="lazy">
    </iframe>
@else
    <p class="text-gray-600 mb-4">
        Belum ada link Google Maps. Silakan tekan edit untuk menambahkan.
    </p>
@endif

<div class="mt-4">
    <a href="{{ route('admin.location.edit', $location->id) }}"
       class="px-4 py-2 bg-blue-600 text-white rounded">
        Edit Lokasi
    </a>
</div>

@endsection
