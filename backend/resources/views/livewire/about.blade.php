<!-- about section -->
<section class="about py-14 md:py-20 px-6 md:px-28 lg:px-48 xl:px-56">
    <div class="container flex flex-col items-center gap-12 mx-auto">
        <div class="grid grid-cols-2 gap-6">
            <div class="left-col col-span-2 lg:col-span-1 flex flex-col gap-6 justify-center">
                <h5 class="text-2xl lg:text-[31.25px] font-extrabold leading-8 md:leading-9">{{$content->title ?? 'Unforgettable and
                    enriching travel, the Tripaneer way'}}</h5>
                <p class="text-base text-gray-800 leading-7">{{$content->subtitle ?? 'BookYogaRetreats is made with love by Tripaneer.

                    The Tripaneer journey started in 2013 with a passion for travel. To date, we’re a startup team
                    of 200+ creative problems solvers, tech wizards, and passionate travelers, working from the
                    Tripaneer offices in Amsterdam and around the world. We’re leading the charge in bringing the
                    global travel experience industry online. Although we are continuously growing since 2013, our
                    core motivations remain the same, and we’re proud of our friendly, start-up culture.'}}</p>
            </div>
            <div class="right-col col-span-2 lg:col-span-1">
                <img class="w-full h-full rounded-xl object-cover" src="{{asset('storage/'.$content->image)}}" alt="{{$content->alt}}">
            </div>
        </div>
    </div>
</section>
<!-- about section -->