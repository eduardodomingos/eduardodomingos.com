<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Eduardo_Domingos
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function eduardodomingos_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'eduardodomingos_body_classes' );

/**
 * Checks if Jetpack Photon module is enabled.
 *
 * @return boolean
 */
function eduardodomingos_photon_enabled() {
    if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'photon' ) )
        return true;
    return false;
}
