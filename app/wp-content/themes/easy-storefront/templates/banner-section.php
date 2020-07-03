<section id="top-banner">
	<div>
		<?php 
		$easy_storefront_settings = new new_york_business_settings();
		$easy_storefront_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $easy_storefront_settings->default_data()); 

		$easy_storefront_banner = $easy_storefront_option['top_banner_page'];
		if($easy_storefront_banner != 0 ) {
	
			$easy_storefront_args = array( 'post_type' => 'page','ignore_sticky_posts' => 1 , 'post__in' => array($easy_storefront_banner));
			$easy_storefront_result = new WP_Query($easy_storefront_args);
			while ( $easy_storefront_result->have_posts() ) :
				$easy_storefront_result->the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
		}
		 ?>
	</div>
</section> 

