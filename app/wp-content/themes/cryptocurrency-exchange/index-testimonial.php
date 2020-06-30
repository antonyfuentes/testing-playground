<section class="module-small bg-dark-60 parallax-bg testimonial">
	<?php 
		$cryptocurrency_exchange_testimonial_section_title = get_theme_mod('cryptocurrency_exchange_testimonial_section_title', 'What People Say');
		$cryptocurrency_exchange_testimonial_section_desc = get_theme_mod('cryptocurrency_exchange_testimonial_section_desc', 'We are here to make your website look more elegant and stylish!');
		
		$cryptocurrency_exchange_testimonial_image_1 = get_theme_mod('cryptocurrency_exchange_testimonial_image_1', get_template_directory_uri() . '/images/testimonial.jpg');
		$cryptocurrency_exchange_testimonial_description = get_theme_mod('cryptocurrency_exchange_testimonial_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.');
		$cryptocurrency_exchange_testimonial_client_title = get_theme_mod('cryptocurrency_exchange_testimonial_client_title', 'Jannie Smith');
		$cryptocurrency_exchange_testimonial_client_designation = get_theme_mod('cryptocurrency_exchange_testimonial_client_designation', 'Marketing Department');
	?>
	<div class="container">
		<?php if($cryptocurrency_exchange_testimonial_section_title != "" ){ ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="section-header">
					<?php if($cryptocurrency_exchange_testimonial_section_title != '') { ?>
					<h1 class="section-title text-white"><?php echo esc_html(stripslashes($cryptocurrency_exchange_testimonial_section_title)); ?></h1>
					<span class="section-seperator"></span>
					<?php } if($cryptocurrency_exchange_testimonial_section_desc != '') { ?>
					<p class="section-subtitle"><?php echo esc_html(stripslashes($cryptocurrency_exchange_testimonial_section_desc)); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	
	<ul class="slides">
		<li>
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="testimonial-content">
							<?php if($cryptocurrency_exchange_testimonial_image_1 != "" ){ ?>
								<div class="module-icon img">
									<img src="<?php if($cryptocurrency_exchange_testimonial_image_1) { echo esc_url($cryptocurrency_exchange_testimonial_image_1); } ?>">
								</div>	
							<?php } ?>	
							<?php if($cryptocurrency_exchange_testimonial_description != "" ){ ?>
								<blockquote class="testimonial-text"><?php echo esc_html(stripslashes($cryptocurrency_exchange_testimonial_description)); ?></blockquote>
							<?php } ?>
							<div class="testimonial-author">
								<div class="testimonial-caption font-alt">
									<?php if($cryptocurrency_exchange_testimonial_client_title != "" ){ ?>
									<div class="testimonial-title"><?php echo esc_html(stripslashes($cryptocurrency_exchange_testimonial_client_title)); ?></div>
									<?php } if($cryptocurrency_exchange_testimonial_client_designation != "" ){ ?>
									<div class="testimonial-descr"><?php echo esc_html(stripslashes($cryptocurrency_exchange_testimonial_client_designation)); ?></div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>
</section>