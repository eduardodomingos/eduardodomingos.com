<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eduardo_Domingos
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

            <div class="band">
                <div class="container">
                    <?php if('project' == get_post_type()) {
                            printf( '<p class="yolo-heading">' . esc_html__( 'All projects in %1$s', 'eduardodomingos' ) . '</p>',  single_cat_title( '', false ));
                        }
                        else {
                            printf( '<p class="yolo-heading">' . esc_html__( 'All posts in %1$s', 'eduardodomingos' ) . '</p>', single_cat_title( '', false ) );
                        }
                    ?>
                    <ul class="list-ui condensed">
        			<?php /* Start the Loop */ ?>
        			<?php while ( have_posts() ) : the_post(); ?>
                        <li>
        				<?php
                                $featured_image_16x9 = get_field('featured_image_16x9');
                                $featured_image_16x9_url = $featured_image_16x9['url'];
                                if( eduardodomingos_photon_enabled() ) {
                                    // Photon enabled, so we go responsive.
                                    $featured_image_16x9_url = apply_filters( 'jetpack_photon_url', $featured_image_16x9_url );
                                }
                                $featured_image_16x9_alt = $featured_image_16x9['alt'];
                                eduardodomingos_get_template_part( 'template-parts/content', get_post_format(), array( 'post_id' => $post->ID, 'template_type' => 'media', 'thumb_url' => $featured_image_16x9_url, 'thumb_alt' => $featured_image_16x9_alt, 'show_excerpt' => false ) );
        					/*
        					 * Include the Post-Format-specific template for the content.
        					 * If you want to override this in a child theme, then include a file
        					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        					 */
        					//get_template_part( 'template-parts/content', get_post_format() );
        				?>
                        </li>
        			<?php endwhile; ?>

                    </ul>
                </div>
            </div>
    		<?php else : ?>

    			<?php get_template_part( 'template-parts/content', 'none' ); ?>

    		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
