document.addEventListener('DOMContentLoaded', function() {
    function openGallery(type) {
        GLightbox({
            selector: `a[data-gallery="${type}"]`,
            plyr: {
                css: 'https://cdn.plyr.io/3.6.2/plyr.css',
                js: 'https://cdn.plyr.io/3.6.2/plyr.js',
            }
        }).open();
    }
    document.querySelector('.gallery').addEventListener('click', function() {
        openGallery('gallery');
    });

});