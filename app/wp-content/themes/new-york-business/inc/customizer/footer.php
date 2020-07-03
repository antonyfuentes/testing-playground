<?php

/*********************** 
* Footer customization *
***********************/

		$wp_customize->add_section( 'footer_section' , array(
			'title'      => __('Customize Footer', 'new-york-business' ),			
			'description'=> __('Customize footer. Add widgets Go Customizer -> Widgets. Background image, background color, Footer bottom link and background color customization Go Pro version.', 'new-york-business' ),
		    'panel' => 'theme_options',
		) );
		
		// footer section bottom background text
		$wp_customize->add_setting( 'new_york_business_option[footer_section_bottom_text]' , array(
		'default'    => __('A Theme by Ceylon Themes','new-york-business' ),
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('new_york_business_option[footer_section_bottom_text]' , array(
		'label' => __('Footer Bottom Text','new-york-business' ),
		'section' => 'footer_section',
		'type'=>'text',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'new_york_business_option[footer_section_bottom_text]', array(
			'selector' => '.site-info',
		) );			
