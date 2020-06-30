<?php

/* Slider Settings */

		$wp_customize->add_section( 'slider_section' , array(
			'title'      => __('Home Featured Slider', 'new-york-business' ),			
			'description'=> __('Slider widget and 20+ Widgets, Go Pro version.', 'new-york-business' ),
			'panel' => 'theme_options',
		) );
		
		$wp_customize->add_setting( 'new_york_business_option[slider_in_home_page]' , array(
		'default'    => 1,
		'sanitize_callback' => 'new_york_business_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('new_york_business_option[slider_in_home_page]' , array(
		'label' => __('Enable home slider','new-york-business' ),
		'section' => 'slider_section',
		'type'=>'checkbox',
		) );		
	
		// slider animation type
		$wp_customize->add_setting( 'new_york_business_option[slider_animation_type]' , array(
		'default'    => 'slide',
		'sanitize_callback' => 'new_york_business_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_animation_type]' , array(
		'label' => __('Slider Effects','new-york-business' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=>array(
			'slide'=> __('Slide', 'new-york-business' ),
			'fade'=> __('Fade', 'new-york-business' ),
		),
		) );
		
		// slider speed
		$wp_customize->add_setting( 'new_york_business_option[slider_speed]' , array(
		'default'    => 4000,
		'sanitize_callback' => 'new_york_business_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_speed]' , array(
		'label' => __('Slider animation speed(ms)','new-york-business' ),
		'section' => 'slider_section',
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
	
	
		// service button title
		$wp_customize->add_setting( 'new_york_business_option[slider_button_text]' , array(
		'default'    => __('More details','new-york-business' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_button_text]' , array(
		'label' => __('Featured Button text','new-york-business' ),
		'section' => 'slider_section',
		'type'=>'text',
		) );		
		
	
        $wp_customize->add_setting( 'slider_label1', array(
            'default'        => __('Select Posts with featured image','new-york-business' ),
			'sanitize_callback' => 'sanitize_text_field',
        ) );

        $wp_customize->add_control( new new_york_business_Label_Custom_control( $wp_customize, 'slider_label1', array(
            'label'   => __('Select post with featured image','new-york-business' ),
            'section' => 'slider_section',
        ) ) );		
	
		//posts  object
		global $new_york_business_all_posts;
	
		// post 1
		$wp_customize->add_setting( 'new_york_business_option[slider_cat]' , array(
		'default'    => '',
		'sanitize_callback' => 'new_york_business_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_cat]' , array(
		'label' => __('Select Category','new-york-business' ),
		'section' => 'slider_section',
		'type'=>'select',
		'choices'=> new_york_business_get_post_categories(),
		) );
		
		$wp_customize->selective_refresh->add_partial( 'new_york_business_option[slider_cat]', array(
			'selector' => '#main_Carousel .carousel-caption',
		) );
		
					
		// height
		$wp_customize->add_setting( 'new_york_business_option[slider_image_height]' , array(
		'default'    => 500,
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[slider_image_height]' , array(
		'label' => __('Slider Height (Max)','new-york-business' ),
		'section' => 'slider_section',
		'type'=>'number',
		) );		
