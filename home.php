<?php
/**
 * Posts home chronological index.
 *
 * @package Plain_Log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main home-index">
	<h1 class="screen-reader-text"><?php esc_html_e( 'Posts', 'plain-log' ); ?></h1>

	<?php if ( have_posts() ) : ?>
		<?php
		$current_year = '';

		while ( have_posts() ) :
			the_post();

			$post_year      = get_the_date( 'Y' );
			$post_date      = get_the_date( 'Y-m-d' );
			$post_date_text = get_the_date( 'm-d' );
			$post_title     = get_the_title();
			$categories     = get_the_category();
			$category       = ! empty( $categories ) ? $categories[0] : null;
			$category_url   = $category ? get_category_link( $category->term_id ) : '';

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
				<section class="year-group" aria-labelledby="year-<?php echo esc_attr( $post_year ); ?>">
					<h2 id="year-<?php echo esc_attr( $post_year ); ?>" class="year-title"><?php echo esc_html( $post_year ); ?></h2>
			<?php endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'home-entry' ); ?>>
				<time class="home-entry-date" datetime="<?php echo esc_attr( $post_date ); ?>"><?php echo esc_html( $post_date_text ); ?></time>

				<div class="home-entry-content">
					<h3 class="home-entry-title">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post_title ); ?></a>
					</h3>

					<?php if ( $category && ! is_wp_error( $category_url ) ) : ?>
						<p class="home-entry-category">
							<a href="<?php echo esc_url( $category_url ); ?>"><?php echo esc_html( $category->name ); ?></a>
						</p>
					<?php endif; ?>
				</div>
			</article>
		<?php endwhile; ?>

		</section>

		<?php
		$newer_posts_link = get_previous_posts_link( __( '← Newer', 'plain-log' ) );
		$older_posts_link = get_next_posts_link( __( 'Older →', 'plain-log' ) );
		?>

		<?php if ( $newer_posts_link || $older_posts_link ) : ?>
			<nav class="home-pagination" aria-label="<?php esc_attr_e( 'Posts pagination', 'plain-log' ); ?>">
				<?php if ( $newer_posts_link ) : ?>
					<span class="home-pagination-newer"><?php echo wp_kses_post( $newer_posts_link ); ?></span>
				<?php endif; ?>

				<?php if ( $older_posts_link ) : ?>
					<span class="home-pagination-older"><?php echo wp_kses_post( $older_posts_link ); ?></span>
				<?php endif; ?>
			</nav>
		<?php endif; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No posts yet.', 'plain-log' ); ?></p>
	<?php endif; ?>
</main>

<?php
get_footer();
