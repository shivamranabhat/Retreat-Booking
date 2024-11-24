window.onload = function() {
    const stickyCol = document.getElementById('left-col');
    const rightDiv = document.getElementById('right-col');
    const originalPosition = stickyCol.getBoundingClientRect().top + window.scrollY;
    const initialWidth = window.getComputedStyle(stickyCol).width;

    // Function to handle scroll behavior
    function handleScroll() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const rightBottom = rightDiv.getBoundingClientRect().bottom + window.scrollY;

        if (scrollTop > originalPosition && scrollTop < rightBottom - stickyCol.offsetHeight) {
            stickyCol.style.width = initialWidth;
            stickyCol.style.position = 'fixed';
            stickyCol.style.top = '100px'; 
        } else if (scrollTop >= rightBottom - stickyCol.offsetHeight) {
            stickyCol.style.position = 'absolute';
            stickyCol.style.top = `${rightBottom - stickyCol.offsetHeight}px`;
        } else {
            stickyCol.style.width = 'auto';
            stickyCol.style.position = 'relative'; 
            stickyCol.style.top = 'initial'; 
        }
    }

    // Check viewport width and attach scroll event if greater than 1272px
    if (window.innerWidth > 1272) {
        window.onscroll = handleScroll;
    }
};


