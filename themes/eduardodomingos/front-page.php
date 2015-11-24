<?php
/**
 * The template for displaying all pages.
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
                <?php get_template_part( 'template-parts/content', 'page' ); ?>
                <section class="band">
                    <div class="container">
                        <h1 class="yolo-heading"><?php esc_html_e( 'Latest portfolio', 'eduardodomingos' ); ?></h1>
                        <?php
                            /*
                            *  Order Posts based on Date Picker value
                            *  this example expects the value to be saved in the format: yymmdd (JS) = Ymd (PHP)
                            */
                            $posts = get_posts(array(
                                'post_type'         =>  'project',
                                'meta_key'          => 'end_date', // name of custom field
                                'orderby'           => 'meta_value_num',
                                'posts_per_page'    =>  get_field( 'projects_on_homepage', 'option' ),
                                'order' => 'DESC'
                            ));
                            if( $posts )
                            {
                                echo '<ul class="list-ui">';
                                foreach( $posts as $post )
                                {
                                    echo '<li>';
                                    setup_postdata( $post );
                                    $client_logo = get_field('client_logo');
                                    $client_logo_url = $client_logo['url'];
                                    $client_logo_alt = $client_logo['alt'];
                                    eduardodomingos_get_template_part( 'template-parts/content', get_post_format(), array( 'post_id' => $post->ID, 'template_type' => 'media', 'thumb_url' => $client_logo_url, 'thumb_alt' => $client_logo_alt, 'show_excerpt' => true ) );
                                    echo '</li>';
                                }

                                wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                                echo '</ul>';
                            }
                        ?>
                    </div><!-- .container -->
                </section><!-- .band -->
                <section class="band band--shaded">
                    <div class="container">
                        <h1 class="yolo-heading"><?php esc_html_e( 'Latest from blog', 'eduardodomingos' ); ?></h1>
                        <?php
                            $args = array(
                                'post_type'         => 'post',
                                'posts_per_page'    => 1,
                            );

                            $query = new WP_Query( $args );

                            if( $query->have_posts() ) {
                                echo '<ul class="list-bare">';
                                while( $query->have_posts() ) {
                                    $query->the_post();
                                    echo '<li>';
                                    $featured_image_4x1 = get_field('featured_image_4x1');
                                    $featured_image_4x1_url = $featured_image_4x1['url'];
                                    $featured_image_4x1_alt = $featured_image_4x1['alt'];
                                    eduardodomingos_get_template_part( 'template-parts/content', get_post_format(), array( 'post_id' => $post->ID, 'template_type' => 'block', 'featured_image_4x1_url' => $featured_image_4x1_url, 'featured_image_4x1_alt' => $featured_image_4x1_alt ) );
                                    echo '</li>';
                                }
                                wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
                                echo '</ul>';
                            }
                        ?>
                    </div><!-- .container -->
                </section><!-- .band -->
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

<?php get_footer(); ?>
