<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eduardo_Domingos
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(! is_front_page() ): ?>
    <header class="entry-header">
        <?php get_template_part('template-parts/content', 'cover'); ?>
    </header><!-- .entry-header -->
    <?php endif; ?>
    <div class="band">
        <div class="container">
            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
            <footer class="entry-footer">

                <?php
                    edit_post_link(
                        sprintf(
                            /* translators: %s: Name of current post */
                            esc_html__( 'Edit %s', 'eduardodomingos' ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                ?>

            </footer><!-- .entry-footer -->
        </div>
    </div>
</article><!-- #post-## -->
