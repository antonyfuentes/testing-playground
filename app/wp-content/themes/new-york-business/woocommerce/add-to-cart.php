<?php 
/**
 * Custom add to cart
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_id' ) ) {
	$new_york_business_prod_id = $product->get_id();
} else {
	$new_york_business_prod_id = $product->id;
}

if( function_exists( 'YITH_WCWL' ) ){
$new_york_business_wishlist_url = add_query_arg( 'add_to_wishlist', $product->get_id() );
//otherwise add to cart
echo apply_filters(
	'woocommerce_loop_add_to_cart_link',
	sprintf(
		'<a rel="nofollow" href="%1$s" data-quantity="%2$s" data-product_id="%3$s" data-product_sku="%4$s" class="%5$s btn btn-just-icon btn-simple btn-default" title="%6$s">%6$s</a><a href="%7$s" class="product_add_to_wishlist" title="%8$s">%8$s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $new_york_business_prod_id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_attr( $product->add_to_cart_text() ),
		esc_url( $new_york_business_wishlist_url ),
		esc_html__('Wishlist', 'new-york-business')
	),
	$product
);

} else {
	echo apply_filters(
	'woocommerce_loop_add_to_cart_link',
	sprintf(
		'<a rel="nofollow" href="%1$s" data-quantity="%2$s" data-product_id="%3$s" data-product_sku="%4$s" class="%5$s btn btn-just-icon btn-simple btn-default" title="%6$s">%6$s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $new_york_business_prod_id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_attr( $product->add_to_cart_text() )
	),
	$product
	);
} //end add to cart

 