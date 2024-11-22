 <!-- blog-intro section -->
 <section class="blog-intro flex flex-col gap-y-8 md:gap-y-12 mt-16 px-6 md:px-28 lg:px-48 py-14 md:py-20">
    <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6 mx-auto">
        <div class="flex flex-col gap-y-6">
            <div class="blog-title flex flex-col gap-y-2">
                <p class="text-sm text-gray-600 uppercase font-semibold">Yoga Retreat | Blogs</p>
                <h1 class="text-2xl md:text-[40px] font-extrabold leading-[2rem] md:leading-[3rem]">
                    {{$details->title}}
                </h1>
            </div>
            <div class="author flex gap-4 items-center">
                <div class="bg-gray-600 py-3 px-[0.9rem] text-white rounded-full font-semibold">
                    {{ collect(explode(' ', $details->author))->map(fn($word) =>
                    strtoupper($word[0]))->join('') }}
                </div>
                <div class="flex flex-col gap-y-1">
                    <p class="text-sm text-gray-600 uppercase font-semibold">By {{$details->author}}</p>
                    <p class="text-sm text-gray-600 uppercase font-semibold">Posted On: {{
                                    \Carbon\Carbon::parse($details->created_at)->format('jS M Y') }}</p>
                </div>
            </div>
            
        </div>
        <img class="w-full h-80 lg:h-96 xl:h-80 object-cover rounded-xl"
            src="{{asset('storage/'.$details->main_image)}}" alt="{{$details->img_alt}}">
    </div>
    <div class="bg-gray-200 w-full h-px">
    </div>
    <div class="blog-description">
        {!! $details->description !!}
    </div>
</section>
<!-- blog-intro section -->