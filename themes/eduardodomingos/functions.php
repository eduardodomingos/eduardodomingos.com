<?php
/**
 * Eduardo Domingos functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Eduardo_Domingos
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eduardodomingos_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'eduardodomingos_content_width', 540 );
}
add_action( 'after_setup_theme', 'eduardodomingos_content_width', 0 );

/**
 * Add ACF Options.
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Add theme support.
 */
require get_template_directory() . '/inc/theme-support.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
