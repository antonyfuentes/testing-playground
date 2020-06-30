<?php
/**
 * Custom template tags for this theme
 * @package new-york-business
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
 
if ( ! function_exists( 'new_york_business_featured_areas' ) ) : 
/**
 * new-york-business featured areas
 */
 
function new_york_business_featured_areas(){
	return  array(
				'slider'=>__('Home Slider', 'new-york-business'),
				'banner'=>__('Banner', 'new-york-business'),
				'featured-product'=>__('Featured Products', 'new-york-business'),
				'onsale-product'=>__('Onsale Products', 'new-york-business'),
				'shop'=>__('Home Shop', 'new-york-business'),
				'bestselling-product'=>__('Best Selling Products', 'new-york-business'),
				'toprated-product'=>__('Top Rated Products', 'new-york-business'),				
				'service'=>__('Service', 'new-york-business'),
				'news'=>__('News~Events', 'new-york-business'),
				'team'=>__('Team', 'new-york-business'),
				'testimonial'=>__('Testimonial', 'new-york-business'),
				'none'=>__('-- Disable --', 'new-york-business')
			);
}

endif;

if ( ! function_exists( 'new_york_business_color_codes' ) ) : 
/**
 * new-york-business color codes
 */
 
function new_york_business_color_codes(){
	return array('#000000','#ffffff','#ED0A70','#e7ad24','#FFD700','#81d742','#0053f9','#8224e3');
}

endif;

if ( ! function_exists( 'new_york_business_background_style' ) ) : 
/**
 * new-york-business color codes
 */
 
function new_york_business_background_style(){
	return array(
					'no-repeat'  => __('No Repeat', 'new-york-business'),
					'repeat'     => __('Tile', 'new-york-business'),
					'repeat-x'   => __('Tile Horizontally', 'new-york-business'),
					'repeat-y'   => __('Tile Vertically', 'new-york-business'),
				);
}

endif;

/**
 * @package twentyseventeen
 * @sub-package new-york-business
 * @since 1.0
 */ 
if ( ! function_exists( 'new_york_business_posted_on' ) ) : 
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function new_york_business_posted_on() {
		
		$byline = sprintf(
			// Get the author name; wrap it in a link.
			esc_html_x( 'By %s', 'post author', 'new-york-business' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);		

		// Finally, let's write all of this to the page.
		echo '<span class="posted-on">' . new_york_business_time_link() . '</span><span class="byline"> ' . $byline . '</span>';
	}
endif;

/**
 * @package twentyseventeen
 * @sub-package new-york-business
 * @since 1.0
 */ 
if ( ! function_exists( 'new_york_business_time_link' ) ) :
	/**
	 * Gets a nicely formatted string for the published date.
	 */
	function new_york_business_time_link() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			get_the_date( DATE_W3C ),
			get_the_date(),
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);

		$args = array( 'time'=> array('class'=> array(),'datetime'=>array()));
		
		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
			/* translators: %s: post date */
			__( '<span class="screen-reader-text">%1$s</span> %2$s', 'new-york-business'),
			esc_html__('Posted on', 'new-york-business'),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' .wp_kses($time_string, $args). '</a>'
		);
	}
endif;

/**
 * @package twentyseventeen
 * @sub-package new-york-business
 * @since 1.0
 */ 
if ( ! function_exists( 'new_york_business_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function new_york_business_entry_footer() {

	
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'new-york-business') );
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'new-york-business') );
				
		// We don't want to output .entry-footer if it will be empty, so make sure its not.
		if ( ( ( new_york_business_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

			echo '<footer class="entry-footer">';

			if ( 'post' === get_post_type() ) {
				
				if ( ( $categories_list && new_york_business_categorized_blog() ) || $tags_list ) {
					echo '<span class="cat-tags-links">';

					// Make sure there's more than one category before displaying.
					if ( $categories_list && new_york_business_categorized_blog() ) {
						
						echo '<span class="cat-links">' . new_york_business_get_fo( array( 'icon' => 'folder-open' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Categories', 'new-york-business') . '</span>' .$categories_list. '</span>';
					}
					
					if ( $tags_list && ! is_wp_error( $tags_list ) ) {
					
						echo '<span class="tags-links">' . new_york_business_get_fo( array( 'icon' => 'hashtag' ) ) . '<span class="screen-reader-text">' . esc_html__( 'Tags', 'new-york-business') . '</span>' .$tags_list. '</span>';
					}

					echo '</span>';
				}
			}


			new_york_business_edit_link();

			echo '</footer> <!-- .entry-footer -->';
		}
	}
endif;

/**
 * @package twentyseventeen
 * @sub-package new-york-business
 * @since 1.0
 */ 
if ( ! function_exists( 'new_york_business_edit_link' ) ) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 * Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function new_york_business_edit_link() {
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'new-york-business' ),
				esc_html(get_the_title())
			),
			' <span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * @package twentyseventeen
 * @sub-package new-york-business
 * @since 1.0
 * Returns true if a blog has more than 1 category.
 * @return bool
 */
function new_york_business_categorized_blog() {
	$category_count = get_transient( 'new_york_business_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories(
			array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			)
		);

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'new_york_business_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}

/**
 * @package twentyseventeen
 * @sub-package new-york-business
 * @since 1.0
 * Flush out the transients used in new_york_business_categorized_blog.
 */
function new_york_business_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'new_york_business_categories' );
}
add_action( 'edit_category', 'new_york_business_category_transient_flusher' );
add_action( 'save_post', 'new_york_business_category_transient_flusher' );


