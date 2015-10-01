<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if ( ! function_exists( 'eduardodomingos_widgets_init' ) ) :
    function eduardodomingos_widgets_init() {
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'eduardodomingos' ),
            'id'            => 'sidebar-1',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
endif;
add_action( 'widgets_init', 'eduardodomingos_widgets_init' );
