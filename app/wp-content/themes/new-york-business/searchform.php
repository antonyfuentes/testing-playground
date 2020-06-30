<?php
/**
 * Template for displaying search forms in new-york-business
 *
 * @package new-york-business
 * @since 1.0

 */

?>

<?php $new_york_business_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr($new_york_business_id); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'new-york-business' ); ?></span>
	</label>
	<input type="search" id="main-search-form" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'new-york-business' ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo new_york_business_get_fo( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'new-york-business' ); ?></span></button>
</form>
