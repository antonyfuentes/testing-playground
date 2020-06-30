<?php
/* Archive */ 
?>
<?php get_header();	?>
	<!--========== Breadcrumb Archive ==========-->
	<div class="module-extra-small bg-custom margin-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php the_archive_title( '<h2 class="text-white">', '</h2>' ); ?>
					<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'cryptocurrency-exchange'); ?></a> / <span><?php the_archive_title(); ?></span></p>				
				</div>			
			</div>
		</div>
	</div>
	<!--========== END Breadcrumb Archive.php ==========-->
<section class="module-small">
    <div class="container">
		<div class="row">		
			<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
				<div class="col-md-8 col-sm-6 col-xs-12">
				<?php } else { ?>
				<div class="col-md-12 col-sm-6 col-xs-12">
					<?php } ?>
				<div class="post-columns site-info">
					<?php
					if(have_posts()) :
						while (have_posts()) : the_post();
						//$post_id = get_the_ID();
						
						//feature img url
						$cryptocurrency_exchange_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );  ?>		
						<div class="post">					
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>"><?php if($cryptocurrency_exchange_url != NULL) { the_post_thumbnail(); } ?></a>	
							</div>
							<div class="post-meta-area">
								<?php if (has_category()) : ?>	
									<span class="cat-links">
										<?php the_category('&nbsp;,&nbsp'); ?>
									</span>
								<?php endif; ?>
							</div>
							<div class="post-content-area">
								<div class="post-header font-alt">
									<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="post-meta">
										<span><i class="fa fa-user"></i> <?php esc_html_e('By','cryptocurrency-exchange'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
										<span><i class="fa fa-calendar"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
									</div>
								</div>
								<div class="post-more">
									<?php the_content(__('Read More','cryptocurrency-exchange')); ?>
								</div>
							</div>
						</div>
					<?php
						endwhile;
						// Reset Post Data
						wp_reset_postdata();
						endif;
					?>	
					<div style="text-align: center;" class="col-lg-12 col-md-12 col-sm-12 pagination font-alt">
						<?php									
							// Custom query loop pagination			
							global $wp_query;
							$cryptocurrency_exchange_big = 999999999; // need an unlikely integer
							
							the_posts_pagination( array(
								'base'      => str_replace( $cryptocurrency_exchange_big, '%#%', get_pagenum_link( $cryptocurrency_exchange_big ) ),
								'format'    => '?paged=%#%',
								'current'   => max( 1, get_query_var('paged') ),
								'total'     => $wp_query->max_num_pages,
								'prev_text' => __('&#x276E;', 'cryptocurrency-exchange'),
								'next_text' => __('&#x276F;', 'cryptocurrency-exchange'),
							));
						?>
					</div>
				</div>
			</div>	
			<?php if ( is_active_sidebar( 'sidebar-widget' ) ) { ?>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="sidebar"><!--Sidebar Widget-->
					<?php dynamic_sidebar('sidebar-widget') ?>
				</div><!--Sidebar Widget End-->
			</div>
			<?php } ?>
		</div><!--/.row-->
	</div><!--/.container-->
</section>
<?php get_footer(); ?>