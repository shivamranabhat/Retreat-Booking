<section class="profile-body py-14 md:py-20 px-6 md:px-28 lg:px-48 mt-10">
    <div class="container flex flex-col items-center mx-auto w-full md:w-[80%]">
        @if($user->profile_photo_url)
        <form wire:submit.prevent='deleteProfileImage'
            class="top-section w-full py-6 rounded-tl-lg rounded-tr-lg border-t border-l border-r border-b-0 flex flex-col justify-center items-center gap-4">
            <img class="w-40 md:w-64 h-40 md:h-64 rounded-full object-cover"
                src="{{$user->google_id !== null ? $user->profile_photo_url : asset('storage/'.$user->profile_photo_url)}}"
                alt="User Profile Image">
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
                        class="px-4 md:px-6 py-3 border hover:transition-all text-stone-500 hover:text-brand-900 bg-stone-100 font-semibold"
                        id="tab-ii">
                        Bookings
                    </button>
                </div>
                <div class="panels">
                    <div class="profile p-4 md:p-6 flex flex-col gap-6 bg-white" id="tab-content-i">
                        <form class="container mx-auto grid grid-cols-1 gap-6"
                            wire:submit.prevent='updateProfile'>
                            <div class="input-field flex flex-col gap-2">
                                <label for="name" class="text-sm">Name </label>
                                <input
                                    class="p-4 w-full placeholder:text-stone-500 rounded-xl {{$user->google_id !== null ? 'bg-gray-200' : ''}} placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('email') border border-red-500 placeholder:text-red-400 @enderror"
                                    type="text" wire:model="name"
                                    placeholder="{{ $errors->has('name') ? ' Name*' : 'John Doe' }}" {{$user->google_id !== null ? 'readonly' : ''}}>
                            </div>
                            <div class="input-field flex flex-col gap-2">
                                <label for="email" class="text-sm">Email </label>
                                <input
                                    class="p-4 w-full bg-gray-200 placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('email') border border-red-500 placeholder:text-red-400 @enderror"
                                    type="email" wire:model="email"
                                    placeholder="{{ $errors->has('email') ? ' Email*' : 'someone@gmail.com' }}" readonly>
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