<section class="details flex flex-col gap-y-8 md:gap-y-12 mt-16 px-6 md:px-28 lg:px-48 py-14 md:py-20">
    <div class="container mx-auto flex flex-col gap-y-6">
        <div class="bread-crumb flex items-start md:items-center gap-1">
            <p class="text-sm text-gray-500">
                Home
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="mt-1 md:mt-0 size-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
            </svg>
            <p class="text-sm text-gray-500">
                {{$category->name}}
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="mt-1 md:mt-0 size-3">
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
                <p class="text-sm flex gap-x-1 items-center text-gray-500">
                    @php
                    $averageRating = $package->reviews->avg('rating') ?? 0;
                    $reviewCount = $package->reviews->count();
                    $filledStars = floor($averageRating);
                    $halfStar = ($averageRating - $filledStars >= 0.5) ? 1 : 0;
                    $emptyStars = 5 - ($filledStars + $halfStar);
                    @endphp
                    {{number_format($averageRating,1)}} <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="#00bf63" class="size-5">
                        <path fill-rule="evenodd"
                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-xs mt-1">({{$reviewCount}} reviews)</span>
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
            0 => 'w-full h-full col-span-2 lg:col-span-3 row-span-2 lg:row-span-3',
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
        <div class="grid-container grid grid-cols-2 xl:grid-cols-6 gap-6">
            <div class="package-details col-span-2 xl:col-span-4 flex flex-col gap-6">
               
                <div class="summary flex flex-col gap-4 box-shadow-iii rounded-xl p-4">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Summary</h5>
                        <div class="text-gray-600 text-base">
                            {!! $package->summary !!}
                        </div>

                    </div>
                </div>

                <div class="itinerary flex flex-col gap-4 box-shadow-iii rounded-xl p-4">
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
                                class="text-main text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showFullItineraries ? 'Show Less' : 'Show More' }}
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
                <div class="features flex flex-col gap-4 box-shadow-iii rounded-xl p-4">
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
                                class="text-main text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showFullFeatures ? 'Show Less' : 'Show More' }}
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
                <div class="highlights flex flex-col gap-4 box-shadow-iii rounded-xl p-4">
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
                                class="text-main text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showFullHighlights ? 'Show Less' : 'Show More' }}
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

                <div class="toc flex flex-col gap-4 box-shadow-iii rounded-xl p-4">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Terms &amp; Conditions</h5>
                        <div class="text-gray-600 text-base">
                            @if($showFullTerms)
                            {!! $package->terms_and_conditions !!}
                            @else
                            {!! substr(strip_tags($package->terms_and_conditions), 0, 300) . '...' !!}
                            @endif
                        </div>
                        <div class="flex justify-center">
                            <button wire:click="$set('showFullTerms', {{ $showFullTerms ? 'false' : 'true' }})"
                                class="text-main text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">
                                {{ $showFullTerms ? 'Show Less' : 'Show More' }}
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
            </div>
            <div class="col-span-2 bg-white" wire:ignore>
                <div class="flex flex-col gap-6" id="right-sticky-col">
                    <div class="flex flex-col gap-3 p-4 bg-white rounded-xl box-shadow-iii">
                        <h5 class="font-semibold text-2xl">Overview</h5>
                        <p class="text-sm text-gray-600">Starting:
                            @if($package->start_date && $package->end_date !==null)
                            {{\Carbon\Carbon::parse($package->start_date)->format('M
                            jS Y')}} ({{$package->days}} Days)
                            @else
                            Available all days in a year ({{$package->days}} Days)
                            @endif
                        </p>
                        <p class="text-sm text-gray-600">From: US${{number_format($package->price,0)}}</p>

                        <div
                            class="date flex flex-wrap md:flex-nowrap gap-4 md:gap-2 md:gap-0 justify-between items-center bg-gray-200 p-4 rounded-xl">
                            <div class="flex flex-col gap-2">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5 stroke-gray-600"
                                        wire:ignore>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z">
                                        </path>
                                    </svg>
                                    <p class="text-sm text-gray-600">Start Date</p>
                                </div>
                                <input type="text"
                                    class="border-none text-sm outline-none bg-transparent focus:outline-none placeholder:text-gray-600 focus:ring-0 flatpickr-input"
                                    id='start-date' wire:model='start_date'
                                    wire:change='updateDate' placeholder="Select a start date" readonly {{$disable==true ? 'disabled' : ''}} >
                            </div>
                            @if($end_date)
                            <div class="flex flex-col gap-2">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5 stroke-gray-600"
                                        wire:ignore>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z">
                                        </path>
                                    </svg>
                                    <p class="text-sm text-gray-600">End Date</p>
                                </div>
                                <input type="text"
                                    class="border-none text-sm outline-none bg-transparent focus:outline-none placeholder:text-gray-600 focus:ring-0 flatpickr-input"
                                    wire:model='end_date' readonly>
                            </div>
                            @endif
                        </div>

                        <a href="{{route('retreat.inquiry',['retreat'=>$retreat,'location'=>$package->location->slug,'slug'=>$package->slug])}}"
                            class="bg-main text-center font-semibold text-white  px-2 py-3 mt-3 rounded-3xl hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">Send
                            Inquiry</a>
                    </div>
                    <div class="instructor flex flex-col gap-4 p-4 rounded-xl box-shadow-iii">
                        <div class="flex flex-col gap-2">
                            <h5 class="font-semibold text-2xl">Instructor</h5>
                            <div class="details flex gap-2">
                                <img class="rounded-full w-12 h-12 object-cover mt-1"
                                    src="{{$package->instructor->image ? asset('storage/'.$package->instructor->image) : asset('main/images/image-placeholder.png')}}"
                                    alt="{{$package->instructor->image_alt}}">
                                <div class="flex flex-col">
                                    <h5 class="font-semibold text-md">{{$package->instructor->name}}</h5>
                                    <p class="text-sm">Exp: {{$package->instructor->experience}} yrs</p>
                                </div>

                            </div>
                            <p class="text-gray-600 text-sm">{{$package->instructor->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-6" id="location">
            <div class="location flex flex-col gap-6 pt-4 pr-2 col-span-6 lg:col-span-4">
                <h5 class="font-semibold text-2xl">Location</h5>
                <div class="card w-full h-60">
                    {!! $package->accommodation->location !!}
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 py-4">
            <div class="inclusions flex flex-col gap-4">
                <h5 class="font-semibold text-2xl">Inclusions</h5>
                <div class="lists flex flex-col gap-y-2">
                    @forelse($package->inclusions as $inclusion)
                    <div class="item flex items-start gap-2 text-gray-600">
                        <span class="mt-[0.2rem]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#00bf63" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </span>
                        {{$inclusion->inclusion}}
                    </div>
                    @empty
                    @endif

                </div>
            </div>
            <div class="exclusions flex flex-col gap-4">
                <h5 class="font-semibold text-2xl">Exclusions</h5>
                <div class="lists flex flex-col gap-y-2">
                    @forelse($package->exclusions as $exclusion)
                    <div class="item flex items-start gap-2 text-gray-600">
                        <span class="mt-[0.2rem]">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#00bf63" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>

                        </span>
                        {{$exclusion->exclusion}}
                    </div>
                    @empty
                    @endif

                </div>
            </div>
        </div>
        <div class="accomodation flex flex-col gap-6 py-4">
            <h5 class="font-semibold text-2xl">Accomodation</h5>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($roomDetails as $room)
                <div class="flex flex-col rounded-xl box-shadow-iii">
                    <img src="{{$room->image ? asset('storage/'.$room->image) : asset('main/images/image-placeholder.png')}}"
                        class="rounded-tl-lg rounded-tr-lg w-full h-72 object-cover" alt="{{$room->name}}">
                    <div class="details flex flex-col items-start p-4 gap-2">
                        <h5 class="font-semibold text-lg flex justify-between w-full">{{$room->name}}<span
                                class="text-main text-base">${{number_format($package->price + ($room->percentage/100) * ($package->price),0)}}</span></h5>
                        <p class="text-gray-600 text-sm">{!!
                            \Illuminate\Support\Str::words(strip_tags($room->description), 10, '.') !!}
                        </p>

                        <button wire:click='selectRoom({{$room->id}})'
                            class="mt-4 text-sm text-center text-white px-3 py-2 rounded-3xl hover:ease-in-out duration-300 transition-all bg-main hover:bg-[#03914D]">Book
                            Now</button>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        <div class="reviews flex flex-col gap-6 py-4">
            <h5 class="font-semibold text-2xl">Guest Impressions</h5>
            <div class="grid grid-cols-1 xl:grid-cols-5 gap-16">
                <div class="col-span-2">
                    <div class="bg-white" id="{{$total>0 ? 'review-count' : ''}}">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-3xl font-bold">{{number_format($averageRating,1)}}</span>
                            <div class="flex space-x-1">
                                @for ($i = 0; $i < $filledStars; $i++) <svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="#02BF64" class="size-5">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                    @endfor
                                    @if ($halfStar)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#02BF64"
                                        class="size-5">
                                        <path fill-rule="evenodd"
                                            d="M12 2c.448 0 .896.26 1.082.665l2.058 4.947 5.42.435c.513.041.767.675.374 1.033l-4.163 3.567 1.293 5.427c.138.583-.519 1.042-1.024.735L12 16.968l-4.94 3.381c-.505.307-1.162-.152-1.024-.735l1.293-5.427L3.166 9.08c-.393-.358-.14-.992.374-1.033l5.42-.435L11.418 2.665C11.604 2.26 12 2 12 2zM10.79 4.078c.176-.423.758-.423.933 0l1.765 4.236 4.589.368c.215.017.338.284.166.435L15.345 10.99l.875 3.674c.066.277-.247.497-.455.352L12 13.3l-3.765 2.717c-.208.145-.521-.075-.455-.352l.875-3.674-3.069-2.873c-.172-.151-.048-.418.166-.435l4.59-.368 1.765-4.236z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    @endif

                                    @for ($i = 0; $i < $emptyStars; $i++) <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-5 stroke-main">
                                        <path fill-rule="evenodd"
                                            d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                            clip-rule="evenodd"></path>
                                        </svg>
                                        @endfor

                            </div>
                            <span class="text-gray-600">{{$reviewCount}} reviews</span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-4">
                                <span class="w-24">Excellent</span>
                                <progress class="flex-1 h-3" value="{{$excellent ?? ''}}" max="{{$total ?? ''}}"></progress>
                                <span class="w-8 text-right">{{$excellent ?? ''}}</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="w-24">Very good</span>
                                <progress class="flex-1 h-3" value="{{$good ?? ''}}" max="{{$total ?? ''}}"></progress>
                                <span class="w-8 text-right">{{$good ?? ''}}</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="w-24">Average</span>
                                <progress class="flex-1 h-3" value="{{$average ?? ''}}" max="{{$total ?? ''}}"></progress>
                                <span class="w-8 text-right">{{$average ?? ''}}</span>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="w-24">Poor</span>
                                <progress class="flex-1 h-3" value="{{$poor ?? ''}}" max="{{$total ?? ''}}"></progress>
                                <span class="w-8 text-right">{{$poor ?? ''}}</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-span-3 flex flex-col gap-6" id="reviews">
                    <div class="top-col flex items-center justify-between">
                        <div class="filter-options relative group">
                            <button type="button"
                                class="inline-flex w-full justify-center gap-x-1.5 rounded-3xl bg-white px-3 py-2 text-sm font-semibold text-gray-700 shadow-sm border-2 border-gray-200 box-shadow-iii hover:bg-gray-50"
                                id="menu-button" aria-expanded="true" aria-haspopup="true">
                                Sort By
                                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-1 z-10 p-1 w-56 rounded-lg origin-top-right border border-200 bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden group-hover:block"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                <div role="none" class="flex flex-col gap-y-1">
                                    <a wire:click="applySortFilter('highest')"
                                        class="cursor-pointer rounded-lg block px-4 py-3 text-sm text-gray-700 duration-200 transition-all hover:bg-gray-200 {{ $sortFilter === 'highest' ? 'bg-gray-200' : '' }}"
                                        role="menuitem" tabindex="-1">
                                        Highest Rating
                                    </a>
                                    <a wire:click="applySortFilter('lowest')"
                                        class="cursor-pointer rounded-lg block px-4 py-3 text-sm text-gray-700 duration-200 transition-all hover:bg-gray-200 {{ $sortFilter === 'lowest' ? 'bg-gray-200' : '' }}"
                                        role="menuitem" tabindex="-1">
                                        Lowest Rating
                                    </a>
                                    <a wire:click="applySortFilter('latest')"
                                        class="cursor-pointer rounded-lg block px-4 py-3 text-sm text-gray-700 duration-200 transition-all hover:bg-gray-200 {{ $sortFilter === 'latest' ? 'bg-gray-200' : '' }}"
                                        role="menuitem" tabindex="-1">
                                        Latest
                                    </a>
                                    <a wire:click="applySortFilter('oldest')"
                                        class="cursor-pointer rounded-lg block px-4 py-3 text-sm text-gray-700 duration-200 transition-all hover:bg-gray-200 {{ $sortFilter === 'oldest' ? 'bg-gray-200' : '' }}"
                                        role="menuitem" tabindex="-1">
                                        Oldest
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('retreat.review',$package->slug)}}"
                            class="text-sm text-center text-white px-3 py-2 rounded-3xl hover:ease-in-out duration-300 transition-all bg-main hover:bg-[#03914D]">Write
                            a Review</a>
                    </div>
                    @forelse($reviews as $review)
                    <div class="card flex flex-col gap-2 box-shadow-iii rounded-xl p-4">
                        <div class="flex justify-between">
                            <div class="flex gap-2">
                                @if($review->user->profile_photo_url)
                                <img class="rounded-full w-10 h-10" src="{{ $review->user->google_id !== null 
                                            ? $review->user->profile_photo_url 
                                            : (file_exists(public_path('storage/' . $review->user->profile_photo_url)) 
                                                ? asset('storage/'.$review->user->profile_photo_url) 
                                                : asset('main/images/user-profile.jpg')) }}" alt="Profile Image">
                                @else
                                <div class="bg-gray-600 px-3 py-2 text-white rounded-full font-semibold">
                                    {{ collect(explode(' ', $review->user->name))->map(fn($word) =>
                                    strtoupper($word[0]))->join('') }}
                                </div>
                                @endif
                                <div class="flex flex-col">
                                    <p class="font-semibold">{{$review->user->name}}</p>
                                    <span
                                        class="text-sm text-gray-600">{{\Carbon\Carbon::parse($review->created_at)->format('M
                                        jS Y')}}</span>
                                </div>
                            </div>
                            <div class="stars flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <!-- Filled Star -->
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 fill-main">
                                            <path fill-rule="evenodd"
                                                  d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <!-- Empty Star -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-gray-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z">
                                            </path>
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                            
                        </div>
                        <div class="description flex flex-col gap-2">
                            <h5 class="font-semibold text-base">{{$review->title}}
                            </h5>
                            <p class="text-base text-gray-700 leading-[1.6rem]">
                                {!! nl2br($review->description) !!}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="card flex justify-center box-shadow-iii rounded-xl p-6 lg:p-10">
                        <h5>No review found.</h5>
                    </div>
                    @endforelse
                </div>
            </div>
            @if($total >4)
            <div class="grid grid-cols-1 xl:grid-cols-5">
                <div class="col-span-2"></div>
                <div class="col-span-3 load flex justify-center mt-4">
                    <button wire:click='loadMore'
                        class="text-main text-sm flex gap-1 items-center hover:text-[#08A788] transition-all duration-300">Show
                        More
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                </div>
            </div>
            @endif
        </div>
    </div>

</section>