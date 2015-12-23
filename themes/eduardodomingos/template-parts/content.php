<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eduardo_Domingos
 */

?>
<?php
    if( !isset($template_type) )
        $template_type ='';
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
                <?php if(isset($show_excerpt) && true === $show_excerpt) : ?>
                <div class="entry-content">
                    <?php the_excerpt();?>
                </div><!-- .entry-content -->
                <?php endif; ?>
                <footer class="entry-footer">
                    <ul class="entry-meta list-inline list-inline--delimited">
                        <?php if( 'project' === get_post_type() ) : ?>
                            <li><?php echo eduardodomingos_get_project_date($post_id); ?></li>
                            <li><?php echo eduardodomingos_get_project_type($post_id); ?></li>
                        <?php elseif( 'post' === get_post_type() ) : ?>
                            <li><?php echo eduardodomingos_posted_on(); ?></li>
                            <li><?php echo eduardodomingos_get_post_category(); ?></li>
                        <?php endif; ?>
                    </ul>
                    <?php eduardodomingos_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </div><!-- .media__block -->
        </div><!-- .media -->
    </article><!-- #post-## -->

<?php break;?>

<?php case 'block':?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="block">
            <?php if( !empty( $featured_image_4x1_url ) ) :?>
            <a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark"><img src="<?php echo $featured_image_4x1_url;?>" alt="<?php echo $featured_image_4x1_alt;?>" class="block__img lazyload"></a>
            <?php  endif; ?>
            <div class="block__body box box--highlight">
                <header class="entry-header">
                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    <?php the_field('lead');?>
                </div><!-- .entry-content -->
                <footer class="entry-footer">
                    <ul class="entry-meta list-inline list-inline--delimited">
                        <li><?php echo eduardodomingos_posted_on(); ?></li>
                        <li><?php echo eduardodomingos_get_post_category(); ?></li>
                    </ul><!-- .entry-meta -->
                    <?php eduardodomingos_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </div><!-- .block__body -->
        </div>
    </article><!-- #post-## -->

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
