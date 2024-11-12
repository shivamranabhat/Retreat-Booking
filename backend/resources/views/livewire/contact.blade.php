 <!-- contact section -->
 <section class="contact flex flex-col gap-y-36 mt-16 px-6 md:px-28 lg:px-48 xl:px-56 py-14 md:py-20">
    <div class="container mx-auto flex flex-col gap-y-6">
        <h2 class="mb-16 text-center text-4xl leading-10 font-bold lg:leading-[50px] lg:text-5xl">Get in
            touch with our 24/7 customer <br> support team</h2>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-10">
            <div class="col-span-2 lg:col-span-1 grid grid-cols-1 md:grid-cols-2 lg:flex lg:flex-col gap-6">
                <div
                    class="pt-5 h-full flex flex-col items-center justify-between border border-solid border-gray-200 rounded-xl box-shadow-iii cursor-pointer lg:flex-1">
                    <div class="mb-4 w-20 h-20 flex items-center justify-center rounded-full bg-[#00A6FF26]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="fill-gray-600 size-6">
                            <path
                                d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path
                                d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                    </div><span class="block mb-1 text-2xl text-black font-bold">Email support</span><span
                        class="block mb-8 text-center text-gray-600 px-9">Email us <br> <a href="maito:{{$details->email ?? ''}}"
                            class="underline">{{$details->email ?? ''}}</a></span>
                </div>
                <div class="flex-none border border-solid border-gray-200 rounded-xl box-shadow-iii lg:flex-1">
                    <div class="pt-5 h-full flex flex-col items-center justify-between">
                        <div class="mb-4 w-20 h-20 flex items-center justify-center rounded-full bg-[#F5F0FF]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="fill-gray-600 size-6">
                                <path fill-rule="evenodd"
                                    d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </div>
                        <span class="block mb-1 text-2xl text-black font-bold">Call to us</span><span
                            class="block mb-8 text-center text-gray-600 px-9">Call us <br> <a href="tel:{{$details->phone ?? ''}}"
                                class="underline">{{$details->phone ?? ''}}</a></span>
                    </div>
                </div>
            </div>
            <form class="col-span-2 flex flex-col gap-6" wire:submit='send'>
                <div class="input-field">
                    <input
                        class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('name') border border-red-500 placeholder:text-red-400 @enderror"
                        type="text" wire:model="name" placeholder="Full Name{{ $errors->has('name') ? ' *' : '' }}">
                </div>

                <div class="input-field">
                    <input
                        class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('email') border border-red-500 placeholder:text-red-400 @enderror"
                        type="email" wire:model="email" placeholder="Email Address{{ $errors->has('email') ? ' *' : '' }}">
                </div>
                <div class="input-field">
                    <input
                        class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('subject') border border-red-500 placeholder:text-red-400 @enderror"
                        type="email" wire:model="subject" placeholder="Subject{{ $errors->has('subject') ? ' *' : '' }}">
                </div>

                <div class="text-area">
                    <textarea
                        class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('message') border border-red-500 placeholder:text-red-400 @enderror h-32 lg:h-56"
                        wire:model="message" placeholder="Message{{ $errors->has('message') ? ' *' : '' }}"></textarea>
                </div>

                <button type="submit"
                    class="font-semibold rounded-3xl flex items-center justify-center bg-main text-white px-6 py-3 hover:bg-[#08A788] hover:ease-in-out duration-300 transition-all"><x-home.spinner/><span wire:loading.delay>Sending...</span><span class="ml-4" wire:loading.remove>Send</span><span class="text-transparent">Send</span>
                </button>
            </form>
        </div>
    </div>
    <div class="container mx-auto flex flex-col gap-y-10 mb-10">
        <h2 class="text-center leading-10 font-semibold lg:leading-[50px] text-4xl">Connect with us</h2>
        <div class="icons flex justify-center gap-10">
            <a href="{{$details->facebook_link ?? ''}}" target="_blank" class="link box-shadow-iii border border-gray-300 rounded-lg p-4 cursor-pointer">
                <img class="w-8" src="{{asset('main/images/facebook.png')}}" alt="facebook">
            </a>
            <a href="{{$details->insta_link ?? ''}}" target="_blank" class="link box-shadow-iii border border-gray-300 rounded-lg p-4 cursor-pointer">
                <img class="w-8" src="{{asset('main/images/instagram.png')}}" alt="Instagram">
            </a>
            <a href="{{$details->whatsapp_link ?? ''}}" target="_blank" class="link box-shadow-iii border border-gray-300 rounded-lg p-4 cursor-pointer">
                <img class="w-8" src="{{asset('main/images/whatsapp.png')}}" alt="Whatsapp">
            </a>
        </div>
    </div>
</section>
<!-- contact section -->