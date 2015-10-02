<?php
/**
 * The template for displaying the articles page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eduardo_Domingos
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			        <?php //get_template_part( 'template-parts/content', 'page' ); ?>

                <?php if( comments_open() || get_comments_number() ) :?>
                    <?php // If comments are open or we have at least one comment, load up the comment template. ?>
                    <div class="band">
                        <div class="container">
                            <?php comments_template();?>
                        </div>
                    </div>
                <?php endif; ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
