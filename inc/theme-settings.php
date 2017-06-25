<?php
/**
 * Check and setup theme's default settings
 *
 * @package pedamuse
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$pedamuse_posts_index_style = get_theme_mod( 'pedamuse_posts_index_style' );
	if ( '' == $pedamuse_posts_index_style ) {
		set_theme_mod( 'pedamuse_posts_index_style', 'default' );
	}

	// Sidebar position.
	$pedamuse_sidebar_position = get_theme_mod( 'pedamuse_sidebar_position' );
	if ( '' == $pedamuse_sidebar_position ) {
		set_theme_mod( 'pedamuse_sidebar_position', 'right' );
	}

	// Container width.
	$pedamuse_container_type = get_theme_mod( 'pedamuse_container_type' );
	if ( '' == $pedamuse_container_type ) {
		set_theme_mod( 'pedamuse_container_type', 'container' );
	}

	// Blog type.
	$pedamuse_blog_type = get_theme_mod( 'pedamuse_blog_type' );
	if ( '' == $pedamuse_blog_type ) {
		set_theme_mod( 'pedamuse_blog_type', 'normal' );
	}
}
