<?php
/**
 * Search form.
 *
 * @package Plain_Log
 */

$search_field_id = wp_unique_id( 'plain-log-search-field-' );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $search_field_id ); ?>"><?php esc_html_e( 'Search', 'plain-log' ); ?></label>
	<input id="<?php echo esc_attr( $search_field_id ); ?>" class="search-field" type="search" name="s" value="<?php echo esc_attr( get_search_query( false ) ); ?>" required>
	<button class="search-submit" type="submit"><?php esc_html_e( 'Search', 'plain-log' ); ?></button>
</form>
