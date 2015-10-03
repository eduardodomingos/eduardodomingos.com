<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eduardo_Domingos
 */

?>

<?php if(!empty(get_the_content())) : ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
</div><!-- #post-## -->
<?php endif; ?>
