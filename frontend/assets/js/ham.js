document.addEventListener("DOMContentLoaded", function() {
    const hamBtn = document.querySelector('.ham-btn');
    const hamMenu = document.querySelector('.ham-menu');

    hamBtn.addEventListener('click', function() {
        // Toggle the cross effect on the button
        hamBtn.classList.toggle('cross');

        // Toggle the menu visibility with animation
        hamMenu.classList.toggle('hidden');
        hamMenu.classList.toggle('show');
    });
});