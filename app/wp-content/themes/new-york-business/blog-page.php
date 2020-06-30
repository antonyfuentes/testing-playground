<?php
/**
 * Template Name: Blog-Page
 * The template for displaying blog pages
 *
 * @package new-york-business
 * @since 1.0

 */

get_header();

//get settings
global $new_york_business_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $new_york_business_default_settings = new new_york_business_settings();
   $new_york_business_option = wp_parse_args(  get_option( 'new_york_business_option', array() ) , $new_york_business_default_settings->default_data());  
}

$new_york_business_content = new_york_business_content_css();
$new_york_business_sidebar = new_york_business_sidebar_css();

?>
<div class="container background">

    <div class="row">
		<?php if($new_york_business_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 floateleft   <?php echo esc_attr($new_york_business_sidebar) ; ?>" > 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	<div id="primary" class="<?php echo esc_attr($new_york_business_content) ; ?>   content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :
		?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				if ( is_archive() ) {
				    
					get_template_part( 'template-parts/post/content', 'excerpt' );
					
				} else {
					
					get_template_part( 'template-parts/post/content', get_post_format() );
					
				}
			endwhile;

			the_posts_pagination(
				array(
				'mid_size' => 0,
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'new-york-business' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'new-york-business' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >'.__( 'View', 'new-york-business' ).'</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'new-york-business' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'new-york-business' ) . '</span> <span class="nav-title">'.__( 'View', 'new-york-business' ).'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
					
				)
			);

		else :		
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if($new_york_business_option['blog_sidebar_position']=='right'): ?>
		<div class="col-md-4 col-sm-4 floateright    <?php echo esc_attr($new_york_business_sidebar) ; ?>" > 
		<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	</div>
</div><!-- .container -->

<?php
get_footer();