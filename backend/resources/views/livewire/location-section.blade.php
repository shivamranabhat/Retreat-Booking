 <!-- section locations -->
 <section class="location-section py-14 md:py-20 px-6 md:px-28 lg:px-48 xl:px-56">
    <div class="container flex flex-col items-center gap-12 mx-auto">
        <h3 class="text-2xl font-bold">We've retreats in more than {{$locations?$locations->count() : '0'}} places in Nepal. See for yourself:</h3>

        <div class="slider-wrapper owl-carousel owl-theme location-carousel">
            @forelse($locations as $location)
            <div class="item mb-1">
                <a href="#" class="card flex flex-col box-shadow-iii border border-gray-200 rounded-xl">
                    <img src="{{asset('storage/'.$location->image)}}"
                        class="rounded-tl-lg rounded-tr-lg w-full h-56 lg:h-48 object-cover" alt="{{$location->image_alt}}">
                    <div class="details p-4 rounded-lg flex flex-col">
                        <h5 class="text-gray-800 text-lg font-lead-bold">{{$location->name}}</h5>
                        <span class="text-gray-400 text-sm">{{$location->description}}</span>
                    </div>
                </a>
            </div>
            @empty
            @endforelse
           
        </div>
        <div class="slider-buttons flex items-center gap-4">
            <div
                class="prev cursor-pointer bg-main hover:bg-gray-300 hover:ease-in duration-200 rounded-full p-2 flex items-center justify-center group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor"
                    class="stroke-white size-5 transition-all duration-200 ease-in-out group-hover:stroke-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </div>
            <div
                class="next cursor-pointer bg-main hover:bg-gray-300 hover:ease-in duration-200 rounded-full p-2 flex items-center justify-center group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor"
                    class="stroke-white size-5 transition-all duration-200 ease-in-out group-hover:stroke-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </div>
        </div>
    </div>
</section>
<!-- section locations -->