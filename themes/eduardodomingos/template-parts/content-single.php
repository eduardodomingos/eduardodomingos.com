<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eduardo_Domingos
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php get_template_part('template-parts/content', 'cover'); ?>
	</header><!-- .entry-header -->
    <div class="band">
        <div class="container">
        	<div class="entry-content">
                <?php the_content(); ?>
        	</div><!-- .entry-content -->
        	<footer class="entry-footer">
        		<?php eduardodomingos_entry_footer(); ?>
        	</footer><!-- .entry-footer -->
        </div><!-- .container -->
    </div><!-- .band -->
</article><!-- #post-## -->

