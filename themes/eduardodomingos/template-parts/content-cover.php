<?php
if( get_field( 'cover_image_2x1' ) ) {
    if( eduardodomingos_photon_enabled() ) {
        // Photon enabled, so we go responsive.
        echo '<div class="cover cover--text-center FlexEmbed photon" data-src="'. apply_filters( 'jetpack_photon_url', get_field( 'cover_image_2x1' ) ) .'">';
    }
    else {
        // Photon disabled.
        echo '<div class="cover cover--text-center cover--has-image FlexEmbed" style="background-image: url(\''. get_field( 'cover_image_2x1' ) .'\')">';
    }
}

elseif( get_field( 'cover_pattern', 'option' ) ) {
    echo '<div class="cover cover--text-center FlexEmbed" style="background-image: url(\''. get_field('cover_pattern','option'). '\')">';
}
else {
    echo '<div class="cover cover--text-center FlexEmbed">';
}
?>
    <div class="FlexEmbed-ratio FlexEmbed-ratio--16by9"></div>
    <?php
        if( get_field( 'cover_image_2x1' ) ) {
            $cover_overlay_value = get_field('cover_overlay') ? get_field('cover_overlay') : 0;
            echo '<div class="FlexEmbed-content" style="background-color: rgba(0,0,0,'. $cover_overlay_value .');">';
        }
    ?>
    <div class="cover__content container">
        <?php
        //var_dump(is_front_page());
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
        ?>
    </div><!-- .cover__content -->
    </div><!-- .FlexEmbed-content -->
</div><!-- .cover -->
