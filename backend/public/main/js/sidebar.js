const showMoreBtn = document.getElementById('show-more-btn');
const sidebar = document.getElementById('sidebar');
const closeSidebarBtn = document.getElementById('close-sidebar');

showMoreBtn.addEventListener('click', () => {
    sidebar.classList.add('open');
});

closeSidebarBtn.addEventListener('click', () => {
    sidebar.classList.remove('open');
});

document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && !showMoreBtn.contains(e.target)) {
        sidebar.classList.remove('open');
    }
});