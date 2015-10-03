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
        <div id="site-navigation" class="main-navigation" role="navigation">
            <div class="site-branding container container--large">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" rel="home"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"><rect x="47.9" y="18.4" fill="#FFFFFF" class="logo-fill" width="6.7" height="6.7"></rect><rect x="55.6" y="27.7" fill="#FFFFFF" class="logo-fill" width="4.5" height="4.5"></rect><rect x="58.7" y="20.1" fill="#FFFFFF" class="logo-fill" width="3.3" height="3.3"></rect><rect x="2" y="30.5" fill="#FFFFFF" class="logo-fill" width="3.3" height="3.3"></rect><path fill="#FFFFFF" class="logo-fill" d="M45.1 12.4h-4.2v21.2c0 7.6-6.2 13.8-13.8 13.8 -7.6 0-13.8-6.2-13.8-13.8 0-7.6 6.2-13.8 13.8-13.8v0h4.2v7.3h-4.2c-3.6 0-6.5 2.9-6.5 6.5 0 3.6 2.9 6.5 6.5 6.5 3.6 0 6.5-2.9 6.5-6.5 0 0 0-0.1 0-0.1h0V12.4H9.2V37H5.3v7.5h3.8v7.1h35.9V37.7h7.4v-10h-7.4V12.4z"></path></svg></a>
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="hide"><?php esc_html_e( 'Primary Menu', 'eduardodomingos' ); ?></span></button>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container' => false ) ); ?>
            </div>
        </div><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
