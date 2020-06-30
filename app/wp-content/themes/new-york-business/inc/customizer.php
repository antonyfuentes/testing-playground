<?php
/**
 * new-york-business: Customizer
 * @package new-york-business
 * @since 1.0
 */
 
add_action( 'customize_register', 'new_york_business_customizer_settings' ); 
function new_york_business_customizer_settings( $wp_customize ) {

// Go pro control
$wp_customize->add_section( 'new_york_business_lite' , array(
			'title'      	=> __( 'Go Premium Version', 'new-york-business' ),
			'priority' => 1,
		) );

		$wp_customize->add_setting( 'new_york_business_lite', array(
			'default'    		=> null,
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( new new_york_business_pro_Control( $wp_customize, 'new_york_business_lite', array(
			'label'    => __( 'New York Business Premium', 'new-york-business' ),
			'section'  => 'new_york_business_lite',
			'settings' => 'new_york_business_lite',
			'priority' => 1,
		) ) );



/*******************
 * Layout options. *
 *******************/

		$wp_customize->add_section( 'layout_section' , array(
			'title'      => __('Layout', 'new-york-business' ),			
			'description'=> __('Change site layout. Change Single Post display layout, Default is two columns (with sidebar). In pages - use full width template to hide sidebar', 'new-york-business' ),
		) );
		
		// site layout default / box layout 
		$wp_customize->add_setting( 'new_york_business_option[box_layout]' , array(
		'default'    => 0,
		'sanitize_callback' => 'new_york_business_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[box_layout]' , array(
		'label' => __('Enable box layout mode','new-york-business' ),
		'description' =>  __('Enable or disable Box layout mode. Default is fluid layout.','new-york-business' ),
		'section' => 'layout_section',
		'type'=>'checkbox',
		) );
	
		// layout 
		$wp_customize->add_setting( 'new_york_business_option[layout_section_post_one_column]' , array(
		'default'    => 0,
		'sanitize_callback' => 'new_york_business_sanitize_checkbox',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[layout_section_post_one_column]' , array(
		'label' => __('One Column Single Post Layout','new-york-business' ),
		'description' =>  __('Display single post in one column (No Sidebar)','new-york-business' ),
		'section' => 'layout_section',
		'type'=>'checkbox',
		) );
		
		// sidebar position
		$wp_customize->add_setting( 'new_york_business_option[blog_sidebar_position]' , array(
		'default'    => 'right',
		'sanitize_callback' => 'new_york_business_sanitize_select',
		'type'=>'option'
		));

		$wp_customize->add_control('new_york_business_option[blog_sidebar_position]' , array(
		'label' => __('Sidebar position','new-york-business' ),
		'section' => 'layout_section',
		'type'=>'select',
		'choices'=>array(
			'right'=>__('Right Sidebar','new-york-business' ),
			'left'=>__('Left Sidebar','new-york-business' ),
		),
		) );				

		
/*****************
 * Theme options.*
*****************/
 
$wp_customize->add_panel( 'theme_options', array(
  'title' => __('Theme Options','new-york-business' ),
  'description' => __('Theme specific customization options', 'new-york-business' ), // Include html tags such as <p>.
  'priority' => 2, // Mixed with top-level-section hierarchy.
) );



require new_york_business_TEMPLATE_DIR.'/inc/customizer/header.php';
require new_york_business_TEMPLATE_DIR.'/inc/customizer/social.php';
require new_york_business_TEMPLATE_DIR.'/inc/customizer/slider.php';
require new_york_business_TEMPLATE_DIR.'/inc/customizer/fonts.php';
require new_york_business_TEMPLATE_DIR.'/inc/customizer/footer.php';
/****************************
default customizer settings *
*****************************/		

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'new_york_business_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'new_york_business_customize_partial_blogdescription',
		)
	);
	

	// home header section enable/disable
	$wp_customize->add_setting( 'new_york_business_option[home_header_section_disable]' , array(
		'default'    => true,	
		'sanitize_callback' => 'new_york_business_sanitize_checkbox',
		'type'=>'option'
	));

	$wp_customize->add_control('new_york_business_option[home_header_section_disable]' , array(
		'label' => __('Disable header when front page set to home-page template (Usually with slider)','new-york-business' ),
		'section' => 'header_image',
		'type'=>'checkbox',
	) );	
	


}

/**
 * Render the site title for the selective refresh partial.
 *
 * @since new-york-business 1.0
 * @see new_york_business_customize_register()
 *
 * @return void
 */
function new_york_business_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since new-york-business 1.0
 * @see new_york_business_customize_register()
 *
 * @return void
 */
function new_york_business_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function new_york_business_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function new_york_business_customize_preview_js() {
	wp_enqueue_script( 'new-york-business-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'new_york_business_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function new_york_business_panels_js() {
	wp_enqueue_script( 'new-york-business-customize-controls', get_theme_file_uri( '/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'new_york_business_panels_js' );


/**
 * A class to create a dropdown for all categories in your WordPress site
 */
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
	
 class new_york_business_category_dropdown_custom_control extends WP_Customize_Control
 {
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $new_york_business_options = array())
    {
        $this->cats = get_categories($new_york_business_options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     * @return HTML
     */
	 
	 public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                           <?php
						        printf('<option value="0" selected="selected" >'.esc_html_e('None','new-york-business').'</option>');
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', esc_attr( $cat->term_id ), selected( $this->value(), esc_attr( $cat->term_id ), false), esc_attr( $cat->name ) );
                                }
                           ?>
                      </select>
                    </label>
                <?php  
            }
       }
 }
 
/* 
 * check valid list item has been selected 
 */ 
function new_york_business_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}



/*
 * new-york-business sanitize checkbox function
 */ 
function new_york_business_sanitize_checkbox( $checked ) {
    // Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}



/*
 * new-york-business get post categories
 */

$new_york_business_categories = new_york_business_get_post_categories();

/*
 * new-york-business get all published pages
 */
$new_york_business_all_posts = new_york_business_get_all_posts();

/*
 * new-york-business get product categories
 */

$new_york_business_product_categories = new_york_business_get_product_categories();

function new_york_business_get_product_categories(){

	$args = array(
			'taxonomy' => 'product_cat',
			'orderby' => 'date',
			'order' => 'ASC',
			'show_count' => 1,
			'pad_counts' => 0,
			'hierarchical' => 0,
			'title_li' => '',
			'hide_empty' => 1,
	);

	$cats = get_categories($args);

	$arr = array();
	$arr[''] = 'All' ;
	foreach($cats as $cat){
		$arr[$cat->term_id] = $cat->name;
	}
	return $arr;
}

function new_york_business_get_post_categories(){
	$cats = get_categories();
	$arr = array();
	$arr[''] = '-- Any --';
	foreach($cats as $cat){
		$arr[$cat->term_id] = $cat->name;
	}
	return $arr;
}

/*
 * new-york-business get all published pages
 */
 
function new_york_business_get_all_pages(){

	$args = array(
		'post_type' => 'page',
		'sort_order' => 'asc',
		'sort_column' => 'post_title',
		'post_status' => 'publish'
	); 

	$pages = get_pages($args);
	$arr = array();
	$arr[''] = '-- None --';
	foreach($pages as $page){
		$arr[$page->ID] = $page->post_title;
	}
	return $arr;
}

/*
 * new-york-business get all published posts
 */
 
function new_york_business_get_all_posts(){

	$args = array(
		'post_type' => 'post',
		'sort_order' => 'desc',
		'sort_column' => 'post_title',
		'post_status' => 'publish'
	); 

	$posts = get_posts($args);
	$arr = array();
	$arr[''] = '-- None --';
	foreach($posts as $post){
		$arr[$post->ID] = $post->post_title;
	}
	return $arr;
}

/* label control */
if (class_exists('WP_Customize_Control'))
{
     class new_york_business_Label_Custom_control extends WP_Customize_Control
     {
          public function render_content()
           {

                ?>
                    <p  class="customize-control-title custom-label-control">
                      <span class="customize-category-select-control" style="text-align:center"><?php echo esc_html( $this->label ); ?></span>                      
                    </p>
                <?php
           }
     }
}


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'new_york_business_pro_Control' ) ) :
class new_york_business_pro_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6" style="text-align:center;margin-bottom:15px;">					
					<a class="button button-secondary"  href="<?php echo esc_url(new_york_business_THEME_URL); ?>" target="blank" class="btn pro-btn-success btn"><?php esc_html_e('Upgrade to Premium Version','new-york-business'); ?> </a>
			</div>
			
			<div class="col-md-4 col-sm-6" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);padding:3px; background-color:#FFF">
				<img  src="<?php echo esc_url(new_york_business_TEMPLATE_DIR_URI .'/screenshot.jpg'); ?>">
			</div>			
			<div class="col-md-3 col-sm-6" style="font-weight:500;">
				<table class="theme-features" cellspacing="0" align="left">
				<tbody>
				<tr>
				<th scope="col" align="center"><h2><?php esc_html_e('New York Business Pro Version','new-york-business'); ?></h2></th>
				</tr>				
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('* 12 months customer support, and free updates for each theme purchase for single domain','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('* Woocommerce, YITH wishlist integration.)','new-york-business'); ?></div></td>
				</tr>			
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('* Product Widgets including featured, by category, top sales, product by review, latest products, product slider, featured slider, banner and contact, service, team etc:', 'new-york-business'); ?></div></td>
				</tr>
				
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('* 20+ Widgets (service, team, slider, contact, MailChimp subscribe, 5+ WooCommerce product sliders &grids, counter(animated), progressbar(animated), accordion(animated) etc: )','new-york-business'); ?></div></td>
				</tr>			
							
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  Unlimited services','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited News/Events','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited Testimonials/Sliders','new-york-business'); ?></div></td>
				</tr>

				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited Team members','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited Colour selections','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Custom Page selection in featured areas on all templates, any page design with default editor, Site orign, Elementor, divi ect: can be added to featured sections.','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Unlimited Color Schemes','new-york-business'); ?></div></td>
				</tr>								
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  More footer customizations','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  500 + Google Fonts','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Translation Ready','new-york-business'); ?></div></td>
				</tr>

				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  All templates customizable','new-york-business'); ?></div></td>
				</tr>

				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i> <?php esc_html_e('*  Contact Template','new-york-business'); ?></div></td>
				</tr>

				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  More accessibility features','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  One page home template','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  Sticky navigation','new-york-business'); ?></div></td>
				</tr>				
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  Site content, Header and footer Width Adjustment','new-york-business'); ?></div></td>
				</tr>
				<tr>
				<td>
				<div align="left"><i style="color: rgb(38, 191, 38);" class="fa fa-check"></i><?php esc_html_e('*  Drag and Drop page design and Page builder template','new-york-business'); ?></div></td>
				</tr>										
				</tbody>
			  </table>

			</div>
			
			<br />
			
			<div class="col-md-2 col-sm-6" style="text-align:center">					
					<a class="button button-secondary"   href="<?php echo esc_url(new_york_business_THEME_AUTHOR_URL); ?>" target="blank" class="btn pro-btn-success btn"><strong><?php esc_html_e(' Go Premium Version or Donate ','new-york-business'); ?></strong></a>
			</div>

		</label>
		<?php
	}
}
endif;