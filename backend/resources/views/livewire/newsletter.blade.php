 <!-- section newsletter -->
 <section class="newsletter py-14 md:py-20 px-6 md:px-28 lg:px-48 xl:px-56 bg-[#EBF8F3]">
    <div class="grid grid-cols-2 gap-12 lg:gap-28">
        <div class="col-span-2 lg:col-span-1 left-col">
            <div class="flex flex-col lg:flex-row items-center gap-6">
                <div class="left">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#2BC97D" class="size-36">
                        <path d="M19.5 22.5a3 3 0 0 0 3-3v-8.174l-6.879 4.022 3.485 1.876a.75.75 0 1 1-.712 1.321l-5.683-3.06a1.5 1.5 0 0 0-1.422 0l-5.683 3.06a.75.75 0 0 1-.712-1.32l3.485-1.877L1.5 11.326V19.5a3 3 0 0 0 3 3h15Z" />
                        <path d="M1.5 9.589v-.745a3 3 0 0 1 1.578-2.642l7.5-4.038a3 3 0 0 1 2.844 0l7.5 4.038A3 3 0 0 1 22.5 8.844v.745l-8.426 4.926-.652-.351a3 3 0 0 0-2.844 0l-.652.351L1.5 9.589Z" />
                      </svg>                      
                </div>
                <div class="right flex flex-col gap-3">
                    <h3 class="text-2xl lg:text-[31.25px] font-extrabold"> Still searching for that perfect
                        trip?</span></h3>
                    <h5 class="text-sm md:text-base text-gray-600">
                        Get weekly inspiration delivered right to your inbox!
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-span-2 lg:col-span-1 right-col flex flex-col gap-2">
            <p>Your email address</p>
            <form class="input-box flex" wire:submit.prevent='subscribe'>
                <input type="text" wire:model='email'
                    class="w-full py-3 pl-3 rounded-l-xl border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 placeholder:text-white placeholder:text-sm text-sm @error('email') placeholder:text-red-400 border border-red-400 @enderror" placeholder="Email Address*">
                <button type="submit"
                    class="bg-main flex gap-x-1 items-center text-white font-semibold rounded-r-xl text-sm px-3 hover:bg-[#03A456] hover:ease-in duration-200 transition-all"><x-home.spinner/><span wire:loading.delay>Loading...</span><span wire:loading.remove>Subscribe</span></button>
            </form>
            <span class="text-xs text-gray-500">We respect your privacy. We will not publish or share your email
                address in any way.</span>
        </div>
    </div>
    <x-home.success />
    <x-error />
</section>
<!-- section newsletter -->