<section class="details flex flex-col gap-y-8 md:gap-y-12 mt-16 px-6 md:px-28 lg:px-48 xl:px-56 py-14 md:py-20">
    <div class="container mx-auto flex flex-col gap-y-6">
        <div class="bread-crumb flex items-center gap-1">
            <p class="text-sm text-gray-500">
                Home
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
            </svg>
            <p class="text-sm text-gray-500">
                {{$category->name}}
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
            </svg>
            <p class="text-sm text-gray-500">
                {{$package->title}}
            </p>
        </div>
        <div class="flex flex-col gap-y-2">
            <h1 class="text-2xl font-semibold">{{$package->title}} <span
                    class="text-xs mt-1 {{$package->status == 0 ? 'text-red-400' : 'text-main'}}">({{$package->status ==
                    0 ? 'Closed' : 'Available'}})</span>
            </h1>
            <div class="flex gap-x-4 items-center">
                <p class="text-gray-500 text-sm flex gap-x-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#00bf63" class="size-5 mb-[0.1rem]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z">
                        </path>
                    </svg>
                    {{ \Carbon\Carbon::parse($package->start_date)->format('M jS Y') }}

                </p>
                <p class="text-sm flex gap-x-1 items-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#00bf63" class="size-5 mb-[0.1rem]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z">
                        </path>
                    </svg>
                    {{$package->location->name}}
                </p>
            </div>
        </div>
        <div class="grid grid-cols-4 lg:grid-cols-5 grid-rows-4 lg:grid-rows-3 gap-4">
            @php
            $images = is_string($package->images) ? json_decode($package->images, true) : $package->images;
            $images = array_slice($images, 0, 4);
            @endphp

            @foreach($images as $key => $image)
            @php
            $class = match($key) {
            0 => 'w-full h-full lg:h-[35rem] col-span-2 lg:col-span-3 row-span-2 lg:row-span-3',
            1 => 'w-full h-full col-span-2 lg:col-span-2 row-span-2 lg:row-span-2',
            2 => 'w-full h-full row-span-2 lg:row-span-1 col-span-2 lg:col-span-1',
            3 => 'w-full h-full relative row-span-2 lg:row-span-1 col-span-2 lg:col-span-1',
            default => 'w-full h-full object-cover',
            };
            @endphp

            <a href="javascript:void(0);" class="{{ $class }}">
                <img class="w-full h-full object-cover @if($key==0) rounded-tl-xl lg:rounded-l-xl @elseif($key==1) rounded-tr-xl lg:rounded-tr-xl @elseif($key==2) rounded-bl-xl lg:rounded-none @elseif($key==3) rounded-br-xl @endif"
                    src="{{ asset('storage/'.$image) }}" alt="Package Image">
                @if($key == 3)
                <div class="gallery flex items-center gap-2 absolute bottom-4 right-4 bg-white p-2 rounded-xl shadow-md"
                    data-lightbox="gallery">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="stroke-gray-700 size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z">
                        </path>
                    </svg>
                    <span class="text-gray-700 text-sm">Show all</span>
                </div>
                @endif
            </a>
            @endforeach
        </div>

        <div class="hidden">
            @if($package->images)
            @foreach(json_decode($package->images) as $imagePath)
            <a href="{{ asset('storage/' . $imagePath) }}" data-gallery="gallery" class="glightbox">
                <img class="object-cover h-full w-full" src="{{ asset('storage/' . $imagePath) }}"
                    alt="Gallery Images" />
            </a>
            @endforeach
            @endif
        </div>

        <div class="grid grid-cols-2 xl:grid-cols-6 gap-6">
            <div class="package-details col-span-2 xl:col-span-4 flex flex-col gap-6">
                <div class="summary flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Summary</h5>
                        <div class="text-gray-600 text-base">
                            @if($showFullSummary)
                            {!! $package->summary !!}
                            @else
                            {!! substr(strip_tags($package->summary), 0, 800) . '...' !!}
                            @endif
                        </div>
                        <div class="flex justify-center">
                            <button wire:click="$set('showFullSummary', {{ $showFullSummary ? 'false' : 'true' }})"
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showFullSummary ? 'See Less' : 'See More' }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $showFullSummary 
                                            ? 'M19.5 15.75l-7.5-7.5-7.5 7.5' 
                                            : 'm19.5 8.25-7.5 7.5-7.5-7.5' }}" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="inclusions flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Inclusions</h5>
                    <div class="lists flex flex-col gap-y-2">
                        @forelse($inclusions as $inclusion)
                        <div class="item flex items-start gap-2 text-gray-600">
                            <span class="mt-[0.2rem]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="#00bf63" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                            {{$inclusion->inclusion}}
                        </div>
                        @empty
                        @endif
                        @if($package->inclusions->count() > 2)
                        <div class="flex justify-center text-gray-600 mt-2">
                            <button wire:click="toggleInclusions"
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showAllInclusions ? 'See Less' : 'See More' }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="{{ $showAllInclusions ? 'M19.5 15.75l-7.5-7.5-7.5 7.5' : 'm19.5 8.25-7.5 7.5-7.5-7.5' }}" />
                                </svg>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="exclusions flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Exclusions</h5>
                    <div class="lists flex flex-col gap-y-2">
                        @forelse($exclusions as $exclusion)
                        <div class="item flex items-start gap-2 text-gray-600">
                            <span class="mt-[0.2rem]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="#00bf63" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                            {{$exclusion->exclusion}}
                        </div>
                        @empty
                        @endif
                        @if($package->exclusions->count() > 2)
                        <div class="flex justify-center text-gray-600 mt-2">
                            <button wire:click="toggleExclusions"
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showAllExclusions ? 'See Less' : 'See More' }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="{{ $showAllExclusions ? 'M19.5 15.75l-7.5-7.5-7.5 7.5' : 'm19.5 8.25-7.5 7.5-7.5-7.5' }}" />
                                </svg>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="features flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Features</h5>
                        <div class="text-gray-600 text-base">
                            @if($showFullFeatures)
                            {!! $package->features !!}
                            @else
                            {!! substr(strip_tags($package->features), 0, 300) . '...' !!}
                            @endif
                        </div>
                        <div class="flex justify-center">
                            <button wire:click="$set('showFullFeatures', {{ $showFullFeatures ? 'false' : 'true' }})"
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showFullFeatures ? 'See Less' : 'See More' }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $showFullFeatures 
                                            ? 'M19.5 15.75l-7.5-7.5-7.5 7.5' 
                                            : 'm19.5 8.25-7.5 7.5-7.5-7.5' }}" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="highlights flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Highlights</h5>
                        <div class="text-gray-600 text-base">
                            @if($showFullHighlights)
                            {!! $package->highlights !!}
                            @else
                            {!! substr(strip_tags($package->highlights), 0, 300) . '...' !!}
                            @endif
                        </div>
                        <div class="flex justify-center">
                            <button
                                wire:click="$set('showFullHighlights', {{ $showFullHighlights ? 'false' : 'true' }})"
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showFullHighlights ? 'See Less' : 'See More' }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $showFullHighlights 
                                            ? 'M19.5 15.75l-7.5-7.5-7.5 7.5' 
                                            : 'm19.5 8.25-7.5 7.5-7.5-7.5' }}" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="itinerary flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Itinerary</h5>
                        <div class="text-gray-600 text-base">
                            @if($showFullItineraries)
                            {!! $package->itinerary !!}
                            @else
                            {!! substr(strip_tags($package->itinerary), 0, 300) . '...' !!}
                            @endif
                        </div>
                        <div class="flex justify-center">
                            <button
                                wire:click="$set('showFullItineraries', {{ $showFullItineraries ? 'false' : 'true' }})"
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showFullItineraries ? 'See Less' : 'See More' }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $showFullItineraries 
                                            ? 'M19.5 15.75l-7.5-7.5-7.5 7.5' 
                                            : 'm19.5 8.25-7.5 7.5-7.5-7.5' }}" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="toc flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Terms &amp; Conditions</h5>
                        <div class="text-gray-600 text-base">
                            @if($showFullTerms)
                            {!! $package->terms_and_conditions !!}
                            @else
                            {!! substr(strip_tags($package->terms_and_conditions), 0, 200) . '...' !!}
                            @endif
                        </div>
                        <div class="flex justify-center">
                            <button wire:click="$set('showFullTerms', {{ $showFullTerms ? 'false' : 'true' }})"
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showFullTerms ? 'See Less' : 'See More' }}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $showFullTerms 
                                            ? 'M19.5 15.75l-7.5-7.5-7.5 7.5' 
                                            : 'm19.5 8.25-7.5 7.5-7.5-7.5' }}" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="teachers flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Instructor</h5>
                        <div class="details flex gap-6">
                            <img class="rounded-full w-24 h-24 object-cover mt-1"
                                src="{{$package->instructor->image ? asset('storage/'.$package->instructor->image) : asset('main/images/image-placeholder.png')}}"
                                alt="{{$package->instructor->image_alt}}">
                            <div class="flex flex-col gap-1">
                                <div class="flex justify-between w-full">
                                    <h5 class="font-semibold text-lg">{{$package->instructor->name}}</h5>
                                    <h5 class="text-base">Exp: {{$package->instructor->experience}} yrs</h5>
                                </div>
                                <p class="text-gray-600">{{$package->instructor->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2 flex flex-col gap-6">
                <div class="flex flex-col gap-3 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Overview</h5>
                    <p class="text-sm text-gray-600">Starting: {{\Carbon\Carbon::parse($package->start_date)->format('M
                        jS Y')}} ({{$package->days}} Days)</p>
                    <p class="text-sm text-gray-600">From: US${{number_format($package->price,0)}}</p>
                    <div class="date flex gap-x-2 items-center bg-gray-200 p-4 rounded-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 stroke-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z">
                            </path>
                        </svg>
                        <input type="text"
                            class="border-none outline-none bg-transparent focus:outline-none placeholder:text-gray-600 focus:ring-0 flatpickr-input"
                            id="arrival-date" wire:model='arrival_date' wire:change='updateDate'
                            placeholder="Select Arrival Date" readonly="readonly">
                    </div>
                    <a href="{{route('retreat.inquiry',$package->slug)}}"
                        class="bg-main text-center font-semibold text-white  px-2 py-3 mt-3 rounded-3xl hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">Send
                        Inquiry</a>
                </div>
                <div class="flex flex-col gap-3 rounded-xl border border-gray-200 bg-gray-50">
                    <img src="{{$package->location->image ? asset('storage/'.$package->location->image) : asset('main/images/image-placeholder.png')}}"
                        class="rounded-tl-lg rounded-tr-lg w-full h-56 lg:h-48 object-cover" alt="">
                    <div class="details flex flex-col p-4 gap-4">
                        <p class="text-gray-600 text-sm">{{$package->location->description}}</p>
                        <div class="h-px bg-gray-300"></div>
                        <div class="location flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#00bf63" class="size-5 mb-[0.1rem]">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z">
                                </path>
                            </svg>
                            <span class="text-gray-600 text-sm">{{$package->location->name}}</span>
                        </div>
                    </div>
                </div>
                @forelse($roomDetails as $room)
                <div class="flex flex-col gap-3 rounded-xl border border-gray-200 bg-gray-50">
                    <img src="{{$room->image ? asset('storage/'.$room->image) : asset('main/images/image-placeholder.png')}}"
                        class="rounded-tl-lg rounded-tr-lg w-full h-56 lg:h-48 object-cover" alt="{{$room->name}}">
                    <div class="details flex flex-col p-4 gap-4">
                        <h5 class="font-semibold text-lg flex justify-between">{{$room->name}}<span
                                class="text-main text-base">${{number_format($room->price,0)}}</span></h5>
                        <p class="text-gray-600 text-sm">{{$room->description}}</p>
                    </div>
                </div>
                @empty
                @endforelse
                <div class="flex flex-col gap-3 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Reviews</h5>
                    <div class="owl-carousel details-testimonial-carousel">
                        @forelse($testimonials as $testimonial)
                        <div class="card cursor-pointer my-2 flex flex-col gap-y-4">
                            <p class="text-sm text-gray-600">{{$testimonial->description}}</p>
                            <div class="flex justify-between items-center">
                                <div class="stars flex">
                                    @for($i = 0; $i < 5; $i++) @if($i < $testimonial->rating)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-5 fill-main">
                                            <path fill-rule="evenodd"
                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                        @endif
                                        @endfor
                                </div>
                                <p class="text-sm text-gray-500">-{{$testimonial->name}}</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-sm text-gray-600">No review found.</p>
                        @endforelse
                    </div>
                </div>
                <div class="flex flex-col gap-3 lg:gap-2 xl:gap-3 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Share</h5>
                    <div class="links flex gap-x-4">
                        <span class="border border-gray-300 px-3 lg:px-2 xl:px-3 py-2 lg:py-1 xl:py-2 rounded-lg">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('retreat.details',[strtolower($package->category->slug),strtolower($package->slug)])}}&display=popup"
                                target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" class="fill-main w-8">
                                    <path
                                        d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z" />
                                </svg>
                            </a>
                        </span>

                        <span class="border border-gray-300 px-3 lg:px-2 xl:px-3 py-2 lg:py-1 xl:py-2 rounded-lg">
                            <a href="https://wa.me/?text={{ urlencode('Check out this amazing retreat: ' . route('retreat.details', [strtolower($package->category->slug), strtolower($package->slug)])) }}" target="_blank" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" class="fill-main w-7">
                                    <path
                                        d="M25,2C12.318,2,2,12.318,2,25c0,3.96,1.023,7.854,2.963,11.29L2.037,46.73c-0.096,0.343-0.003,0.711,0.245,0.966 C2.473,47.893,2.733,48,3,48c0.08,0,0.161-0.01,0.24-0.029l10.896-2.699C17.463,47.058,21.21,48,25,48c12.682,0,23-10.318,23-23 S37.682,2,25,2z M36.57,33.116c-0.492,1.362-2.852,2.605-3.986,2.772c-1.018,0.149-2.306,0.213-3.72-0.231 c-0.857-0.27-1.957-0.628-3.366-1.229c-5.923-2.526-9.791-8.415-10.087-8.804C15.116,25.235,13,22.463,13,19.594 s1.525-4.28,2.067-4.864c0.542-0.584,1.181-0.73,1.575-0.73s0.787,0.005,1.132,0.021c0.363,0.018,0.85-0.137,1.329,1.001 c0.492,1.168,1.673,4.037,1.819,4.33c0.148,0.292,0.246,0.633,0.05,1.022c-0.196,0.389-0.294,0.632-0.59,0.973 s-0.62,0.76-0.886,1.022c-0.296,0.291-0.603,0.606-0.259,1.19c0.344,0.584,1.529,2.493,3.285,4.039 c2.255,1.986,4.158,2.602,4.748,2.894c0.59,0.292,0.935,0.243,1.279-0.146c0.344-0.39,1.476-1.703,1.869-2.286 s0.787-0.487,1.329-0.292c0.542,0.194,3.445,1.604,4.035,1.896c0.59,0.292,0.984,0.438,1.132,0.681 C37.062,30.587,37.062,31.755,36.57,33.116z">
                                    </path>
                                </svg>
                            </a>
                        </span>
                        <span class="border border-gray-300 px-3 lg:px-2 xl:px-3 py-2 lg:py-1 xl:py-2 rounded-lg">
                            <a href="https://twitter.com/intent/tweet?text=Check%20out%20this%20retreat:%20{{route('retreat.details', [strtolower($package->category->slug), strtolower($package->slug)])}}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-main w-7" viewBox="0 0 50 50">
                                    <path
                                        d="M 11 4 C 7.134 4 4 7.134 4 11 L 4 39 C 4 42.866 7.134 46 11 46 L 39 46 C 42.866 46 46 42.866 46 39 L 46 11 C 46 7.134 42.866 4 39 4 L 11 4 z M 13.085938 13 L 21.023438 13 L 26.660156 21.009766 L 33.5 13 L 36 13 L 27.789062 22.613281 L 37.914062 37 L 29.978516 37 L 23.4375 27.707031 L 15.5 37 L 13 37 L 22.308594 26.103516 L 13.085938 13 z M 16.914062 15 L 31.021484 35 L 34.085938 35 L 19.978516 15 L 16.914062 15 z">
                                    </path>
                                </svg>
                            </a>
                        </span>

                    </div>

                </div>
                <div class="flex flex-col gap-3 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Similar Retreats</h5>
                    <div class="featured flex flex-col gap-6 mt-2">
                        @forelse($featured as $feature)
                        <a href="{{ route('retreat.details', ['retreat' => $feature->package->category->slug, 'slug' => $feature->package->slug]) }}"
                            class="list cursor-pointer flex gap-2">
                            <img src="{{ asset('storage/'.$feature->package->main_image) }}"
                                class="w-24 rounded-xl object-cover" alt="{{ $feature->package->title }}">
                            <div class="details flex flex-col gap-1">
                                <h5 class="text-gray-600 text-sm font-semibold">
                                    {{ $feature->package->title }}
                                </h5>
                                {{-- <p class="text-gray-500 text-sm">
                                    Location: {{ $feature->package->location->name }}
                                </p> --}}
                                <p class="text-gray-500 text-sm">
                                    From {{ number_format($feature->package->price,0) }}$
                                </p>
                            </div>
                        </a>
                        @empty
                        <h5>No similar retreats found.</h5>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>