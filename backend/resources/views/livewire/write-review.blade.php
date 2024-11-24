<section class="form flex flex-col gap-y-8 md:gap-y-12 mt-16 px-6 md:px-28 lg:px-48 py-14 md:py-20">
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
                {{$package->title}}
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="mt-1 md:mt-0 size-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
            </svg>
            <p class="text-sm text-gray-500">
                Review
            </p>
        </div>
        <h2 class="text-4xl font-bold">Share your experience!</h2>
        <div class="grid grid-cols-2 xl:grid-cols-5 gap-10">
            <div class="col-span-2 border border-gray-300 p-4 rounded-xl flex flex-col gap-2">
                <img class="rounded-xl"
                    src="{{$package->main_image ? asset('storage/'.$package->main_image) : asset('main/images/image-placeholder.png') }}"
                    alt="{{$package->title}}">
                <h5 class="text-lg font-semibold">{{$package->title}} <span
                        class="text-xs mt-1 {{$package->status == 0 ? 'text-red-400' : 'text-main'}}">({{$package->status
                        ==
                        0 ? 'Closed' : 'Available'}})</span>
                </h5>

                <div class="flex gap-x-4 items-center">
                    <p class="text-sm flex gap-x-1 items-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#00BF63" class="size-5 mb-[0.1rem]">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>

                        {{$package->location->name}}
                    </p>
                    <span class="flex gap-1 text-sm text-gray-500">4.5 <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="#02BF64" class="size-5">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                clip-rule="evenodd"></path>
                        </svg>
                        (50 reviews)
                    </span>
                </div>

                <p class="text-sm flex gap-x-1 items-center text-gray-500">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" fill="none">
                        <path d="M3.5957 8.72873H19.1917" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M15.2764 12.146H15.2844" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M11.3936 12.146H11.4017" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M7.50293 12.146H7.51103" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M15.2764 15.5467H15.2844" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M11.3936 15.5467H11.4017" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M7.50293 15.5467H7.51103" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M14.9277 2.25V5.12943" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M7.85938 2.25V5.12943" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.0982 3.63181H7.68924C5.11963 3.63181 3.51465 5.06325 3.51465 7.69446V15.6129C3.51465 18.2854 5.11963 19.75 7.68924 19.75H15.09C17.6678 19.75 19.2646 18.3103 19.2646 15.6791V7.69446C19.2727 5.06325 17.6758 3.63181 15.0982 3.63181Z"
                            stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>

                    {{\Carbon\Carbon::parse($package->start_date)->format('M
                    jS')}} to {{\Carbon\Carbon::parse($package->end_date)->format('M
                    jS')}}, {{\Carbon\Carbon::parse($package->start_date)->format('Y')}}
                </p>
                <p class="italic text-sm text-gray-500">
                    <span class="hidden xl:block">{!! Str::words(strip_tags($package->summary), 30) !!} <a
                            href="{{route('retreat.details',['retreat'=>$package->category->slug,'slug'=>$package->slug])}}"
                            class="text-main">Read
                            More...</a></span>

                    <span class="block xl:hidden">{!! Str::words(strip_tags($package->summary), 20) !!} <a
                            href="{{route('retreat.details',['retreat'=>$package->category->slug,'slug'=>$package->slug])}}"
                            class="text-main">Read
                            More...</a></span>
                </p>
                
            </div>
            <div class="col-span-2 xl:col-span-3 flex flex-col gap-6">
                <h5 class="text-xl font-semibold">How would you rate your experience?
                </h5>
                <form class="col-span-2 flex flex-col gap-6" wire:submit='saveReview'>
                    <div x-data="{ hoverRating: 0 }" class="flex items-center">
                        @for ($i = 1; $i <= 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#0FBC69"
                            class="size-8 w-8 h-8 cursor-pointer"
                            :class="{ 'fill-green-500': hoverRating >= {{ $i }} || {{ $rating }} >= {{ $i }} }"
                            @mouseover="hoverRating = {{ $i }}" @mouseout="hoverRating = 0"
                            @click="$wire.set('rating', {{ $i }})">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                            </svg>
                            @endfor
                            <input type="hidden" wire:model="rating">
                        </div>
                        @error('rating') <span class="text-sm text-red-500">How would you rate us? Tap a star.</span> @enderror
                    <div class="input-field flex flex-col gap-2">
                        <label for="title" class="text-xl font-semibold">Title your review
                        </label>
                        <input
                            class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('title') border border-red-500 @enderror"
                            type="text" wire:model="title"
                            placeholder="A gist of your experience.">
                    </div>

                    <div class="input-field flex flex-col gap-2">
                        <label for="description" class="text-xl font-semibold">Write your review
                        </label>
                        <textarea
                            class="p-4 w-full @error('description') border border-red-500 @enderror placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out h-32 lg:h-44"
                            wire:model="description"
                            placeholder="It was a great experience. I loved it."></textarea>
                    </div>

                    <button type="submit"
                        class="font-semibold rounded-3xl flex items-center justify-center bg-main text-white px-6 py-3 hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">
                        <x-home.spinner /><span wire:loading.delay>Sending...</span><span class="ml-4"
                            wire:loading.remove>Submit</span><span class="text-transparent">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <x-home.success />
</section>