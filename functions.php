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

/**
 * Set the number of posts shown by the front-page posts index.
 *
 * @param WP_Query $query The WordPress query instance.
 */
function plain_log_home_posts_per_page( $query ) {
	if (
		is_admin()
		|| ! $query->is_main_query()
		|| ! $query->is_home()
		|| $query->is_feed()
		|| ( defined( 'REST_REQUEST' ) && REST_REQUEST )
	) {
		return;
	}

	$query->set( 'posts_per_page', 20 );
}
add_action( 'pre_get_posts', 'plain_log_home_posts_per_page' );
