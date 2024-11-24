<!-- verify section -->
<section
    class="verify flex flex-col gap-y-36 mt-16 px-6 md:px-28 lg:px-48 xl:px-56 py-14 md:py-20 h-[80vh] md:h-screen justify-center">
    <div class="container mx-auto flex flex-col gap-y-8 w-full md:w-[80%] lg:w-[60%]">
        <div class="title flex flex-col gap-y-2">
            <h2 class="text-4xl font-bold">Verity Account</h2>
            <p class="text-gray-700">Enter your otp to verify your account.</p>
        </div>
        <div class="h-px bg-gray-300 mb-4"></div>
        <form class="col-span-2 flex flex-col gap-6" wire:submit='verifyToken'>
            <div class="input-field flex flex-col gap-2">
                <label for="token" class="text-sm">OTP </label>
                <input
                    class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 @error('token') border border-red-500 @enderror outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out"
                    type="text" wire:model="token" id="token"
                    placeholder="{{ $errors->has('token') ? ' Enter your otp*' : 'Eg:123456' }}">
            </div>

            <button type="submit"
                class="font-semibold rounded-3xl flex items-center justify-center bg-main text-white px-6 py-3 hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">Submit
            </button>
        </form>
        <a wire:click='resendOtp' class="text-center cursor-pointer text-sm">Didn't Received the OTP Yet? <span
                class="text-indigo-400 underline">Resend</span></a>
    </div>
   <x-success />
   <x-error />
</section>
<!-- verify section -->