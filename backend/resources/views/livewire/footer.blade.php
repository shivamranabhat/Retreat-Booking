 <!-- section footer -->
 <footer class="footer-section bg-[#EBF8F3] pt-10 pb-6 px-6 md:px-28 lg:px-48 xl:px-56">
    <div class="container grid grid-cols-1 lg:grid-cols-4 xl:grid-cols-7 gap-10">
        <div class="flex flex-col gap-6 col-span-1 lg:col-span-2 xl:col-span-2">
            <img src="{{asset('main/images/logo.svg')}}" class="w-[15rem]" alt="logo">
            <div class="about flex flex-col gap-2">
                <h5 class="font-semibold text-base text-gray-500 uppercase">Who we are?</h5>
                <p class="text-gray-500 text-sm justify">
                    We are a team of yogis who came together to put
                    our energy into making the world a better place by
                    connecting you with life-changing yoga retreats,
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
                    <p class="text-base text-gray-500">info@retreatvenues.com</p>
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
                    <p class="text-base text-gray-500">info@retreatvenues.com</p>
                </div>

            </div>
            <div class="lower-col flex flex-col gap-4">
                <h5 class="font-semibold text-base text-gray-500 uppercase">Social Links</h5>
                <div class="links flex gap-4 items-center">
                    <div
                        class="facebook bg-main px-3 py-2 rounded-full group cursor-pointer hover:bg-gray-300 hover:ease-in-out transition-all duration-400">
                        <a href="#" class="px-1">
                            <i class="fa-brands fa-facebook-f text-white text-xl group-hover:text-gray-600"></i>
                        </a>
                    </div>
                    <div
                        class="instagram bg-main px-3 py-2 rounded-full group cursor-pointer hover:bg-gray-300 hover:ease-in-out transition-all duration-400">
                        <a href="#">
                            <i class="fa-brands fa-instagram text-white text-xl group-hover:text-gray-600"></i>
                        </a>
                    </div>
                    <div
                        class="whatsapp bg-main px-3 py-2 rounded-full group cursor-pointer hover:bg-gray-300 hover:ease-in-out transition-all duration-400">
                        <a href="#">
                            <i class="fa-brands fa-whatsapp text-white text-xl group-hover:text-gray-600"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-4 col-span-1 lg:col-span-2 xl:col-span-1">
            <div class="upper-col flex flex-col gap-4">
                <h5 class="font-semibold text-base text-gray-500 uppercase">Quick Links</h5>
                <div class="links flex flex-col gap-4">
                    <a href="#"
                        class="hover:text-black hover:ease-in-out transition-all duration-400 text-sm text-gray-500">Home</a>
                    <a href="#"
                        class="hover:text-black hover:ease-in-out transition-all duration-400 text-sm text-gray-500">Blogs</a>
                    <a href="#"
                        class="hover:text-black hover:ease-in-out transition-all duration-400 text-sm text-gray-500">Contact</a>
                    <a href="#"
                        class="hover:text-black hover:ease-in-out transition-all duration-400 text-sm text-gray-500">FAQs</a>
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
        <p class="text-gray-400">© BookRetreats.com 2024</p>
        <div class="right flex gap-14">
            <a href="#" class="text-gray-400 text-sm">Terms and Conditions</a>
            <a href="#" class="text-gray-400 text-sm">Privacy Policy</a>
        </div>
    </div>
</footer>
<!-- section footer -->