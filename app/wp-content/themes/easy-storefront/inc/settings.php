<?php

/*
 * default settings 
 */
if( !class_exists('new_york_business_settings') ){
	
	class new_york_business_settings {
	
		function default_data(){
			return array(
					
			'widget_posts' => 1,			
			'blog_sidebar_position' => 'right',		
			'home_header_section_disable' => 1,
			'woocommerce_header_cart_hide' => 0,
			'admin_notice' => -1,
			
			'top_banner_page' => 0,
			'top_widgets' => 'col-sm-12',
								
			
			'header_section_hide_header' => 0,
			'contact_section_address' => '',
			'contact_section_email' => '',
			'contact_section_phone' => '',
			'contact_section_hours' => '',		
			'header_myaccount_link' =>  site_url().'/my-account',
			
			'slider_animation_type' => 'slide', //value not displayed to user
			'slider_in_home_page' => 1,
			'slider_cat' => '',
			'slider_image_height' => 450,
			'slider_button_text' => __("More details",'easy-storefront'),
			'slider_button_url' => "#service",
			'slider_speed' => 4000,			
			'slider_max_items' => 6,
			
			'slider_nav_show' => 1,
			'slider_nav_count' => 15,
			'slider_nav_animation_type' => 'fade',
			'slider_nav_speed' => 3000,			
			'slider_nav_cat' => 0,
			'slider_nav_image_height' => 450,
			'slider_banner_image' => '',
			'slider_banner_show' => 0,
							
			'layout_section_post_one_column' => 0 ,	
			'box_layout' => 0 ,	
	
			'social_facebook_link' => '',
			'social_twitter_link' => '',
			'social_skype_link' => '',
			'social_pinterest_link' => '',
			'social_open_new_tab' => 1,
		
			'contact_section_enable' => 1,			
			'contact_section_description' => '',
			'contact_section_title' => __('Contact us','easy-storefront'),
			'contact_section_background_color' => '#fff',   
			'contact_section_shortcode' => '',
			
			'footer_section_background_color' => '#171717',	
			'footer_section_bottom_background_color' => '#201c1c',
			'footer_section_bottom_color' => '#fff',
			'footer_foreground_color' => '#fff',		
            'footer_section_bottom_text' =>  __('A Theme by Ceylon Themes','easy-storefront'),			
					
			);
		}
	}	

}

