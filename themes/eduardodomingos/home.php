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

            <?php if( have_posts() ) : ?>
                <div class="band band--shaded">
                    <div class="container">
                        <ul class="list-block">
            			<?php while ( have_posts() ) : the_post(); ?>

                            <?php
                                $featured_image_4x1 = get_field('featured_image_4x1');
                                $featured_image_4x1_url = $featured_image_4x1['url'];
                                $featured_image_4x1_alt = $featured_image_4x1['alt'];
                                echo '<li>';
                                eduardodomingos_get_template_part( 'template-parts/content', get_post_format(), array( 'post_id' => $post->ID, 'template_type' => 'block', 'featured_image_4x1_url' => $featured_image_4x1_url, 'featured_image_4x1_alt' => $featured_image_4x1_alt ) );
                                echo '</li>';
                            ?>

            			<?php endwhile; // End of the loop. ?>
                        <?php wp_reset_postdata();?>
                        </ul>
                    </div><!-- .container -->
                </div><!-- .band -->
            <?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
