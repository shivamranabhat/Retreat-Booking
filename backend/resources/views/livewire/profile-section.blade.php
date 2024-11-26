<section class="profile-body py-14 md:py-20 px-6 md:px-28 lg:px-48 mt-10">
    <div class="container flex flex-col items-center mx-auto w-full md:w-[80%]">
        @if($user->profile_photo_url)
        <form wire:submit.prevent='deleteProfileImage'
            class="top-section w-full py-6 rounded-tl-lg rounded-tr-lg border-t border-l border-r border-b-0 flex flex-col justify-center items-center gap-4">
            <img src="{{ $user->google_id !== null 
                ? $user->profile_photo_url 
                : (file_exists(public_path('storage/' . $user->profile_photo_url)) 
                    ? asset('storage/'.$user->profile_photo_url) 
                    : asset('main/images/user-profile.jpg')) }}"
                class="w-40 md:w-64 h-40 md:h-64 rounded-full object-cover" alt="User Profile Image">

            @if($user->google_id === null)
            <button type="submit" class="flex items-center gap-x-1 border-none outline-none text-red-600"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgb(220 38 38)" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                        clip-rule="evenodd" />
                </svg>
                Remove
            </button>
            @endif
        </form>
        @else
        <div
            class="top-section w-full py-6 border-t border-l border-r border-b-0 flex flex-col justify-center items-center gap-4">
            <img class="w-40 md:w-64 h-40 md:h-64 rounded-full object-cover" id="image-preview"
                src="{{asset('main/images/user-profile.jpg')}}" alt="User Profile Image">
            @if($user->google_id === null)
            <label for="profile_photo_url"
                class="upload-btn text-stone-700 flex items-end gap-x-1 border-none outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                </svg>
                Upload
            </label>
            @endif
            <input type="file" id="profile_photo_url" class="hidden" wire:model='profile_photo_url' />
        </div>
        @endif
        <div class="container mx-auto flex flex-col gap-8">
            <div class="tab-panel flex flex-col border rounded-bl-lg rounded-br-lg" wire:ignore>
                <div class="tab-filters flex">
                    <button class="px-4 md:px-6 py-3 hover:transition-all font-semibold active-tab" id="tab-i">
                        Profile
                    </button>
                    <button
                        class="px-4 md:px-6 py-3 border hover:transition-all text-gray-500 hover:text-brand-900 bg-gray-100 font-semibold"
                        id="tab-ii">
                        Bookings
                    </button>
                </div>
                <div class="panels">
                    <div class="profile p-4 md:p-6 flex flex-col gap-6 bg-white" id="tab-content-i">
                        <form class="container mx-auto grid grid-cols-1 gap-6" wire:submit.prevent='updateProfile'>
                            <div class="input-field flex flex-col gap-2">
                                <label for="name" class="text-sm">Name </label>
                                <input
                                    class="p-4 w-full placeholder:text-stone-500 rounded-xl {{$user->google_id !== null ? 'bg-gray-200' : ''}} placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('email') border border-red-500 placeholder:text-red-400 @enderror"
                                    type="text" wire:model="name"
                                    placeholder="{{ $errors->has('name') ? ' Name*' : 'John Doe' }}" {{$user->google_id
                                !== null ? 'readonly' : ''}}>
                            </div>
                            <div class="input-field flex flex-col gap-2">
                                <label for="email" class="text-sm">Email </label>
                                <input
                                    class="p-4 w-full bg-gray-200 placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('email') border border-red-500 placeholder:text-red-400 @enderror"
                                    type="email" wire:model="email"
                                    placeholder="{{ $errors->has('email') ? ' Email*' : 'someone@gmail.com' }}"
                                    readonly>
                            </div>
                            @if($user->google_id === null)
                            <div class="input-field flex flex-col gap-2">
                                <label for="email" class="text-sm">Password </label>
                                <input
                                    class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('email') border border-red-500 placeholder:text-red-400 @enderror"
                                    type="password" wire:model="password"
                                    placeholder="{{ $errors->has('password') ? ' *******' : '******' }}">
                            </div>
                            @endif

                            <button type="submit"
                                class="font-semibold rounded-3xl flex items-center justify-center bg-main text-white px-6 py-3 hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">Save
                                <x-home.spinner />
                            </button>

                        </form>
                    </div>
                    <div class="history p-4 md:p-6 flex flex-col gap-8 hidden" id="tab-content-ii">
                        <div class="flex flex-col gap-6">
                            @forelse($inquiries as $inquiry)
                            <div
                                class="card grid grid-cols-2 xl:grid-cols-4 gap-4 rounded-xl border border-gray-200 box-shadow-iii p-3 cursor-pointer">
                                <img class="w-full xl:w-80 col-span-2 xl:col-span-1 h-60 md:h-80 xl:h-full object-cover rounded-xl"
                                    src="{{$inquiry->package->main_image ? asset('storage/'.$inquiry->package->main_image) : asset('main/images/image-placeholder.png') }}"
                                    alt="{{$inquiry->package->title}}">
                                <div class="right-col grid grid-cols-5 gap-4 col-span-3">
                                    <div class="details col-span-5 md:col-span-3 flex flex-col gap-y-2">
                                        <h5 class="text-medium font-semibold text-gray-700">{{$inquiry->package->title}}
                                        </h5>
                                        @if($inquiry->status == 'Pending')
                                        <p class="text-sm flex items-center gap-x-1 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-5 h-5 fill-gray-500"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 6 L 11 12.414062 L 15.292969 16.707031 L 16.707031 15.292969 L 13 11.585938 L 13 6 L 11 6 z">
                                                </path>
                                            </svg>
                                            Pending
                                        </p>
                                        @elseif($inquiry->status == 'Accepted')
                                        <p class="text-sm flex items-center gap-x-1 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="#0FBC69" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            Accepted
                                        </p>
                                        @else
                                        <p class="text-sm flex items-center gap-x-1 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 stroke-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            Declined
                                        </p>
                                        @endif
                                        <p class="text-sm flex items-center gap-x-1 text-gray-500">
                                            <svg class="w-6 h-6" viewBox="0 0 70.866 70.866"
                                                enable-background="new 0 0 70.866 70.866" id="圖層_1" version="1.1"
                                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">

                                                <g>

                                                    <path
                                                        d="   M58.501,54.815h6.939V19.521c0-1.917-1.554-3.47-3.47-3.47l0,0c-1.916,0-3.47,1.553-3.47,3.47V54.815z"
                                                        fill="#FFFFFF" stroke="#00BF63" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-miterlimit="10"
                                                        stroke-width="3" />

                                                    <path
                                                        d="   M5.426,54.815V27.774c0-1.917,1.554-3.47,3.471-3.47c1.916,0,3.469,1.553,3.469,3.47v27.041H5.426z"
                                                        fill="#FFFFFF" stroke="#00BF63" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-miterlimit="10"
                                                        stroke-width="3" />

                                                    <rect fill="#FFFFFF" height="13.596" stroke="#00BF63"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-miterlimit="10" stroke-width="3" width="46.136"
                                                        x="12.365" y="36.756" />

                                                    <circle cx="50.371" cy="28.913" fill="#FFFFFF" r="4.053"
                                                        stroke="#00BF63" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-miterlimit="10"
                                                        stroke-width="3" />

                                                    <polygon fill="#FFFFFF"
                                                        points="   12.365,42.9 42.078,42.9 42.078,23.802 12.365,27.736  "
                                                        stroke="#00BF63" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-miterlimit="10"
                                                        stroke-width="3" />

                                                </g>

                                            </svg>
                                           {{$inquiry->roomType->name}}
                                        </p>
                                        <p class="text-gray-500 text-sm flex gap-x-1 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="#00bf63" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z">
                                                </path>
                                            </svg>@if($inquiry->package->start_date && $inquiry->package->end_date
                                            !==null)
                                            {{\Carbon\Carbon::parse($inquiry->package->start_date)->format('M
                                            jS')}} to {{\Carbon\Carbon::parse($inquiry->package->end_date)->format('M
                                            jS , Y')}}
                                            @else
                                            {{$inquiry->start_date}}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="book-btn col-span-5 md:col-span-2 flex flex-col gap-y-4 lg:gap-y-6">
                                        <div class="upper-col flex flex-col gap-y-2">
                                            <div class="flex flex-col">
                                                <p class="text-sm text-gray-500">
                                                    Starting From
                                                </p>
                                                <h5 class="font-semibold text-gray-700">USD
                                                    ${{number_format($inquiry->package->price,0)}}</h5>
                                            </div>

                                            <span class="flex gap-1 text-sm text-gray-500">
                                                @php
                                                $averageRating = $inquiry->package->reviews->avg('rating') ?? 0;
                                                $reviewCount = $inquiry->package->reviews->count();
                                                @endphp
                                                {{number_format($averageRating,1)}} <svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="#02BF64" class="size-5">
                                                    <path fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                ({{$reviewCount}} reviews)
                                            </span>
                                        </div>
                                       
                                        
                                       
                                        <a href="{{route('retreat.review',['slug'=>$inquiry->package->slug])}}"
                                            class="text-sm text-center text-white p-2 rounded-3xl hover:ease-in-out duration-300 transition-all {{$inquiry->package->status == 0 || $inquiry->status !== 'Accepted' ? 'bg-gray-400 cursor-not-allowed' : 'bg-main hover:bg-[#03914D]'}}">Write
                                            Review</a>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="card rounded-xl border border-gray-200 box-shadow-iii p-5">
                                <h5 class="text-center">No package found.</h5>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <x-success />
    <x-error />
    <script>
        document.addEventListener('livewire:load', function () {
            const input = document.getElementById('profile_photo_url');
    
            input.addEventListener('change', function (e) {
                const file = e.target.files[0];
                const reader = new FileReader();
    
                reader.onload = function (e) {
                    Livewire.dispatch('updateProfileImage', file);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
</section>