<?php
/* Single Blog Post File */
?>
<?php get_header();	?>
	<!-- Breadcrumb Start-->
	<?php get_template_part('breadcrumb'); ?>
	<!-- Breadcrumb End single.php-->
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
										<?php the_category(', ');?>
									</span>
								<?php endif; ?>
							</div>						
							<div class="post-content-area">
								<div class="post-header font-alt">
									<h2 class="post-title"><?php the_title(); ?></h2>
									<div class="post-meta">
										<span><i class="fa fa-user"></i> <?php esc_html_e('By','cryptocurrency-exchange'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
										<span><i class="fa fa-calendar"></i>  <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
									</div>
								</div>
								<div class="post-entry">
									<?php the_content(__('Read More','cryptocurrency-exchange')); 
									//page link
									wp_link_pages(); ?>
								</div>
							</div>
						</div>
						<?php
							endwhile;
							// Reset Post Data
							wp_reset_postdata();
							endif;
						
							if( $post->comment_status == 'open' ) {
								//get comments
								if ( is_singular() ) wp_enqueue_script( "comment-reply" );	
								comments_template();
							}
							// Reset Post Data
							wp_reset_postdata();
						?>	
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="sidebar"><!--Sidebar Widget-->
					<?php dynamic_sidebar('sidebar-widget') ?>
				</div><!--Sidebar Widget End-->
			</div>
		</div><!--/.row-->
	</div> <!--/.container-->
</section>

<?php get_footer(); ?>