/* 
 * check valid font has been selected 
 */
function new_york_business_sanitize_font_family( $value ) {
    if ( array_key_exists($value, new_york_business_font_family()) )  {   
    	return $value;
	} else {
		return "Times New Roman, Sans Serif";
	}
}

function new_york_business_font_family(){

	$google_fonts = array(  "Times New Roman" => "Times New Roman, Sans Serif",
							"Open sans" => "Open sans",
							"Roboto" => "Roboto",
							"Lato" => "Lato",
							"Oswald" => "Oswald",
							"Alegreya" => "Alegreya",
							"Dosis" => "Dosis",
							"Montserrat" => "Montserrat",
							"Raleway" => "Raleway",
							"PT Sans" => "PT Sans",
							"Lora" => "Lora",
							"Noto Sans" => "Noto Sans",
							"Concert One" => "Concert One",
							"Nunito Sans" => "Nunito Sans",
							"Oxygen" => "Oxygen",
							"Work Sans" => "Work Sans",
						);
						
	return ($google_fonts);
}


/*********************** woocommerce functions *****************************/

/**
 * Woocommerce Custom add to cart button
 *
 */
if ( ! function_exists( 'new_york_business_add_to_cart' ) ) {
	function new_york_business_add_to_cart( $id = '') {
		
		if(!class_exists( 'WooCommerce' )){return;}
		global $product;
		
		if( $id ) {
			$product = wc_get_product( $id );
		}			

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_type' ) ) {
			$prod_type = $product->get_type();
		} else {
			$prod_type = $product->product_type;
		}

		if ( function_exists( 'method_exists' ) && method_exists( $product, 'get_stock_status' ) ) {
			$prod_in_stock = $product->get_stock_status();
		} else {
			$prod_in_stock = $product->is_in_stock();
		}

		if ( $product ) {
			$args = array();
			$defaults = array(
				'quantity' => 1,
				'class'    => implode(
					' ', array_filter(
						array('button',
							'product_type_' . $prod_type,
							$product->is_purchasable() && $prod_in_stock ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',)
					)
				),
			);

			$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			wc_get_template( 'woocommerce/add-to-cart.php', $args );
		}
	}
}

/* when price empty return 0$ */
function new_york_business_wc_custom_get_price_html( $price, $product ) {
	if(!class_exists( 'WooCommerce' )){return;}
	if ( $product->get_price() == 0 ) {
		if ( $product->is_on_sale() && $product->get_regular_price() ) {
			$regular_price = wc_get_price_to_display( $product, array( 'qty' => 1, 'price' => $product->get_regular_price() ) );
			$price = wc_format_price_range( $regular_price, __( 'Free!', 'new-york-business' ) );
		} else {
			$price = '<span class="amount">' . __( 'Free!', 'new-york-business' ) . '</span>';
		}
	}

	return $price;
}

add_filter( 'woocommerce_get_price_html', 'new_york_business_wc_custom_get_price_html', 10, 2 );

/**
 * Add Cart icon and count to header if WC is active
 */
function new_york_business_wc_cart_count() {
 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	global $woocommerce; 
	?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Cart View', 'new-york-business'); ?>">
	<span class="cart-contents-count fa fa-shopping-bag">&nbsp;(<?php echo esc_html($woocommerce->cart->cart_contents_count); ?>)</span>
    </a> 
    <?php
	
	} 
 
}
add_action( 'new_york_business_woocommerce_cart_top', 'new_york_business_wc_cart_count' );

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function new_york_business_add_to_cart_fragment( $fragments ) {

	if(!class_exists('woocommerce')) return;

	global $woocommerce;
	ob_start();
	?>
    <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Cart View', 'new-york-business'); ?>">
    <span class="cart-contents-count fa fa-shopping-bag">&nbsp;(<?php echo esc_html($woocommerce->cart->cart_contents_count); ?>)&nbsp;</span>
    </a> 
    <?php
	$cart_fragments['a.cart-contents'] = ob_get_clean();
	return $cart_fragments;
	
}
add_filter( 'woocommerce_add_to_cart_fragments', 'new_york_business_add_to_cart_fragment' );

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function new_york_business_wishlist_count( ) {
	$wishlist_count = 0;
	if(function_exists('YITH_WCWL')){
		$wishlist_count = YITH_WCWL()->count_products();
	} else {
		return;
	}
?>
	<a class="wishlist-contents"  href="<?php echo esc_url(home_url( '/wish-list')); ?>" title="<?php esc_attr_e( 'View your whishlist','new-york-business' ); ?>">
	<span class="wishlist-contents-count fa fa-heart">&nbsp;(<?php echo absint($wishlist_count); ?>)&nbsp;</span></a>
	<?php
}

