<?php
/**
 * Full post archive index for the Page with the archive slug.
 *
 * @package Plain_Log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main archive-index">
	<?php
	while ( have_posts() ) :
		the_post();

		$page_title = get_the_title();

		if ( '' === trim( $page_title ) ) {
			$page_title = __( 'Archive', 'plain-log' );
		}
		?>

		<header class="archive-header">
			<h1 class="archive-title"><?php echo esc_html( $page_title ); ?></h1>
		</header>

		<?php
		$archive_query = new WP_Query(
			array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'posts_per_page'      => -1,
				'orderby'             => 'date',
				'order'               => 'DESC',
				'ignore_sticky_posts' => true,
			)
		);
		?>

		<?php if ( $archive_query->have_posts() ) : ?>
			<?php
			$current_year = '';

			while ( $archive_query->have_posts() ) :
				$archive_query->the_post();

				$post_year      = get_the_date( 'Y' );
				$post_date      = get_the_date( 'Y-m-d' );
				$post_date_text = get_the_date( 'm-d' );
				$post_title     = get_the_title();

				if ( '' === trim( $post_title ) ) {
					$post_title = __( 'Untitled', 'plain-log' );
				}

				if ( $post_year !== $current_year ) :
					if ( '' !== $current_year ) :
						?>
						</section>
						<?php
					endif;

					$current_year = $post_year;
					?>
					<section class="year-group" aria-labelledby="archive-index-year-<?php echo esc_attr( $post_year ); ?>">
						<h2 id="archive-index-year-<?php echo esc_attr( $post_year ); ?>" class="year-title"><?php echo esc_html( $post_year ); ?></h2>
				<?php endif; ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-entry' ); ?>>
					<time class="archive-entry-date" datetime="<?php echo esc_attr( $post_date ); ?>"><?php echo esc_html( $post_date_text ); ?></time>

					<div class="archive-entry-content">
						<h3 class="archive-entry-title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post_title ); ?></a>
						</h3>
					</div>
				</article>
			<?php endwhile; ?>

			</section>
		<?php else : ?>
			<p><?php esc_html_e( 'No posts found.', 'plain-log' ); ?></p>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>
	<?php endwhile; ?>
</main>

<?php
get_footer();
