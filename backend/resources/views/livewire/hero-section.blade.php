<!-- hero section -->
<section class="hero-section relative flex flex-col gap-y-16 items-center mt-18 z-0">
    @if (
    $content->image &&
    (pathinfo($content->image, PATHINFO_EXTENSION) === 'mp4' ||
    pathinfo($content->image, PATHINFO_EXTENSION) === 'webm'))
    <video autoplay="" muted="" loop="" playsinline="" class="object-cover h-screen md:h-[90vh] lg:h-[98vh] w-full"
        src="https://videos.pexels.com/video-files/7663449/7663449-uhd_2732_1440_24fps.mp4">
        <source src="https://videos.pexels.com/video-files/7663449/7663449-uhd_2732_1440_24fps.mp4" type="video/mp4">
    </video>
    @elseif($content)
    <img class="object-cover h-screen md:h-[90vh] lg:h-[98vh] w-full" src="{{asset('storage/'.$content->image)}}"
        alt="{{$content->alt}}">
    @else
    <img src="{{asset('main/images/image-placeholder.png')}}"
        class="object-cover h-screen md:h-[90vh] lg:h-[98vh] w-full" alt="">
    @endif
    <div
        class="details absolute top-1/2 transform -translate-y-1/2 mt-20 md:mt-6 w-[90%] md:w-[80%] lg:w-[64%] flex flex-col gap-y-10 md:gap-y-20">
        <div class="left-container flex flex-col gap-y-4 justify-center md:pr-0 lg:pr-4">
            <h1
                class="text-4xl text-white md:text-[2rem] lg:text-hero-title text-center font-bold lg:font-extrabold leading-tight lg:leading-normal">
                {{$content->title ?? 'Discover the best
                handpicked retreats
                and trainings on the
                planet'}}
            </h1>
            <h3 class="text-lg text-white md:text-xl text-center">{{$content->subtitle ?? 'Unplug. De-stress.
                Recharge.'}}</h3>
        </div>
        <div
            class="search-bar bg-white p-4 md:p-0 w-full grid grid-cols-1 lg:grid-cols-3 gap-y-2 md:gap-0 box-shadow-i rounded-xl mx-auto">
            <div id="category-container" class="category cursor-pointer flex gap-2 col-span-1 p-4 relative group">
                <svg class="mt-[0.1rem]" width="22" height="22" stroke="#00BF63" viewBox="0 0 24 24" fill="none">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                <div class="content flex flex-col gap-y-1">
                    <p class="font-lead-bold text-gray-600">{{$selectedCategory ? $selectedCategory : 'Catgeory' }}</p>
                    <span class="text-gray-500 text-sm">Which retreat you want?</span>
                </div>
                <div id="category-dropdown"
                    class="dropdown absolute z-10 left-0 top-20 mt-1 rounded-xl p-1 w-48 bg-white border border-gray-200 shadow-lg opacity-0 invisible transition-opacity">
                    <ul class="flex flex-col gap-y-1">
                        @forelse($categories as $category)
                        <li class="px-4 py-3 {{$selectedCategory == $category->name ? 'bg-gray-200' : ''}} hover:bg-gray-200 rounded-xl cursor-pointer"
                            wire:click='getCategory({{$category->id}})'>{{$category->name}}</li>
                        @empty
                        <li class="px-4 py-3 hover:bg-gray-200 rounded-xl cursor-pointer">No category found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="bg-gray-200 h-px w-full flex md:hidden"></div>
            <div id="location-container" class="location cursor-pointer flex gap-2 col-span-1 p-4 relative">
                <svg class="mt-[0.1rem]" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                    <path
                        d="M15.7497 15.0749L12.0371 18.7875C11.8747 18.95 11.6819 19.0789 11.4697 19.1669C11.2575 19.2549 11.03 19.3002 10.8002 19.3002C10.5705 19.3002 10.343 19.2549 10.1308 19.1669C9.9186 19.0789 9.7258 18.95 9.56343 18.7875L5.84993 15.0749C4.871 14.0959 4.20435 12.8486 3.93428 11.4907C3.66422 10.1329 3.80286 8.72544 4.33269 7.44638C4.86251 6.16732 5.75972 5.07409 6.91085 4.30493C8.06199 3.53578 9.41535 3.12524 10.7998 3.12524C12.1843 3.12524 13.5376 3.53578 14.6888 4.30493C15.8399 5.07409 16.7371 6.16732 17.2669 7.44638C17.7968 8.72544 17.9354 10.1329 17.6653 11.4907C17.3953 12.8486 16.7286 14.0959 15.7497 15.0749Z"
                        stroke="#00BF63" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M13.4248 10.125C13.4248 10.8212 13.1482 11.4889 12.656 11.9812C12.1637 12.4734 11.496 12.75 10.7998 12.75C10.1036 12.75 9.43593 12.4734 8.94365 11.9812C8.45137 11.4889 8.1748 10.8212 8.1748 10.125C8.1748 9.42881 8.45137 8.76113 8.94365 8.26884C9.43593 7.77656 10.1036 7.5 10.7998 7.5C11.496 7.5 12.1637 7.77656 12.656 8.26884C13.1482 8.76113 13.4248 9.42881 13.4248 10.125Z"
                        stroke="#00BF63" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="content flex flex-col gap-y-1">
                    <p class="font-lead-bold text-gray-600">{{$selectedLocation ? $selectedLocation : 'Locations' }}</p>
                    <span class="text-gray-500 text-sm">Where you want to go?</span>
                </div>
                <div id="location-dropdown" class="dropdown absolute z-10 left-0 top-20 mt-1 rounded-xl p-1 w-48 bg-white border border-gray-200 shadow-lg opacity-0 invisible transition-opacity">
                    <ul class="flex flex-col gap-y-1">
                        @forelse($locations as $location)
                        <li class="px-4 py-3 {{$selectedLocation == $location->name ? 'bg-gray-200' : ''}} hover:bg-gray-200 rounded-xl cursor-pointer"
                            wire:click='getLocation({{$location->id}})'>{{$location->name}}</li>
                        @empty
                        <li class="px-4 py-3 hover:bg-gray-200 rounded-xl cursor-pointer">No location found</li>
                        @endforelse
                    </ul>
                </div>
            </div>
            

            <div class="bg-gray-200 h-px w-full flex md:hidden"></div>
            <div class="end relative flex justify-between items-center p-4">
                <div class="date flex gap-2 col-span-1 justify-end cursor-pointer">
                    <svg class="mt-[0.1rem]" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                        viewBox="0 0 22 22" fill="none">
                        <path d="M3.5957 8.72873H19.1917" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M15.2764 12.146H15.2844" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M11.3936 12.146H11.4017" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M7.50293 12.146H7.51103" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M15.2764 15.5467H15.2844" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M11.3936 15.5467H11.4017" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M7.50293 15.5467H7.51103" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M14.9277 2.25V5.12943" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M7.85938 2.25V5.12943" stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.0982 3.63181H7.68924C5.11963 3.63181 3.51465 5.06325 3.51465 7.69446V15.6129C3.51465 18.2854 5.11963 19.75 7.68924 19.75H15.09C17.6678 19.75 19.2646 18.3103 19.2646 15.6791V7.69446C19.2727 5.06325 17.6758 3.63181 15.0982 3.63181Z"
                            stroke="#00BF63" stroke-width="1.3125" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="content flex flex-col gap-y-1" wire:ignore>
                        <input
                            class="font-lead-bold bg-white text-gray-600 placeholder:text-gray-600 border-none outline-none cursor-pointer"
                            id="date" placeholder="Date" readonly/>
                        <input wire:model='date' type="hidden" id="selectedDate" readonly />
                        <span class="text-gray-500 text-sm">When you want to go?</span>
                    </div>
                </div>
                <div id="calendarDropdown" class="hidden absolute top-20 mt-1 left-0 bg-white border shadow-lg rounded-lg" wire:ignore>
                    <div class="tabs flex justify-around border-b p-2">
                        <button id="specificDateTab" class="tab-btn active text-gray-600">Specific Date</button>
                        <button id="specificMonthTab" class="tab-btn text-gray-600">Specific Month</button>
                    </div>
                    <div id="specificDatePicker" class="tab-content p-2"></div>
                    <div id="specificMonthPicker" class="tab-content hidden p-2"></div>
                </div>
                <button
                    class="hidden md:flex items-center justify-center hover:bg-gray-300 hover:ease-in-out duration-200 p-4 rounded-full {{!$selectedCategory ? 'cursor-not-allowed bg-gray-300' : 'bg-main group'}}"
                    wire:click="redirectToRetreat">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor"
                        class="stroke-white size-5 transition-all duration-200 ease-in-out group-hover:stroke-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>
            </div>
            <button
                class="flex md:hidden items-center justify-center hover:bg-gray-300 hover:ease-in-out duration-200 py-2 px-4 rounded-full {{!$selectedCategory ? 'cursor-not-allowed bg-gray-300' : 'bg-main group'}}"
                wire:click="redirectToRetreat">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor"
                    class="stroke-white size-5 transition-all duration-200 ease-in-out group-hover:stroke-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>
        </div>
    </div>
    <script>
        function initializeDatePicker() {
            flatpickr("#specificDatePicker", {
                inline: true,
                dateFormat: "d M Y",
                minDate: "today",
                onChange: function (selectedDates, dateStr) {
                    // Set the value of the input field for date
                    document.getElementById("date").value = dateStr;

                    // Update the Livewire model 'date' via JavaScript
                    @this.set('date', dateStr);

                    // Log the selected date to the console (optional)
                    console.log("Selected Date:", dateStr);

                    // Close the dropdown
                    closeDropdown();
                },
            });
        }

        function initializeMonthPicker() {
            flatpickr("#specificMonthPicker", {
                inline: true,
                plugins: [
                    new monthSelectPlugin({
                        shorthand: true,
                        dateFormat: "M Y",
                        altFormat: "M Y",
                        theme: "material_blue",
                    }),
                ],
                minDate: new Date(new Date().getFullYear(), new Date().getMonth(), 1),
                onChange: function (selectedDates, dateStr) {
                    // Set the value of the input field for month
                    document.getElementById("date").value = dateStr;

                    // Log the selected month to the console (optional)
                    console.log("Selected Month:", dateStr);

                    // Update the Livewire model 'date' via JavaScript
                    @this.set('date', dateStr);

                    // Close the dropdown
                    closeDropdown();
                },
            });
        }

        // Tab Functionality
        const specificDateTab = document.getElementById("specificDateTab");
        const specificMonthTab = document.getElementById("specificMonthTab");
        const specificDatePicker = document.getElementById("specificDatePicker");
        const specificMonthPicker = document.getElementById("specificMonthPicker");

        if (specificDateTab) {
            specificDateTab.addEventListener("click", () => {
                specificDateTab.classList.add("active");
                specificMonthTab.classList.remove("active");

                specificDatePicker.classList.add("active");
                specificMonthPicker.classList.remove("active");

                initializeDatePicker();
                if (specificMonthPicker._flatpickr) {
                    specificMonthPicker._flatpickr.destroy();
                }
            });
        }

        if (specificMonthTab) {
            specificMonthTab.addEventListener("click", () => {
                specificMonthTab.classList.add("active");
                specificDateTab.classList.remove("active");

                specificMonthPicker.classList.add("active");
                specificDatePicker.classList.remove("active");

                // Initialize the month picker only when tab is selected
                initializeMonthPicker();

                // Destroy date picker if already initialized
                if (specificDatePicker._flatpickr) {
                    specificDatePicker._flatpickr.destroy();
                }
            });
        }

        const dateInput = document.getElementById("date");
        const calendarDropdown = document.getElementById("calendarDropdown");

        if (dateInput) {
            dateInput.addEventListener("click", () => {
                calendarDropdown.classList.toggle("hidden");
            });
        }

        function closeDropdown() {
            calendarDropdown.classList.add("hidden");
        }

        initializeDatePicker();
    </script>
</section>
<!-- hero section -->