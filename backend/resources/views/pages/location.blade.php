<x-layouts.app>
    @slot('headerSeo')
    @if (!empty($meta_tags))
    <title>{!! $meta_tags->title !!}</title>
    <meta name="keyword" content="{!! $meta_tags->meta_keywords !!}">
    <meta name="description" content="{!! $meta_tags->meta_description !!}">
    <link rel="canonical" href="{!! $meta_tags->canonical_tag ?? '' !!}">
    @else

    @endif

    @if (empty($openGraph))
    @else
    @foreach ($openGraph as $graph)
    <meta name="og:title" content="{!! $graph->title !!}">
    <meta name="og:description" content="{!! $graph->description !!}">
    <meta name="og:image" content="{!! $graph->image !!}">
    <meta name="og:url" content="{!! $graph->url !!}">
    <meta name="og:site_name" content="{!! $graph->site_name !!}">
    <meta name="og:type" content="{!! $graph->type !!}">
    @endforeach
    @endif

    @if (empty($twitterCard))
    @else
    @foreach ($twitterCard as $twitter)
    <meta name="twitter:card" content="{!! $twitter->summary !!}">
    <meta name="twitter:site" content="{!! $twitter->site !!}">
    <meta name="twitter:title" content="{!! $twitter->title !!}">
    <meta name="twitter:description" content="{!! $twitter->description !!}">
    <meta name="twitter:image" content="{!! $twitter->image !!}">
    @endforeach
    @endif

    @if (empty($scriptHeader))
    @else
    @foreach ($scriptHeader as $header)
    {!! $header->code !!}
    @endforeach
    @endif

    @endslot
    <livewire:navbar />
    <section class="about py-14 md:py-20 px-6 md:px-28 lg:px-48 mt-28">
        <div class="container flex flex-col gap-12 mx-auto">
            <div class="grid grid-cols-2 gap-6">
                <div class="left-col col-span-2 lg:col-span-1 flex flex-col gap-3">
                    <h5 class="text-2xl lg:text-[31.25px] font-extrabold">{{$details->name}}</h5>
                    @php
                    $fullDescription = $details->description;
                    $firstPart = \Illuminate\Support\Str::words($fullDescription, 160, '');
                    $remainingPart = \Illuminate\Support\Str::after($fullDescription, $firstPart);
                    @endphp
                    <p class="text-base text-gray-800 leading-7">{!! $firstPart !!}</p>
                </div>
                <div class="right-col col-span-2 lg:col-span-1">
                    <img class="w-full h-full md:h-98 rounded-xl object-cover" src="{{asset('storage/'.$details->image)}}"
                        alt="{{$details->name}}">
                </div>
                <div class="col-span-2">

                    <p class="text-base text-gray-800 leading-7">{!! $remainingPart !!}</p>
                </div>
            </div>
        </div>
    </section>
    <livewire:footer />
    @slot('footerSeo')
    @if (empty($scriptFooter))
    @else
    @foreach ($scriptFooter as $footer)
    {!! $footer->code !!}
    @endforeach
    @endif
    @endslot
</x-layouts.app>