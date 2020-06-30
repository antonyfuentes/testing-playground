<?php
// $new_york_business_option array declared in functions.php
global $new_york_business_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $new_york_business_default_settings = new new_york_business_settings();
   $new_york_business_option = wp_parse_args(get_option( 'new_york_business_option', array() ) , $new_york_business_default_settings->default_data());  
}
?>

<section id="contact" style="background:<?php echo esc_attr( $new_york_business_option['contact_section_background_color'] ); ?>;" >
  <div class="svc-section-body section-padding">
    <div class="container">

	<div class="row">
		<?php if($new_york_business_option['contact_section_title']!=''): ?>		
		<h1 class="section-title wow animated fadeInUp"><?php echo esc_html( $new_york_business_option['contact_section_title'] ); ?></h1>
		<?php endif; ?>      
		<?php if($new_york_business_option['contact_section_description']!=''): ?>
		<p class="section-desc wow animated fadeInUp"><?php echo esc_html( $new_york_business_option['contact_section_description'] ); ?></p>
		<?php endif; ?>
	</div>
	  
      <div class="row">
	  		
       <div class="col-md-12 col-lg-12">
		<?php if( $new_york_business_option['contact_section_shortcode'] != '' ): ?>
		 <div class="contact-list-form"> 		 
          <?php	echo do_shortcode( $new_york_business_option['contact_section_shortcode'] );?>
		 </div>
		 <?php endif; ?>
       </div>
		 		
	   </div>
	   				
	</div>	 
  </div>  
 
</section>
<!-- #svc-home-contact -->

