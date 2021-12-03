(function($) {
    $(document).ready(function() {
        $("#toogle-post-title").click(function() {
            var $content = $('.post-list-content');
            $(this).toggleClass("on");
            $content.toggle();
            if ($content.is(':hidden')) {
                $(this).find('i').removeClass('td-icon-menu-up');
            }

            if ($content.is(":visible")) {
                $(this).find('i').addClass('td-icon-menu-up');
            }
            return false;
        });
    });
})(jQuery);