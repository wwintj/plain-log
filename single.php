<?php
/**
 * Single post template.
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

		$post_title     = get_the_title();
		$published_date = get_the_date( 'Y-m-d' );
		$modified_date  = get_the_modified_date( 'Y-m-d' );
		$categories     = get_the_category();
		$category       = ! empty( $categories ) ? $categories[0] : null;
		$category_url   = $category ? get_category_link( $category->term_id ) : '';
		$tags           = get_the_tags();
		$tag_links      = array();
		$previous_post  = get_previous_post( false );
		$next_post      = get_next_post( false );

		if ( '' === trim( $post_title ) ) {
			$post_title = __( 'Untitled', 'plain-log' );
		}

		if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {
			foreach ( $tags as $tag ) {
				$tag_url = get_tag_link( $tag->term_id );

				if ( ! is_wp_error( $tag_url ) ) {
					$tag_links[] = sprintf(
						'<a href="%1$s">%2$s</a>',
						esc_url( $tag_url ),
						esc_html( $tag->name )
					);
				}
			}
		}
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-entry' ); ?>>
			<header class="single-entry-header">
				<h1 class="single-entry-title"><?php echo esc_html( $post_title ); ?></h1>

				<p class="single-entry-meta">
					<?php esc_html_e( 'Published', 'plain-log' ); ?>
					<time datetime="<?php echo esc_attr( $published_date ); ?>"><?php echo esc_html( $published_date ); ?></time>
					<?php if ( $category && ! is_wp_error( $category_url ) ) : ?>
						<span aria-hidden="true"> · </span><a href="<?php echo esc_url( $category_url ); ?>"><?php echo esc_html( $category->name ); ?></a>
					<?php endif; ?>
				</p>

				<?php if ( $modified_date && $modified_date !== $published_date ) : ?>
					<p class="single-entry-meta">
						<?php esc_html_e( 'Updated', 'plain-log' ); ?>
						<time datetime="<?php echo esc_attr( $modified_date ); ?>"><?php echo esc_html( $modified_date ); ?></time>
					</p>
				<?php endif; ?>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php if ( ! empty( $tag_links ) ) : ?>
				<footer class="single-entry-footer">
					<p class="entry-tags">
						<span class="entry-tags-label"><?php esc_html_e( 'Tags:', 'plain-log' ); ?></span>
						<?php echo wp_kses_post( implode( ', ', $tag_links ) ); ?>
					</p>
				</footer>
			<?php endif; ?>
		</article>

		<?php if ( $previous_post || $next_post ) : ?>
			<nav class="post-navigation" aria-label="<?php esc_attr_e( 'Post navigation', 'plain-log' ); ?>">
				<?php if ( $previous_post ) : ?>
					<?php
					$previous_title = get_the_title( $previous_post );

					if ( '' === trim( $previous_title ) ) {
						$previous_title = __( 'Untitled', 'plain-log' );
					}
					?>
					<a rel="prev" href="<?php echo esc_url( get_permalink( $previous_post ) ); ?>" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: Previous post title. */ __( 'Previous: %s', 'plain-log' ), $previous_title ) ); ?>">← <?php echo esc_html( $previous_title ); ?></a>
				<?php endif; ?>

				<?php if ( $next_post ) : ?>
					<?php
					$next_title = get_the_title( $next_post );

					if ( '' === trim( $next_title ) ) {
						$next_title = __( 'Untitled', 'plain-log' );
					}
					?>
					<a rel="next" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: Next post title. */ __( 'Next: %s', 'plain-log' ), $next_title ) ); ?>"><?php echo esc_html( $next_title ); ?> →</a>
				<?php endif; ?>
			</nav>
		<?php endif; ?>
	<?php endwhile; ?>
</main>

<?php
get_footer();
