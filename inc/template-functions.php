<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blackbone
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blackbone_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'blackbone_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blackbone_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'blackbone_pingback_header' );

function bbb_btn_carta() { ?>
	
	<a class="btn--carta" href="<?php the_permalink( PAGE_ID_PEDIDOS ) ?>" title="<?php printf( __( 'Pedir %s', 'bbb' ), get_the_title() ); ?>"><?php _e( 'Pedir', 'bbb' ); ?></a>

<?php }