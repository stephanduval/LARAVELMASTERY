(function ($) {
    "use strict";

    var fullHeight = function () {
        $(".js-fullheight").css("height", $(window).height());
        $(window).resize(function () {
            $(".js-fullheight").css("height", $(window).height());
        });
    };
    fullHeight();

    $("#sidebarCollapse").on("click", function () {
        $("#sidebar").toggleClass("active");
    });

    $("#navbarCollapse").on("click", function () {
        $("#navbarSupportedContent").toggleClass("collapse");
    });
})(jQuery);

// jQuery(function ($) {
//     "use strict";

//     var fullHeight = function () {
//         $(".js-fullheight").css("height", $(window).height());
//         $(window).on("resize", function () {
//             $(".js-fullheight").css("height", $(window).height());
//         });
//     };
//     fullHeight();

//     $("#sidebarCollapse").on("click", function () {
//         $("#sidebar").toggleClass("active");
//     });

//     $("#navbarCollapse").on("click", function () {
//         $("#navbarSupportedContent").toggleClass("collapse");
//     });
// });
