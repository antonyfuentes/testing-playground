<?php
/**
 * Template for displaying search forms in easy-storefront
 *
 * @package easy-storefront
 * @since 1.0

 */

?>

<?php $easy_storefront_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr($easy_storefront_id); ?>">
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'easy-storefront' ); ?></span>
	</label>
	<input type="search" id="main-search-form" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'easy-storefront' ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s"  />
	<button type="submit" class="search-submit"><?php echo new_york_business_get_fo( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'easy-storefront' ); ?></span></button>
</form>
