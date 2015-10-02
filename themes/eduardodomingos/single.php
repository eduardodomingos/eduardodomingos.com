<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Eduardo_Domingos
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'single' ); ?>

            <?php //the_post_navigation(); ?>

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
