<?php
/**
 * Theme setup and assets.
 *
 * @package Plain_Log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Theme support and navigation locations.
 */
function plain_log_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'plain-log' ),
		)
	);
}
add_action( 'after_setup_theme', 'plain_log_setup' );

/**
 * Enqueue the Theme stylesheet.
 */
function plain_log_enqueue_styles() {
	wp_enqueue_style(
		'plain-log-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'plain_log_enqueue_styles' );
