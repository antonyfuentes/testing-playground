<?php

$easy_storefront_default_settings = new new_york_business_settings();
$easy_storefront_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $easy_storefront_default_settings->default_data());

$easy_storefront_class = '';
$easy_storefront_bottom_color = esc_attr( $easy_storefront_option['footer_section_bottom_background_color'] );

$easy_storefront_class = $easy_storefront_class. ' footer-foreground';

$easy_storefront_option['footer_section_background_color'] = '#fff';
$easy_storefront_option['footer_section_bottom_color'] = '#3c4043';
$easy_storefront_option['footer_section_bottom_background_color'] = '#fff';

?>
</div> <!--end of content div-->

<footer id="colophon" role="contentinfo" class="site-footer  <?php echo esc_attr( $easy_storefront_class );?>" style="background:<?php echo esc_attr( $easy_storefront_option['footer_section_background_color'] ); ?>;">
  <div class="footer-section <?php echo esc_attr( $easy_storefront_class );?>" >
    <div class="container">
	<!--widgets area-->
	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'easy-storefront' ); ?>">
		<?php
		if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
			</div>
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
			</div>			
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
			</div>
		<?php
		}
		if ( is_active_sidebar( 'footer-sidebar-4' ) ) {
		?>
			<div class="col-md-3 col-sm-3 footer-widget">
				<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
			</div>
        <?php }	?>
	</aside><!-- .widget-area -->
	
	<div class="row">
	
      <div class="col-md-12">
	  
        <center>
          <ul id="footer-social" class="header-social-icon animate fadeInRight" >
            <?php if($easy_storefront_option['social_facebook_link']!=''){?>
            <li><a href="<?php echo esc_url($easy_storefront_option['social_facebook_link']); ?>" target="<?php if($easy_storefront_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="facebook" data-toggle="tooltip" title="<?php esc_attr_e('Facebook','easy-storefront'); ?>"><i class="fa fa-facebook"></i></a></li>
            <?php } ?>
            <?php if($easy_storefront_option['social_twitter_link']!=''){?>
            <li><a href="<?php echo esc_url($easy_storefront_option['social_twitter_link']); ?>" target="<?php if($easy_storefront_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="twitter" data-toggle="tooltip" title="<?php esc_attr_e('Twitter','easy-storefront'); ?>"><i class="fa fa-twitter"></i></a></li>
            <?php } ?>
            <?php if($easy_storefront_option['social_skype_link']!=''){?>
            <li><a href="<?php echo esc_url($easy_storefront_option['social_skype_link']); ?>" target="<?php if($easy_storefront_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="skype" data-toggle="tooltip" title="<?php esc_attr_e('Skype','easy-storefront'); ?>"><i class="fa fa-skype"></i></a></li>
            <?php } ?>
            <?php if($easy_storefront_option['social_pinterest_link']!=''){?>
            <li><a href="<?php echo esc_url($easy_storefront_option['social_pinterest_link']); ?>" target="<?php if($easy_storefront_option['social_open_new_tab']=='1'){echo '_blank';} ?>" class="pinterest" data-toggle="tooltip" title="<?php esc_attr_e('Google-Plus','easy-storefront'); ?>"><i class="fa fa-pinterest"></i></a></li>
            <?php } ?>				
          </ul>
        </center>
      </div>
	  
	  </div> 
	  
	  <div class="row">	  
	  <div class="vertical-center footer-bottom-section">
	  
		<!-- bottom footer -->
		<div class="col-md-6 site-info">
		  <p align="center" style="color:#fff;" > <a href="<?php echo esc_url(new_york_business_THEME_AUTHOR_URL); ?>"> <?php echo wp_kses_post($easy_storefront_option['footer_section_bottom_text']); ?> </a> </p>
		</div>
		<!-- end of bottom footer -->
	  
		  <div class="col-md-6 bottom-menu">
			<center>         
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'container_class' => 'bottom-menu'
					)
				);
				?>
			</center>
		  </div>
		</div>
	</div>			
	
	</div><!-- .container -->
	
  </div>
  <a id="scroll-btn" href="#" class="scroll-top"><i class="fa fa-angle-double-up"></i></a>
</footer>
<!-- #colophon -->
<?php 
global $easy_storefront_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $easy_storefront_default_settings = new new_york_business_settings();
   $easy_storefront_option = wp_parse_args(  get_option( 'easy_storefront_option', array() ) , $easy_storefront_default_settings->default_data());  
}
if($easy_storefront_option['box_layout']){
	// end of wrapper div
	echo '</div>';
}

wp_footer(); 
?>
</body>
</html>
