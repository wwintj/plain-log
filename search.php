<?php
/**
 * Search results template.
 *
 * @package Plain_Log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$search_term = trim( get_search_query( false ) );

get_header();
?>

<main id="primary" class="site-main search-results-index">
	<header class="archive-header">
		<h1 class="archive-title"><?php esc_html_e( 'Search', 'plain-log' ); ?></h1>
		<?php get_search_form(); ?>
	</header>

	<?php if ( '' === $search_term ) : ?>
		<p><?php esc_html_e( 'Enter a search term.', 'plain-log' ); ?></p>
	<?php elseif ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();

			$post_date      = get_the_date( 'Y-m-d' );
			$post_date_text = get_the_date( 'm-d' );
			$post_title     = get_the_title();
			$categories     = get_the_category();
			$category       = ! empty( $categories ) ? $categories[0] : null;
			$category_url   = $category ? get_category_link( $category->term_id ) : '';

			if ( '' === trim( $post_title ) ) {
				$post_title = __( 'Untitled', 'plain-log' );
			}
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'search-result' ); ?>>
				<time class="search-result-date" datetime="<?php echo esc_attr( $post_date ); ?>"><?php echo esc_html( $post_date_text ); ?></time>

				<div class="search-result-content">
					<h2 class="search-result-title">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post_title ); ?></a>
					</h2>

					<?php if ( $category && ! is_wp_error( $category_url ) ) : ?>
						<p class="search-result-category">
							<a href="<?php echo esc_url( $category_url ); ?>"><?php echo esc_html( $category->name ); ?></a>
						</p>
					<?php endif; ?>
				</div>
			</article>
		<?php endwhile; ?>

		<?php
		$newer_posts_link = get_previous_posts_link( __( '← Newer', 'plain-log' ) );
		$older_posts_link = get_next_posts_link( __( 'Older →', 'plain-log' ) );
		?>

		<?php if ( $newer_posts_link || $older_posts_link ) : ?>
			<nav class="search-pagination" aria-label="<?php esc_attr_e( 'Search pagination', 'plain-log' ); ?>">
				<?php if ( $newer_posts_link ) : ?>
					<span class="search-pagination-newer"><?php echo wp_kses_post( $newer_posts_link ); ?></span>
				<?php endif; ?>

				<?php if ( $older_posts_link ) : ?>
					<span class="search-pagination-older"><?php echo wp_kses_post( $older_posts_link ); ?></span>
				<?php endif; ?>
			</nav>
		<?php endif; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No results.', 'plain-log' ); ?></p>
	<?php endif; ?>
</main>

<?php
get_footer();
