<!-- Footer Widget Secton -->
   <!--start footer-->
	    <div class="site-footer">
			<div class="module-extra bg-dark">
				<div class="container">
					<div class="row">
						<?php 
						// Fetch cryptocurrency exchange Theme Footer Widget
						if ( is_active_sidebar( 'footer-widget' ) ){
							dynamic_sidebar( 'footer-widget' );
						} ?>
					</div>
				</div>
			</div>
		</div>
		<hr class="divider-d">
		<?php get_template_part('site-info'); ?>
		</div>
		<div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
	</main>	
		<?php 
		// get footer bottom
		get_template_part('/include/widgets/footer-bottom');
		wp_footer();
		?>
	</body>
</html>