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
