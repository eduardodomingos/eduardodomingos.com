(function($) {
    $(document).ready(function(){
        // Transitions Only After Page Load ( Chrome Bug )
        $("body").removeClass("preload");

        // Timeago Dates
        $("time.timeago").timeago();

        // Cache references to DOM elements for performance
        var dom = {
            $window :           $(window),
            $site_navigation :  $('#site-navigation')
        };

        /*
         * Stick Header Navigation
         */
        // Clone site navigation
        //var $site_navigation_clone =
        dom.$site_navigation
        .clone()
        .insertBefore( '#site-navigation' )
        .attr( 'id', function(i, str) { return str + '--cloned';} )
        .attr( 'class', function(i, str) { return str +' '+ str + '--cloned';} )
        .find( '#primary-menu' )
        .attr( 'id', function(i, str) { return str + '--cloned';} );

        // Cache cloned navigation
        //console.log($site_navigation_clone);
        dom.$site_navigation_clone = $('#site-navigation--cloned');

        // Throttle window scroll for performace
        var throttled = _.throttle(updatePosition, 100);
        dom.$window.scroll(throttled);

        // Throttle callback
        function updatePosition() {
            if ( dom.$window.scrollTop() > 48 ) {
                dom.$site_navigation_clone.addClass('main-navigation--stick');
            }
            else {
                dom.$site_navigation_clone.removeClass('main-navigation--stick');
            }
        }



    });
}(jQuery));
