<?php
/**
 * Page template.
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
			$page_title = __( 'Untitled', 'plain-log' );
		}
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'single-entry', 'page-entry' ) ); ?>>
			<header class="single-entry-header">
				<h1 class="single-entry-title"><?php echo esc_html( $page_title ); ?></h1>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
				<?php
				wp_link_pages(
					array(
						'before' => sprintf(
							'<nav class="page-links" aria-label="%1$s"><span class="page-links-label">%2$s</span>',
							esc_attr__( 'Page navigation', 'plain-log' ),
							esc_html__( 'Pages:', 'plain-log' )
						),
						'after'  => '</nav>',
					)
				);
				?>
			</div>
		</article>

		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	<?php endwhile; ?>
</main>

<?php
get_footer();
