<?php
/**
 * Front Page Template Part: Blog Posts
 */
get_header();

	$cryptocurrency_exchange_blog_section_title = get_theme_mod('cryptocurrency_exchange_blog_section_title', 'What People Say');
	$cryptocurrency_exchange_blog_section_desc = get_theme_mod('cryptocurrency_exchange_blog_section_desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry');		
	
	$cryptocurrency_exchange_testimonial_image_1 = get_theme_mod('cryptocurrency_exchange_testimonial_image_1', get_template_directory_uri() . '/images/testimonial.jpg');
	$cryptocurrency_exchange_testimonial_description = get_theme_mod('cryptocurrency_exchange_testimonial_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s.');
	$cryptocurrency_exchange_testimonial_client_title = get_theme_mod('cryptocurrency_exchange_testimonial_client_title', 'Jannie Smith');
	$cryptocurrency_exchange_testimonial_client_designation = get_theme_mod('cryptocurrency_exchange_testimonial_client_designation', 'Marketing Department');
?>

<section class="module bg-light parallax-bg">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="section-header">
					<?php if($cryptocurrency_exchange_blog_section_title != '') { ?>
					<h1 class="section-title"><?php echo esc_html(stripslashes($cryptocurrency_exchange_blog_section_title)); ?></h1>
					<span class="section-seperator"></span>
					<?php } if($cryptocurrency_exchange_blog_section_desc != '') { ?>
					<p class="section-subtitle"><?php echo esc_html(stripslashes($cryptocurrency_exchange_blog_section_desc)); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
	
		<div class="row multi-columns-row post-columns">
			<?php
			// Get current page and append to custom query parameters array
			 $cryptocurrency_exchange_custom_query_args = array( 'post_type' => 'post', 'posts_per_page' => 3); 
			/* $cryptocurrency_exchange_custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; */
			// Instantiate custom query
			$cryptocurrency_exchange_custom_query = new WP_Query( $cryptocurrency_exchange_custom_query_args );

			// Fetch All Post 
			if( $cryptocurrency_exchange_custom_query->have_posts()) {
				while ( $cryptocurrency_exchange_custom_query->have_posts()) : $cryptocurrency_exchange_custom_query->the_post();
				//$cryptocurrency_exchange_post_id = get_the_ID();
				
				//feature img url
				$cryptocurrency_exchange_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 	 ?>
					<div class="<?php echo esc_attr(get_theme_mod('cryptocurrency_exchange_blog_column_layout', 'col-md-4 col-sm-6 col-xs-12')); ?>">
						<div class="post">	
							<?php if($cryptocurrency_exchange_url != NULL) { ?>
								<div class="post-thumbnail">
									<a href="<?php the_permalink(); ?>"><?php if($cryptocurrency_exchange_url != NULL) { the_post_thumbnail(); } ?></a>	
								</div>
							<?php } ?>
							<div class="post-meta-area">
								<?php if (has_category()) : ?>
									<span class="cat-links">
										<?php the_category(', '); ?>
									</span>
								<?php endif; ?>
							</div>
							<div class="post-content-area">
								<div class="post-header font-alt">
									<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="post-meta">
										<span><?php esc_html_e('By','cryptocurrency-exchange'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
										<span><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
									</div>
								</div>
								<div class="post-more">
									<?php echo wp_trim_words( get_the_content(), 40, '...' ); ?>
								</div>
								<p class="post-button">
									<a class="more-link" href="<?php the_permalink()?>"><?php esc_html_e('Read More','cryptocurrency-exchange'); ?></a>
								</p>
							</div>
						</div>
					</div>
				<?php
				endwhile;
				// Reset Post Data
				wp_reset_postdata();
			} 
			?>
		</div>
	</div>
</section>