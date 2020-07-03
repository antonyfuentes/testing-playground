<?php
//override parent theme default font
function new_york_business_custom_fonts_css(){

    $header_font =  wp_strip_all_tags(get_theme_mod( 'header_fontfamily', 'Google Sans')) ;
	$body_font =  wp_strip_all_tags(get_theme_mod('body_fontfamily', 'Lora'));
	$header_background =  wp_strip_all_tags(get_theme_mod('header_background', '#ffffff'));
    $css = '
	
	.site-header-background {
		background-color:'.$header_background.';
	}
	
	h1, h2, h3, h4, h5, h6,
	.start-button,
	.testimonial-title,
	#main_Carousel .slider-title,
	.site-title a,
	.sub-header .title {
		font-family:"'.$header_font.'",sans serif;
	}
	
	html {
		font-family:"'.$body_font.'",sans serif;
	}
	
	.main-navigation {
		font-family:"'.$header_font.'",sans serif;
	}
	
	.site-title, .custom-fonts .testimonial-title {
		font-family:"'.$header_font.'",sans serif;
	}
	
	#main_Carousel .slider-title {
		font-family:"'.$header_font.'",sans serif;
	}

	';

	return $css;

}

