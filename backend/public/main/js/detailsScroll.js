// window.onload = function() {
//     const stickyCol = document.getElementById('right-sticky-col');
//     const originalPosition = stickyCol.getBoundingClientRect().top + window.scrollY; 
//     const inclusionDiv = document.getElementById('location'); 
//     const inclusionPosition = inclusionDiv.getBoundingClientRect().top + window.scrollY; 
//     const inclusionHeight = inclusionDiv.offsetHeight; 

//     const initialWidth = window.getComputedStyle(stickyCol).width;

//     window.onscroll = function() {
//         const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

//         if (scrollTop > originalPosition && scrollTop < inclusionPosition + inclusionHeight - stickyCol.offsetHeight) {
//             stickyCol.style.width = initialWidth; 
//             stickyCol.style.position = 'fixed';
//             stickyCol.style.top = '100px';
//         } else if (scrollTop >= inclusionPosition + inclusionHeight - stickyCol.offsetHeight) {
//             // When reaching the bottom of the inclusion position, set it to relative positioning
//             stickyCol.style.position = 'relative'; 
//             stickyCol.style.top = `${inclusionPosition + inclusionHeight - originalPosition + 50}px`; 
//         } else {
//             // Reset when above original position
//             stickyCol.style.width = 'auto'; 
//             stickyCol.style.position = 'relative'; 
//             stickyCol.style.top = 'initial'; 
//         }
//     };
// };

// window.onload = function() {
//     const stickyCol = document.getElementById('right-sticky-col');
//     const originalPosition = stickyCol.getBoundingClientRect().top + window.scrollY;
//     const initialWidth = window.getComputedStyle(stickyCol).width;
//     window.onscroll = function() {
//         const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
//         if (scrollTop > originalPosition) {
//             stickyCol.style.width = initialWidth;
//             stickyCol.style.position = 'fixed';
//             stickyCol.style.top = '100px'; 

//         } else {
//             stickyCol.style.width = 'auto';
//             stickyCol.style.position = 'relative'; 
//             stickyCol.style.top = 'initial'; 
//         }
//     };
// };

// window.onload = function() {
//     const stickyCol = document.getElementById('right-sticky-col');
//     const locationDiv = document.getElementById('location');
//     const originalPosition = stickyCol.getBoundingClientRect().top + window.scrollY;
//     const initialWidth = window.getComputedStyle(stickyCol).width;

//     window.onscroll = function() {
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
//     };
// };
// window.onload = function() {
//     const stickyCol = document.getElementById('right-sticky-col');
//     const locationDiv = document.getElementById('location');
//     const originalPosition = stickyCol.getBoundingClientRect().top + window.scrollY;
//     const initialWidth = window.getComputedStyle(stickyCol).width;

//     // Function to handle scroll behavior
//     function handleScroll() {
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
//     }

//     // Check viewport width and attach scroll event if greater than 1272px
//     if (window.innerWidth > 1272) {
//         window.onscroll = handleScroll;
//     }
// };

// window.onload = function () {
//     const stickyCol = document.getElementById('right-sticky-col');
//     const locationDiv = document.getElementById('location');
//     const originalPosition = stickyCol.getBoundingClientRect().top + window.scrollY;
//     const initialWidth = window.getComputedStyle(stickyCol).width;

//     const reviewCol = document.getElementById('review-count');
//     const reviewDiv = document.getElementById('reviews');
//     const reviewPosition = reviewCol.getBoundingClientRect().top + window.scrollY;
//     const initialReviewWidth = window.getComputedStyle(reviewCol).width;

//     // Combined scroll function
//     function handleCombinedScroll() {
//         const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

//         // Sticky column logic
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

//         // Review column logic
//         const reviewBottom = reviewDiv.getBoundingClientRect().bottom + window.scrollY;
//         if (scrollTop > reviewPosition && scrollTop < reviewBottom - reviewCol.offsetHeight) {
//             reviewCol.style.width = initialReviewWidth;
//             reviewCol.style.position = 'fixed';
//             reviewCol.style.top = '100px';
//         } else if (scrollTop >= reviewBottom - reviewCol.offsetHeight) {
//             reviewCol.style.position = 'absolute';
//             reviewCol.style.top = `${reviewBottom - reviewCol.offsetHeight}px`;
//         } else {
//             reviewCol.style.width = 'auto';
//             reviewCol.style.position = 'relative';
//             reviewCol.style.top = 'initial';
//         }
//     }

//     // Check viewport width and attach combined scroll event
//     if (window.innerWidth > 1272) {
//         window.onscroll = handleCombinedScroll;
//     }
// };

// window.onload = function () {
//     const reviewCol = document.getElementById('review-count');
//     const reviewDiv = document.getElementById('reviews');
//     const reviewPosition = reviewCol.getBoundingClientRect().top + window.scrollY;
//     const initialReviewWidth = window.getComputedStyle(reviewCol).width;

//     // Adjust this to control the "anticipation" of sticking behavior
//     const timingOffset = 150; // 200px before reaching the bottom

//     // Function to handle scroll behavior
//     function handleScroll() {
//         const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
//         const reviewBottom = reviewDiv.getBoundingClientRect().bottom + window.scrollY;

//         // Check if the user is scrolling within the sticky range
//         if (scrollTop > reviewPosition && scrollTop < reviewBottom - reviewCol.offsetHeight - timingOffset) {
//             reviewCol.style.width = initialReviewWidth;
//             reviewCol.style.position = 'fixed';
//             reviewCol.style.top = '100px'; // Adjust top offset as needed
//         } 
//         // Stop slightly earlier before the bottom of the `reviews` div
//         else if (scrollTop >= reviewBottom - reviewCol.offsetHeight - timingOffset) {
//             reviewCol.style.position = 'absolute';
//             reviewCol.style.top = `${reviewBottom - reviewCol.offsetHeight}px`;
//         } 
//         // Reset position when above the sticky range
//         else {
//             reviewCol.style.width = 'auto';
//             reviewCol.style.position = 'relative';
//             reviewCol.style.top = 'initial';
//         }
//     }

//     // Attach scroll event if viewport is wide enough
//     if (window.innerWidth > 1272) {
//         window.onscroll = handleScroll;
//     }
// };

window.onload = function () {
    const stickyCol = document.getElementById('right-sticky-col');
    const locationDiv = document.getElementById('location');
    const originalPosition = stickyCol.getBoundingClientRect().top + window.scrollY;
    const initialWidth = window.getComputedStyle(stickyCol).width;

    const reviewCol = document.getElementById('review-count');
    const reviewDiv = document.getElementById('reviews');
    const reviewPosition = reviewCol.getBoundingClientRect().top + window.scrollY;
    const initialReviewWidth = window.getComputedStyle(reviewCol).width;

    const timingOffset = 150; 

    function handleCombinedScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

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

        const reviewBottom = reviewDiv.getBoundingClientRect().bottom + window.scrollY;
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
    }
    if (window.innerWidth > 1272) {
        window.onscroll = handleCombinedScroll;
    }
};
