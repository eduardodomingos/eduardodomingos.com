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

    <?php
        if( 'project' === get_post_type() ) {
            //for use in the loop, list 4 post titles related to tags on current post
            $orig_post = $post;
            global $post;
            $tags = wp_get_post_tags($post->ID);
            if($tags) {
                $tag_ids = array();
                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                $args = array(
                    'post_type' => 'project',
                    'tag__in' => $tag_ids,
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=> get_field( 'related_projects', 'option' ),
                    'ignore_sticky_posts'=> true
                );
                $query = new WP_Query( $args );
                if($query->have_posts()) { ?>
                    <div class="band band--shaded">
                        <div class="container">
                            <h2 class="yolo-heading"><?php esc_html_e( 'Related portfolio', 'eduardodomingos' ); ?></h2>
                            <ul class="list-ui condensed">
                                <?php
                                    while( $query->have_posts() ) {
                                        $query->the_post();
                                        $featured_image_16x9 = get_field('featured_image_16x9');
                                        $featured_image_16x9_url = $featured_image_16x9['url'];
                                        if( eduardodomingos_photon_enabled() ) {
                                            // Photon enabled, so we go responsive.
                                            $featured_image_16x9_url = apply_filters( 'jetpack_photon_url', $featured_image_16x9_url );
                                        }
                                        $featured_image_16x9_alt = $featured_image_16x9['alt'];
                                        eduardodomingos_get_template_part( 'template-parts/content', get_post_format(), array( 'post_id' => $post->ID, 'template_type' => 'media', 'thumb_url' => $featured_image_16x9_url, 'thumb_alt' => $featured_image_16x9_alt, 'show_excerpt' => false ) );
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                <?php }
            }
            $post = $orig_post;
            wp_reset_query();
        }
    ?>
</article><!-- #post-## -->
