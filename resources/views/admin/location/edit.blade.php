@extends('layout.admin')

@section('title', 'Edit Lokasi')

@section('content')

<h1 class="text-2xl font-bold mb-4">Edit Lokasi Google Maps</h1>

<form action="{{ route('admin.location.update', $location->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label class="block mb-2 font-semibold">Link SRC Google Maps</label>
    <textarea name="src_link" rows="3" class="w-full border p-2">{{ $location->src_link }}</textarea>

    <button class="mt-4 px-4 py-2 bg-green-800 text-white rounded">
        Simpan Perubahan
    </button>
</form>

@endsection
