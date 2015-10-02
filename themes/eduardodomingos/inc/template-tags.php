<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Eduardo_Domingos
 */

if ( ! function_exists( 'eduardodomingos_posted_on_by' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function eduardodomingos_posted_on_by() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'eduardodomingos' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'eduardodomingos' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'eduardodomingos_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function eduardodomingos_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'eduardodomingos' ) );
		if ( $categories_list && eduardodomingos_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'eduardodomingos' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'eduardodomingos' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'eduardodomingos' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'eduardodomingos' ), esc_html__( '1 Comment', 'eduardodomingos' ), esc_html__( '% Comments', 'eduardodomingos' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'eduardodomingos' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

if ( ! function_exists( 'eduardodomingos_get_project_type' ) ) :
/**
 * Return HTML with formatted project type taxonomy.
 */
function eduardodomingos_get_project_type($project_id) {
    if ( 'project' === get_post_type() ) {
        $terms_list = get_the_term_list( $project_id, 'project-type', '', esc_html__( ', ', 'eduardodomingos') );
        if ( $terms_list ) {
            return sprintf( '<span class="cat-links">' . esc_html__( '%1$sPosted in%2$s %3$s', 'eduardodomingos' ) . '</span>', '<span class="hide">','</span>', $terms_list ); // WPCS: XSS OK.
        }
    }
}
endif;

if ( ! function_exists( 'eduardodomingos_get_project_date' ) ) :
/**
 * Return HTML with formatted project start and end dates.
 */
function eduardodomingos_get_project_date($projct_id) {
    if ( 'project' === get_post_type() ) {
        $start_date = DateTime::createFromFormat('Ymd', get_field('start_date',$projct_id));
        $start_date = $start_date->format('M Y');
        $end_date = DateTime::createFromFormat('Ymd', get_field('end_date',$projct_id));
        $end_date = $end_date->format('M Y');
        if ( strcmp($start_date, $end_date) !== 0 ) {
            // Diferent MY
            $date = $start_date . ' - ' . $end_date;
            return sprintf(esc_html__( '%1$sDeveloped between%2$s %3$s', 'eduardodomingos' ), '<span class="hide">','</span>', $date );
        }
        else {
            // Same MY
            return sprintf(esc_html__( '%1$sDeveloped on%2$s %3$s', 'eduardodomingos' ), '<span class="hide">','</span>', $end_date );
        }
    }
}
endif;

if ( ! function_exists( 'eduardodomingos_get_post_category' ) ) :
/**
 * Return HTML with formatted post categories list.
 */
function eduardodomingos_get_post_category() {
    if ( 'post' === get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'eduardodomingos' ) );
        if ( $categories_list ) {
            return sprintf( '<span class="cat-links">' . esc_html__( '%1$sPosted in%2$s %3$s', 'eduardodomingos' ) . '</span>', '<span class="hide">', '</span>', $categories_list ); // WPCS: XSS OK.
        }
    }
}
endif;

if ( ! function_exists( 'eduardodomingos_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function eduardodomingos_posted_on() {
    $time_string = '<time class="entry-date published updated timeago" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published timeago" datetime="%1$s">%2$s</time><time class="updated timeago" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( 'c' ) ),
        esc_html( get_the_modified_date() )
    );

    $posted_on = sprintf(
        esc_html_x( '%1$sPosted on%2$s %3$s', 'post date', 'eduardodomingos' ),
        '<span class="hide">',
        '</span>',
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    return '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function eduardodomingos_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'eduardodomingos_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'eduardodomingos_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so eduardodomingos_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so eduardodomingos_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in eduardodomingos_categorized_blog.
 */
function eduardodomingos_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'eduardodomingos_categories' );
}
add_action( 'edit_category', 'eduardodomingos_category_transient_flusher' );
add_action( 'save_post',     'eduardodomingos_category_transient_flusher' );
