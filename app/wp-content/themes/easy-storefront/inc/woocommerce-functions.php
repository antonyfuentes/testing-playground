<?php

/*
 * display woocomemrce categories as menu
 */
if (!class_exists('WooCommerce')) return;

class easy_storefront_product_navigation_widget extends WC_Widget {

		function __construct() {
				
				$this->widget_cssclass    = 'woocommerce product_navigation_widget';
				$this->widget_description = __( 'Display product navigation through categories.', 'easy-storefront' );
				$this->widget_id          = 'easy_storefront_product_nav_widget';
				$this->widget_name        = __( 'THEME: Product Navigation', 'easy-storefront' );
		
				parent::__construct();				
		}

		public function widget($args, $instance) {
		
						
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 20;

				echo $args['before_widget'];
				
				//generate widget front end
				easy_storefront_product_navigation("", $max_items);

				echo $args['after_widget'];
										


		}

		public function form($instance) {
				$max_items = (!empty($instance['max_items'])) ? absint($instance['max_items']) : 20;
		?>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('max_items')); ?>"><?php esc_html_e('Max Items to Show:', 'easy-storefront'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('max_items')); ?>" name="<?php echo esc_attr($this->get_field_name('max_items')); ?>" type="number" value="<?php echo esc_attr($max_items); ?>" />
		</p>

		<?php
		}

		// Updating widget replacing old instances with new
		public function update($new_instance, $old_instance) {
				$instance = array();
				$instance['max_items'] = (!empty($new_instance['max_items'])) ? absint($new_instance['max_items']) : '';
				return $instance;
		}
} // widget ends

function easy_storefront_product_navigation_widget() {
		register_widget('easy_storefront_product_navigation_widget');
}
add_action('widgets_init', 'easy_storefront_product_navigation_widget');



/*
 * Product navigation by categories up to 3 sub categories
 */

function easy_storefront_product_navigation($widget_title, $max_items = 50){
  
  if(!class_exists( 'WooCommerce' ))	return;

  $args = array(
         'taxonomy'     => 'product_cat',
         'orderby'      => 'date',
		 'order'      	=> 'ASC',
         'show_count'   => 1,
         'pad_counts'   => 0,
         'hierarchical' => 1,
         'title_li'     => '',
         'hide_empty'   => 1,
  );
 $all_categories = get_categories( $args );
 $cat_count = 1;
 echo '<div class="product-navigation">'; 	
	 echo '<ul>';
	 if($widget_title){
	 	echo '<li class="navigation-name"><a href="#">'.esc_html($widget_title).'</a></li>';
	 }
	 foreach ($all_categories as $cat) {
		 if($cat_count > $max_items){
			break;
		 }
		 $cat_count++;
		
			if($cat->category_parent == 0) {
				$category_id = $cat->term_id; 
				$args2 = array(
						'taxonomy'     => 'product_cat',
						'child_of'     => 0,
						'parent'       => $category_id,
						'orderby'      => 'name',
						'show_count'   => 1,
						'pad_counts'   => 0,
						'hierarchical' => 1,
						'title_li'     => '',
						'hide_empty'   => 0,
				);
				$sub_cats = get_categories( $args2 );
				
				if($sub_cats) {
				echo '<li class="has-sub"> <a href="'.esc_url(get_term_link($cat->slug, 'product_cat')).'">'.esc_html($cat->name).' ('.absint($cat->count).')</a>';
				echo '<ul>';
					foreach($sub_cats as $sub_category) {
						$sub_category_id = $sub_category->term_id;
						$args3 = array(
								'taxonomy'     => 'product_cat',
								'child_of'     => 0,
								'parent'       => $sub_category_id,
								'orderby'      => 'name',
								'show_count'   => 1,
								'pad_counts'   => 0,
								'hierarchical' => 1,
								'title_li'     => '',
								'hide_empty'   => 0,
						);
						$sub_sub_cats = get_categories( $args3 );
						if($sub_sub_cats) {
						echo '<li class="has-sub"> <a href="'.esc_url(get_term_link($sub_category->slug, 'product_cat')).'">'.esc_html($sub_category->name).' ('.absint($sub_category->count).')</a>';
							echo '<ul>';
								foreach($sub_sub_cats as $sub_sub_cat) {
									echo '<li> <a href="'.esc_url(get_term_link($sub_sub_cat->slug, 'product_cat')).'">'.esc_html($sub_sub_cat->name).' ('.absint($cat->count).')</a>';
								}
							echo '</ul>';						
						} else {
						echo '<li> <a href="'.esc_url(get_term_link($sub_category->slug, 'product_cat')) .'">'.esc_html($sub_category->name).' ('.absint($cat->count).')</a>';
						}
					}
				echo '</ul>'; 
				} else {
					echo '<li> <a href="'.esc_url(get_term_link($cat->slug, 'product_cat')).'">'.esc_html($cat->name).' ('.absint($cat->count).')</a>';
				}
			}		      
	 } /* end for each */
	 echo '</ul>';
 echo '</div>';

} /* end category function */

