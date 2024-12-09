  <!-- banner section -->
  <section class="banner-section flex flex-col gap-y-16 items-center mt-28 px-6 md:px-28 lg:px-44">
    <div class="container relative py-10 flex flex-col items-center justify-end w-full h-80 rounded-xl bg-cover bg-center"
        style="background-image: url({{$banner? asset('storage/'.$banner->image) : asset('main/images/image-placeholder.png')}});">
        <h3 class="text-lg md:text-4xl text-center text-white font-bold">{{$banner->title ?? 'Title goes here'}}</h3>
        <h5 class="text-lg text-white text-center font-semibold">{{$banner->subtitle ?? 'Subitle goes here'}}
        </h5>
    </div>
</section>
<!-- banner section -->