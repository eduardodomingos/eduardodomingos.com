<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eduardo_Domingos
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <a class="skip-link hide" href="#content"><?php esc_html_e( 'Skip to content', 'eduardodomingos' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <?php if( ! is_single() ) {
                get_template_part( 'template-parts/content', 'cover' );
            }
        ?>
        <nav id="site-navigation" class="main-navigation" role="navigation">
            <div class="site-branding container container--large">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="hide"><?php esc_html_e( 'Primary Menu', 'eduardodomingos' ); ?></span></button>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => false ) ); ?>
            </div>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
