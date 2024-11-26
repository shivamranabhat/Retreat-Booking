document.addEventListener('DOMContentLoaded', () => {
    const locationContainer = document.getElementById('location-container');
    const categoryContainer = document.getElementById('category-container');
    const locationDropdown = document.getElementById('location-dropdown');
    const categoryDropdown = document.getElementById('category-dropdown');

    locationContainer.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent click from propagating to document
        locationDropdown.classList.toggle('opacity-0');
        locationDropdown.classList.toggle('invisible');
    });

    document.addEventListener('click', () => {
        locationDropdown.classList.add('opacity-0');
        locationDropdown.classList.add('invisible');
    });
    categoryContainer.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent click from propagating to document
        categoryDropdown.classList.toggle('opacity-0');
        categoryDropdown.classList.toggle('invisible');
    });

    document.addEventListener('click', () => {
        categoryDropdown.classList.add('opacity-0');
        categoryDropdown.classList.add('invisible');
    });
});
