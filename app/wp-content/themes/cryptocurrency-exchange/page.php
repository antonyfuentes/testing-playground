<?php get_header(); ?>
	<!-- Breadcrumb Start-->
	<?php get_template_part('breadcrumb'); ?>
	<!-- Breadcrumb End page.php-->
  	<section class="module right_sidebar">
		<div class="container">
			<div class="row">
				<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
				<div class="col-md-8 col-sm-6 col-xs-12">
				<?php } else { ?>
				<div class="col-md-12 col-sm-6 col-xs-12">
					<?php } ?>
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
				<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="sidebar">
							<?php dynamic_sidebar('sidebar-widget') ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>