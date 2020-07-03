<?php 
/**
 * Template Name: Full Width Page
 */

get_header(); ?>
	<!-- Breadcrumb Start-->
	<?php get_template_part('breadcrumb'); ?>
	<!-- Breadcrumb End page.php-->
  	<section class="module right_sidebar">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-6 col-xs-12">
					<div class="post-columns site-info">
						<div class="post">
							<?php
								if(have_posts()) :
									while (have_posts()) : the_post();
										 ?>
										<div class="post-content-area">
											<div class="post-entry">
												<?php the_content(__('Read More','cryptocurrency-exchange')); ?>
											</div>
										</div>
									<?php				
									endwhile;
									// Reset Post Data
									wp_reset_postdata();
								endif;
								
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>				
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer(); ?>