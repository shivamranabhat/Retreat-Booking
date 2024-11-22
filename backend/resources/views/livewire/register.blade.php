
 <!-- register section -->
 <section class="register flex flex-col gap-y-36 mt-16 px-6 md:px-28 lg:px-48 xl:px-56 py-14 md:py-20 h-full justify-center">
    <div class="container mx-auto flex flex-col gap-y-8 md:w-[80%] lg:w-[60%]">
        <div class="title flex flex-col gap-y-2">
            <h2 class="text-4xl font-bold">Signup</h2>
            <p class="text-gray-700">Enter your details to create an account.</p>
        </div>
        <div class="h-px bg-gray-200 mb-4"></div>
        <form class="col-span-2 flex flex-col gap-6" wire:submit='register'>
            <div class="input-field flex flex-col gap-2">
                <label for="name" class="text-sm">Name </label>
                <input
                    class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('name') border border-red-500 placeholder:text-red-400 @enderror"
                    type="text" wire:model="name" placeholder="{{ $errors->has('name') ? ' Name*' : 'John Doe' }}">
            </div>
            <div class="input-field flex flex-col gap-2">
                <label for="email" class="text-sm">Email </label>
                <input
                    class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('email') border border-red-500 placeholder:text-red-400 @enderror"
                    type="email" wire:model="email" placeholder="{{ $errors->has('email') ? ' Email*' : 'someone@gmail.com' }}">
            </div>
            <div class="input-field flex flex-col gap-2">
                <label for="password" class="text-sm">Password </label>
                <input
                    class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('password') border border-red-500 placeholder:text-red-400 @enderror"
                    type="password" wire:model="password" placeholder="******">
            </div>
            <div class="input-field flex flex-col gap-2 flex flex-col gap-2">
                <label for="password_confirmation" class="text-sm">Confirm Password </label>
                <input
                    class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('password_confirmation') border border-red-500 placeholder:text-red-400 @enderror"
                    type="password" wire:model="password_confirmation" placeholder="******">
                    <a href="#" class="remember flex gap-2 items-center">
                        <input type="checkbox" name="" id="" class="rounded">
                        <label for="remember_me" class="text-sm text-stone-600 underline">I have accepted the terms & conditions*</label>
                    </a>
            </div>
            @error('password_confirmation') <span class="text-red-500">{{ $message }}</span> @enderror

            <button type="submit"
                class="font-semibold rounded-3xl flex items-center justify-center bg-main text-white px-6 py-3 hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">Submit<x-home.spinner/>
            </button>
        </form>
        <a href="{{route('login')}}" class="text-sm text-center">Already have an account? <span class="text-indigo-400 underline">Login</span></a>
    </div>
    <x-error />
</section>
<!-- register section -->