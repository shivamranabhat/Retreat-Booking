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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#00bf63"
                        class="size-5 mb-[0.1rem]">
                        <path fill-rule="evenodd"
                            d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                            clip-rule="evenodd"></path>
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
                    <img class="w-full h-full object-cover @if($key==0) rounded-tl-xl lg:rounded-l-xl @elseif($key==1) rounded-tr-xl lg:rounded-tr-xl @elseif($key==2) rounded-bl-xl lg:rounded-none @elseif($key==3) rounded-br-xl @endif" src="{{ asset('storage/'.$image) }}" alt="Package Image">
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
            <div class="col-span-2 xl:col-span-4 flex flex-col gap-6">
                <div class="summary flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Summary</h5>
                        <p class="text-gray-600 text-base">
                            Experience a restful, rejuvenating yoga retreat to cap off your adventures in the
                            glorious
                            Himalayas gateway.

                            Pokhara is famous for yoga and trekking as well as its rich spiritual culture;
                            surrounded by
                            lush greenery and peaceful lakes.

                            Expect to leave this memorable event feeling totally revitalized and equipped with
                            powerful
                            yet simple practices to bring more serenity and peace into your daily life.

                            Throughout the day you will have the opportunity to participate in a plethora of yoga
                            sessions and workshops to nourish your mind, body, and spirit.

                            Allow yourself to be refreshed as you engage with the beautiful natural surroundings in
                            the
                            foothills of the Himalayas.
                        </p>
                        <div class="flex justify-center">
                            <button class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] hover:ease-in-out duration-300 transition-all">See
                                More<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="inclusions flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Inclusions</h5>
                    <div class="lists flex flex-col gap-y-2">
                        <div class="item flex items-start gap-2 text-gray-600">
                            <span class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7 fill-main">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita non magnam laboriosam.
                        </div>
                        <div class="item flex items-start gap-2 text-gray-600">
                            <span class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7 fill-main">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita non magnam laboriosam.
                        </div>
                        <div class="item flex items-start gap-2 text-gray-600">
                            <span class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7 fill-main">
                                    <path fill-rule="evenodd"
                                        d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita non magnam laboriosam.
                        </div>
                        <div class="flex justify-center">
                            <button
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] hover:ease-in-out duration-300 transition-all">See
                                More<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="exclusions flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Exclusions</h5>
                    <div class="lists flex flex-col gap-y-2">
                        <div class="item flex items-start gap-2 text-gray-600">
                            <span class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7 fill-main">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita non magnam laboriosam.
                        </div>
                        <div class="item flex items-start gap-2 text-gray-600">
                            <span class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7 fill-main">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita non magnam laboriosam.
                        </div>
                        <div class="item flex items-start gap-2 text-gray-600">
                            <span class="mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-7 fill-main">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita non magnam laboriosam.
                        </div>
                        <div class="flex justify-center text-gray-600">
                            <button
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] hover:ease-in-out duration-300 transition-all">See
                                More<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="features flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Features</h5>
                        <ul class="list-disc pl-4">
                            <li class="text-gray-600 text-base">
                                Experience a restful, rejuvenating yoga retreat to cap off your adventures in the
                                glorious
                                Himalayas gateway.
                            </li>
                            <li class="text-gray-600 text-base">
                                Pokhara is famous for yoga and trekking as well as its rich spiritual culture;
                                surrounded by
                                lush greenery and peaceful lakes.
                            </li>
                            <li class="text-gray-600 text-base">
                                Expect to leave this memorable event feeling totally revitalized and equipped with
                                powerful
                                yet simple practices to bring more serenity and peace into your daily life.
                            </li>

                        </ul>
                        <div class="flex justify-center">
                            <button
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] hover:ease-in-out duration-300 transition-all">See
                                More<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="highlights flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Highlights</h5>
                        <ul class="list-disc pl-4">
                            <li class="text-gray-600 text-base">
                                Experience a restful, rejuvenating yoga retreat to cap off your adventures in the
                                glorious
                                Himalayas gateway.
                            </li>
                            <li class="text-gray-600 text-base">
                                Pokhara is famous for yoga and trekking as well as its rich spiritual culture;
                                surrounded by
                                lush greenery and peaceful lakes.
                            </li>
                            <li class="text-gray-600 text-base">
                                Expect to leave this memorable event feeling totally revitalized and equipped with
                                powerful
                                yet simple practices to bring more serenity and peace into your daily life.
                            </li>

                        </ul>
                        <div class="flex justify-center">
                            <button
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] hover:ease-in-out duration-300 transition-all">See
                                More<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="itinerary flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Itinerary</h5>
                        <ul class="list-disc pl-4">
                            <li class="text-gray-600 text-base">
                                Experience a restful, rejuvenating yoga retreat to cap off your adventures in the
                                glorious
                                Himalayas gateway.
                            </li>
                            <li class="text-gray-600 text-base">
                                Pokhara is famous for yoga and trekking as well as its rich spiritual culture;
                                surrounded by
                                lush greenery and peaceful lakes.
                            </li>
                            <li class="text-gray-600 text-base">
                                Expect to leave this memorable event feeling totally revitalized and equipped with
                                powerful
                                yet simple practices to bring more serenity and peace into your daily life.
                            </li>

                        </ul>
                        <div class="flex justify-center">
                            <button
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] hover:ease-in-out duration-300 transition-all">See
                                More<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="toc flex flex-col gap-4 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <div class="flex flex-col gap-2">
                        <h5 class="font-semibold text-2xl">Terms &amp; Conditions</h5>
                        <ul class="list-disc pl-4">
                            <li class="text-gray-600 text-base">
                                Experience a restful, rejuvenating yoga retreat to cap off your adventures in the
                                glorious
                                Himalayas gateway.
                            </li>
                            <li class="text-gray-600 text-base">
                                Pokhara is famous for yoga and trekking as well as its rich spiritual culture;
                                surrounded by
                                lush greenery and peaceful lakes.
                            </li>

                        </ul>
                        <div class="flex justify-center">
                            <button
                                class="text-main font-semibold text-sm flex gap-1 items-center hover:text-[#08A788] hover:ease-in-out duration-300 transition-all">See
                                More<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5">
                                    </path>
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
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z">
                            </path>
                        </svg>
                        <input type="text"
                            class="border-none outline-none bg-transparent focus:outline-none focus:ring-0 flatpickr-input"
                            id="inline" value="Select Arrival Date" readonly="readonly">
                    </div>
                    <button
                        class="bg-main font-semibold text-white  px-2 py-3 mt-3 rounded-3xl hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">Send
                        Inquiry</button>
                </div>
                <div class="flex flex-col gap-3 rounded-xl border border-gray-200 bg-gray-50">
                    <img src="{{$package->location->image ? asset('storage/'.$package->location->image) : asset('main/images/image-placeholder.png')}}"
                        class="rounded-tl-lg rounded-tr-lg w-full h-56 lg:h-48 object-cover" alt="">
                    <div class="details flex flex-col p-4 gap-4">
                        <p class="text-gray-600 text-sm">{{$package->location->description}}</p>
                        <div class="h-px bg-gray-300"></div>
                        <div class="location flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#02bf9b" class="size-5">
                                <path fill-rule="evenodd"
                                    d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600 text-sm">{{$package->location->name}}</span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 rounded-xl border border-gray-200 bg-gray-50">
                    <img src="https://bookretreats.com/cdn-cgi/image/width=640,quality=65,f=auto,sharpen=1,fit=cover,gravity=auto/assets/photo/housing/0m/50k/50318/p_1377554/1000_1709970331.jpg"
                        class="rounded-tl-lg rounded-tr-lg w-full h-56 lg:h-48 object-cover" alt="">
                    <div class="details flex flex-col p-4 gap-4">
                        <h5 class="font-semibold text-lg flex justify-between">Private Room <span
                                class="text-main text-base">$350</span></h5>
                        <p class="text-gray-600 text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Deserunt quas laudantium eveniet animi qui delectus?</p>
                    </div>
                </div>
                <div class="flex flex-col gap-3 rounded-xl border border-gray-200 bg-gray-50">
                    <img src="https://bookretreats.com/cdn-cgi/image/width=640,quality=65,f=auto,sharpen=1,fit=cover,gravity=auto/assets/photo/housing/0m/50k/50318/p_1377554/1000_1709970331.jpg"
                        class="rounded-tl-lg rounded-tr-lg w-full h-56 lg:h-48 object-cover" alt="">
                    <div class="details flex flex-col p-4 gap-4">
                        <h5 class="font-semibold text-lg flex justify-between">Shared Room <span
                                class="text-main text-base">$150</span></h5>
                        <p class="text-gray-600 text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Deserunt quas laudantium eveniet animi qui delectus?</p>
                    </div>
                </div>
                <div class="flex flex-col gap-3 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Reviews</h5>
                    <div class="owl-carousel details-testimonial-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-539px, 0px, 0px); transition: 0.25s; width: 2159px;">
                                <div class="owl-item cloned" style="width: 249.875px; margin-right: 20px;">
                                    <div class="card cursor-pointer my-2 flex flex-col gap-y-4">
                                        <p class="text-sm text-gray-600">Don't just take our word for it. Hundreds of
                                            guests
                                            have shared how
                                            much they love booking with us.</p>
                                        <div class="flex justify-between items-center">
                                            <div class="stars flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-500">-Shivam Ranabhat D</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 249.875px; margin-right: 20px;">
                                    <div class="card cursor-pointer my-2 flex flex-col gap-y-4">
                                        <p class="text-sm text-gray-600">Don't just take our word for it. Hundreds of
                                            guests
                                            have shared how
                                            much they love booking with us.</p>
                                        <div class="flex justify-between items-center">
                                            <div class="stars flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-500">-Shivam Ranabhat E</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 249.875px; margin-right: 20px;">
                                    <div class="card cursor-pointer my-2 flex flex-col gap-y-4">
                                        <p class="text-sm text-gray-600">Don't just take our word for it. Hundreds of
                                            guests
                                            have shared how
                                            much they love booking with us.</p>
                                        <div class="flex justify-between items-center">
                                            <div class="stars flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-500">-Shivam Ranabhat A</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 249.875px; margin-right: 20px;">
                                    <div class="card cursor-pointer my-2 flex flex-col gap-y-4">
                                        <p class="text-sm text-gray-600">Don't just take our word for it. Hundreds of
                                            guests
                                            have shared how
                                            much they love booking with us.</p>
                                        <div class="flex justify-between items-center">
                                            <div class="stars flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-500">-Shivam Ranabhat B</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 249.875px; margin-right: 20px;">
                                    <div class="card cursor-pointer my-2 flex flex-col gap-y-4">
                                        <p class="text-sm text-gray-600">Don't just take our word for it. Hundreds of
                                            guests
                                            have shared how
                                            much they love booking with us.</p>
                                        <div class="flex justify-between items-center">
                                            <div class="stars flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-500">-Shivam Ranabhat D</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 249.875px; margin-right: 20px;">
                                    <div class="card cursor-pointer my-2 flex flex-col gap-y-4">
                                        <p class="text-sm text-gray-600">Don't just take our word for it. Hundreds of
                                            guests
                                            have shared how
                                            much they love booking with us.</p>
                                        <div class="flex justify-between items-center">
                                            <div class="stars flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-500">-Shivam Ranabhat E</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 249.875px; margin-right: 20px;">
                                    <div class="card cursor-pointer my-2 flex flex-col gap-y-4">
                                        <p class="text-sm text-gray-600">Don't just take our word for it. Hundreds of
                                            guests
                                            have shared how
                                            much they love booking with us.</p>
                                        <div class="flex justify-between items-center">
                                            <div class="stars flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-500">-Shivam Ranabhat A</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 249.875px; margin-right: 20px;">
                                    <div class="card cursor-pointer my-2 flex flex-col gap-y-4">
                                        <p class="text-sm text-gray-600">Don't just take our word for it. Hundreds of
                                            guests
                                            have shared how
                                            much they love booking with us.</p>
                                        <div class="flex justify-between items-center">
                                            <div class="stars flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-5 fill-main">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <p class="text-sm text-gray-500">-Shivam Ranabhat B</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                                role="button" class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button><button role="button"
                                class="owl-dot"><span></span></button></div>
                    </div>
                </div>
                <div class="flex flex-col gap-3 lg:gap-2 xl:gap-3 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Share</h5>
                    <div class="links flex gap-x-4">
                        <span class="border border-gray-300 px-3 lg:px-2 xl:px-3 py-2 lg:py-1 xl:py-2 rounded-lg">
                            <a href="">
                                <i class="fa-brands fa-facebook text-main text-2xl lg:text-lg xl:text-2xl"></i>
                            </a>
                        </span>
                        <span class="border border-gray-300 px-3 lg:px-2 xl:px-3 py-2 lg:py-1 xl:py-2 rounded-lg">
                            <a href="">
                                <i class="fa-brands fa-instagram text-main text-2xl lg:text-lg xl:text-2xl"></i>
                            </a>
                        </span>
                        <span class="border border-gray-300 px-3 lg:px-2 xl:px-3 py-2 lg:py-1 xl:py-2 rounded-lg">
                            <a href="">
                                <i class="fa-brands fa-whatsapp text-main text-2xl lg:text-lg xl:text-2xl"></i>
                            </a>
                        </span>
                        <span
                            class="border border-gray-300 px-3 lg:px-2 xl:px-3 py-2 lg:py-1 xl:py-2 rounded-lg flex items-center">
                            <a href="">
                                <i class="fa-solid fa-link text-main text-base lg:text-sm xl:text-base"></i>
                            </a>
                        </span>
                    </div>

                </div>
                <div class="flex flex-col gap-3 p-4 rounded-xl border border-gray-200 bg-gray-50">
                    <h5 class="font-semibold text-2xl">Similar Retreats</h5>
                    <div class="featured flex flex-col gap-6 mt-2">
                        <a href="#" class="list cursor-pointer flex gap-2">
                            <img src="./assets/images/footer.png" class="w-24 rounded-xl object-cover" alt="">
                            <div class="details flex flex-col gap-1">
                                <h5 class="text-gray-600 text-sm font-semibold">
                                    Grant beach reatreat center
                                </h5>
                                <p class="text-gray-500 text-sm">
                                    Location: Pokhara
                                </p>
                                <p class="text-gray-500 text-sm">
                                    From 120$
                                </p>

                            </div>
                        </a>
                        <a href="#" class="list cursor-pointer flex gap-2">
                            <img src="./assets/images/footer.png" class="w-24 rounded-xl object-cover" alt="">
                            <div class="details flex flex-col gap-1">
                                <h5 class="text-gray-600 text-sm font-semibold">
                                    Grant beach reatreat center
                                </h5>
                                <p class="text-gray-500 text-sm">
                                    Location: Pokhara
                                </p>
                                <p class="text-gray-500 text-sm">
                                    From 120$
                                </p>

                            </div>
                        </a>
                        <a href="#" class="list cursor-pointer flex gap-2">
                            <img src="./assets/images/footer.png" class="w-24 rounded-xl object-cover" alt="">
                            <div class="details flex flex-col gap-1">
                                <h5 class="text-gray-600 text-sm font-semibold">
                                    Grant beach reatreat center
                                </h5>
                                <p class="text-gray-500 text-sm">
                                    Location: Pokhara
                                </p>
                                <p class="text-gray-500 text-sm">
                                    From 120$
                                </p>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>