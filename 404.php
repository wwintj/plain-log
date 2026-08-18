<?php
/**
 * 404 template.
 *
 * @package Plain_Log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

status_header( 404 );

$archive_page = get_page_by_path( 'archive', OBJECT, 'page' );
$archive_url  = $archive_page ? get_permalink( $archive_page ) : '';

if ( ! $archive_url ) {
	$archive_url = home_url( '/archive/' );
}

get_header();
?>

<main id="primary" class="site-main">
	<section aria-labelledby="not-found-title">
		<header class="archive-header">
			<h1 id="not-found-title" class="archive-title">404</h1>
		</header>

		<p><?php esc_html_e( 'Page not found.', 'plain-log' ); ?></p>
		<?php get_search_form(); ?>
		<p><a class="utility-link" href="<?php echo esc_url( $archive_url ); ?>"><?php esc_html_e( 'Archive', 'plain-log' ); ?></a></p>
	</section>
</main>

<?php
get_footer();
