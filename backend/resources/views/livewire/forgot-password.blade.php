
  <!-- forgot section -->
  <section class="forgot flex flex-col gap-y-36 mt-16 px-6 md:px-28 lg:px-48 xl:px-56 py-14 md:py-20 h-[80vh] md:h-screen justify-center">
    <div class="container mx-auto flex flex-col gap-y-8 w-full md:w-[80%] lg:w-[60%]">
        <div class="title flex flex-col gap-y-2">
            <h2 class="text-4xl font-bold">Forgot Password</h2>
            <p class="text-gray-700">Enter your email address to send otp.</p>
        </div>
        <div class="h-px bg-gray-300 mb-4"></div>
        <form class="col-span-2 flex flex-col gap-6" wire:submit='sendResetOtp'>
            <div class="input-field flex flex-col gap-2">
                <label for="email" class="text-sm">Email </label>
                <input
                    class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('email') border border-red-500 placeholder:text-red-400 @enderror"
                    type="email" wire:model="email" placeholder="{{ $errors->has('email') ? ' Email*' : 'someone@gmail.com' }}">
            </div>

            <button type="submit"
                class="font-semibold cursor-pointer rounded-3xl flex items-center justify-center bg-main text-white px-6 py-3 hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">Send OTP
            </button>
        </form>
        <a href="{{route('signup')}}" class="text-sm text-center">Don't have an account? <span class="text-indigo-400 underline">Register</span></a>
        <x-error />
    </div>
</section>
<!-- forgot section -->