<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Eduardo_Domingos
 */

?>

	</div><!-- #content -->

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info container band">
            <?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'social-menu', 'link_before' => '<span class="hide">', 'link_after' => '</span>' ) ); ?>
            <small>&copy;<?php echo date('Y'); ?> <?php printf( esc_html__( 'Design and code made with %1$s by %2$s.', 'eduardodomingos' ),'<i class="fa fa-heart"></i>', '<a href="http://eduardodomingos.com" rel="designer">Eduardo Domingos</a>' ); ?></small>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
