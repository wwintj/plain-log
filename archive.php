<?php
/**
 * Core archive template.
 *
 * @package Plain_Log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( is_category() ) {
	$archive_title = single_cat_title( '', false );
} elseif ( is_tag() ) {
	$archive_title = single_tag_title( '', false );
} elseif ( is_year() ) {
	$archive_title = (string) get_query_var( 'year' );
} elseif ( is_month() ) {
	$archive_title = trim( single_month_title( ' ', false ) );
} else {
	$archive_title = wp_strip_all_tags( get_the_archive_title() );
}

if ( '' === trim( $archive_title ) ) {
	$archive_title = __( 'Archives', 'plain-log' );
}

$show_year_headings = ! is_year() && ! is_month();

get_header();
?>

<main id="primary" class="site-main archive-index">
	<header class="archive-header">
		<h1 class="archive-title"><?php echo esc_html( $archive_title ); ?></h1>
	</header>

	<?php if ( have_posts() ) : ?>
		<?php
		$current_year = '';

		while ( have_posts() ) :
			the_post();

			$post_year      = get_the_date( 'Y' );
			$post_date      = get_the_date( 'Y-m-d' );
			$post_date_text = get_the_date( 'm-d' );
			$post_title     = get_the_title();

			if ( '' === trim( $post_title ) ) {
				$post_title = __( 'Untitled', 'plain-log' );
			}

			if ( $show_year_headings && $post_year !== $current_year ) :
				if ( '' !== $current_year ) :
					?>
					</section>
					<?php
				endif;

				$current_year = $post_year;
				?>
				<section class="year-group" aria-labelledby="archive-year-<?php echo esc_attr( $post_year ); ?>">
					<h2 id="archive-year-<?php echo esc_attr( $post_year ); ?>" class="year-title"><?php echo esc_html( $post_year ); ?></h2>
			<?php endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-entry' ); ?>>
				<time class="archive-entry-date" datetime="<?php echo esc_attr( $post_date ); ?>"><?php echo esc_html( $post_date_text ); ?></time>

				<div class="archive-entry-content">
					<?php if ( $show_year_headings ) : ?>
						<h3 class="archive-entry-title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post_title ); ?></a>
						</h3>
					<?php else : ?>
						<h2 class="archive-entry-title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post_title ); ?></a>
						</h2>
					<?php endif; ?>
				</div>
			</article>
		<?php endwhile; ?>

		<?php if ( $show_year_headings ) : ?>
			</section>
		<?php endif; ?>

		<?php
		$newer_posts_link = get_previous_posts_link( __( '← Newer', 'plain-log' ) );
		$older_posts_link = get_next_posts_link( __( 'Older →', 'plain-log' ) );
		?>

		<?php if ( $newer_posts_link || $older_posts_link ) : ?>
			<nav class="archive-pagination" aria-label="<?php esc_attr_e( 'Archive pagination', 'plain-log' ); ?>">
				<?php if ( $newer_posts_link ) : ?>
					<span class="archive-pagination-newer"><?php echo wp_kses_post( $newer_posts_link ); ?></span>
				<?php endif; ?>

				<?php if ( $older_posts_link ) : ?>
					<span class="archive-pagination-older"><?php echo wp_kses_post( $older_posts_link ); ?></span>
				<?php endif; ?>
			</nav>
		<?php endif; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No posts found.', 'plain-log' ); ?></p>
	<?php endif; ?>
</main>

<?php
get_footer();
