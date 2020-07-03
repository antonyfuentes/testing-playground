<?php

/*****************
 * Custom fonts. *
 *****************/

	$wp_customize->add_section( 'font_section' , array(
		'title'      => __('Fonts', 'new-york-business' ),
		'description' => __('500+ google fonts - Go Pro version.', 'new-york-business' ),
		'panel' => 'theme_options',			
	) );
	
	
	$wp_customize->add_setting(
		'header_fontfamily', array(
			'default'           => 'Oswald',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'new_york_business_sanitize_font_family',  
		)
	);
	
	$wp_customize->add_control( 'header_fontfamily' , array(
		'label' => __('Headings Font Family','new-york-business'),
		'section' => 'font_section',
		'type'=>'select',
		'choices'=> new_york_business_font_family(),
	) );
		
	$wp_customize->add_setting(
		'body_fontfamily', array(
			'default'           => 'PT Sans',			
			'transport'         => 'refresh',
			'sanitize_callback' => 'new_york_business_sanitize_font_family',  
		)
	);	

	
	$wp_customize->add_control( 'body_fontfamily' , array(
		'label' => __('Body Font Family', 'new-york-business'),
		'section' => 'font_section',
		'type'=>'select',
		'choices'=> new_york_business_font_family(),
	) );
	
