@extends('layout.admin')

@section('title', 'Daftar Pesan Kontak')

@section('content')

<h1 class="text-3xl font-semibold text-gray-800 mb-8">Pesan Masuk</h1>

@if(session('success'))
<div class="mb-6 px-4 py-3 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="bg-white shadow rounded-lg p-4 overflow-x-auto">
    <table class="min-w-full">
        <thead class="bg-gray-900 border-b">
            <tr>
                {{-- Nama (HILANG DI MOBILE) --}}
                <th class="px-4 py-3 text-white text-left hidden md:table-cell">
                    Nama
                </th>

                <th class="px-4 py-3 text-white text-left">
                    Email
                </th>

                <th class="px-4 py-3 text-white text-left">
                    Subjek
                </th>

                <th class="px-4 py-3 text-white text-left">
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody>
            @forelse($contacts as $contact)
            <tr class="border-b">

                {{-- Nama (HILANG DI MOBILE) --}}
                <td class="px-4 py-3 font-medium hidden md:table-cell">
                    {{ $contact->name }}
                </td>

                <td class="px-4 py-3 text-gray-700 break-all">
                    {{ $contact->email }}
                </td>

                <td class="px-4 py-3 text-gray-600">
                    {{ $contact->subject }}
                </td>

                {{-- Aksi --}}
                <td class="px-4 py-3 space-y-2">
                    <a href="{{ route('admin.contacts.show', $contact->id) }}"
                       class="block text-center px-3 py-1 bg-green-800 text-white rounded">
                        Lihat
                    </a>

                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus pesan ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="w-full px-3 py-1 bg-red-700 text-white rounded">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-6 text-gray-500">
                    Belum ada pesan masuk.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
@if(method_exists($contacts, 'links'))
<div class="mt-6">
    {{ $contacts->links() }}
</div>
@endif

@endsection
