<?php
/**
 * Site footer.
 *
 * @package Plain_Log
 */

$categories_page  = get_page_by_path( 'categories', OBJECT, 'page' );
$categories_url   = '';
$categories_title = '';
$tags_page        = get_page_by_path( 'tags', OBJECT, 'page' );
$tags_url         = '';
$tags_title       = '';

if ( $categories_page instanceof WP_Post && 'publish' === $categories_page->post_status ) {
	$categories_url   = get_permalink( $categories_page );
	$categories_title = get_the_title( $categories_page );

	if ( '' === trim( $categories_title ) ) {
		$categories_title = __( 'Categories', 'plain-log' );
	}
}

if ( $tags_page instanceof WP_Post && 'publish' === $tags_page->post_status ) {
	$tags_url   = get_permalink( $tags_page );
	$tags_title = get_the_title( $tags_page );

	if ( '' === trim( $tags_title ) ) {
		$tags_title = __( 'Tags', 'plain-log' );
	}
}
?>

<footer class="site-footer">
	<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer navigation', 'plain-log' ); ?>">
		<ul class="footer-menu">
			<?php if ( $categories_url ) : ?>
				<li><a href="<?php echo esc_url( $categories_url ); ?>"><?php echo esc_html( $categories_title ); ?></a></li>
			<?php endif; ?>

			<?php if ( $tags_url ) : ?>
				<li><a href="<?php echo esc_url( $tags_url ); ?>"><?php echo esc_html( $tags_title ); ?></a></li>
			<?php endif; ?>

			<li><a href="<?php echo esc_url( get_bloginfo( 'rss2_url' ) ); ?>">RSS</a></li>
		</ul>
	</nav>
</footer>

<?php wp_footer(); ?>
</body>
</html>
