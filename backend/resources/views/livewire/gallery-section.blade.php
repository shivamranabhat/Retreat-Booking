 <!-- gallery section -->
 <section class="gallery flex flex-col items-center gap-12 mx-auto px-6 py-14 md:py-20">
    <div class="title relative">
        <h3 class="text-2xl lg:text-[31.25px] font-extrabold">Have some <span class="text-main">Glimpse</span></h3>
        <div class="absolute right-[-2rem] md:right-[-2.5rem] top-[-1.5rem]">
            <img src="{{asset('main/images/decorator.svg')}}" class="w-3/4 lg:w-full" alt="decorator">
        </div>
    </div>
    <div class="owl-carousel gallery-carousel flex gap-4">
        @forelse($galleries as $gallery)
        <div class="card h-72 md:h-60">
            <img class="rounded-lg w-full h-full object-cover"
                src="{{asset('storage/'.$gallery->image)}}"
                alt="">
        </div>
        @empty
        <div class="card h-72 md:h-60">
            <img class="rounded-lg w-full h-full object-cover"
                src="{{asset('main/images/image-placeholder.png')}}"
                alt="placeholder">
        </div>
        <div class="card h-72 md:h-60">
            <img class="rounded-lg w-full h-full object-cover"
                src="{{asset('main/images/image-placeholder.png')}}"
                alt="placeholder">
        </div>
        <div class="card h-72 md:h-60">
            <img class="rounded-lg w-full h-full object-cover"
                src="{{asset('main/images/image-placeholder.png')}}"
                alt="placeholder">
        </div>
        <div class="card h-72 md:h-60">
            <img class="rounded-lg w-full h-full object-cover"
                src="{{asset('main/images/image-placeholder.png')}}"
                alt="placeholder">
        </div>
        <div class="card h-72 md:h-60">
            <img class="rounded-lg w-full h-full object-cover"
                src="{{asset('main/images/image-placeholder.png')}}"
                alt="placeholder">
        </div>
        @endforelse
    </div>
    <div class="slider-buttons flex items-center gap-4">
        <div
            class="prev-gallery cursor-pointer bg-main hover:bg-gray-300 hover:ease-in duration-200 rounded-full p-2 flex items-center justify-center group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor"
                class="stroke-white size-5 transition-all duration-200 ease-in-out group-hover:stroke-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </div>
        <div
            class="next-gallery cursor-pointer bg-main hover:bg-gray-300 hover:ease-in duration-200 rounded-full p-2 flex items-center justify-center group">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                stroke="currentColor"
                class="stroke-white size-5 transition-all duration-200 ease-in-out group-hover:stroke-gray-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </div>
    </div>
</section>
<!-- section gallery -->