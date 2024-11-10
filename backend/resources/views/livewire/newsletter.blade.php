 <!-- section newsletter -->
 <section class="newsletter py-14 md:py-20 px-6 md:px-28 lg:px-48 xl:px-56 bg-[#EBF8F3]">
    <div class="grid grid-cols-2 gap-12 lg:gap-28">
        <div class="col-span-2 lg:col-span-1 left-col">
            <div class="flex flex-col lg:flex-row items-center gap-6">
                <div class="left">
                    <i class="fa-solid fa-envelope-open-text text-7xl lg:text-9xl text-main"></i>
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
                    class="bg-main flex gap-x-1 items-center text-white font-semibold rounded-r-xl text-sm px-3 hover:bg-[#08A788] hover:ease-in duration-200 transition-all"><x-home.spinner/><span wire:loading.delay>Loading...</span><span wire:loading.remove>Subscribe</span></button>
            </form>
            <span class="text-xs text-gray-500">We respect your privacy. We will not publish or share your email
                address in any way.</span>
        </div>
    </div>
    <x-home.success />
    <x-error />
</section>
<!-- section newsletter -->