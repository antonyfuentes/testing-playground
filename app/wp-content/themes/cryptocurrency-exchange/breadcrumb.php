<?php get_header(); ?>
<!--========== Breadcrumb ==========-->
<div class="module-extra-small bg-custom margin-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			<?php if ( is_home() && ! is_paged() ) { ?>
				<h2 class="text-white"><?php echo esc_html(get_the_title( get_option('page_for_posts', true) )); ?></h2>
			<?php } else { ?>
			<h2 class="text-white"><?php the_title(); ?></h2>
			
			<?php } if ( is_home() && ! is_paged() ) { ?>
				<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'cryptocurrency-exchange'); ?></a> / <span><?php echo esc_html(get_the_title( get_option('page_for_posts', true) )); ?></span></p>		
			<?php } else { ?>
				<p class="breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home', 'cryptocurrency-exchange'); ?></a> / <span><?php the_title(); ?></span></p>				
			<?php } ?>
			</div>			
		</div>
	</div>
</div>
<!--========== END Breadcrumb ==========-->