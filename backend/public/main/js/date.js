// // flatpickr("#date", {
// //     plugins: [
// //         new monthSelectPlugin({
// //             shorthand: true,
// //             dateFormat: "M Y",
// //             altFormat: "M Y",
// //             theme: "material_blue"
// //         })
// //     ],
// //     minDate: new Date(new Date().getFullYear(), new Date().getMonth(), 1), 
// //     // inline: true
// // });

// // Function to initialize or reinitialize Flatpickr for the Specific Date picker
// function initializeDatePicker() {
//     flatpickr("#specificDatePicker", {
//         inline: true,
//         dateFormat: "d M Y",
//         minDate: "today",
//         onChange: function (selectedDates, dateStr) {
//             document.getElementById("date").value = dateStr;
//             closeDropdown();
//         },
//     });
// }

// // Function to initialize or reinitialize Flatpickr for the Specific Month picker
// function initializeMonthPicker() {
//     flatpickr("#specificMonthPicker", {
//         inline: true,
//         plugins: [
//             new monthSelectPlugin({
//                 shorthand: true,
//                 dateFormat: "M Y",
//                 altFormat: "M Y",
//                 theme: "material_blue",
//             }),
//         ],
//         minDate: new Date(new Date().getFullYear(), new Date().getMonth(), 1),
//         onChange: function (selectedDates, dateStr) {
//             document.getElementById("date").value = dateStr;
//             closeDropdown();
//         },
//     });
// }

// // Tab Functionality
// const specificDateTab = document.getElementById("specificDateTab");
// const specificMonthTab = document.getElementById("specificMonthTab");
// const specificDatePicker = document.getElementById("specificDatePicker");
// const specificMonthPicker = document.getElementById("specificMonthPicker");

// if(specificDateTab)
// {
//     // Toggle tabs and calendars
//     specificDateTab.addEventListener("click", () => {
//         specificDateTab.classList.add("active");
//         specificMonthTab.classList.remove("active");
    
//         specificDatePicker.classList.add("active");
//         specificMonthPicker.classList.remove("active");
    
//         // Initialize the date picker only when tab is selected
//         initializeDatePicker();
//         // Destroy month picker if already initialized
//         if (specificMonthPicker._flatpickr) {
//             specificMonthPicker._flatpickr.destroy();
//         }
//     });
// }

// if(specificMonthTab)
// {
//     specificMonthTab.addEventListener("click", () => {
//         specificMonthTab.classList.add("active");
//         specificDateTab.classList.remove("active");
    
//         specificMonthPicker.classList.add("active");
//         specificDatePicker.classList.remove("active");
    
//         // Initialize the month picker only when tab is selected
//         initializeMonthPicker();
//         // Destroy date picker if already initialized
//         if (specificDatePicker._flatpickr) {
//             specificDatePicker._flatpickr.destroy();
//         }
//     });
// }

// // Show/Hide Dropdown
// const dateInput = document.getElementById("date");
// const calendarDropdown = document.getElementById("calendarDropdown");

// if(dateInput)
// {
//     dateInput.addEventListener("click", () => {
//         calendarDropdown.classList.toggle("hidden");
//     });
// }

// // Close dropdown if any date is selected
// function closeDropdown() {
//     calendarDropdown.classList.add("hidden");
// }

// // Initialize the specific date picker by default
// initializeDatePicker();

flatpickr("#end-date", {
    enableTime: false,
    dateFormat: "M d Y",
    disableMobile: "true",
    minDate: "today"
});
flatpickr("#start-date", {
    enableTime: false,
    dateFormat: "M d Y",
    disableMobile: "true",
    minDate: "today",
    defaultDate: new Date(),
});