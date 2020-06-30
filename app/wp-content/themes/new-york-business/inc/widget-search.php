<?php

// Register and load the widget
function new_york_business_product_search_widget() {
	register_widget( 'new_york_business_product_search_widget' );
}
add_action( 'widgets_init', 'new_york_business_product_search_widget' );

// Creating the widget 
class new_york_business_product_search_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'new_york_business_product_search_widget', 

// Widget name will appear in UI
__('Product Search Widget', 'new-york-business'), 

// Widget description
array( 'description' => __( 'Display Product categories with a search box', 'new-york-business' ), ) 
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = ( ! empty( $instance['title'] ) ) ? strip_tags( apply_filters( 'widget_title', $instance['title'] ) ) : '';
if($title) {
	echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
}
// This run the code and display the output
?>

<div id="search-category">
<form class="search-box" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
  <div class="search-categories">
	<div class="search-cat">
		<select class="category-items" name="product_cat" >
			<option value="0"><?php esc_html_e('All Categories','new-york-business'); ?></option>
			<?php
			$args = array(
				 'taxonomy'     => 'product_cat',
				 'orderby'      => 'date',
				 'order'      => 'ASC',
				 'show_count'   => 1,
				 'pad_counts'   => 0,
				 'hierarchical' => 1,
				 'title_li'     => '',
				 'hide_empty'   => 1,
			);
			$all_categories = get_categories( $args );
			foreach ($all_categories as $cat) {
				echo '<option value="'.esc_html($cat->slug).'">'.esc_html($cat->name).'</option>';
			}
			?>
		</select>
	</div>
  </div>
  <label class="screen-reader-text" for="woocommerce-product-search-field"><?php esc_html_e('Search for','new-york-business'); ?></label>
  <input type="search" name="s" id="text-search" value="" placeholder="<?php esc_attr_e('Search Products...', 'new-york-business'); ?>">
  <button id="btn-search-category" type="submit"><span class="fa icon fa-search"></span></button>
  <input type="hidden" name="post_type" value="product">
</form>
</div>

<?php

}
		
// Widget Backend 
public function form( $instance ) {
$title = ( ! empty( $instance['title'] ) ) ? strip_tags( apply_filters( 'widget_title', $instance['title'] ) ) : '';
// Widget admin form
?>

<p>
<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','new-york-business' ); ?></label> 
<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
	return $instance;
 }
} 

