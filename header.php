<?php
/**
 * Site header.
 *
 * @package Plain_Log
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'plain-log' ); ?></a>

<header class="site-header">
	<p class="site-title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
	</p>

	<nav class="site-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'plain-log' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'primary-menu',
				'fallback_cb'    => 'wp_page_menu',
				'show_home'      => true,
			)
		);
		?>
	</nav>
</header>
