flatpickr("#date", {
  enableTime: false,
  mode:"multiple",
  dateFormat: "Y-m-d",
});
flatpickr("#singledate", {
  enableTime: false,
  dateFormat: "Y-m-d",
});
flatpickr("#time", {
  noCalendar: true,
  enableTime: true,
  dateFormat: 'h:i K'
});

