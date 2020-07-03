<?php
/**
 * Displays top navigation
 *
 * @package new-york-business
 * @since 1.0

 */

?>
<?php if ( has_nav_menu( 'top' ) ) : ?>
<div class="navigation-top">
<nav id="site-navigation" class="main-navigation navigation-font-size" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'new-york-business' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo new_york_business_get_fo( array( 'icon' => 'bars' ) );
		echo new_york_business_get_fo( array( 'icon' => 'close' ) );
		esc_html_e( 'Menu', 'new-york-business' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>

</nav><!-- #site-navigation -->

</div>	  

<!-- .navigation-top -->
<?php endif; ?>
