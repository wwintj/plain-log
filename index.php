<?php
/**
 * Plain Log fallback template.
 *
 * @package Plain_Log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<?php if ( ! is_singular() ) : ?>
			<h1 class="screen-reader-text"><?php esc_html_e( 'Posts', 'plain-log' ); ?></h1>
		<?php endif; ?>

		<?php
		while ( have_posts() ) :
			the_post();
			$post_title = get_the_title();

			if ( '' === trim( $post_title ) ) {
				$post_title = __( 'Untitled', 'plain-log' );
			}
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<header class="entry-header">
					<?php if ( is_singular() ) : ?>
						<h1 class="entry-title"><?php echo esc_html( $post_title ); ?></h1>
					<?php else : ?>
						<h2 class="entry-title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post_title ); ?></a>
						</h2>
					<?php endif; ?>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<section class="no-results">
			<h1><?php esc_html_e( 'Nothing found.', 'plain-log' ); ?></h1>
		</section>
	<?php endif; ?>
</main>

<?php
get_footer();
