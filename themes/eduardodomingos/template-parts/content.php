<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eduardo_Domingos
 */

?>

<?php switch ($template_type): ?>
<?php case 'media': ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="media">
            <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><img src="<?php echo $thumb_url;?>" alt="<?php echo $thumb_alt;?>" class="media__img lazyload"></a>
            <div class="media__body">
                <header class="entry-header">
                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                </header><!-- .entry-header -->
                 <div class="entry-content">
                    <?php the_excerpt();?>
                </div><!-- .entry-content -->
                <footer class="entry-footer">
                    <ul class="entry-meta list-inline list-inline--delimited">
                        <li><?php echo eduardodomingos_get_project_date($project_id); ?></li>
                        <li><?php echo eduardodomingos_get_project_type($project_id); ?></li>
                    </ul>
                    <?php eduardodomingos_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </div><!-- .media__block -->
        </div><!-- .media -->
    </article><!-- #post-## -->

<?php break;?>

<?php case 'block':?>
<?php break;?>

<?php default:?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php eduardodomingos_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
            the_content( sprintf(
                /* translators: %s: Name of current post. */
                wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'eduardodomingos' ), array( 'span' => array( 'class' => array() ) ) ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );
        ?>

        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eduardodomingos' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php eduardodomingos_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php endswitch ?>
