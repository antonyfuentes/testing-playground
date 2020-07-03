<?php
/**
 * new-york-business functions and definitions
 *
 * @package new-york-business
 * @since 1.0
 */

/**
 * Theme only works in WordPress 4.8 or later.
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('new_york_business_THEME_NAME','New York Business');
define('new_york_business_THEME_SLUG','new-york-business');
define('new_york_business_THEME_URL','http://www.ceylonthemes.com/product/new-york-business-pro');
define('new_york_business_DEMO_URL','http://www.ceylonthemes.com/new-york-business-demo');
define('new_york_business_THEME_AUTHOR_URL','http://www.ceylonthemes.com');
define('new_york_business_THEME_DOC','https://www.ceylonthemes.com/wp-tutorials/new-york-business-theme-tutorial/');
define('new_york_business_THEME_REVIEW_URL','https://wordpress.org/support/theme/'.new_york_business_THEME_SLUG.'/reviews/');
define('new_york_business_TEMPLATE_DIR',get_template_directory());
define('new_york_business_TEMPLATE_DIR_URI',get_template_directory_uri());

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'new_york_business_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'new_york_business_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function new_york_business_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, new_york_business_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'new_york_business_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function new_york_business_php_not_met_notice() {
	?>
	<div class="notice notice-error is-dismissible" ><p><?php esc_html_e("Can't activate the theme. New York Business Theme requires Minimum PHP version 5.6",'new-york-business'); ?></p></div>
	<?php
}


/**
* Custom settings for this theme.
*/
require get_parent_theme_file_path( '/inc/settings.php' );
//load settings
$new_york_business_default_settings = new new_york_business_settings();
$new_york_business_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $new_york_business_default_settings->default_data());

/**
 * Sets up theme defaults and registers support for various WordPress features.
**/
function new_york_business_setup() {
	/*
	 * Make theme available for translation.
	 */
	
	load_theme_textdomain( 'new-york-business', get_template_directory() . '/languages'  );
	
	if ( ! isset( $content_width ) ) $content_width = 1600; 

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	*/

	$defaults = array(
		'default-color'          => '#fff',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	
	add_theme_support( 'custom-background', $defaults );
	
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	 
	add_theme_support( 'post-thumbnails' );
	
	set_post_thumbnail_size( 200, 200 );

	// This theme uses wp_nav_menu()
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'new-york-business' ),			
		)
	);
	
	// This theme uses wp_nav_menu()
	register_nav_menus(
		array(
			'footer'    => __( 'Footer Menu', 'new-york-business' ),			
		)
	);	
	
				
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);


	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo', array(
			'width'      => 200,
			'height'     => 200,
			'flex-width' => true,
			'flex-height' => true,		
		)
	);
	

	$args = array(
		'width'         => 1600,
		'flex-width'    => true,
		'default-image' => new_york_business_TEMPLATE_DIR_URI.'/images/header.jpg',
		// Header text
		'uploads'         => true,
		'random-default'  => true,	
		'header-text'     => false,
		
	);
	
	add_theme_support( 'custom-header', $args );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
			    'search',
				'categories',
				'archives',
			),

			// Add business info widget to the footer 1 area.
			'footer-sidebar-1' => array(
				'text_about',
			),

			// Put widgets in the footer 2 area.
			'footer-sidebar-2' => array(
				'recent-posts',				
			),
			// Putwidgets in the footer 3 area.
			'footer-sidebar-3' => array(
				'categories',				
			),
			// Put widgets in the footer 4 area.
			'footer-sidebar-4' => array(				
				'search',				
			),
											
		),
		
		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'new-york-business' ),
				'items' => array(
					'link_home', // "home" page is actually a link in case a static front page is not used.
				),
			),
		),
			// Assign a menu to the "footer" location.
			'footer'    => array(
				'name'  => __( 'Footer Menu', 'new-york-business' ),
				'items' => array(
					'link_home', // "home" page is actually a link in case a static front page is not used.
				),
			),		
	);


	/**
	 * Filters new-york-business array of starter content.
	 *
	 * @since new-york-business 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'new_york_business_starter_content', $starter_content );
	 
	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'new_york_business_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * 
 * Priority 0 to make it available to lower priority callbacks.
 *
 * $content_width = $GLOBALS['content_width'];
 */


