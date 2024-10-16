$(document).ready(function(){
    // Initialize location carousel
    var locationCarousel = $('.location-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: false, // Disable default navigation
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
        nav: false, // Disable default navigation
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: { items: 1 },
            600: { items: 1 },
            1000: { items: 3 }
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

    // Next button functionality for location carousel
    $('.next-btn').click(function() {
        testimonialCarousel.trigger('next.owl.carousel');
    });

});