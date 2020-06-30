<?php

/******************** 
*   Social options  *
********************/		

		$wp_customize->add_section( 'social_section' , array(
			'title'      => __('Social', 'new-york-business' ),			
			'description'=> __('Display social icons and links in site header and footer. More social links Go Pro version.', 'new-york-business' ),
			'panel' => 'theme_options',
		) );
		
		
		$wp_customize->add_setting( 'new_york_business_option[social_open_new_tab]' , array(
		'default'    => 1,
		'sanitize_callback' => 'new_york_business_sanitize_checkbox',
		'type'=>'option'
		));
		
		$wp_customize->add_control('new_york_business_option[social_open_new_tab]' , array(
		'label' => __('Open Social Links in New Tab','new-york-business' ),
		'section' => 'social_section',
		'type'=>'checkbox',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'new_york_business_option[social_open_new_tab]', array(
			'selector' => '.mimi-header-social-icon',
		) );


		$wp_customize->add_setting( 'new_york_business_option[social_facebook_link]' , array(
		'default'    => 'facebook.com',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));
		
		$wp_customize->selective_refresh->add_partial( 'new_york_business_option[social_facebook_link]', array(
			'selector' => '#footer-social',
		) );
		
		$wp_customize->add_control('new_york_business_option[social_facebook_link]' , array(
		'label' => __('Facebook Link','new-york-business' ),
		'section' => 'social_section',
		'type'=>'url',
		) );

		$wp_customize->add_setting( 'new_york_business_option[social_twitter_link]' , array(
		'default'    => 'twitter.com',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('new_york_business_option[social_twitter_link]' , array(
		'label' => __('Twitter Link','new-york-business' ),
		'section' => 'social_section',
		'type'=>'url',
		) );


		$wp_customize->add_setting( 'new_york_business_option[social_skype_link]' , array(
		'default'    => 'skype.com',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('new_york_business_option[social_skype_link]' , array(
		'label' => __('Skype Link','new-york-business' ),
		'section' => 'social_section',
		'type'=>'url',
		) );							

		$wp_customize->add_setting( 'new_york_business_option[social_pinterest_link]' , array(
		'default'    => 'pinterest.com',
		'sanitize_callback' => 'esc_url_raw',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('new_york_business_option[social_pinterest_link]' , array(
		'label' => __('Pinterest Link','new-york-business' ),
		'section' => 'social_section',
		'type'=>'url',
		) );		
