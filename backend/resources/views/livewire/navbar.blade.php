<section class="navbar-section box-shadow-i fixed top-0 w-full bg-white z-10">
        <div class="container mx-auto py-4 px-6 md:px-28 lg:px-48 xl:px-56 flex justify-between items-center">
            <a href="/" class="logo">
                <img src="{{asset('main/images/logo.svg')}}" class="w-44" alt="logo">
            </a>
            <div class="links">
                <ul class="hidden lg:flex gap-x-10 items-center">
                    @forelse($categories as $category)
                    <li><a href="{{route('retreats',['retreat'=>$category->slug])}}"
                            class="text-sm px-3 py-2 rounded-3xl {{request()->segment(1) == $category->slug ? 'bg-gray-200' : ''}} hover:bg-gray-200 transition-all duration-200 ease-in-out">{{$category->name}}</a>
                    </li>
                   @empty 
                   @endforelse
                    <div
                        class="extra-list relative group flex gap-x-2 items-center bg-main rounded-2xl px-2 py-[0.4rem] cursor-pointer">
                        <svg class="w-5 h-5" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" fill="#ffff"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                            <g>
                                <path class="st0" d="M482.752,435.574c-6.928-8.1-23.127-40.492-23.127-40.492s2.676-3.448,0-15.051
                           c-3.48-15.035-18.514-13.886-21.978-17.349c-3.479-3.472-33.549-58.424-35.863-64.792c-2.314-6.369-27.772-78.662-27.772-78.662
                           c-8.549-37.604-24.308-53.221-45.121-57.85c-20.64-4.581-31.817-3.471-41.075-11.571c-5.778-5.054-5.573-8.809-5.573-24.056
                           c0,0,6.235-5.927,10.784-14.122c5.195-9.375,7.746-22.907,7.746-22.907c5.211-2.086,5.274-4.684,7.525-12.965
                           c3.118-11.461,2.897-19.317-5.431-19.317C304.836,19.066,286.085,0,256,0c-30.07,0-48.821,19.066-46.853,56.441
                           c-8.328,0-8.564,7.856-5.432,19.317c2.251,8.281,2.314,10.879,7.51,12.965c0,0,2.55,13.532,7.762,22.907
                           c4.55,8.194,10.784,14.122,10.784,14.122c0,15.247,0.189,19.002-5.589,24.056c-9.242,8.1-20.435,6.99-41.059,11.571
                           c-20.828,4.628-36.572,20.246-45.12,57.85c0,0-25.457,72.294-27.771,78.662c-2.314,6.368-32.401,61.32-35.864,64.792
                           c-3.464,3.463-18.514,2.314-21.978,17.349c-2.676,11.603,0,15.051,0,15.051s-16.2,32.392-23.143,40.492
                           c-6.942,8.092,5.794,13.878,13.886,3.464c0.944,1.409,4.156,2.424,7.793,2.912c-28.228,31.251-12.138,71.964,31.55,69.98
                           C118.291,510.3,256,485.316,256,485.316S393.707,510.3,429.54,511.93c43.688,1.984,59.778-38.729,31.534-69.98
                           c3.652-0.488,6.864-1.503,7.808-2.912C476.974,449.452,489.695,443.666,482.752,435.574z M183.123,383.849
                           c0,0-59.274,17.626-96.192,34.234c7.604-14.154,16.357-33.423,16.357-33.423l37.029-53.212l29.504-64.218
                           c0,0,9.257,34.714,12.138,39.917C184.855,312.35,183.123,383.849,183.123,383.849z M328.891,383.849c0,0-1.732-71.498,1.149-76.702
                           c2.897-5.203,12.154-39.917,12.154-39.917l29.504,64.218l37.013,53.212c0,0,8.769,19.27,16.373,33.423
                           C388.165,401.474,328.891,383.849,328.891,383.849z" />
                            </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#fff"
                            version="1.1" id="Capa_1" class="w-3 h-3 mt-1" viewBox="0 0 96.154 96.154"
                            xml:space="preserve">
                            <g>
                                <path
                                    d="M0.561,20.971l45.951,57.605c0.76,0.951,2.367,0.951,3.127,0l45.956-57.609c0.547-0.689,0.709-1.716,0.414-2.61   c-0.061-0.187-0.129-0.33-0.186-0.437c-0.351-0.65-1.025-1.056-1.765-1.056H2.093c-0.736,0-1.414,0.405-1.762,1.056   c-0.059,0.109-0.127,0.253-0.184,0.426C-0.15,19.251,0.011,20.28,0.561,20.971z" />
                            </g>
                        </svg>
                        <div
                        class="dropdown absolute z-10 left-0 top-8 mt-1 rounded-xl p-1 w-48 bg-white border border-gray-200 shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-opacity">
                        <ul class="flex flex-col gap-y-2">
                            <li class="px-4 py-3 text-sm {{request()->segment(1) == 'about-us' ? 'bg-gray-200' : ''}} hover:bg-gray-200 rounded-xl cursor-pointer"> <a href="{{route('about')}}">About</a></li>
                            <li class="px-4 py-3 text-sm {{request()->segment(1) == 'faqs' ? 'bg-gray-200' : ''}} hover:bg-gray-200 rounded-xl cursor-pointer"> <a href="{{route('home.faqs')}}">FAQs</a></li>
                            <li class="px-4 py-3 text-sm {{request()->segment(1) == 'blogs' ? 'bg-gray-200' : ''}} hover:bg-gray-200 rounded-xl cursor-pointer"> <a href="{{route('home.blogs')}}">Blogs</a></li>
                            <li class="px-4 py-3 text-sm {{request()->segment(1) == 'contact' ? 'bg-gray-200' : ''}} hover:bg-gray-200 rounded-xl cursor-pointer"> <a href="{{route('contact')}}">Contact</a></li>
                        </ul>
                    </div>
                    </div>
                  
                </ul>
            </div>
            <div class="ham-btn lg:hidden flex flex-col gap-2">
                <div class="line h-[0.2rem] w-8 bg-main rounded-xl"></div>
                <div class="line h-[0.2rem] w-5 bg-main rounded-xl"></div>
                <div class="line h-[0.2rem] w-8 bg-main rounded-xl"></div>
            </div>
        </div>
        <div class="ham-menu hidden w-screen h-screen bg-white z-10 border-t-2 py-10">
            <div class="links">
                <ul class="flex flex-col gap-10">
                    @forelse($categories as $category)
                    <li><a href="{{route('retreats',$category->slug)}}"
                            class="text-xl font-semibold px-3 py-2 {{request()->segment(1) == $category->slug ? 'text-black' : 'text-gray-500'}} rounded-3xl hover:text-black transition-all duration-200 ease-in-out">{{$category->name}}</a>
                    </li>
                    @empty
                    @endforelse
                   
                    <li><a href="{{route('about')}}"
                            class="text-xl font-semibold px-3 py-2 {{request()->segment(1) == 'about-us' ? 'text-black' : 'text-gray-500'}} rounded-3xl hover:text-black transition-all duration-200 ease-in-out">About</a>
                    </li>
                    <li><a href="{{route('home.faqs')}}"
                            class="text-xl font-semibold px-3 py-2 {{request()->segment(1) == 'faqs' ? 'text-black' : 'text-gray-500'}} rounded-3xl hover:text-black transition-all duration-200 ease-in-out">FAQs</a>
                    </li>
                    <li><a href="{{route('home.blogs')}}"
                            class="text-xl font-semibold px-3 py-2 {{request()->segment(1) == 'blogs' ? 'text-black' : 'text-gray-500'}} rounded-3xl hover:text-black transition-all duration-200 ease-in-out">Blogs</a>
                    </li>
                    <li><a href="{{route('contact')}}"
                            class="text-xl font-semibold px-3 py-2 {{request()->segment(1) == 'contact' ? 'text-black' : 'text-gray-500'}} rounded-3xl hover:text-black transition-all duration-200 ease-in-out">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </section>