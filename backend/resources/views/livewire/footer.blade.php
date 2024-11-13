<!-- section footer -->
<footer class="footer-section bg-[#EBF8F3] pt-10 pb-6 px-6 md:px-28 lg:px-48 xl:px-56" wire:ingnore>
    <div class="container grid grid-cols-1 lg:grid-cols-4 xl:grid-cols-7 gap-10">
        <div class="flex flex-col gap-6 col-span-1 lg:col-span-2 xl:col-span-2">
            <img src="{{asset('main/images/logo.svg')}}" class="w-[15rem]" alt="logo">
            <div class="about flex flex-col gap-2">
                <h5 class="font-semibold text-base text-gray-500 uppercase">{{$content->title??'Who we are?'}}</h5>
                <p class="text-gray-500 text-sm justify">
                    {{$content->subtitle ?? 'We are a team of yogis who came together to put
                    our energy into making the world a better place by
                    connecting you with life-changing yoga retreats.'}}
                </p>
            </div>
        </div>
        <div class="flex flex-col gap-4 col-span-1 lg:col-span-2 xl:col-span-2">
            <div class="upper-col flex flex-col gap-4">
                <h5 class="font-semibold text-base text-gray-500 uppercase">Contact</h5>
                <div class="phone flex items-center gap-2">
                    <span
                        class="bg-main rounded-full p-2 group cursor-pointer hover:bg-gray-300 hover:ease-in-out transition-all duration-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff"
                            class="size-4 group-hover:fill-gray-600">
                            <path fill-rule="evenodd"
                                d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <a href="tel:{{$details->phone ?? ''}}" class="text-base text-gray-500">{{$details->phone ??
                        ''}}</a>
                </div>
                <div class="phone flex items-center gap-2">
                    <span
                        class="bg-main rounded-full p-2 group cursor-pointer hover:bg-gray-300 hover:ease-in-out transition-all duration-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff"
                            class="size-4 group-hover:fill-gray-600">
                            <path
                                d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                            <path
                                d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                        </svg>
                    </span>
                    <a href="mailto:{{$details->email??''}}" class="text-base text-gray-500">{{$details->email??''}}</a>
                </div>

            </div>
            <div class="lower-col flex flex-col gap-4">
                <h5 class="font-semibold text-base text-gray-500 uppercase">Social Links</h5>
                <div class="links flex gap-4 items-start">

                    <div
                        class="facebook bg-main p-3 rounded-full group cursor-pointer hover:bg-gray-300 hover:ease-in-out transition-all duration-400">
                        <a href="{{$details->facebook_link ?? ''}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="fill-white w-6 group-hover:fill-gray-600">
                                <path
                                    d="M16.403,9H14V7c0-1.032,0.084-1.682,1.563-1.682h0.868c0.552,0,1-0.448,1-1V3.064c0-0.523-0.401-0.97-0.923-1.005 C15.904,2.018,15.299,1.999,14.693,2C11.98,2,10,3.657,10,6.699V9H8c-0.552,0-1,0.448-1,1v2c0,0.552,0.448,1,1,1l2-0.001V21 c0,0.552,0.448,1,1,1h2c0.552,0,1-0.448,1-1v-8.003l2.174-0.001c0.508,0,0.935-0.381,0.993-0.886l0.229-1.996 C17.465,9.521,17.001,9,16.403,9z" />
                            </svg>
                        </a>
                    </div>
                    <div
                        class="instagram bg-main p-3 rounded-full group cursor-pointer hover:bg-gray-300 hover:ease-in-out transition-all duration-400">
                        <a href="{{$details->insta_link ?? ''}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="fill-white w-6 group-hover:fill-gray-600">
                                <path
                                    d="M 8 3 C 5.239 3 3 5.239 3 8 L 3 16 C 3 18.761 5.239 21 8 21 L 16 21 C 18.761 21 21 18.761 21 16 L 21 8 C 21 5.239 18.761 3 16 3 L 8 3 z M 18 5 C 18.552 5 19 5.448 19 6 C 19 6.552 18.552 7 18 7 C 17.448 7 17 6.552 17 6 C 17 5.448 17.448 5 18 5 z M 12 7 C 14.761 7 17 9.239 17 12 C 17 14.761 14.761 17 12 17 C 9.239 17 7 14.761 7 12 C 7 9.239 9.239 7 12 7 z M 12 9 A 3 3 0 0 0 9 12 A 3 3 0 0 0 12 15 A 3 3 0 0 0 15 12 A 3 3 0 0 0 12 9 z" />
                            </svg>
                        </a>
                    </div>
                    <div
                        class="whatsapp bg-main p-3 rounded-full group cursor-pointer hover:bg-gray-300 hover:ease-in-out transition-all duration-400">
                        <a href="{{$details->whatsapp_link ?? ''}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"
                                class="fill-white w-6 group-hover:fill-gray-600">
                                <path
                                    d="M25,2C12.318,2,2,12.318,2,25c0,3.96,1.023,7.854,2.963,11.29L2.037,46.73c-0.096,0.343-0.003,0.711,0.245,0.966 C2.473,47.893,2.733,48,3,48c0.08,0,0.161-0.01,0.24-0.029l10.896-2.699C17.463,47.058,21.21,48,25,48c12.682,0,23-10.318,23-23 S37.682,2,25,2z M36.57,33.116c-0.492,1.362-2.852,2.605-3.986,2.772c-1.018,0.149-2.306,0.213-3.72-0.231 c-0.857-0.27-1.957-0.628-3.366-1.229c-5.923-2.526-9.791-8.415-10.087-8.804C15.116,25.235,13,22.463,13,19.594 s1.525-4.28,2.067-4.864c0.542-0.584,1.181-0.73,1.575-0.73s0.787,0.005,1.132,0.021c0.363,0.018,0.85-0.137,1.329,1.001 c0.492,1.168,1.673,4.037,1.819,4.33c0.148,0.292,0.246,0.633,0.05,1.022c-0.196,0.389-0.294,0.632-0.59,0.973 s-0.62,0.76-0.886,1.022c-0.296,0.291-0.603,0.606-0.259,1.19c0.344,0.584,1.529,2.493,3.285,4.039 c2.255,1.986,4.158,2.602,4.748,2.894c0.59,0.292,0.935,0.243,1.279-0.146c0.344-0.39,1.476-1.703,1.869-2.286 s0.787-0.487,1.329-0.292c0.542,0.194,3.445,1.604,4.035,1.896c0.59,0.292,0.984,0.438,1.132,0.681 C37.062,30.587,37.062,31.755,36.57,33.116z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-4 col-span-1 lg:col-span-2 xl:col-span-1">
            <div class="upper-col flex flex-col gap-4">
                <h5 class="font-semibold text-base text-gray-500 uppercase">Quick Links</h5>
                <div class="links flex flex-col gap-4">
                    <a href="/"
                        class="hover:text-black hover:ease-in-out transition-all duration-400 text-sm {{request()->segment(1) == '' ? 'text-black' : 'text-gray-500'}}">Home</a>
                    <a href="{{route('blogs')}}"
                        class="hover:text-black hover:ease-in-out transition-all duration-400 text-sm {{request()->segment(1) == 'blogs' ? 'text-black' : 'text-gray-500'}}">Blogs</a>
                    <a href="{{route('about')}}"
                        class="hover:text-black hover:ease-in-out transition-all duration-400 text-sm {{request()->segment(1) == 'about-us' ? 'text-black' : 'text-gray-500'}}">About</a>
                    <a href="{{route('contact')}}"
                        class="hover:text-black hover:ease-in-out transition-all duration-400 text-sm {{request()->segment(1) == 'contact' ? 'text-black' : 'text-gray-500'}}">Contact</a>
                    <a href="{{route('faq')}}"
                        class="hover:text-black hover:ease-in-out transition-all duration-400 text-sm {{request()->segment(1) == 'faqs' ? 'text-black' : 'text-gray-500'}}">FAQs</a>
                </div>

            </div>
        </div>
        <div class="flex flex-col gap-4 col-span-1 lg:col-span-2 xl:col-span-2">
            <div class="upper-col flex flex-col gap-4">
                <h5 class="font-semibold text-base text-gray-500 uppercase">Featured listing</h5>
                <div class="featured flex flex-col gap-6">
                    <div class="list flex gap-2">
                        <img src="{{asset('main/images/footer.png')}}" class="w-24 rounded-xl object-cover" alt="">
                        <div class="details flex flex-col gap-1">
                            <h5 class="text-gray-600 text-sm font-semibold">
                                Grant beach reatreat center
                            </h5>
                            <p class="text-gray-500 text-sm">
                                Location: Pokhara
                            </p>
                            <p class="text-gray-500 text-sm">
                                From 120$
                            </p>

                        </div>
                    </div>
                    <div class="list flex gap-2">
                        <img src="{{asset('main/images/footer.png')}}" class="w-24 rounded-xl object-cover" alt="">
                        <div class="details flex flex-col gap-1">
                            <h5 class="text-gray-600 text-sm font-semibold">
                                Grant beach reatreat center
                            </h5>
                            <p class="text-gray-500 text-sm">
                                Location: Pokhara
                            </p>
                            <p class="text-gray-500 text-sm">
                                From 120$
                            </p>

                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="bg-gray-300 h-px w-full mt-14 mb-10"></div>
    <div class="lower-footer flex flex-col md:flex-row  justify-between items-center gap-y-4 md:gap-y-0">
        <p class="text-gray-400">© pokharayoga.com 2024</p>
        <div class="right flex gap-14">
            <a href="#" class="text-gray-400 hover:text-black hover:ease-in-out transition-all duration-400 text-sm">Terms and Conditions</a>
            <a href="#" class="text-gray-400 hover:text-black hover:ease-in-out transition-all duration-400 text-sm">Privacy Policy</a>
        </div>
    </div>
</footer>
<!-- section footer -->