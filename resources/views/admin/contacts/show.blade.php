@extends('layout.admin')

@section('title', 'Detail Pesan Kontak')

@section('content')

<a href="{{ route('admin.contacts') }}"
   class="inline-block mb-6 text-gray-700 hover:text-gray-800">
    ← Kembali ke daftar pesan
</a>

<div class="bg-white shadow rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-4">Detail Pesan</h2>

    <div class="mb-4">
        <p class="text-gray-600 text-sm">Nama Pengirim</p>
        <p class="text-lg font-semibold">{{ $contact->name }}</p>
    </div>

    <div class="mb-4">
        <p class="text-gray-600 text-sm">Email</p>
        <p class="text-lg font-semibold">{{ $contact->email }}</p>
    </div>

    <div class="mb-4">
        <p class="text-gray-600 text-sm">Subjek</p>
        <p class="text-lg font-semibold">{{ $contact->subject }}</p>
    </div>

    <div class="mb-4">
        <p class="text-gray-600 text-sm">Pesan</p>
        <div class="p-4 bg-gray-100 rounded text-gray-800">
            {{ $contact->message }}
        </div>
    </div>

    <div class="mt-6">
        <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
              method="POST"
              onsubmit="return confirm('Hapus pesan ini?')">
            @csrf
            @method('DELETE')

            <button class="bg-red-700 text-white px-4 py-2 rounded">
                Hapus Pesan
            </button>
        </form>
    </div>

</div>

@endsection
