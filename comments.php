<?php
/**
 * Comments template.
 *
 * @package Plain_Log
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}

$comment_count = get_comments_number();
$comments_title = sprintf(
	/* translators: %s: Number of comments. */
	_n( '%s comment', '%s comments', $comment_count, 'plain-log' ),
	number_format_i18n( $comment_count )
);
?>

<section id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title"><?php echo esc_html( $comments_title ); ?></h2>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 0,
				)
			);
			?>
		</ol>

		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php
	if ( comments_open() ) {
		comment_form(
			array(
				'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
				'title_reply_after'  => '</h2>',
			)
		);
	}
	?>
</section>
