<section class="listing py-14 md:py-20 px-6 md:px-28 lg:px-48 xl:px-56 flex flex-col gap-y-4">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-10">
        <div class=""></div>
        <div class="col-span-4 lg:col-span-3 flex justify-between items-center">
            <div class="bread-crumb flex items-center gap-1" wire:ignore>
                <p class="text-sm text-gray-500">
                    Home
                </p>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                </svg>
                <p class="text-sm text-gray-500 capitalize">
                    {{Str::replace('-',' ',request()->segment(1))}}
                </p>
                @if(!empty(request()->segment(2)))
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                </svg>
                <p class="text-sm text-gray-500 capitalize" wire:ignore>
                    {{Str::replace('-',' ',request()->segment(2))}}
                </p>
                @endif
            </div>
            <div class="relative inline-block text-left group">
                <div>
                    <button type="button"
                        class="inline-flex w-full justify-center gap-x-1.5 rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-700 shadow-sm border-2 border-gray-200 box-shadow-iii hover:bg-gray-50"
                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Sort
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="absolute right-0 z-10 p-1 w-56 rounded-lg origin-top-right border border-200 bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden group-hover:block"
                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div role="none" class="flex flex-col gap-y-2">
                        <a class="cursor-pointer rounded-lg block px-4 py-3 text-sm text-gray-700 duration-200 transition-all hover:bg-gray-200 {{ $sortFilter === 'price-low-to-high' ? 'bg-gray-200' : '' }}"
                            role="menuitem" tabindex="-1" wire:click="applySortFilter('price-low-to-high')">
                            Price Low to High
                        </a>
                        <a class="cursor-pointer rounded-lg block px-4 py-3 text-sm text-gray-700 duration-200 transition-all hover:bg-gray-200 {{ $sortFilter === 'price-high-to-low' ? 'bg-gray-200' : '' }}"
                            role="menuitem" tabindex="-1" wire:click="applySortFilter('price-high-to-low')">
                            Price High to Low
                        </a>
                        <a class="cursor-pointer rounded-lg block px-4 py-3 text-sm text-gray-700 duration-200 transition-all hover:bg-gray-200 {{ $sortFilter === 'latest' ? 'bg-gray-200' : '' }}"
                            role="menuitem" tabindex="-1" wire:click="applySortFilter('latest')">
                            Latest
                        </a>
                        <a class="cursor-pointer rounded-lg block px-4 py-3 text-sm text-gray-700 duration-200 transition-all hover:bg-gray-200 {{ $sortFilter === 'oldest' ? 'bg-gray-200' : '' }}"
                            role="menuitem" tabindex="-1" wire:click="applySortFilter('oldest')">
                            Oldest
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-10">
        <div class="filter-options hidden lg:flex flex-col gap-y-6">
            <h5 class="text-gray-800 text-lg font-medium">Filters</h5>
            <div class="h-px w-full bg-gray-200"></div>
            <div class="option flex flex-col gap-y-2">
                <h5 class="text-gray-600 text-base font-medium">Price</h5>

                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="price"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyPriceFilter('all')">
                        All
                    </label>
                    <span class="text-gray-500 text-sm">{{ $allPackages->count() }}</span>
                </div>

                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="price"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyPriceFilter('100-200')">
                        $100-$200
                    </label>
                    <span class="text-gray-500 text-sm">{{ $allPackages->whereBetween('price', [100, 200])->count()
                        }}</span>
                </div>

                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="price"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyPriceFilter('200-400')">
                        $200-$400
                    </label>
                    <span class="text-gray-500 text-sm">{{ $allPackages->whereBetween('price', [200, 400])->count()
                        }}</span>
                </div>

                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="price"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyPriceFilter('400-600')">
                        $400-$600
                    </label>
                    <span class="text-gray-500 text-sm">{{ $allPackages->whereBetween('price', [400, 600])->count()
                        }}</span>
                </div>

                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="price"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyPriceFilter('600+')">
                        $600+
                    </label>
                    <span class="text-gray-500 text-sm">{{ $allPackages->where('price', '>=', 600)->count() }}</span>
                </div>
            </div>

            <div class="h-px w-full bg-gray-200"></div>
            <div class="option flex flex-col gap-y-2">
                <h5 class="text-gray-600 text-base font-medium">Locations</h5>
                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="location"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyLocationFilter('all')">
                        All
                    </label>
                    <span class="text-gray-500 text-sm">{{ $allPackages->count() }}</span>
                </div>
                @forelse($locations as $location)
                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="location"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyLocationFilter({{ $location->id }})" {{ $locationFilter==$location->id ?
                        'checked' : '' }}>
                        {{ $location->name }}
                    </label>
                    <span class="text-gray-500 text-sm">
                        {{ $allPackages->where('location_id', $location->id)->count() }}
                    </span>
                </div>
                @empty
                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="location"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer">
                        No Location
                    </label>
                    <span class="text-gray-500 text-sm">0</span>
                </div>
                @endforelse
            </div>
            <div class="h-px w-full bg-gray-200"></div>
            <div class="option flex flex-col gap-y-2">
                <h5 class="text-gray-600 text-base font-medium">Room Type</h5>
                @foreach($rooms as $room)
                <div class="inputs flex justify-between">
                    <label for="room-{{ $room->id }}" class="text-sm w-full flex gap-x-2 items-center">
                        <input type="checkbox" id="room-{{ $room->id }}"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="toggleRoomFilter({{ $room->id }})" {{ in_array($room->id, $roomFilter) ?
                        'checked' : '' }}>
                        {{ $room->name }}
                    </label>
                    <span class="text-gray-500 text-sm" wire:ignore>{{ $roomPackageCount[$room->id] ?? 0 }}</span>
                </div>
                @endforeach
            </div>
            <div class="h-px w-full bg-gray-200"></div>
            <div class="option flex flex-col gap-y-2">
                <h5 class="text-gray-600 text-base font-medium">Days</h5>
                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="days"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyDayFilter('all')">
                        All
                    </label>
                    <span class="text-gray-500 text-sm">{{ $allPackages->count() }}</span>
                </div>

                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="days"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyDayFilter('1-2')" {{ $dayFilter==='1-2' ? 'checked' : '' }}>
                        1-2 Days
                    </label>
                    <span class="text-gray-500 text-sm">
                        {{ $allPackages->whereBetween('days', [1, 2])->count() }}
                    </span>
                </div>

                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="days"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyDayFilter('3-4')" {{ $dayFilter==='3-4' ? 'checked' : '' }}>
                        3-4 Days
                    </label>
                    <span class="text-gray-500 text-sm">
                        {{ $allPackages->whereBetween('days', [3, 4])->count() }}
                    </span>
                </div>

                <div class="inputs flex justify-between">
                    <label class="text-sm w-full flex gap-x-2 items-center">
                        <input type="radio" name="days"
                            class="w-4 h-4 focus:accent-gray-800 accent-gray-800 cursor-pointer"
                            wire:click="applyDayFilter('4+')" {{ $dayFilter==='4+' ? 'checked' : '' }}>
                        4+ Days
                    </label>
                    <span class="text-gray-500 text-sm">
                        {{ $allPackages->where('days', '>', 4)->count() }}
                    </span>
                </div>
            </div>


        </div>
        <div class="card-group col-span-4 lg:col-span-3 flex flex-col gap-6">
            @forelse($packages as $package)
            <div class="card grid grid-cols-2 xl:grid-cols-3 gap-4 rounded-xl border border-gray-200 box-shadow-iii p-3 cursor-pointer"
                wire:click="redirectToDetails('{{$package->slug}}')">
                <img class="w-full xl:w-80 col-span-2 xl:col-span-1 h-60 md:h-80 xl:h-full object-cover rounded-xl"
                    src="{{$package->main_image ? asset('storage/'.$package->main_image) : asset('main/images/image-placeholder.png') }}"
                    alt="{{$package->title}}">
                <div class="right-col grid grid-cols-5 gap-4 col-span-2">
                    <div class="details col-span-5 md:col-span-3 flex flex-col gap-y-2">
                        <h5 class="text-medium font-semibold text-gray-700">{{$package->title}}</h5>
                        <p class="text-gray-500 text-sm flex gap-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#00bf63" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z">
                                </path>
                            </svg>
                            {{$package->location->name}}
                        </p>
                        <p class="text-gray-500 text-sm flex gap-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#00bf63" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z">
                                </path>
                            </svg>
                            {{\Carbon\Carbon::parse($package->start_date)->format('M
                            jS')}} to {{\Carbon\Carbon::parse($package->end_date)->format('M
                            jS')}}, {{\Carbon\Carbon::parse($package->start_date)->format('Y')}}
                        </p>
                        <p class="italic text-sm text-gray-500">
                            <span class="hidden xl:block">{!! Str::words(strip_tags($package->summary), 15) !!} <a
                                    href="{{route('retreat.details',['retreat'=>$retreat,'slug'=>$package->slug])}}"
                                    class="text-main">Read
                                    More...</a></span>

                            <span class="block xl:hidden">{!! Str::words(strip_tags($package->summary), 25) !!} <a
                                    href="{{route('retreat.details',['retreat'=>$retreat,'slug'=>$package->slug])}}"
                                    class="text-main">Read
                                    More...</a></span>
                        </p>
                    </div>
                    <div class="book-btn col-span-5 md:col-span-2 flex flex-col gap-y-4">
                        <div class="upper-col flex flex-col gap-y-2">
                            <div class="flex flex-col">
                                <p class="text-sm text-gray-500">
                                    Starting From
                                </p>
                                <h5 class="font-semibold text-gray-700">USD ${{number_format($package->price,0)}}</h5>
                            </div>
                            <span class="flex gap-1 items-center text-sm text-gray-500">
                                @if($package->status == 1)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="#02BF64" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Available
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="#B21313" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                Unavailable
                                @endif
                            </span>
                        </div>
                        <div class="btns flex flex-col gap-y-2">
                            <a href="{{route('retreat.details',['retreat'=>$retreat,'slug'=>$package->slug])}}"
                                class="border border-2 text-sm text-center text-gray-500 text-main font-semibold rounded-3xl p-2 border-main hover:bg-main hover:text-white hover:ease-in-out duration-300 transition-all">Details</a>
                            <a href="{{route('retreat.inquiry',['slug'=>$package->slug])}}"
                                class="text-sm text-center text-white p-2 rounded-3xl hover:ease-in-out duration-300 transition-all {{$package->status == 0 ? 'bg-gray-400 cursor-not-allowed' : 'bg-main hover:bg-[#03914D]'}}">Book
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="card rounded-xl border border-gray-200 box-shadow-iii p-5">
                <h5 class="text-center">No package found.</h5>
            </div>
            @endforelse

            <div class="pagination flex justify-center mt-10">
                <ul class="flex gap-4 items-center">
                    <li
                        class="border border-2 border-main bg-main rounded-full py-2 px-4 text-white hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all cursor-pointer">
                        <a href="#">1</a>
                    </li>
                    <li
                        class="border border-2 cursor-pointer border-main rounded-full py-2 px-4 text-main hover:bg-main hover:text-white hover:ease-in-out duration-300 transition-all">
                        <a href="#">2</a>
                    </li>
                    <button
                        class="flex gap-1 bg-main text-white items-center px-4 rounded-3xl h-full hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">Next
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                        </svg>

                    </button>
                </ul>
            </div>
        </div>
    </div>
</section>