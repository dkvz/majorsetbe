<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Major_Set_Be
 */

// The amount of custom backgrounds configured
// in _body.scss (used to pick one at random):
define('BG_COUNT', 4);

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function major_set_be_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	} elseif ( ! in_array( 'page-template-blog-php', $classes ) ) {
		// <- Checks that this isn't my custom blog page
		// TODO: I don't think they do but check that the non-enabled
		// bg classes don't cause image preloading.
		// Add a custom background here:
		$classes[] = 'bg' . rand(1, BG_COUNT);
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'major_set_be_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function major_set_be_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'major_set_be_pingback_header' );
