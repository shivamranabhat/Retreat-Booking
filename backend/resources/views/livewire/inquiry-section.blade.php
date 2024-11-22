<section class="form flex flex-col gap-y-8 md:gap-y-12 mt-16 px-6 md:px-28 lg:px-48 py-14 md:py-20">
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
                {{$package->title}}
            </p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
            </svg>
            <p class="text-sm text-gray-500">
                Inquiry
            </p>
        </div>
        <h2 class="text-4xl font-bold">Your Inquiry</h2>
        <div class="grid grid-cols-2 xl:grid-cols-5 gap-10">
            <div class="col-span-2 border bg-white border-gray-300 p-4 rounded-xl flex flex-col gap-2">
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
                    <p class="text-sm flex gap-x-1 items-center text-gray-500">
                        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" fill="none">
                            <path d="M3.5957 8.72873H19.1917" stroke="#00BF63" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.2764 12.146H15.2844" stroke="#00BF63" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.3936 12.146H11.4017" stroke="#00BF63" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M7.50293 12.146H7.51103" stroke="#00BF63" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.2764 15.5467H15.2844" stroke="#00BF63" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.3936 15.5467H11.4017" stroke="#00BF63" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M7.50293 15.5467H7.51103" stroke="#00BF63" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M14.9277 2.25V5.12943" stroke="#00BF63" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M7.85938 2.25V5.12943" stroke="#00BF63" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.0982 3.63181H7.68924C5.11963 3.63181 3.51465 5.06325 3.51465 7.69446V15.6129C3.51465 18.2854 5.11963 19.75 7.68924 19.75H15.09C17.6678 19.75 19.2646 18.3103 19.2646 15.6791V7.69446C19.2727 5.06325 17.6758 3.63181 15.0982 3.63181Z"
                                stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        @if($package->start_date && $package->end_date !==null)
                        {{\Carbon\Carbon::parse($package->start_date)->format('M
                        jS')}} to {{\Carbon\Carbon::parse($package->end_date)->format('M
                        jS')}}, {{\Carbon\Carbon::parse($package->start_date)->format('Y')}}
                        @else
                        Available all days in a year
                        @endif
                    </p>
                </div>

                <div class="h-px bg-gray-200 my-6">
                </div>
                <div class="details flex flex-col gap-4">
                    <div class="date flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path d="M3.5957 8.72873H19.1917" stroke="#00B67A" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.2764 12.146H15.2844" stroke="#00B67A" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.3936 12.146H11.4017" stroke="#00B67A" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M7.50293 12.146H7.51103" stroke="#00B67A" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M15.2764 15.5467H15.2844" stroke="#00B67A" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M11.3936 15.5467H11.4017" stroke="#00B67A" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M7.50293 15.5467H7.51103" stroke="#00B67A" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M14.9277 2.25V5.12943" stroke="#00B67A" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M7.85938 2.25V5.12943" stroke="#00B67A" stroke-width="1.3125"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.0982 3.63181H7.68924C5.11963 3.63181 3.51465 5.06325 3.51465 7.69446V15.6129C3.51465 18.2854 5.11963 19.75 7.68924 19.75H15.09C17.6678 19.75 19.2646 18.3103 19.2646 15.6791V7.69446C19.2727 5.06325 17.6758 3.63181 15.0982 3.63181Z"
                                stroke="#00B67A" stroke-width="1.3125" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        <div class="content flex justify-between w-full">
                            <p class="text-gray-600 flatpickr-input" id="date" readonly="readonly">Arrival Date</p>
                            <span class="text-gray-800">
                                {{\Carbon\Carbon::parse($arrival_date)->format('M jS Y') ??
                                \Carbon\Carbon::now()->format('M jS Y')}}</span>
                        </div>
                    </div>
                    <div class="guest flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#00BF63" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>

                        <div class="content flex justify-between w-full">
                            <p class="text-gray-600 flatpickr-input" id="date" readonly="readonly">No.of Guests</p>
                            <span class="text-gray-800">{{$people ?? '0'}}</span>
                        </div>
                        
                    </div>
                </div>
                <div class="amount mt-4">
                    <p class="text-gray-600 flex justify-between">Total Amount: <span
                            class="font-semibold text-gray-800">{{$price>0 ? '$'.$price : 'XXXX'}}</span></p>
                </div>
            </div>
            <div class="col-span-2 xl:col-span-3 flex flex-col gap-6">
                <h5 class="text-xl font-semibold">Check availability and send an inquiry!</h5>
                <div class="col-span-2 flex flex-col gap-6">

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="input-field flex flex-col gap-2">
                            <label for="date" class="text-sm">Arrival Date </label>
                            <input
                                class="p-4 w-full @error('arrival_date') border border-red-500 placeholder:text-red-400 @enderror placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out flatpickr-input"
                                type="text" wire:change="updateDate" id="arrival-date" wire:model="arrival_date"
                                placeholder="Arrival date{{ $errors->has('arrival_date') ? ' *' : '' }}"
                                readonly="readonly">
                        </div>
                        <div class="input-field flex flex-col gap-2">
                            <label for="people" class="text-sm">No.of Guests</label>
                            <div
                                class="flex items-center @error('people') border border-red-500 placeholder:text-red-400 @enderror placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out">
                                <input class="p-4 w-full border-none outline-none ml-2" type="text"
                                    wire:change="updatePeople" wire:model="people"
                                    placeholder="Number of guests{{ $errors->has('people') ? ' *' : '' }}">
                                <div class="buttons flex gap-3 mr-4">
                                    <button class="cursor-pointer" wire:click='increasePeople'>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="#6E6E6E" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                    <button class="cursor-pointer" wire:click='decreasePeople'>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="#6E6E6E" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="input-field flex flex-col gap-2">
                            <label for="email" class="text-sm">Email</label>
                            <input
                                class="p-4 w-full placeholder:text-stone-500 @error('email') border border-red-500 placeholder:text-red-400 @enderror rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out"
                                type="email" wire:model="email"
                                placeholder="Email Address{{ $errors->has('email') ? ' *' : '' }}">
                        </div>
                        <div class="input-field flex flex-col gap-2">
                            <label for="accommodation" class="text-sm">Accommodation</label>
                            <select wire:model='room_type_id' wire:change='roomType($event.target.value)'
                                class="p-5 w-full @error('room_type_id') border border-red-500 @enderror text-stone-700 rounded-xl text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out">
                                <option value="">Select Room Type</option>
                                @forelse($roomDetails as $room)
                                <option value="{{$room->id}}">{{ $room->name }} : ${{ number_format($room->price,0) }}
                                </option>
                                @empty
                                <option value="">No rooms available</option>
                                @endforelse
                            </select>
                        </div>

                    </div>
                    <div class="grid grid-cols-1 gap-6">
                        @for ($i = 0; $i < $people; $i++) <div class="input-field flex flex-col gap-2">
                            <label for="name-{{ $i }}" class="text-sm">Name (Person {{ $i + 1 }})</label>
                            <input
                                class="p-4 w-full placeholder:text-stone-500 @error('names.' . $i) border border-red-500 placeholder:text-red-400 @enderror rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out"
                                type="text" id="name-{{ $i }}" wire:model="names.{{ $i }}"
                                placeholder="Name{{ $errors->has('names.' . $i) ? ' *' : '' }}">
                    </div>
                    @endfor
                </div>

                <div class="text-area flex flex-col gap-2">
                    <label for="message" class="text-sm">Message </label>
                    <textarea
                        class="p-4 w-full @error('message') border border-red-500 placeholder:text-red-400 @enderror placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out h-32 lg:h-44"
                        wire:model="message" placeholder="Message{{ $errors->has('message') ? ' *' : '' }}"></textarea>
                </div>

                <button wire:click='send'
                    class="font-semibold rounded-3xl flex items-center justify-center bg-main text-white px-6 py-3 hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">
                    <x-home.spinner /><span wire:loading.delay>Sending...</span><span class="ml-4"
                        wire:loading.remove>Submit</span><span class="text-transparent">Submit</span>
                </button>
            </div>
        </div>
    </div>
    </div>
    <x-home.success />
</section>