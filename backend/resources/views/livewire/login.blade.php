<!-- login section -->
<section
    class="login flex flex-col gap-y-36 mt-16 px-6 md:px-28 lg:px-48 xl:px-56 py-14 md:py-20 h-screen justify-center">
    <div class="container mx-auto flex flex-col gap-y-8 w-full md:w-[80%] lg:w-[60%]">
        <div class="title flex flex-col gap-y-2">
            <h2 class="text-4xl font-bold">Login</h2>
            <p class="text-gray-700">Enter your details to log in to your account.</p>
        </div>
        <div class="h-px bg-gray-300 mb-4"></div>
        <form class="col-span-2 flex flex-col gap-6" wire:submit='login'>
            @if (session()->has('error'))
            <span class="text-red-500 block mb-2">
                {{ session('error') }}
            </span>
            @endif
            <div class="input-field flex flex-col gap-2">
                <label for="email" class="text-sm">Email </label>
                <input
                    class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('email') border border-red-500 @enderror"
                    type="email" wire:model="email" placeholder="{{ $errors->has('email') ? ' Email*' : 'someone@gmail.com' }}" readonly>
            </div>
            <div class="input-field flex flex-col gap-2">
                <label for="password" class="text-sm">Password </label>
                <input
                    class="p-4 w-full placeholder:text-stone-500 rounded-xl placeholder:text-sm border border-gray-300 outline-none focus:outline-none focus:ring-0 focus:border-gray-400 focus:ease-in-out @error('password') border border-red-500 @enderror"
                    type="password" wire:model="password"
                    placeholder="******">
                <div class="flex justify-between">
                    <div class="remember flex gap-2 items-center">
                        <input type="checkbox" wire:model="remember" class="rounded">
                        <label for="remember_me" class="text-sm text-stone-600">Remember me</label>
                    </div>
                    <a href="{{route('forgot.password')}}" class="text-sm text-indigo-400 underline">Forgot
                        Password?</a>
                </div>
            </div>

            <button type="submit"
                class="font-semibold rounded-3xl flex items-center justify-center bg-main text-white px-6 py-3 hover:bg-[#03914D] hover:ease-in-out duration-300 transition-all">Submit
                <x-home.spinner />
            </button>
        </form>
        <div class="flex items-center justify-center gap-2 text-sm text-gray-500">
            <span class="h-px bg-gray-300 w-16"></span>
            <span>Or Sign in with</span>
            <span class="h-px bg-gray-300 w-16"></span>
        </div>
        <a href="{{ route('google.login') }}"
            class="google rounded-md p-2 flex justify-center items-center w-1/2 mx-auto border border-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48">
                <path fill="#FFC107"
                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                </path>
                <path fill="#FF3D00"
                    d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                </path>
                <path fill="#4CAF50"
                    d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                </path>
                <path fill="#1976D2"
                    d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                </path>
            </svg>
            <p class="text-gray-800 ml-2">Login with <span class="font-bold">google</span></p>
        </a>
        <a href="{{route('signup')}}" class="text-sm text-center">Don't have an account? <span
                class="text-indigo-400 underline">Register</span></a>
    </div>
</section>
<!-- login section -->