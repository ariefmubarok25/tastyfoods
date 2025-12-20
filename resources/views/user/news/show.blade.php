@extends('layout.user')

@section('title', $news->title . ' - Healthy Tasty Food')

@section('content')


<section class="pt-28 pb-16 bg-gray-600">
    <div class="container mx-auto px-4">
        <article class="max-w-3xl mx-auto bg-white border border-gray-200 rounded-xl overflow-hidden">
            {{-- Featured Image --}}
            @if($news->image)
                <div class="w-full h-[400px] overflow-hidden">
                    <img
                        src="{{ asset('storage/' . $news->image) }}"
                        alt="{{ $news->title }}"
                        class="w-full h-full object-cover"
                    >
                </div>
            @else
                <div class="w-full h-[200px] bg-gray-100 flex items-center justify-center text-gray-500">
                    No Image Available
                </div>
            @endif

            {{-- Content --}}
            <div class="p-6 md:p-8">
                {{-- Title --}}
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-snug mb-6">
                    {{ $news->title }}
                </h1>

                {{-- Body --}}
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($news->content)) !!}
                </div>

                {{-- Back Button --}}
                <div class="mt-10 pt-6 border-t">
                    <a
                        href="{{ route('news') }}"
                        class="font-semibold text-orange-500 hover:text-orange-600 transition">
                        ← Kembali ke Daftar Berita
                    </a>
                </div>

            </div>
        </article>
    </div>
</section>
@endsection
