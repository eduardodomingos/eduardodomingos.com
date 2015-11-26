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
      if( $item->title == 'Blog' ) {
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

// Open Graph Tags
add_action( 'wp_head', 'eduardodomingos_add_opengraph_tags' );
function eduardodomingos_add_opengraph_tags() {
    if ( is_single() ) {
        global $post;
        $post_id = $post->ID;

        $title = get_the_title();
        $image = eduardodomingos_get_featured_photo_url();
        $link = get_permalink();
        $description = strip_tags(eduardodomingos_get_lead());
        $description = str_replace( '"', '&quot;', $description ); // replace quotes so that the HTML doesn't break

        $og_tags = '<meta property="og:title" content="'. $title .'" />';
        $og_tags.='<meta property="og:type" content="article" />';
        $og_tags.='<meta property="og:image" content="'. $image .'" />';
        $og_tags.='<meta property="og:image:width" content="770" />';
        $og_tags.='<meta property="og:image:height" content="433" />';
        $og_tags.='<meta property="og:url" content="'. $link .'" />';
        $og_tags.='<meta property="og:site_name" content="Eduardo Domingos" />';
        $og_tags.='<meta property="og:description" content="'. $description .'"/>';

        $twitter_username = 'eddomingos';
        $og_tags.='<meta name="twitter:card" content="summary_large_image">';
        $og_tags.='<meta name="twitter:site" content="@eddomingos">';
        $og_tags.='<meta name="twitter:creator" content="'. $twitter_username .'">';
        $og_tags.='<meta name="twitter:title" content="'. $title .'">';
        $og_tags.='<meta name="twitter:description" content="'. $description .'">';
        $og_tags.='<meta name="twitter:image" content="'. $image .'">';

        echo $og_tags;
    }
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

// Remove Jetpack concatenated CSS
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

