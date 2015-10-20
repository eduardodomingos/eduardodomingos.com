<?php
/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'eduardodomingos_scripts' ) ) :
    function eduardodomingos_scripts() {

        // Load jQuery from Google CDN
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3', true);

        // Load Underscore from Cloudflare CDN
        wp_deregister_script('underscore');
        wp_register_script('underscore', 'https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js', false, '1.6.0', true);

        // Styles
        wp_enqueue_style( 'icon_fonts', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
        wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700|Merriweather' );
        wp_enqueue_style( 'main_css', get_template_directory_uri() . '/assets/build/css/main.min.css' );

        // Scripts
        wp_enqueue_script( 'main_js', get_template_directory_uri() . '/assets/build/js/main.min.js', array( 'jquery', 'underscore' ), '', true );
    }
endif;
add_action( 'wp_enqueue_scripts', 'eduardodomingos_scripts' );
