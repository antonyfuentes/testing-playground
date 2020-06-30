<?php
get_header();
global $woocommerce; ?>
<!--breadcrumb section start-->
	<div class="module-extra-small bg-custom  margin-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h2 class="text-white"><?php 
						if( class_exists( 'WooCommerce' ) && is_shop() ) :
							$cryptocurrency_exchange_shop_text = get_theme_mod('shop_prefix', esc_html('Shop','cryptocurrency-exchange'));
							printf( esc_html( '%1$s %2$s', 'cryptocurrency-exchange' ),  esc_html($cryptocurrency_exchange_shop_text), single_tag_title( '', false ));
						elseif( is_product() ): 
							the_title( '<h2>', '</h2>' ); 
						endif; ?>
					</h2>
				</div>
				<p class="breadcrumb">
					<span>
						<?php 
							if( class_exists( 'WooCommerce' ) && is_shop() ) :
								$cryptocurrency_exchange_shop_text = get_theme_mod('shop_prefix', esc_html('Shop','cryptocurrency-exchange'));
								printf( esc_html( '%1$s %2$s', 'cryptocurrency-exchange' ), esc_html($cryptocurrency_exchange_shop_text), single_tag_title( '', false ));
							elseif( is_product() ): 
								the_title(); 
							endif; ?>
					</span>
				</p>	
			</div>
		</div>
	</div>
<!--breadcrumb section End-->

<!-- woocommerce Section with Sidebar -->
<section class="module site-content woocommerce-title">
	<div class="container">
		<div class="row">
			<div class="col-md-<?php echo ( !is_active_sidebar( 'woocommerce' ) ? '12' :'8' ); ?> col-xs-12">
				<?php woocommerce_content(); ?>
			</div>
			<!--/woocommerce Section-->
			<?php  if ( is_active_sidebar( 'woocommerce' )  ) { ?>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar">
						<?php get_sidebar('woocommerce'); ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- /woocommerce Section with Sidebar -->
<?php get_footer(); ?>