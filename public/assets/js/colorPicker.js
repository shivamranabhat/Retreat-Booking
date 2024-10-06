$(document).ready(function() {
    $('.colorPicker').hide();
    $('#name').on('input', function() {
        var nameValue = $(this).val().trim().toLowerCase();

        if (nameValue === 'color') {
            $('.colorPicker').show();
            $('#value').hide();
        } else {
            $('.colorPicker').hide();
            $('#value').show();
        }
    });
    var colorPickerContainer = $('.colorPickerContainer');
            var textPickerContainer = $('.textPickerContainer');
            var colorPicker = $('#value');
            var textValue = $('#textValue');
            var nameField = $('#name');

            // Check initial value on page load
            if (nameField.val().trim().toLowerCase() === 'color') {
                colorPickerContainer.show();
                textPickerContainer.hide();
            } else {
                colorPickerContainer.hide();
                textPickerContainer.show();
            }

            // Update display based on name field change
            nameField.on('input', function() {
                var nameValue = $(this).val().trim().toLowerCase();
                if (nameValue === 'color') {
                    colorPickerContainer.show();
                    textPickerContainer.hide();
                } else {
                    colorPickerContainer.hide();
                    textPickerContainer.show();
                }
            });

            // Update color preview
            colorPicker.on('input', function() {
                var color = $(this).val();
                $('#colorPreview').css('background-color', color);
                textValue.val(color);
            });
});