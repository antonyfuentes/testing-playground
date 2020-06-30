<?php

/* Slider Settings */

		$wp_customize->add_section( 'slider_nav_section' , array(
			'title'      => __('Product Slider, Navigation & Banner', 'easy-storefront' ),			
			'description'=> __('Display a product slider and product categories in front page template. Slider, navigation widget and more options, Go Pro version.', 'easy-storefront' ),
			'panel' => 'theme_options',
			'priority'   => 40
		) );
		
		$wp_customize->add_setting( 'new_york_business_option[slider_nav_show]' , array(
		'default'    => 1,
		'sanitize_callback' => 'new_york_business_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('new_york_business_option[slider_nav_show]' , array(
		'label' => __('Show Home Product Slider and Navigation','easy-storefront' ),
		'section' => 'slider_nav_section',
		'type'=>'checkbox',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'new_york_business_option[slider_nav_show]', array(
			'selector' => '#slider-nav-section .container',
		) );
							
		// navigation count
		$wp_customize->add_setting( 'new_york_business_option[slider_nav_count]' , array(
		'default'    => 12,
		'sanitize_callback' => 'absint',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_nav_count]' , array(
		'label' => __('Product Categories to show in Navigation','easy-storefront' ),
		'section' => 'slider_nav_section',
		'type'=>'number',
		) );				
	
		// slider animation type
		$wp_customize->add_setting( 'new_york_business_option[slider_nav_animation_type]' , array(
		'default'    => 'fade',
		'sanitize_callback' => 'new_york_business_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_nav_animation_type]' , array(
		'label' => __('Slider Effects','easy-storefront' ),
		'section' => 'slider_nav_section',
		'type'=>'select',
		'choices'=>array(
			'slide'=> __('Slide', 'easy-storefront' ),
			'fade'=> __('Fade', 'easy-storefront' ),
		),
		) );
		
		// slider speed
		$wp_customize->add_setting( 'new_york_business_option[slider_nav_speed]' , array(
		'default'    => 3000,
		'sanitize_callback' => 'new_york_business_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_nav_speed]' , array(
		'label' => __('Slider animation speed(ms)','easy-storefront' ),
		'section' => 'slider_nav_section',
		'type'=>'select',
		'choices'=>array(
			500 => 500,
			1000 => 1000,
			2000 => 2000,
			3000 => 3000,
			4000 => 4000,
			5000 => 5000,
			6000 => 6000,
			7000 => 7000,
			8000 => 8000,
			9000 => 9000,
			10000 => 10000,
			20000 => 20000,
			40000 => 40000,
			80000 => 80000,
			120000 => 120000,
		),
		) );
	
        $wp_customize->add_setting( 'slider_nav_label1', array(
            'default'        => __('Select Posts with featured image','easy-storefront' ),
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new new_york_business_Label_Custom_control( $wp_customize, 'slider_nav_label1', array(
            'label'   => __('Select Products with featured image','easy-storefront' ),
            'section' => 'slider_nav_section',
        ) ) );		
	
	
		// post 1
		$wp_customize->add_setting( 'new_york_business_option[slider_nav_cat]' , array(
		'default'    => 0,
		'sanitize_callback' => 'new_york_business_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_nav_cat]' , array(
		'label' => __('Select Product Category','easy-storefront' ),
		'section' => 'slider_nav_section',
		'type'=>'select',
		'choices'=> new_york_business_get_product_categories(),
		) );
		
		$wp_customize->selective_refresh->add_partial( 'new_york_business_option[slider_nav_cat]', array(
			'selector' => '#slider-nav-section #main_Carousel',
		) );		
		
							
		// height
		$wp_customize->add_setting( 'new_york_business_option[slider_nav_image_height]' , array(
		'default'    => 450,
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_nav_image_height]' , array(
		'label' => __('Slider Height (Max)','easy-storefront' ),
		'section' => 'slider_nav_section',
		'type'=>'number',
		) );
		
		//banner image				
		$wp_customize->add_setting( 'slider_banner_image' , array(
		'default'    => '',
		'sanitize_callback' => 'esc_url_raw'
		));		

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_banner_image', array(
			'label'             => __('Select Banner', 'easy-storefront'),
			'section'           => 'slider_nav_section',
			'settings'          => 'slider_banner_image',
		)));
		
		$wp_customize->selective_refresh->add_partial( 'slider_banner_image', array(
			'selector' => '#slider-nav-section .slider-banner',
		) );		
