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
	load_theme_textdomain( 'plain-log', get_template_directory() . '/languages' );

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
	$stylesheet_path    = get_stylesheet_directory() . '/style.css';
	$stylesheet_version = wp_get_theme()->get( 'Version' );

	if ( is_file( $stylesheet_path ) && is_readable( $stylesheet_path ) ) {
		$modified_time = filemtime( $stylesheet_path );

		if ( false !== $modified_time ) {
			$stylesheet_version = (string) $modified_time;
		}
	}

	wp_enqueue_style(
		'plain-log-style',
		get_stylesheet_uri(),
		array(),
		$stylesheet_version
	);
}
add_action( 'wp_enqueue_scripts', 'plain_log_enqueue_styles' );

/**
 * Enqueue the code-copy enhancement only when the current post needs it.
 */
function plain_log_enqueue_code_copy() {
	if (
		is_admin()
		|| ! is_singular( 'post' )
		|| ( defined( 'REST_REQUEST' ) && REST_REQUEST )
	) {
		return;
	}

	$post = get_queried_object();

	if ( ! ( $post instanceof WP_Post ) || post_password_required( $post ) ) {
		return;
	}

	$content = $post->post_content;

	if ( ! has_block( 'core/code', $content ) && false === stripos( $content, '<pre' ) ) {
		return;
	}

	$script_path    = get_theme_file_path( 'assets/code-copy.js' );
	$script_version = wp_get_theme()->get( 'Version' );

	if ( is_file( $script_path ) && is_readable( $script_path ) ) {
		$modified_time = filemtime( $script_path );

		if ( false !== $modified_time ) {
			$script_version = (string) $modified_time;
		}
	}

	wp_enqueue_script(
		'plain-log-code-copy',
		get_theme_file_uri( 'assets/code-copy.js' ),
		array(),
		$script_version,
		true
	);

	wp_localize_script(
		'plain-log-code-copy',
		'plainLogCodeCopy',
		array(
			'copy'       => __( 'Copy', 'plain-log' ),
			'copied'     => __( 'Copied', 'plain-log' ),
			'copyFailed' => __( 'Copy failed', 'plain-log' ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'plain_log_enqueue_code_copy' );

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

/**
 * Set the number of results shown by the front-end search query.
 *
 * @param WP_Query $query The WordPress query instance.
 */
function plain_log_search_results_per_page( $query ) {
	if (
		is_admin()
		|| ! $query->is_main_query()
		|| ! $query->is_search()
		|| $query->is_feed()
		|| ( defined( 'REST_REQUEST' ) && REST_REQUEST )
	) {
		return;
	}

	$query->set( 'posts_per_page', 20 );
}
add_action( 'pre_get_posts', 'plain_log_search_results_per_page' );
