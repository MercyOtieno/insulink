jQuery(document).ready(function(e) {
    $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 150) {
            $("header.fixed-top").addClass("nav-fixed");
        } else {
            $("header.fixed-top").removeClass("nav-fixed");
        }
    });
});