/**
 * Register custom fonts.
 */
if(!function_exists('new_york_business_fonts_url')){
 
function new_york_business_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by "Open Sans", sans-serif;, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$typography = _x( 'on', 'Open Sans font: on or off', 'new-york-business' );

	if ( 'off' !== $typography ) {
		$font_families = array();
		
		$font_families[] = wp_strip_all_tags(get_theme_mod('header_fontfamily', 'Oxygen')).':300,400,500';
		$font_families[] = wp_strip_all_tags(get_theme_mod('body_fontfamily', 'PT Sans')).':300,400,500';
		
 
		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);
        
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		
	}
   
	return esc_url( $fonts_url );
	}
}

/**
 * Display custom font CSS.
 */
if(!function_exists('new_york_business_fonts_css_container')) { 

	function new_york_business_fonts_css_container() {   
	
		require( get_parent_theme_file_path( '/inc/custom-fonts.php' ) );
	
	?>
		<style type="text/css" id="custom-fonts" >
			<?php echo new_york_business_custom_fonts_css(); ?>
		</style>
	<?php
	}

}
add_action( 'wp_head', 'new_york_business_fonts_css_container' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since new-york-business 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function new_york_business_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'new-york-business-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'new_york_business_resource_hints', 10, 2 );


/* allowed tags */

$new_york_business_allowed_html = array(
		'a'          => array(
			'href'  => true,
			'title' => true,
			'class'  => true,			
		),
		'option'          => array(
			'selected'  => true,
			'value' => true,
			'class'  => true,			
		),		
		'p'          => array(
			'class'  => true,
		),		
		'abbr'       => array(
			'title' => true,
		),
		'acronym'    => array(
			'title' => true,
		),
		'b'          => array(),
		'blockquote' => array(
			'cite' => true,
		),
		'cite'       => array(),
		'code'       => array(),
		'del'        => array(
			'datetime' => true,
		),
		'em'         => array(),
		'i'          => array(),
		'q'          => array(
			'cite' => true,
		),
		's'          => array(),
		'strike'     => array(),
		'strong'     => array(),
	);

/**
* display notice 
**/
if(!function_exists('new_york_business_general_admin_notice')){

	function new_york_business_general_admin_notice(){
			 $msg = sprintf('<div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible" >
					<p><a href=%1$s target="_blank" > %2$s </a>
					<a href=%3$s target="_blank" style="margin-left:5px;">%4$s</a>
					<a href=%5$s target="_blank" >%6$s</a>
					<a href=%7$s target="_blank" >%8$s</a>
					<a href="?new_york_business_notice_dismissed" target="_self" >%9$s</a>
					<span>%10$s</span></p></div>',
					esc_url(new_york_business_THEME_REVIEW_URL),
					esc_html__('Rate','new-york-business'),				
					esc_url(new_york_business_THEME_URL),
					esc_html__('Demo import','new-york-business'),
					esc_url(new_york_business_THEME_DOC),	
					esc_html__('Tutorial - What is New?','new-york-business'),
					esc_url(new_york_business_DEMO_URL),	
					esc_html__('Pro Demo','new-york-business'),
					esc_html__('Dismiss this notice','new-york-business'),					
					esc_html__('Install Page Builder Plugin and drag and drop, THEME:Product Category Grids | Slider Widgets to pages. See Appearance - Customize - Themes Options for customization.', 'new-york-business')
					);
			 echo wp_kses_post($msg);
	}
	
}

if ( isset( $_GET['new_york_business_notice_dismissed'] ) ){
	update_option('new_york_business_notice', false);
}

$new_york_business_notice = get_option('new_york_business_notice', true);
if($new_york_business_notice){
	add_action('admin_notices', 'new_york_business_general_admin_notice');
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function new_york_business_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Main Sidebar', 'new-york-business' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts, archives and pages.', 'new-york-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	
	register_sidebar(
		array(
			'name'          => __( 'Woocommerce Sidebar', 'new-york-business' ),
			'id'            => 'sidebar-woocommerce',
			'description'   => __( 'Add widgets here to appear in your woocommerce pages.', 'new-york-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);	

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'new-york-business' ),
			'id'            => 'footer-sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'new-york-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'new-york-business' ),
			'id'            => 'footer-sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'new-york-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'new-york-business' ),
			'id'            => 'footer-sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'new-york-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);	
	
	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'new-york-business' ),
			'id'            => 'footer-sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'new-york-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	

	/* blog section sidebar */
	register_sidebar(
		array(
			'name'          => __( 'Home Blog', 'new-york-business' ),
			'id'            => 'home-blog-1',
			'description'   => __( 'Add widgets here to appear in Home Blog section.', 'new-york-business' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'new_york_business_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since new-york-business 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function new_york_business_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'new-york-business' ), esc_html(get_the_title( get_the_ID() )) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'new_york_business_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since new-york-business 1.0
 */
function new_york_business_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'new_york_business_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function new_york_business_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n",  esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'new_york_business_pingback_header' );


/**
 * Enqueue scripts and styles.
 */
function new_york_business_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'new-york-business-fonts', new_york_business_fonts_url(), array(), null );

	wp_enqueue_style( 'boostrap', get_theme_file_uri( '/css/bootstrap.css' ), array(), '3.3.6'); 
	
	// Theme stylesheet.
	wp_enqueue_style( 'new-york-business-style', get_stylesheet_uri() );	

	//fonsawesome
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/fonts/font-awesome/css/font-awesome.css' ), array(), '4.7'); 

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'new-york-business-skip-link-focus-fix', get_theme_file_uri( '/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	wp_enqueue_script( 'boostrap', get_theme_file_uri( '/js/bootstrap.min.js' ), array( 'jquery' ), '3.3.7', true);
		
	wp_enqueue_script( 'new-york-business-scroll-top', get_theme_file_uri( '/js/scrollTop.js' ), array( 'jquery' ), '2.1.2', false);
	
	$new_york_business_l10n = array(
		'quote' => new_york_business_get_fo( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'new-york-business-navigation', get_theme_file_uri( '/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$new_york_business_l10n['expand']   = __( 'Expand child menu', 'new-york-business' );
		$new_york_business_l10n['collapse'] = __( 'Collapse child menu', 'new-york-business' );
		$new_york_business_l10n['icon']     = new_york_business_get_fo(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_localize_script( 'new-york-business-skip-link-focus-fix', 'newYorkBusinessScreenReaderText', $new_york_business_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'new_york_business_scripts' );


function new_york_business_footer_css_container() {

?>
	<style type="text/css" id="custom-footer-colors" >
		<?php echo new_york_business_footer_foreground_css(); ?>
	</style>
<?php
}
add_action( 'wp_head', 'new_york_business_footer_css_container' );


if(!function_exists('new_york_business_footer_foreground_css')){

	function new_york_business_footer_foreground_css(){
	
		$color =  esc_attr(get_theme_mod( 'footer_foreground_color','#fff')) ;
		$theme_color = '#000';
			
		/**
		 *
		 * @since new-york-business-pro 1.0
		 *
		 */
	
	$css                = '
	
	.footer-foreground {}
	.footer-foreground .widget-title, 
	.footer-foreground a, 
	.footer-foreground p, 
	.footer-foreground td,
	.footer-foreground th,
	.footer-foreground caption,
	.footer-foreground li,
	.footer-foreground h1,
	.footer-foreground h2,
	.footer-foreground h3,
	.footer-foreground h4,
	.footer-foreground h5,
	.footer-foreground h6
	{
	  color:'.$color.';
	}
	
	.footer-foreground #today {
		font-weight: 600;	
		background-color: #3ba0f4;	
		padding: 5px;
	}
	
	.footer-foreground a:hover, 
	.footer-foreground a:active {
		color:#ccc ;
	}
	
	';
	
	return $css;
	
	}

}



/**
 * Filter the `sizes` value in the header image markup.
 *
 * @package twentyseventeen
 * @sub-package new-york-business
 * @since new-york-business 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function new_york_business_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'new_york_business_header_image_tag', 10, 3 );


/**
 * Return rgb value of a $hex - hexadecimal color value with given $a - alpha value
 * Ex:- new_york_business_rgba('#11ffee',15) // return rgba(17,255,238,15)
 *
 * @since new-york-business 1.0 
**/
 
function new_york_business_rgba($hex,$a){
 
	$r = hexdec(substr($hex,1,2));
	$g = hexdec(substr($hex,3,2));
	$b = hexdec(substr($hex,5,2));
	$result = 'rgba('.$r.','.$g.','.$b.','.$a.')';
	
	return $result;
}

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since new-york-business 1.0
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function new_york_business_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'new_york_business_widget_tag_cloud_args' );

/**
 * Custom template tags for this theme.
*/
require get_parent_theme_file_path( '/inc/template-tags.php' );

/* load default data, default settings are stored in template-tags.php */


/**
* Additional features to allow styling of the templates.
*/
require new_york_business_TEMPLATE_DIR.'/inc/template-functions.php';

if ( class_exists( 'WP_Customize_Control' ) ) {

	// Inlcude the Alpha Color Picker control file.
	require new_york_business_TEMPLATE_DIR.'/inc/color-picker/alpha-color-picker.php';
 
}

/**
 * TGM plugin.
 */
require new_york_business_TEMPLATE_DIR.'/inc/plugin-activation.php';

/**
 * fontawesome icons functions and filters.
 */
require new_york_business_TEMPLATE_DIR.'/inc/icon-functions.php';

/**
 * Customizer additions.
 */
 
require new_york_business_TEMPLATE_DIR.'/inc/customizer.php';
 

/**
 * This function adds some styles to the WordPress Customizer
 */
function new_york_business_customizer_styles() { ?>
	<style>
		.custom-label-control {
			border-left: 3px solid #f9d303;
			padding: 5px 5px 5px 10px;
			background-color: #fff;
			box-shadow: 0 2px 2px #d5d5d5;
		}
	</style>
	<?php
}
add_action( 'customize_controls_print_styles', 'new_york_business_customizer_styles', 999 );

add_filter('wp_nav_menu_items', 'new_york_business_add_search_form_to_menu', 10, 2);
function new_york_business_add_search_form_to_menu($items, $args) {
  // If this isn't the main navbar menu, do nothing
  if(  !($args->theme_location == 'top') )
    return $items;
	
  // add edd cart icon
    if (function_exists('edd_get_checkout_uri')) {
 
        // Add cart icon
        $items = $items . '<li id="cart-menu-item"><a class="dashicons-before dashicons-cart edd-cart-menu" href="' . esc_url(edd_get_checkout_uri()). '">';
        if ( $qty = edd_get_cart_quantity() ) {
 
            $items = $items . '(<span id="header-cart" class="edd-cart-quantity">' . absint(edd_get_cart_quantity()) . '</span>)';            
        } 
		$items = $items .' </a></li>';
    }  
	
	
  // On main menu: put styling around search and append it to the menu items
  return $items . '<li style="color:#eee;" class="my-nav-menu-search"><a id="myBtn" href="#"><i class="fa fa-search" style="color:#eee; font-size:18px;"></i>
  </a></li>';
}

if(!class_exists('new_york_business_Product_Item')) { 
class new_york_business_product_item	{
	public $id;
	public $image_url;
	public $link;
	public $title;
	public $content;
	public $alt;
	public $sale;
	public $categories;
	public $price_html;
	public $rating_html;
 }
}




/* hide shop page title */
function new_york_business_hide_shop_title()
{
    if( !is_shop() ) // is_shop is the conditional tag
        return true;
}
add_filter( 'woocommerce_show_page_title', 'new_york_business_hide_shop_title' );

/* 
 * Get sidebar 
 */
function new_york_business_sidebar_css(){
	
	$new_york_business_sidebar = '';
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$new_york_business_sidebar = 'hide-content';	
	}
	
	return $new_york_business_sidebar;

}

function new_york_business_content_css(){
	
	$new_york_business_content = 'col-sm-8 col-lg-8 col-xs-12';
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$new_york_business_content = 'col-sm-12 col-lg-12 col-xs-12';
	}
	
	return $new_york_business_content;

}


/**
 * Add woocommerce theme support
 */

add_action( 'after_setup_theme', 'new_york_business_woocommerce_support' );
function new_york_business_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );	
	
}



/* Load widgets */
if($new_york_business_option['widget_posts']){
	require  new_york_business_TEMPLATE_DIR.'/inc/widget-posts.php';
}

require  new_york_business_TEMPLATE_DIR.'/inc/widget-search.php';

$new_york_business_uniqueue_id = 1234;

require  new_york_business_TEMPLATE_DIR.'/inc/widget-product-categories.php';



