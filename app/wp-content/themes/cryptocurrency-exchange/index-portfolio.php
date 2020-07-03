<?php 
	$cryptocurrency_exchange_portfolio_section_title = get_theme_mod('cryptocurrency_exchange_portfolio_section_title', 'Our Projects');
	$cryptocurrency_exchange_portfolio_section_desc = get_theme_mod('cryptocurrency_exchange_portfolio_section_desc', 'Our Powerful Ideas and Projects');
	//Portfolio Images
	$cryptocurrency_exchange_portfolio_image_1 = get_theme_mod('cryptocurrency_exchange_portfolio_image_1', get_template_directory_uri() . '/images/project01.jpg');
	$cryptocurrency_exchange_portfolio_image_2 = get_theme_mod('cryptocurrency_exchange_portfolio_image_2', get_template_directory_uri() . '/images/project02.jpg');
	$cryptocurrency_exchange_portfolio_image_3 = get_theme_mod('cryptocurrency_exchange_portfolio_image_3', get_template_directory_uri() . '/images/project03.jpg');
	$cryptocurrency_exchange_portfolio_image_4 = get_theme_mod('cryptocurrency_exchange_portfolio_image_4', get_template_directory_uri() . '/images/project04.jpg');
	
	//Portfolio Title
	$cryptocurrency_exchange_portfolio_title_1 = get_theme_mod('cryptocurrency_exchange_portfolio_title_1', 'Crypto Market');
	$cryptocurrency_exchange_portfolio_title_2 = get_theme_mod('cryptocurrency_exchange_portfolio_title_2', 'Business Deal');
	$cryptocurrency_exchange_portfolio_title_3 = get_theme_mod('cryptocurrency_exchange_portfolio_title_3', 'Crypto Wallet');
	$cryptocurrency_exchange_portfolio_title_4 = get_theme_mod('cryptocurrency_exchange_portfolio_title_4', 'Working Time');
	
	//Portfolio Desc
	$cryptocurrency_exchange_portfolio_desc_1 = get_theme_mod('cryptocurrency_exchange_portfolio_desc_1', 'Lorem Ipsum is simply dummy text');
	$cryptocurrency_exchange_portfolio_desc_2 = get_theme_mod('cryptocurrency_exchange_portfolio_desc_2', 'Lorem Ipsum is simply dummy text');
	$cryptocurrency_exchange_portfolio_desc_3 = get_theme_mod('cryptocurrency_exchange_portfolio_desc_3', 'Lorem Ipsum is simply dummy text');
	$cryptocurrency_exchange_portfolio_desc_4 = get_theme_mod('cryptocurrency_exchange_portfolio_desc_4', 'Lorem Ipsum is simply dummy text');
?>
<section class="module" id="portfolio">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="section-header">
					<?php if($cryptocurrency_exchange_portfolio_section_title != "" ) { ?>
						<h1 class="section-title"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_section_title)); ?></h1>
						<span class="section-seperator"></span>
					<?php } if($cryptocurrency_exchange_portfolio_section_desc != "" ) {  ?>
						<p class="section-subtitle"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_section_desc)); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		<ul class="works-grid works-grid-masonry works-grid-gut works-grid-4 works-hover-w" id="works-grid">
			<li class="work-item">
				<a>
					<div class="work-image">
						<img src="<?php if($cryptocurrency_exchange_portfolio_image_1 != NULL) { echo esc_url($cryptocurrency_exchange_portfolio_image_1); } ?>" />
					</div>
					<div class="work-caption font-alt">
						<div class="portfolio-caption">
							<h3 class="work-title text-white"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_title_1)); ?></h3>
							<div class="work-descr"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_desc_1)); ?></div>
						</div>
					</div>
				</a>
			</li>

			<li class="work-item">
				<a>
					<div class="work-image">
						<img src="<?php if($cryptocurrency_exchange_portfolio_image_2 != NULL) { echo esc_url($cryptocurrency_exchange_portfolio_image_2); } ?>" />
					</div>
					<div class="work-caption font-alt">
						<div class="portfolio-caption">
							<h3 class="work-title text-white"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_title_2)); ?></h3>
							<div class="work-descr"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_desc_2)); ?></div>
						</div>
					</div>
				</a>
			</li>
			
			<li class="work-item">
				<a>
					<div class="work-image">
						<img src="<?php if($cryptocurrency_exchange_portfolio_image_3 != NULL) { echo esc_url($cryptocurrency_exchange_portfolio_image_3); } ?>" />
					</div>
					<div class="work-caption font-alt">
						<div class="portfolio-caption">
							<h3 class="work-title text-white"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_title_3)); ?></h3>
							<div class="work-descr"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_desc_3)); ?></div>
						</div>
					</div>
				</a>
			</li>
			
			<li class="work-item">
				<a>
					<div class="work-image">
						<img src="<?php if($cryptocurrency_exchange_portfolio_image_4 != NULL) { echo esc_url($cryptocurrency_exchange_portfolio_image_4); } ?>" />
					</div>
					<div class="work-caption font-alt">
						<div class="portfolio-caption">
							<h3 class="work-title text-white"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_title_4)); ?></h3>
							<div class="work-descr"><?php echo esc_html(stripslashes($cryptocurrency_exchange_portfolio_desc_4)); ?></div>
						</div>
					</div>
				</a>
			</li>
			
		</ul>
	</div>
</section>