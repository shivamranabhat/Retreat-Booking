

// window.onload = function () {
//     const stickyCol = document.getElementById('right-sticky-col');
//     const locationDiv = document.getElementById('location');
//     const originalPosition = stickyCol.getBoundingClientRect().top + window.scrollY;
//     const initialWidth = window.getComputedStyle(stickyCol).width;

//     const reviewCol = document.getElementById('review-count');
//     const reviewDiv = document.getElementById('reviews');
//     const reviewPosition = reviewCol.getBoundingClientRect().top + window.scrollY;
//     const initialReviewWidth = window.getComputedStyle(reviewCol).width;

//     const timingOffset = 150; 

//     function handleCombinedScroll() {
//         const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

//         const locationBottom = locationDiv.getBoundingClientRect().bottom + window.scrollY;
//         if (scrollTop > originalPosition && scrollTop < locationBottom - stickyCol.offsetHeight) {
//             stickyCol.style.width = initialWidth;
//             stickyCol.style.position = 'fixed';
//             stickyCol.style.top = '100px';
//         } else if (scrollTop >= locationBottom - stickyCol.offsetHeight) {
//             stickyCol.style.position = 'absolute';
//             stickyCol.style.top = `${locationBottom - stickyCol.offsetHeight}px`;
//         } else {
//             stickyCol.style.width = 'auto';
//             stickyCol.style.position = 'relative';
//             stickyCol.style.top = 'initial';
//         }

//         const reviewBottom = reviewDiv.getBoundingClientRect().bottom + window.scrollY;
//         if (scrollTop > reviewPosition && scrollTop < reviewBottom - reviewCol.offsetHeight - timingOffset) {
//             reviewCol.style.width = initialReviewWidth;
//             reviewCol.style.position = 'fixed';
//             reviewCol.style.top = '100px';
//         } else if (scrollTop >= reviewBottom - reviewCol.offsetHeight - timingOffset) {
//             reviewCol.style.position = 'absolute';
//             reviewCol.style.top = `${reviewBottom - reviewCol.offsetHeight}px`;
//         } else {
//             reviewCol.style.width = 'auto';
//             reviewCol.style.position = 'relative';
//             reviewCol.style.top = 'initial';
//         }
//     }
//     if (window.innerWidth > 1272) {
//         window.onscroll = handleCombinedScroll;
//     }
// };


window.onload = function () {
    const stickyCol = document.getElementById('right-sticky-col');
    const locationDiv = document.getElementById('location');
    const reviewCol = document.getElementById('review-count');
    const reviewDiv = document.getElementById('reviews');

    // Only proceed if required elements are found
    if (!stickyCol || !locationDiv) {
        return;
    }

    const originalPosition = stickyCol.getBoundingClientRect().top + window.scrollY;
    const initialWidth = window.getComputedStyle(stickyCol).width;

    let reviewPosition = null;
    let initialReviewWidth = null;

    if (reviewCol && reviewDiv) {
        reviewPosition = reviewCol.getBoundingClientRect().top + window.scrollY;
        initialReviewWidth = window.getComputedStyle(reviewCol).width;
    } else {
        console.warn('Review elements are missing or undefined.');
    }

    const timingOffset = 150; // Adjust for spacing

    function handleCombinedScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Sticky column behavior
        const locationBottom = locationDiv.getBoundingClientRect().bottom + window.scrollY;
        if (scrollTop > originalPosition && scrollTop < locationBottom - stickyCol.offsetHeight) {
            stickyCol.style.width = initialWidth;
            stickyCol.style.position = 'fixed';
            stickyCol.style.top = '100px';
        } else if (scrollTop >= locationBottom - stickyCol.offsetHeight) {
            stickyCol.style.position = 'absolute';
            stickyCol.style.top = `${locationBottom - stickyCol.offsetHeight}px`;
        } else {
            stickyCol.style.width = 'auto';
            stickyCol.style.position = 'relative';
            stickyCol.style.top = 'initial';
        }

        // Review column behavior (only if elements exist)
        if (reviewCol && reviewDiv) {
            const reviewBottom = reviewDiv.getBoundingClientRect().bottom + window.scrollY;
            const reviewHeight = reviewDiv.offsetHeight;

            if (reviewHeight > 0) {
                if (scrollTop > reviewPosition && scrollTop < reviewBottom - reviewCol.offsetHeight - timingOffset) {
                    reviewCol.style.width = initialReviewWidth;
                    reviewCol.style.position = 'fixed';
                    reviewCol.style.top = '100px';
                } else if (scrollTop >= reviewBottom - reviewCol.offsetHeight - timingOffset) {
                    reviewCol.style.position = 'absolute';
                    reviewCol.style.top = `${reviewBottom - reviewCol.offsetHeight}px`;
                } else {
                    reviewCol.style.width = 'auto';
                    reviewCol.style.position = 'relative';
                    reviewCol.style.top = 'initial';
                }
            } else {
                reviewCol.style.position = 'relative';
                reviewCol.style.top = 'initial';
                reviewCol.style.width = 'auto';
            }
        }
    }

    if (window.innerWidth > 1272) {
        window.onscroll = handleCombinedScroll;
    }
};
