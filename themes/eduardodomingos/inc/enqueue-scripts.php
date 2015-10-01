<?php
/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'eduardodomingos_scripts' ) ) :
    function eduardodomingos_scripts() {
        // Styles
        wp_enqueue_style( 'icon_fonts', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
        wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700|Merriweather' );
        wp_enqueue_style( 'main_css', get_template_directory_uri() . '/assets/build/css/main.min.css' );

        // Scripts
        wp_enqueue_script( 'main_js', get_template_directory_uri() . '/assets/build/js/main.min.js', array('jquery'), '', true );
    }
endif;
add_action( 'wp_enqueue_scripts', 'eduardodomingos_scripts' );
