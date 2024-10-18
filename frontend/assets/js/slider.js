$(document).ready(function(){
    // Initialize location carousel
    var locationCarousel = $('.location-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        autoplay: false,
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            1000: { items: 4 }
        }
    });

    // Initialize testimonial carousel
    var testimonialCarousel = $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            1000: { items: 3 }
        }
    });

    var galleryCarousel = $('.gallery-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false, 
        autoplay: true,
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            1000: { items: 4 }
        }
    });

    // Previous button functionality for location carousel
    $('.prev').click(function() {
        locationCarousel.trigger('prev.owl.carousel');
    });

    // Next button functionality for location carousel
    $('.next').click(function() {
        locationCarousel.trigger('next.owl.carousel');
    });
    $('.prev-btn').click(function() {
        testimonialCarousel.trigger('prev.owl.carousel');
    });

    // Next button functionality for gallery carousel
    $('.next-btn').click(function() {
        testimonialCarousel.trigger('next.owl.carousel');
    });
    $('.prev-gallery').click(function() {
        galleryCarousel.trigger('prev.owl.carousel');
    });

    // Next button functionality for gallery carousel
    $('.next-gallery').click(function() {
        galleryCarousel.trigger('next.owl.carousel');
    });

});