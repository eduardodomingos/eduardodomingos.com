(function($) {
    $(document).ready(function(){
        // Transitions Only After Page Load
        $("body").removeClass("preload");

        // Timeago
        $("time.timeago").timeago();
    });
}(jQuery));
