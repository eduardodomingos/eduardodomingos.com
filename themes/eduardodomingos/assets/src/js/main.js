(function($) {
    $(document).ready(function(){
        // Instantiate FastClick on the body
        FastClick.attach(document.body);

        // Transitions Only After Page Load ( Chrome Bug )
        $("body").removeClass("preload");

        // Timeago Dates
        $("time.timeago").timeago();

        // Cache references to DOM elements for performance
        var dom = {
            $window:            $(window),
            $body:              $('body'),
            $site_navigation:   $('#site-navigation')
        };

        /*
         * Stick Header Navigation
         */
        // Clone site navigation
        dom.$site_navigation
        .clone()
        .insertBefore( '#site-navigation' )
        .attr( 'id', function(i, str) { return str + '--cloned';} )
        .attr( 'class', function(i, str) { return str +' '+ str + '--cloned';} )
        .find( '#primary-menu' )
        .attr( 'id', function(i, str) { return str + '--cloned';} );

        // Cache cloned navigation
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

        /*
         * Mobile Navigation
         */
        // Add div to DOM to house the mobile navigation
        $('.site').after('<div id="mobile-navigation" role="navigation"></div><div class="mobile-nav-cover"></div>');

        // Cache mobile navigation div for performace
        dom.$mobile_navigation = $('#mobile-navigation');
        dom.$mobile_navigation_cover = $('.mobile-nav-cover');

        // Clone site navigation
        dom.$site_navigation
        .clone()
        .find( '#primary-menu' )
        .attr( 'id', 'mobile-menu')
        .appendTo(dom.$mobile_navigation);

        // Toggle Mobile Navigation
        $(document).on('click', '.menu-toggle', function(e) {
            e.preventDefault();
            dom.$body.toggleClass('nav-open');
            dom.$mobile_navigation_cover.addClass('active');
            dom.$site_navigation_clone.removeClass('main-navigation--stick');
        });

        $(document).on('click', '.mobile-nav-cover', function(e) {
            e.preventDefault();
            dom.$body.toggleClass('nav-open');
            dom.$mobile_navigation_cover.removeClass('active');
        });

        // Debounce window resize for performace
        var lazyLayout = _.debounce(calculateLayout, 300);
        $(window).resize(lazyLayout);

        // Debounce callback
        function calculateLayout() {
            if( window.matchMedia('(min-width: 64em)').matches ) {
                // Close mobile navigation for desk and up
                if(dom.$body.hasClass('nav-open')) {
                    dom.$body.removeClass('nav-open');
                    dom.$mobile_navigation_cover.removeClass('active');
                }
            }
        }

        /*
         * Responsive Cover
         */
        if( dom.$body.hasClass('single-post') ) {
            var $cover = $('.cover'); // cache cover
            if($cover.hasClass('photon')) {
                var cover_url = $cover.data('src');
                $cover.css({
                    'background-image': 'url('+cover_url+')',
                });
            }
        }
    });
}(jQuery));
