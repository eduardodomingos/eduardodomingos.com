<?php
/**
 * Returns the URL of the post 16:9 featured image
 *
 * @package Eduardo Domingos
 * @since 0.1.0
 * @author Eduardo Domingos
 * @param $post_id
 *
 * @return photo url
 *
 */
function eduardodomingos_get_featured_photo_url($post_id = false) {

    $url = '';

    if ( ! $post_id ) {
        global $post;
        $post_id = $post->ID;
    }


    $image = get_field( 'featured_image_16x9', $post_id );

    if( !empty( $image ) ){

        $url = $image['url'];

    }

    return $url;
}
