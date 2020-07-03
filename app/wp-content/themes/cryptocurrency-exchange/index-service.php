<section class="module" id="services">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="section-header">
					<h1 class="section-title"><?php echo esc_html(get_theme_mod('cryptocurrency_exchange_service_section_title', 'Our Service')); ?></h1>
					<span class="section-seperator"></span>
					<p class="section-subtitle"><?php echo esc_html(get_theme_mod('cryptocurrency_exchange_service_section_desc', 'We are here to make your website look more elegant and stylish!')); ?></p>
				</div>
			</div>		
		</div>
		<?php 
			$cryptocurrency_exchange_service_column_layout = get_theme_mod('cryptocurrency_exchange_service_column_layout', 'col-md-4');
		
			$cryptocurrency_exchange_service_title_1 = get_theme_mod('cryptocurrency_exchange_service_title_1', 'Ideas and concepts');
			$cryptocurrency_exchange_service_desc_1 = get_theme_mod('cryptocurrency_exchange_service_desc_1', 'The passage is attributed to an typesetter in the 15th century who is thought to have scrambled parts of use in a specimen book');
			$cryptocurrency_exchange_service_icon_1 = get_theme_mod('cryptocurrency_exchange_service_icon_1', 'fa-handshake-o');
			
			$cryptocurrency_exchange_service_title_2 = get_theme_mod('cryptocurrency_exchange_service_title_2', 'Optimised for speed');
			$cryptocurrency_exchange_service_desc_2 =  get_theme_mod('cryptocurrency_exchange_service_desc_2', 'The passage is attributed to an typesetter in the 15th century who is thought to have scrambled parts of use in a specimen book');
			$cryptocurrency_exchange_service_icon_2 =  get_theme_mod('cryptocurrency_exchange_service_icon_2', 'fa-line-chart');
			
			$cryptocurrency_exchange_service_title_3 = get_theme_mod('cryptocurrency_exchange_service_title_3', 'Designs &amp; interfaces');
			$cryptocurrency_exchange_service_desc_3 = get_theme_mod('cryptocurrency_exchange_service_desc_3', 'The passage is attributed to an typesetter in the 15th century who is thought to have scrambled parts of use in a specimen book');
			$cryptocurrency_exchange_service_icon_3 = get_theme_mod('cryptocurrency_exchange_service_icon_3', 'fa-money'); 
		?>
		<div class="row multi-columns-row">
				<?php if($cryptocurrency_exchange_service_icon_1 || $cryptocurrency_exchange_service_title_1 || $cryptocurrency_exchange_service_desc_1 ) { ?>
					<div class="<?php echo esc_attr($cryptocurrency_exchange_service_column_layout); ?> col-sm-6 col-xs-12">
						<div class="features-item feature-box">
							<?php if($cryptocurrency_exchange_service_icon_1 != "") { ?>
								<div class="features-icon content">
									<i class="fa <?php echo esc_attr($cryptocurrency_exchange_service_icon_1); ?>"></i>
								</div>
							<?php } ?>	
							<h3 class="features-title font-alt"><?php echo esc_html(stripslashes($cryptocurrency_exchange_service_title_1)); ?></h3>
							<p><?php echo esc_html(stripslashes($cryptocurrency_exchange_service_desc_1)); ?></p>
						</div>
					</div>
				<?php } ?>
				<?php if($cryptocurrency_exchange_service_icon_2 || $cryptocurrency_exchange_service_title_2 || $cryptocurrency_exchange_service_desc_2 ) { ?>
					<div class="<?php echo esc_attr($cryptocurrency_exchange_service_column_layout); ?> col-sm-6 col-xs-12">
						<div class="features-item feature-box">
						<?php if($cryptocurrency_exchange_service_icon_2 != "") { ?>
							<div class="features-icon content">
								<i class="fa <?php echo esc_attr($cryptocurrency_exchange_service_icon_2); ?>"></i>
							</div>
							<?php } ?>
							<h3 class="features-title font-alt"><?php echo esc_html(stripslashes($cryptocurrency_exchange_service_title_2)); ?></h3>
							<p><?php echo esc_html(stripslashes($cryptocurrency_exchange_service_desc_2)); ?></p>
						</div>
					</div>
				<?php } ?>
				<?php if($cryptocurrency_exchange_service_icon_3 || $cryptocurrency_exchange_service_title_3 || $cryptocurrency_exchange_service_desc_3 ) { ?>
					<div class="<?php echo esc_attr($cryptocurrency_exchange_service_column_layout); ?> col-sm-6 col-xs-12">
						<div class="features-item feature-box">
						<?php if($cryptocurrency_exchange_service_icon_3 != "") { ?>
							<div class="features-icon content">
								<i class="fa <?php echo esc_attr($cryptocurrency_exchange_service_icon_3); ?>"></i>
							</div>
							<?php } ?>
							<h3 class="features-title font-alt"><?php echo esc_html(stripslashes($cryptocurrency_exchange_service_title_3)); ?></h3>
							<p><?php echo esc_html(stripslashes($cryptocurrency_exchange_service_desc_3)); ?></p>
						</div>
					</div>
				<?php } ?>
		</div>
	</div>	
</section>