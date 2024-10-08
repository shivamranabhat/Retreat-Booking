const slider = document.querySelector('.slider');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
const cards = document.querySelectorAll('.card');
const cardCount = cards.length;
const visibleCards = 4; // Number of cards to show at a time

let currentIndex = 0;

function updateSlider() {
    // Calculate the new transform value for sliding the cards
    const transformValue = -(currentIndex * (slider.offsetWidth / visibleCards));
    slider.style.transform = `translateX(${transformValue}px)`;
}

// Handle "next" button click
nextButton.addEventListener('click', () => {
    if (currentIndex < cardCount - visibleCards) {
        currentIndex++;
        updateSlider();
    }
});

// Handle "prev" button click
prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
        currentIndex--;
        updateSlider();
    }
});
