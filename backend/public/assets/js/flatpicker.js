flatpickr("#specific_start_date", {
    enableTime: false,
     dateFormat: "d M Y",
    minDate:"today"
});
flatpickr("#specific_end_date", {
    enableTime: false,
     dateFormat: "d M Y",
    minDate:"today"
});

flatpickr("#start_date", {
    plugins: [
        new monthSelectPlugin({
            shorthand: true,
            dateFormat: "M Y",
            altFormat: "M Y",
            theme: "material_blue"
        })
    ],
    minDate: new Date(new Date().getFullYear(), new Date().getMonth(), 1), 
});
flatpickr("#end_date", {
    plugins: [
        new monthSelectPlugin({
            shorthand: true,
            dateFormat: "M Y",
            altFormat: "M Y",
            theme: "material_blue"
        })
    ],
    minDate: new Date(new Date().getFullYear(), new Date().getMonth(), 1), 
});