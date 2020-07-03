<?php
/********************
*  contact Settings *
*********************/

		$wp_customize->add_section( 'header_section' , array(
			'title'      => __('Header', 'new-york-business' ),			
			'description'=>  __('Add contact details to be displayed in top header and contact section and My Account Link', 'new-york-business' ),
			'panel' => 'theme_options',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'new_york_business_option[contact_section_phone]', array(
			'selector' => '.contact-list-top',
		) );	
			
		// contact section header show / hide
		$wp_customize->add_setting( 'new_york_business_option[header_section_hide_header]' , array(
		'default'    => false,
		'sanitize_callback' => 'new_york_business_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[header_section_hide_header]' , array(
		'label' => __('Hide Mini Header','new-york-business' ),
		'section' => 'header_section',
		'type'=>'checkbox',
		) );
		
		// phone
		$wp_customize->add_setting( 'new_york_business_option[contact_section_phone]' , array(
		'default'    => '(0+)123456789',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[contact_section_phone]' , array(
		'label' => __('Phone:','new-york-business' ),
		'section' => 'header_section',
		'type'=>'text',
		) );
		
		
		// address
		$wp_customize->add_setting( 'new_york_business_option[contact_section_address]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[contact_section_address]' , array(
		'label' => __('Address','new-york-business' ),
		'section' => 'header_section',
		'type'=>'text',
		) );

		// email
		$wp_customize->add_setting( 'new_york_business_option[contact_section_email]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_email',
		'type'=>'option'
		));		
		
		$wp_customize->add_control('new_york_business_option[contact_section_email]' , array(
		'label' => __('Email:','new-york-business' ),
		'section' => 'header_section',
		'type'=>'text',
		) );
		
		// Work  Hours:
		$wp_customize->add_setting( 'new_york_business_option[contact_section_hours]' , array(
		'default'    => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));		
		
		$wp_customize->add_control('new_york_business_option[contact_section_hours]' , array(
		'label' => __('Work Hours:','new-york-business' ),
		'section' => 'header_section',
		'type'=>'text',
		) );
				
		//account link		
		$wp_customize->add_setting( 'new_york_business_option[header_myaccount_link]' , array(
		'default'    =>  site_url().'/my-account',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		));	
		
		$wp_customize->add_control('new_york_business_option[header_myaccount_link]' , array(
		'label' => __('My Account Link','new-york-business' ),
		'section' => 'header_section',
		'type'=>'url',
		) );

		
		$wp_customize->selective_refresh->add_partial( 'new_york_business_option[header_myaccount_link]', array(
			'selector' => '.currency-myaccount-section',
		));	
	
	