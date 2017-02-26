<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Autonomous
 * @since 1.0
 */

/**
 * Gets a nicely formatted string for the published date.
 */
function autonomous_time_link() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		get_the_date( DATE_W3C ),
		get_the_date(),
		get_the_modified_date( DATE_W3C ),
		get_the_modified_date()
	);

	// Wrap the time string in a link, and preface it with 'Posted on'.
	return sprintf(
		/* translators: %s: post date */
		__( '<span class="sr-only">Posted on</span> %s', 'autonomous' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function autonomous_posted_on() {

	// Get the author name; wrap it in a link.
	$byline = sprintf(
		/* translators: %s: post author */
		__( 'by %s', 'autonomous' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>'
	);

	// Finally, let's write all of this to the page.
	echo '<span class="posted-on">' . autonomous_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function autonomous_entry_footer() {
	$separate_meta = __( ', ', 'autonomous' );
	$categories_list = get_the_category_list( $separate_meta );
	$tags_list = get_the_tag_list( '', $separate_meta );
	echo '<footer class="entry-footer">';
	echo '<span class="cat-tags-links">';
	echo '<span class="cat-links"><span class="sr-only">' . __( 'Categories', 'autonomous' ) . '</span>' . $categories_list . '</span>';
	echo '<span class="tags-links"><span class="sr-only">' . __( 'Tags', 'autonomous' ) . '</span>' . $tags_list . '</span>';
	echo '</span>';
	echo '</footer> <!-- .entry-footer -->';
}
