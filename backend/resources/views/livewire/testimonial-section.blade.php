<!-- section testimonials -->
<section class="testimonial-section py-14 md:py-20 px-6 md:px-28 lg:px-48">
    <div class="container flex flex-col items-center gap-12 mx-auto">
        <div class="title relative">
            <div class="absolute left-[-2.7rem] top-[-1rem]">
                <img src="{{asset('main/images/left-quotation.svg')}}" class="w-10" alt="decorator">
            </div>
            <h3 class="text-2xl lg:text-[31.25px] font-extrabold">Why Travellers <span class="text-main">Love
                    Us</span></h3>
            <div class="absolute right-[-2rem] md:right-[-2rem] top-[-0.5rem]">
                <img src="{{asset('main/images/right-quotation.svg')}}" class="w-3/4 lg:w-full" alt="decorator">
            </div>
        </div>

        <div class="owl-carousel group-cards testimonial-carousel">
            @forelse($testimonials as $testimonial)
            <div
                class="card cursor-pointer bg-white my-2 p-4 flex flex-col gap-y-4 rounded-xl box-shadow-iii border border-gray-200">
                <p class="text-sm font-semibold">{{$testimonial->description}}</p>
                <div class="flex justify-between items-center">
                    <div class="stars flex">
                        @for($i = 0; $i < 5; $i++)
                            @if($i < $testimonial->rating)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5 fill-main">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>
                            @endif
                        @endfor
                    </div>
                    <p class="text-sm text-gray-500">-{{$testimonial->name}}</p>
                </div>
            </div>
            @empty
            @endforelse
        </div>
        <div class="slider-buttons flex items-center gap-4">
            <div
                class="prev-btn cursor-pointer bg-main hover:bg-gray-300 hover:ease-in duration-200 rounded-full p-2 flex items-center justify-center group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor"
                    class="stroke-white size-5 transition-all duration-200 ease-in-out group-hover:stroke-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </div>
            <div
                class="next-btn cursor-pointer bg-main hover:bg-gray-300 hover:ease-in duration-200 rounded-full p-2 flex items-center justify-center group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor"
                    class="stroke-white size-5 transition-all duration-200 ease-in-out group-hover:stroke-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </div>
    </div>
</section>
<!-- section testimonials -->