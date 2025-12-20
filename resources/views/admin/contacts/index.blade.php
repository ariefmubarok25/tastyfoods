@extends('layout.admin')

@section('title', 'Daftar Pesan Kontak')

@section('content')

<h1 class="text-3xl font-semibold text-gray-800 mb-8">Pesan Masuk</h1>

@if(session('success'))
<div class="mb-6 px-4 py-3 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="bg-white shadow rounded-lg p-4">
    <table class="min-w-full">
        <thead class="bg-gray-900 border-b">
            <tr>
                <th class="px-4 py-3 text-white text-left">Nama</th>
                <th class="px-4 py-3 text-white text-left">Email</th>
                <th class="px-4 py-3 text-white text-left">Subjek</th>
                <th class="px-4 py-3 text-white text-left">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($contacts as $contact)
            <tr class="border-b">
                <td class="px-4 py-3 font-medium">
                    {{ $contact->name }}
                </td>

                <td class="px-4 py-3 text-gray-700">
                    {{ $contact->email }}
                </td>

                <td class="px-4 py-3 text-gray-600">
                    {{ $contact->subject }}
                </td>

                <td class="px-4 py-3 space-x-2">
                    <a href="{{ route('admin.contacts.show', $contact->id) }}"
                       class="px-3 py-1 bg-green-800 text-white rounded">
                        Lihat
                    </a>

                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                          method="POST"
                          class="inline"
                          onsubmit="return confirm('Hapus pesan ini?');">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-700 text-white rounded">
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

{{-- Pagination jika ada --}}
@if(method_exists($contacts, 'links'))
<div class="mt-6">
    {{ $contacts->links() }}
</div>
@endif

@endsection
