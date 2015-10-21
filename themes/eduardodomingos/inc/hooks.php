<?php
add_filter( 'nav_menu_css_class', 'eduardodomingos_portfolio_menu_item_classes', 10, 2 );
/**
 * Add css classes to Portfolio CPT menu item, remove from Blog item
 *
 * Enables menu classes for CPTs.
 * Pretty fragile, as it depends on the item titles for each menu item, change as required
 *
 * @param array  $classes CSS classes for the menu item
 * @param object $item    WP_Post object for current menu item
 *
 * @link         http://www.josheaton.org/
 * @author       Josh Eaton <josh@josheaton.org>
 * @copyright    Copyright (c) 2013, Josh Eaton
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
function eduardodomingos_portfolio_menu_item_classes( $classes, $item )
{
  switch ( get_query_var('post_type') ) {
    // Only run on project post type
    case 'project':
      // Remove current_page_parent from Blog menu item
      if( $item->title == 'Articles' ) {
        $classes = array_diff( $classes, array( 'current_page_parent' ) );
      }
      // Add current_page_parent class to the portfolio menu item
      if ( $item->title == 'Portfolio' ) {
        $classes[] = 'current_page_parent';
      }
    break;
  }
  return $classes;
}



add_filter('img_caption_shortcode','fix_img_caption_shortcode_inline_style',10,3);

function fix_img_caption_shortcode_inline_style($output,$attr,$content) {
    $atts = shortcode_atts( array(
        'id'      => '',
        'align'   => 'alignnone',
        'width'   => '',
        'caption' => '',
        'class'   => '',
    ), $attr, 'caption' );

    $atts['width'] = (int) $atts['width'];
    if ( $atts['width'] < 1 || empty( $atts['caption'] ) )
        return $content;

    if ( ! empty( $atts['id'] ) )
        $atts['id'] = 'id="' . esc_attr( $atts['id'] ) . '" ';

    $class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );

    if ( current_theme_supports( 'html5', 'caption' ) ) {
        return '<figure ' . $atts['id'] . ' class="' . esc_attr( $class ) . '">'
        . do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';
    }

    $caption_width = 10 + $atts['width'];

    $caption_width = apply_filters( 'img_caption_shortcode_width', $caption_width, $atts, $content );

    $style = '';

    return '<div ' . $atts['id'] . $style . 'class="' . esc_attr( $class ) . '">'
        . do_shortcode( $content ) . '<p class="wp-caption-text">' . $atts['caption'] . '</p></div>';
}

// WPCF7 disable the loading of the JavaScript and CSS
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

