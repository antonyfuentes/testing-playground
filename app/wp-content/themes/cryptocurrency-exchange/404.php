<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>
<section class="home-section home-fade home-full-height bg-dark bg-dark-30" id="home">
	<div class="titan-caption col-sm-12 col-lg-12 col-md-12">
		<div class="caption-content">
			<div class="font-alt mb-30 titan-title-size-4"><?php esc_html_e( '404 ERROR', 'cryptocurrency-exchange' ); ?></div>
			<div class="font-alt"><?php esc_html_e( 'This file may have been moved or deleted', 'cryptocurrency-exchange' ); ?></div>
			<div class="font-alt mt-30">
				<a class="btn btn-border-w btn-round" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home page','cryptocurrency-exchange'); ?></a>
			</div>
			<div class="btn btn-round">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>