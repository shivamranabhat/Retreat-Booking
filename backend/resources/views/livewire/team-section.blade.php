<!-- section teams -->
<section class="team-section py-14 md:py-20 px-6 md:px-28 lg:px-48 xl:px-56 bg-gray-50">
    <div class="container flex flex-col items-center gap-12 mx-auto">
        <h3 class="text-2xl lg:text-[31.25px] font-extrabold">Meet Our Team</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 w-full">
            @forelse($teams as $team)
            <div class="card flex flex-col gap-4 bg-white cursor-pointer border border-200 box-shadow-i p-4 rounded-xl">
                <img class="w-full h-56 lg:h-40 xl:h-56 object-cover rounded-xl"
                    src="{{asset('storage/'.$team->image)}}" alt="{{$team->alt}}">
                <div class="title">
                    <h5 class="text-xl font-semibold">{{$team->name}}</h5>
                    <p class="text-sm text-main font-semibold">{{$team->role}}</p>
                </div>
            </div>
            @empty
            <p class="font-bold text-center col-span-4">No team details found</p>
            @endforelse
        </div>
        @if($teams->count()>0)
        @if($allLoaded)
        <button wire:click="seeLess" class="text-main font-semibold text-lg flex gap-1 items-center">
            See Less
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 15.75l-7.5-7.5-7.5 7.5" />
            </svg>
        </button>
        @else
        <button wire:click="loadMore" class="text-main font-semibold text-lg flex gap-1 items-center">
            See More
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        @endif
        @endif
    </div>
</section>
<!-- section teams -->