<?php
/**
 * The header
 * @package new-york-business
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php 
wp_head();
//get settings array 
global $new_york_business_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $new_york_business_default_settings = new new_york_business_settings();
   $new_york_business_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $new_york_business_default_settings->default_data());  
}
?>
</head>

<!-- link to site content -->
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'new-york-business' ); ?></a>

<body <?php body_class(); ?> >

<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else { 
		do_action( 'wp_body_open' ); 
	}
?>

<!-- The Search Modal Dialog -->
<div id="myModal" class="modal" aria-hidden="true" tabindex="-1" role="dialog">
  <!-- Modal content -->
  <div class="modal-content">
    <span id="search-close" class="close" tabindex="0">&times;</span>
	<br/> <br/>
    <?php get_template_part( 'searchform'); ?>
	<br/> 
  </div>
</div><!-- end search model-->

<div id="page" class="site">

<?php 
if($new_york_business_option['box_layout']){
  echo '<div class="wrap-box">';
}

?>


<header id="masthead" class="site-header" role="banner" >

	<!-- start of mini header -->
	<?php if(!$new_york_business_option['header_section_hide_header']): ?>	      
			<div class="mini-header hidden-xs">
				<div class="container vertical-center">
					
						<div id="mini-header-contacts" class="col-md-8 col-sm-8 lr-clear-padding" >
						 
							<ul class="contact-list-top">
							<?php if($new_york_business_option['contact_section_phone']!=''): ?>					  
								<li><i class="fa fa-phone contact-margin"></i><span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_phone']); ?></span></li>
							<?php endif; ?>
							<?php if($new_york_business_option['contact_section_email']!=''): ?>
								<li class="contact-margin"><i class="fa fa-envelope" ></i><a href="<?php echo esc_url( 'mailto:'.$new_york_business_option['contact_section_email'] ); ?>"><span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_email']); ?></span></a></li>
							<?php endif; ?>
							<?php if($new_york_business_option['contact_section_address']!=''): ?>
								<li class="contact-margin"><i class="fa fa-map-marker" ></i><span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_address']); ?></span></li>
							<?php endif; ?>
							<?php if($new_york_business_option['contact_section_hours']!=''): ?>
								<li class="contact-margin"><i class="fa fa-clock-o" ></i><span class="contact-margin"><?php echo esc_html($new_york_business_option['contact_section_hours']); ?></span></li>
							<?php endif; ?>														
							</ul>
						 
						</div>
						<div class="col-md-4 col-sm-4 lr-clear-padding">			
							<ul class="mimi-header-social-icon pull-right animate fadeInRight" >
								<?php if(class_exists('woocommerce')) { ?><li class="login-register"><i class="fa fa-user-circle"></i>&nbsp;</a></li><?php echo '<a class="login-register" href="'.esc_url($new_york_business_option['header_myaccount_link']).'">'.esc_html__('My Account', 'new-york-business').'</a>  &nbsp;'; ?></li><?php } ?>  					
								<?php if(function_exists('YITH_WCWL')) { ?><li class="my-wishlist"><?php new_york_business_wishlist_count(); ?></li><?php } ?>								
								<?php if(class_exists('woocommerce')) { ?><li class="my-cart"><?php do_action( 'new_york_business_woocommerce_cart_top' ); ?></li><?php } ?>
								<?php if($new_york_business_option['social_facebook_link']!=''){?> <li><a href="<?php echo esc_url($new_york_business_option['social_facebook_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Facebook','new-york-business'); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
								<?php if($new_york_business_option['social_twitter_link']!=''){?> <li><a href="<?php echo esc_url($new_york_business_option['social_twitter_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Twitter','new-york-business'); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
								<?php if($new_york_business_option['social_skype_link']!=''){?> <li><a href="<?php echo esc_url($new_york_business_option['social_skype_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Skype','new-york-business'); ?>"><i class="fa fa-skype"></i></a></li><?php } ?>
								<?php if($new_york_business_option['social_pinterest_link']!=''){?> <li><a href="<?php echo esc_url($new_york_business_option['social_pinterest_link']); ?>" target="<?php if($new_york_business_option['social_open_new_tab']=='1'){echo '_blank';} ?>"  data-toggle="tooltip" title="<?php esc_attr_e('Pinterest','new-york-business'); ?>"><i class="fa fa-pinterest"></i></a></li><?php } ?>
							</ul>
						</div>	
					
				</div>	
			</div>
		<?php endif; ?>		
	 <!-- .end of contacts mini header -->

<!--start of site branding search-->
<div class="container ">
	<div class="vertical-center">
	
		<div class="col-md-4 col-sm-4 col-xs-12 site-branding" >
		
		  <?php if ( has_custom_logo() ) : ?>
		  	<?php the_custom_logo(); ?>
		  <?php endif; ?>
		  
		  <div class="site-branding-text">
			<?php if ( is_front_page() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			  <?php bloginfo( 'name' ); ?>
			  </a></h1>
			<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			  <?php bloginfo( 'name' ); ?>
			  </a></p>
			<?php endif; ?>
			<?php $new_york_business_description = get_bloginfo( 'description', 'display' ); if ( $new_york_business_description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo esc_html($new_york_business_description); ?></p>
			<?php endif; ?>
		  </div>
		</div>
		<!-- .end of site-branding -->
		
		<div class="col-sm-8 col-xs-12 vertical-center"><!--  menu, search -->
		
		<?php if(class_exists( 'WooCommerce' )): ?>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 header-search-form">
				<?php the_widget('new_york_business_product_search_widget'); ?> 
		</div>
		
	
		<?php else: ?>
		<div id="sticky-nav" class="top-menu-layout-2" > <!--start of navigation-->
		  <div class="container">
		  <div class="row vertical-center">
			<!-- start of navigation menu -->
			<div class="navigation-center-align">
			  <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
			</div>
			<!-- end of navigation menu -->
			</div>
		  </div>
		  <!-- .container -->
		</div>		 
		<?php endif; ?> 
		 
	</div><!-- .menu, search --> 
	
   </div>
</div>
<!-- .end of site-branding, search -->
	 
	  
<?php if(class_exists( 'WooCommerce' )): ?>
<div id="sticky-nav" > <!--start of navigation-->
	<div class="container">
	<div class="row vertical-center">
		<!-- start of navigation menu -->
		<div class="col-sm-12 col-lg-12 col-xs-12 woocommerce-layout">
			<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
		</div>
		<!-- end of navigation menu -->
	</div>
	</div>
<!-- .container -->
</div>
<?php endif; ?> 

<?php get_template_part( 'template-parts/header/subheader'); ?>  
</header><!-- #masthead -->

<?php 
	if ( is_front_page() and $new_york_business_option['slider_in_home_page']) {
		get_template_part( 'template-parts/slider', 'section' ); 
	}

if(class_exists('woocommerce')) { ?>

<div id="scroll-cart" class="topcorner">
	<ul>
					
		<li class="my-cart"><?php do_action( 'new_york_business_woocommerce_cart_top' ); ?></li>
		<li><a class="login-register"  href="<?php echo esc_url($new_york_business_option['header_myaccount_link']); ?>"><i class="fa fa-user-circle">&nbsp;</i></a></li>
		
	</ul>
</div>
<?php } ?>

<div id="content">
	 
