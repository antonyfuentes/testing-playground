<?php
/**
 * cryptocurrency-exchange Theme Functions
 */

//Crypto Theme URL
define("CRYPTO_THEME_URL", get_template_directory_uri());
define("CRYPTO_THEME_DIR", get_template_directory());

//cryptocurrency-exchange Theme Option Panel CSS and JS Backend
add_action('wp_enqueue_scripts','cryptocurrency_exchange_backend_resources');

//On theme activation add defaults theme settings and data
add_action( 'after_setup_theme', 'cryptocurrency_exchange_default_theme_options_setup' );

//Include Customizer File
require( get_template_directory() . '/include/customizer.php' );
require get_template_directory() . '/custom-edition/upgrade/class-customize.php';

//Tgm Plugin
require( get_template_directory() . '/class-tgm-plugin/class-tgm-plugin-activation.php');

//wordpress Custom header customizer
require get_template_directory() . '/include/custom-header/header_image_customizer.php';

//Add Theme Support Like - featured image, image crop, post format, rss feed
add_theme_support('post-thumbnails');			// featured image
add_theme_support('automatic-feed-links');		//	rss feed

add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// Set the content_width with 900
if ( ! isset( $content_width ) ) $content_width = 900;

function cryptocurrency_exchange_default_theme_options_setup() {
	// Load text domain for translation-ready
    load_theme_textdomain( 'cryptocurrency-exchange', CRYPTO_THEME_DIR . '/languages' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	
	// Custom-header
	add_theme_support( 'custom-header', apply_filters( 'cryptocurrency_exchange_custom_header_args', array(
			'default-text-color'     => 'fff',
			'width'                  => 1920,
			'height'                 => 320,
			'flex-height'            => true,
			'wp-head-callback'       => 'cryptocurrency_exchange_header_style',
	) ) );	
}

/**
 * cryptocurrency-exchange - Load Theme Option Panel CSS and JS Start
 */
function cryptocurrency_exchange_backend_resources(){
	// cryptocurrency-exchange theme css
	
	wp_enqueue_style( 'bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css');
	
	wp_enqueue_style( 'cryptocurrency-exchange-animate-css', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'font-awesome-min-css', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style( 'crypto-flexslider-css', get_template_directory_uri() . '/css/flexslider.css');
	wp_enqueue_style( 'cryptocurrency-exchange-style', get_stylesheet_uri());
	wp_enqueue_style( 'crypto-custom-color', get_template_directory_uri() . '/css/custom-color.css');
	
	//Custom-header css
	wp_enqueue_style( 'crypto-custom-header', get_template_directory_uri() . '/include/custom-header/custom-header.css');
		
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', false );
	wp_enqueue_script('cryptocurrency-exchange-wow-js', get_template_directory_uri() . '/js/wow.js', array('jquery'), array('jquery'), '', false );
	wp_enqueue_script('crypto-flexslider-js', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '', false );
	wp_enqueue_script('cryptocurrency-exchange-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '', false );
}

//cryptocurrency-exchange - Load Theme Option Panel CSS and JS End

//Register area for custom menu
add_action( 'init', 'cryptocurrency_exchange_menu' );
function cryptocurrency_exchange_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu','cryptocurrency-exchange' ) );
	require get_template_directory() . '/include/walker.php';
}
// Include Walker file

/**
 * cryptocurrency-exchange Widgets Start
 */
function cryptocurrency_exchange_theme_widgets() {
	
	// Blog / Page Sidebar Widget
	register_sidebar( array(
		'name' 			=> esc_html__( 'Sidebar Widget', 'cryptocurrency-exchange'),
		'id' 			=> 'sidebar-widget',
		'before_widget' => '<aside id="%1$s" class="widget sidebar-widget widget-color %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	));

	// Footer Widget 1
	register_sidebar( array(
		'name'			=> esc_html__( 'Footer Widget', 'cryptocurrency-exchange'),
		'id'			=> 'footer-widget',
		'description'	=> esc_html__( 'This is footer widget area of the theme', 'cryptocurrency-exchange'),
		'before_widget' => '<aside id="%1$s" class="col-md-4 col-sm-6 col-xs-12 widget %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	));	
	
	register_sidebar( array(
		'name'			=> esc_html__( 'WooCommerce Sidebar Widget Area', 'cryptocurrency-exchange'),
		'id'			=> 'woocommerce',
		'description'	=> esc_html__( 'WooCommerce Sidebar Widget Area', 'cryptocurrency-exchange'),
		'before_widget' => '<aside id="%1$s" class="widget sidebar-widget widget-color %2$s">',
		'after_widget'	=> '</aside>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	));
	
}
add_action('widgets_init', 'cryptocurrency_exchange_theme_widgets');
// crypto Widgets End



//Plugin Recommend
add_action('tgmpa_register','cryptocurrency_exchange_plugin_recommend');
function cryptocurrency_exchange_plugin_recommend(){
	$plugins = array(
		array(
				'name'      => 'Animated Live Wall',
				'slug'      => 'animated-live-wall',
				'required'  => false,
			),
		array(
				'name'      => 'Pricing Table',
				'slug'      => 'abc-pricing-table',
				'required'  => false,
			),
		array(
				'name'      => 'Media Slider (Image , Video, Content Carousal)',
				'slug'      => 'media-slider',
				'required'  => false,
		),
		array(
				'name'      => 'Weather Effect',
				'slug'      => 'weather-effect',
				'required'  => false,
		),
	);
    tgmpa( $plugins );
}