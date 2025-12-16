@extends('layout.user')

@section('title', 'Galeri')

@section('content')

{{-- ================= HERO SECTION ================= --}}
   <section class="relative h-[35vh] md:h-[70vh] flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="{{ asset('storage/user/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

       <div class="relative z-10 text-white container mx-auto px-4 pl-20">
            <h1 class="text-4xl md:text-5xl font-bold tracking-widest">
                GALERI KAMI
            </h1>
        </div>
    </section>

{{-- ================= CAROUSEL SECTION ================= --}}
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-8">
        <div class="relative max-w-6xl mx-auto">

            <div class="overflow-hidden rounded-2xl">
                <div class="flex transition-transform duration-500 ease-in-out" id="carousel-track">
                    @foreach($carouselImages as $image)
                        <div class="w-full flex-shrink-0">
                            <img src="{{ asset('storage/' . $image->image) }}"
                                 alt="{{ $image->title }}"
                                 class="w-full h-96 object-cover rounded-2xl">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Prev Button --}}
            <button id="prev-btn"
                class="absolute top-1/2 -left-7 -translate-y-1/2
                bg-white shadow-xl w-14 h-14 rounded-full flex items-center justify-center
                hover:scale-110 hover:bg-gray-100 transition duration-300 z-20">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="3" stroke="black" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <button id="next-btn"
                class="absolute top-1/2 -right-7 -translate-y-1/2
                bg-white shadow-xl w-14 h-14 rounded-full flex items-center justify-center
                hover:scale-110 hover:bg-gray-100 transition duration-300 z-20">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="3" stroke="black" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>

            </button>





        </div>
    </div>
</section>


{{-- ================= GALLERY GRID SECTION ================= --}}
<section class="py-12 px-10 bg-white">
    <div class="container mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($galleryImages as $image)
                <div class="rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ asset('storage/' . $image->image) }}"
                         alt="{{ $image->title }}"
                         class="w-full aspect-square h-full md:h-80 object-cover hover:scale-105 transition duration-500">
                </div>
            @endforeach

        </div>
    </div>
</section>

@endsection


{{-- ================= SCRIPTS ================= --}}
@push('scripts')
<script>
    let currentSlide = 0;
    const track = document.getElementById('carousel-track');
    const slides = document.querySelectorAll('#carousel-track > div');
    const totalSlides = slides.length;

    function updateCarousel() {
        track.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    document.getElementById('next-btn').addEventListener('click', () => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    });

    document.getElementById('prev-btn').addEventListener('click', () => {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    });

    if (totalSlides > 1) {
        setInterval(() => {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }, 5000);
    }
</script>
@endpush
