<?php
if( get_option( 'show_on_front' ) == 'page' && is_home() ) {

    $cover_image_2x1 = get_field( 'cover_image_2x1' , get_option( 'page_for_posts' ) );
    $cover_overlay_value = get_field( 'cover_overlay', get_option( 'page_for_posts' ) );
}
else {
    $cover_image_2x1 = get_field( 'cover_image_2x1' );
    $cover_overlay_value = get_field( 'cover_overlay' );
}

if( ! empty( $cover_image_2x1 ) ) {
    if( eduardodomingos_photon_enabled() ) {
        // Photon enabled, so we go responsive.
        echo '<div class="cover cover--text-center cover--has-image FlexEmbed photon" data-src="'. apply_filters( 'jetpack_photon_url', $cover_image_2x1 ) .'">';
    }
    else {
        // Photon disabled.
        echo '<div class="cover cover--text-center cover--has-image FlexEmbed" style="background-image: url(\''. $cover_image_2x1 .'\')">';
    }
}
elseif( get_field( 'cover_pattern', 'option' ) ) {
    echo '<div class="cover cover--text-center FlexEmbed" style="background-image: url(\''. get_field('cover_pattern','option'). '\')">';
}
else {
    echo '<div class="cover cover--text-center FlexEmbed">';
}
?>
    <div class="FlexEmbed-ratio FlexEmbed-ratio--2by1"></div>
    <?php
        if( ! empty( $cover_image_2x1 ) ) {
            $cover_overlay_value = $cover_overlay_value ? $cover_overlay_value : 0;
            echo '<div class="FlexEmbed-content" style="background-color: rgba(0,0,0,'. $cover_overlay_value .');">';
        }
        else {
            echo '<div class="FlexEmbed-content">';
        }
    ?>
    <div class="cover__content container">
        <?php
            if( is_front_page() ) {
                $markup = '<hgroup>';
                $markup.= '<h1 class="cover__title">' . get_bloginfo( 'name ') . '</h1>';
                $markup.= '<h2 class="cover__subtitle">' . get_bloginfo( 'description' ) . '</h2>';
                $markup.= '</hgroup>';
                if( get_field( 'cover_text' ) ) {
                    $markup.= '<p class="cover__text">'. get_field( 'cover_text' ) .'</p>';
                }
                echo $markup;
            }
            elseif( is_single() ) {
                $markup = '<h1 class="cover__title">' . get_the_title() . '</h1>';
                $markup.= '<ul class="entry-meta list-inline list-inline--delimited">';
                if('project' === get_post_type()) {
                    $markup.= '<li>' . eduardodomingos_get_project_date($post->ID) . '</li>';
                    $markup.= '<li>' . eduardodomingos_get_project_type($post->ID) . '</li>';
                    $markup.= '</ul>';
                    if( get_field('url') ) {
                        $markup.= '<a href="'.get_field('url').'" class="btn" target="_blank">'. esc_html( 'Visit project', 'eduardodomingos' ) .'</a>';
                    }
                }
                else {
                    $markup.= '<li>' . eduardodomingos_posted_by() . '</li>';
                    $markup.= '<li>' . eduardodomingos_posted_on() . '</li>';
                    $markup.= '<li>' . eduardodomingos_get_post_category() . '</li>';
                    $markup.= '</ul>';

                    $posttags = get_the_tags();
                    if ($posttags) {
                        $markup.= '<ul class="entry-tags">';
                        foreach($posttags as $tag) {
                            $markup.= '<li><a href="'. get_tag_link($tag->term_id) .'">#' . $tag->name . '</a></li>';
                        }
                        $markup.= '</ul>';
                    }
                }

                echo $markup;
            }
            else {
                if( is_archive() ) {
                    $markup = '<h1 class="cover__title">' . get_the_archive_title() . '</h1>';
                    if( get_the_archive_description() ) {
                        $markup.= '<p class="cover__text">' . get_the_archive_description() . '</p>';
                    }
                }
                elseif( is_404() ) {
                    $markup = '<h1 class="cover__title">' . esc_html( 'Oops! You went too far!', 'eduardodomingos' ) . '</h1>';
                    $markup.= '<p class="cover__text">'. esc_html( 'Houston we have a problem! That page can&rsquo;t be found.', 'eduardodomingos' ) .'</p>';
                }
                else {
                    $markup = '<h1 class="cover__title">' . single_post_title('', false) . '</h1>';
                    if( is_home() ) {
                        // ACF needs to specify the Blog page ID in the get_field function.
                        $slug = get_page_by_path( 'blog' );
                        if( get_field( 'cover_text', $slug->ID ) ) {
                            $markup.= '<p class="cover__text">'. get_field( 'cover_text', $slug->ID ) .'</p>';
                        }
                    }
                    else {
                        if( get_field( 'cover_text' ) ) {
                            $markup.= '<p class="cover__text">'. get_field( 'cover_text' ) .'</p>';
                        }
                    }
                }
                echo $markup;
            }
        ?>
    </div><!-- .cover__content -->
    </div><!-- .FlexEmbed-content -->
</div><!-- .cover -->
