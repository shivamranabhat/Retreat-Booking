 <!-- section why us -->
 <section class="whyus-section py-14 md:py-20 px-6 md:px-28 lg:px-48 xl:px-56 bg-gray-50">
    <div class="container flex flex-col items-center gap-12 mx-auto">
        <div class="title relative">
            <h3 class="text-2xl lg:text-[31.25px] font-extrabold">Why Use <span class="text-main">Pokhara
                    Retreat?</span></h3>
            <div class="absolute right-[-2rem] md:right-[-2.5rem] top-[-1.5rem]">
                <img src="{{asset('main/images/decorator.svg')}}" class="w-3/4 lg:w-full" alt="decorator">
            </div>
        </div>
        <div class="grid w-full grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @forelse($details as $detail)
            <div class="cursor-pointer bg-white flex gap-2 p-4 box-shadow-iii border border-gray-200 rounded-xl">
                <div class="logo">
                    <svg class="size-6 mt-1" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.5069 5.4533C16.8892 5.58717 17.1447 5.94767 17.1447 6.3528V12.2792C17.1447 13.9355 16.5428 15.5167 15.4796 16.7417C14.945 17.3585 14.2686 17.8389 13.5503 18.2274L10.437 19.9092L7.3185 18.2265C6.59925 17.838 5.922 17.3585 5.3865 16.7408C4.3225 15.5158 3.71875 13.9338 3.71875 12.2757V6.3528C3.71875 5.94767 3.97425 5.58717 4.35663 5.4533L10.1159 3.42942C10.3206 3.35767 10.5437 3.35767 10.7476 3.42942L16.5069 5.4533Z"
                            stroke="#02BF9B" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8.15723 11.3979L9.81272 13.0543L13.2235 9.64355" stroke="#02BF9B"
                            stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="content flex flex-col gap-y-1">
                    <h5 class="font-semibold text-lg">{{$detail->title}}</h5>
                    <p class="text-gray-500 text-[15px]">{{$detail->description}}</p>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
<!-- section why us -->