<?php
/**
 * Search landing Page template.
 *
 * @package Plain_Log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();

		$page_title = get_the_title();

		if ( '' === trim( $page_title ) ) {
			$page_title = __( 'Search', 'plain-log' );
		}
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-entry' ); ?>>
			<header class="single-entry-header">
				<h1 class="single-entry-title"><?php echo esc_html( $page_title ); ?></h1>
			</header>

			<p><?php esc_html_e( 'Enter a search term.', 'plain-log' ); ?></p>
			<?php get_search_form(); ?>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
