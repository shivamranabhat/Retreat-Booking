document.addEventListener("DOMContentLoaded", function () {
    const tabButtons = document.querySelectorAll(".tab-filters button");
    const tabContents = document.querySelectorAll(".panels > div");

    if(tabButtons)
    {
        function activateTab(tabIndex) {
            tabButtons.forEach((button, index) => {
            if (index === tabIndex) {
                button.classList.add("active-tab");
                button.style.backgroundColor = "#fff";
                button.style.color = "#000";
                button.style.border = "none";
            } else {
                button.classList.remove("active-tab");
                button.style.backgroundColor = "#f5f5f4";
                button.style.color = "#6b7280";
                button.style.border = "1px solid #e2e8f0";
            }
            });
            tabContents.forEach((content, index) => {
            content.classList.toggle("hidden", index !== tabIndex);
            });
        }
        
        tabButtons.forEach((button, index) => {
            button.addEventListener("click", () => {
            activateTab(index);
            });
        });
    }
    
});