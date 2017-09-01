<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package pencil
 */

if ( ! function_exists( 'pencil_jetpack_setup' ) ) :
/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function pencil_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'pencil_infinite_scroll_render',
		'footer'    => false,
	) );
} // end function pencil_jetpack_setup
add_action( 'after_setup_theme', 'pencil_jetpack_setup' );
endif;

if ( ! function_exists( 'pencil_infinite_scroll_render' ) ) :
/**
 * Custom render function for Infinite Scroll.
 */
function pencil_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function pencil_infinite_scroll_render
endif;
