<!-- blog section -->
<section class="blogs py-14 md:py-20 px-6 md:px-28 lg:px-48">
    <div class="container flex flex-col items-center gap-12 mx-auto">
        <div class="title relative">
            <h3 class="text-2xl lg:text-[31.25px] font-extrabold">Latest from <span class="text-main">Our
                    Blog</span></h3>
            <div class="absolute right-[-2rem] md:right-[-2.5rem] top-[-1.5rem]">
                <img src="{{asset('main/images/decorator.svg')}}" class="w-3/4 lg:w-full" alt="decorator">
            </div>
        </div>
        <div class="main flex flex-col gap-y-6">
            <div class="group-cards grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse($blogs as $blog)
                <a href="{{route('blog',$blog->slug)}}"
                    class="card hover:scale-105 hover:ease-in-out transition-all cursor-pointer bg-white flex flex-col gap-4 p-4 rounded-xl box-shadow-iii border border-gray-200">
                    <img class="w-full h-56 object-cover rounded-xl" src="{{asset('storage/'.$blog->main_image)}}"
                        alt="{{$blog->main_img_alt}}">
                    <div class="content flex flex-col gap-4">
                        <h5 class="font-semibold text-base">{{$blog->title}}</h5>
                        <div class="flex gap-2">
                            <div class="bg-gray-600 px-3 py-2 text-white rounded-full font-semibold">
                                {{ collect(explode(' ', $blog->author))->map(fn($word) =>
                                strtoupper($word[0]))->join('') }}
                            </div>
                            <div class="flex flex-col">
                                <p class="font-semibold">{{$blog->author}}</p>
                                <span class="text-sm text-gray-600">{{
                                    \Carbon\Carbon::parse($blog->created_at)->format('jS M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                @endforelse
            </div>
            {{-- <div class="pagination flex justify-center mt-10">
                <ul class="flex gap-4 items-center">
                    <li class="border border-2 border-main bg-main rounded-full py-2 px-4 text-white"><a href="#">1</a>
                    </li>
                    <li class="border border-2 border-main rounded-full py-2 px-4 text-main"><a href="#">2</a></li>
                    <button class="flex gap-2 bg-main text-white items-center px-2 rounded-xl h-full">Next
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </ul>
            </div> --}}
            {{$blogs->links('vendor.pagination.pagination')}}
        </div>

    </div>
</section>
<!-- blog section -->