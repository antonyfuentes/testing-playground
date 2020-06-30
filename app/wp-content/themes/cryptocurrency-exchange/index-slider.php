<?php get_header(); ?>
<section class="home-section home-full-height bg-dark" id="home">       
	<div class="hero-slider">
		<?php 
		$cryptocurrency_exchange_slider_image_1 = get_theme_mod('cryptocurrency_exchange_slider_image_1', get_template_directory_uri() . '/images/slider/slider1.jpg');
		$cryptocurrency_exchange_slider_image_2 = get_theme_mod('cryptocurrency_exchange_slider_image_2', get_template_directory_uri() . '/images/slider/slider2.jpg');
		$cryptocurrency_exchange_slider_image_3 = get_theme_mod('cryptocurrency_exchange_slider_image_3', get_template_directory_uri() . '/images/slider/slider3.jpg');
		//slider tilte & description settings
		$cryptocurrency_exchange_slider_title_1 = get_theme_mod('cryptocurrency_exchange_slider_title_1', get_template_directory_uri() . 'Slide show title one');
		$cryptocurrency_exchange_slider_desc_1 = get_theme_mod('cryptocurrency_exchange_slider_desc_1', get_template_directory_uri() . 'Lorem ipsum is dummy text used in web designs.');
		$cryptocurrency_exchange_slider_btn_text_1 = get_theme_mod('cryptocurrency_exchange_slider_btn_text_1', get_template_directory_uri() . 'Learn More');
		
		$cryptocurrency_exchange_slider_title_2 = get_theme_mod('cryptocurrency_exchange_slider_title_2', get_template_directory_uri() . 'Slide show title two');
		$cryptocurrency_exchange_slider_desc_2 = get_theme_mod('cryptocurrency_exchange_slider_desc_2', get_template_directory_uri() . 'Lorem ipsum is dummy text used in web designs..');
		$cryptocurrency_exchange_slider_btn_text_2 = get_theme_mod('cryptocurrency_exchange_slider_btn_text_2', get_template_directory_uri() . 'Read More');
		
		$cryptocurrency_exchange_slider_title_3 = get_theme_mod('cryptocurrency_exchange_slider_title_3', get_template_directory_uri() . 'Slide show title three');
		$cryptocurrency_exchange_slider_desc_3 = get_theme_mod('cryptocurrency_exchange_slider_desc_3', get_template_directory_uri() . 'Lorem ipsum is dummy text used in web designs..');
		$cryptocurrency_exchange_slider_btn_text_3 = get_theme_mod('cryptocurrency_exchange_slider_btn_text_3', get_template_directory_uri() . 'Download Now');
		?>
		<ul class="slides"> 
			<?php if($cryptocurrency_exchange_slider_image_1 != "") { ?>
				<li class="bg-dark-30 bg-dark" style="background-image: url('<?php echo esc_url($cryptocurrency_exchange_slider_image_1); ?>')">
					<div class="titan-caption">
						<div class="caption-content">
						<?php if($cryptocurrency_exchange_slider_desc_1 != "") { ?>
							<div class="font-alt mb-30 titan-title-size-1"><?php echo esc_html(stripslashes(get_theme_mod('cryptocurrency_exchange_slider_desc_1', 'CRYPTO IS CREATIVE MULTIPURPOSE HTML TEMPLATE FOR WEB DEVELOPERS WHO CHANGE THE WORLD.'))); ?></div>
						<?php } if($cryptocurrency_exchange_slider_title_1 != "") { ?>
							<div class="font-alt mb-40 titan-title-size-4"><?php echo esc_html(stripslashes(get_theme_mod('cryptocurrency_exchange_slider_title_1', 'This awesome blogging theme'))); ?></div>
						<?php } if($cryptocurrency_exchange_slider_btn_text_1 != "") { ?>
							<a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_slider_btn_link_1', '')); ?>" class="section-scroll btn btn-border-w btn-round" ><?php echo esc_html( stripslashes ( get_theme_mod('cryptocurrency_exchange_slider_btn_text_1', 'Learn More' ) ) ); ?>   </a>
							<?php } ?>	
						</div>
					</div>
				</li>
			<?php } if($cryptocurrency_exchange_slider_image_2 != "") { ?>
				<li class="bg-dark-30 bg-dark" style="background-image: url('<?php echo esc_url($cryptocurrency_exchange_slider_image_2); ?>')">
					<div class="titan-caption">
						<div class="caption-content">
						<?php if($cryptocurrency_exchange_slider_desc_2 != "") { ?>
							<div class="font-alt mb-30 titan-title-size-1"><?php echo esc_html(stripslashes(get_theme_mod('cryptocurrency_exchange_slider_desc_2', 'GROW YOUR AWESOME IDEA','cryptocurrency-exchange'))); ?></div>
						<?php } if($cryptocurrency_exchange_slider_title_2 != "") { ?>	
							<div class="font-alt mb-40 titan-title-size-4"><?php echo esc_html(stripslashes(get_theme_mod('cryptocurrency_exchange_slider_title_2', 'The Theme for Stock Market','crypto'))); ?></div>
						<?php } if($cryptocurrency_exchange_slider_btn_text_2 != "") { ?>	
							<a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_slider_btn_link_2', '')); ?>" class="section-scroll btn btn-border-w btn-round" ><?php echo esc_html( stripslashes( get_theme_mod( 'cryptocurrency_exchange_slider_btn_text_2', 'Read More' ) ) ); ?></a>
						<?php } ?>
						</div>
					</div>
				</li>
				<?php } if($cryptocurrency_exchange_slider_image_3 != "") { ?>
				<li class="bg-dark-30 bg-dark" style="background-image: url('<?php echo esc_url($cryptocurrency_exchange_slider_image_3); ?>')">
					<div class="titan-caption">
						<div class="caption-content">
						<?php if($cryptocurrency_exchange_slider_desc_3 != "") { ?>
							<div class="font-alt mb-30 titan-title-size-1"><?php echo esc_html(stripslashes(get_theme_mod('cryptocurrency_exchange_slider_desc_3', 'WE BUILD BRANDS THAT BUILD BUSINESS','crypto'))); ?></div>
						<?php } if($cryptocurrency_exchange_slider_title_3 != "") { ?>
							<div class="font-alt mb-40 titan-title-size-4"><?php echo esc_html(stripslashes(get_theme_mod('cryptocurrency_exchange_slider_title_3', 'The Theme for Business','crypto'))); ?></div>
						<?php } if($cryptocurrency_exchange_slider_btn_text_3 != "") { ?>
							<a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_slider_btn_link_3', '')); ?>" class="section-scroll btn btn-border-w btn-round"><?php echo esc_html( stripslashes ( get_theme_mod('cryptocurrency_exchange_slider_btn_text_3', 'Download Now' ) ) ); ?></a>
						<?php } ?>
						</div>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
</section>
<script>
jQuery( document ).ready(function() {
	if( jQuery('.hero-slider').length > 0 ) {
		jQuery('.hero-slider').flexslider( {
			animation: "fade",
			animationSpeed: 1000,
			animationLoop: true,
			slideshow: true, //autoplay
			slideshowSpeed: 4000,
			pauseOnHover: false,
			touch: true,
			keyboard: true,
			prevText: '',
			nextText: '',
		
			before: function(slider) {
				jQuery('.titan-caption').fadeOut().animate({top:'-80px'},{queue:false, easing: 'swing', duration: 700});
				slider.slides.eq(slider.currentSlide).delay(500);
				slider.slides.eq(slider.animatingTo).delay(500);
			},
			after: function(slider) {
				jQuery('.titan-caption').fadeIn().animate({top:'0'},{queue:false, easing: 'swing', duration: 700});
			},
			useCSS: true
		});
	}
});
</script>