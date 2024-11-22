  <!-- faq section -->
  <section class="faq mt-16 px-6 md:px-28 lg:px-48 py-14 md:py-20 bg-gray-50">
    <div class="container mx-auto flex flex-col gap-y-12">
        <div class="title flex flex-col items-center">
            <h5 class="font-semibold">FAQs</h5>
            <h2 class="text-center text-3xl leading-10 font-semibold lg:leading-[50px] lg:text-[38px]">Most Asked
                Questions</h2>
        </div>
        <div class="content flex flex-col gap-4">
            @forelse($faqs as $index=>$faq)
            <div class="card flex flex-col gap-2">
                <h1 class="text-xl font-bold">{{$faq->title}}</h1>
                <p class="text-gray-600">
                   {{$faq->description}}
                </p>
            </div>
            @if($index+1 !==$faqs->count())
            <div class="w-full h-px bg-gray-300 mt-2"></div>
            @endif
            @empty
            @endforelse
        </div>
        <!-- <div class="hs-accordion-group flex flex-col gap-y-4">
            <div class="hs-accordion border border-solid border-gray-200 bg-white rounded-xl p-4"
                id="hs-basic-heading-one">
                <button
                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 focus:outline-none rounded-lg"
                    aria-expanded="false" aria-controls="hs-basic-collapse-one">
                    <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                    </svg>
                    Accordion #1
                </button>
                <div id="hs-basic-collapse-one"
                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    role="region" aria-labelledby="hs-basic-heading-one">
                    <p class="text-gray-800">
                        <em>This is the third item's accordion body.</em> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These
                        classes control the overall appearance, as well as the showing and hiding via CSS
                        transitions.
                    </p>
                </div>
            </div>
            <div class="hs-accordion border border-solid border-gray-200 bg-white rounded-xl p-4"
                id="hs-basic-heading-two">
                <button
                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 focus:outline-none rounded-lg"
                    aria-expanded="false" aria-controls="hs-basic-collapse-two">
                    <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                    </svg>
                    Accordion #2
                </button>
                <div id="hs-basic-collapse-two"
                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    role="region" aria-labelledby="hs-basic-heading-two">
                    <p class="text-gray-800">
                        <em>This is the third item's accordion body.</em> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These
                        classes control the overall appearance, as well as the showing and hiding via CSS
                        transitions.
                    </p>
                </div>
            </div>
            <div class="hs-accordion border border-solid border-gray-200 bg-white rounded-xl p-4"
                id="hs-basic-heading-three">
                <button
                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 focus:outline-none rounded-lg"
                    aria-expanded="false" aria-controls="hs-basic-collapse-three">
                    <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                    </svg>
                    Accordion #3
                </button>
                <div id="hs-basic-collapse-three"
                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    role="region" aria-labelledby="hs-basic-heading-three">
                    <p class="text-gray-800">
                        <em>This is the third item's accordion body.</em> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These
                        classes control the overall appearance, as well as the showing and hiding via CSS
                        transitions.
                    </p>
                </div>
            </div>
            <div class="hs-accordion border border-solid border-gray-200 bg-white rounded-xl p-4"
                id="hs-basic-heading-four">
                <button
                    class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 focus:outline-none rounded-lg"
                    aria-expanded="false" aria-controls="hs-basic-collapse-four">
                    <svg class="hs-accordion-active:hidden block size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                        <path d="M12 5v14"></path>
                    </svg>
                    <svg class="hs-accordion-active:block hidden size-3.5" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14"></path>
                    </svg>
                    Accordion #4
                </button>
                <div id="hs-basic-collapse-four"
                    class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300"
                    role="region" aria-labelledby="hs-basic-heading-four">
                    <p class="text-gray-800">
                        <em>This is the third item's accordion body.</em> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These
                        classes control the overall appearance, as well as the showing and hiding via CSS
                        transitions.
                    </p>
                </div>
            </div>
        </div> -->
    </div>
</section>
<!-- faq section -->