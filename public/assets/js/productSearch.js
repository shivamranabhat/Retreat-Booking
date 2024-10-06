$(document).ready(function () {
    $("#product_search").on("keyup", function () {
        var searchText = $(this).val().toLowerCase();
        $("#product_id option").each(function () {
            var productName = $(this).text().toLowerCase();
            var option = $(this);
            if (productName.includes(searchText)) {
                // Select the matching option
                option.prop('selected', true);
                return false; // Exit the loop
            }
        });
    });
    //blog search
    //  $("#blog_search").on("keyup", function () {
    //     var searchText = $(this).val().toLowerCase();
    //     $("#blog_id option").each(function () {
    //         var blogName = $(this).text().toLowerCase();
    //         var option = $(this);

    //         if (blogName.includes(searchText)) {
    //             // Select the matching option
    //             option.prop('selected', true);
    //             return false; // Exit the loop
    //         }
    //     });
    // });
});
