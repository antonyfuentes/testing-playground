<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package new-york-business
 * @since 1.0

 */

get_header(); 
//get settings
global $new_york_business_option;

$new_york_business_content = new_york_business_content_css();
$new_york_business_sidebar = new_york_business_sidebar_css();
	
?>

<div class="container background">

	<div class="row">
		<?php if($new_york_business_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 floateleft  <?php echo esc_attr($new_york_business_sidebar) ; ?>" > 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
		
	<div id="primary" class="<?php echo esc_attr($new_york_business_content); ?>  content-area">
		<main id="main" class="site-main archive" role="main">

		<?php
		if ( have_posts() ) :
		?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				 
				if ( is_archive() ) {
				    
					get_template_part( 'template-parts/post/content', 'excerpt' );
					
				} else {
					
					get_template_part( 'template-parts/post/content', get_post_format() );
					
				}				 
				

			endwhile;

			the_posts_pagination(
				array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'new-york-business' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'new-york-business' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >'.__( 'View', 'new-york-business' ).'</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'new-york-business' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'new-york-business' ) . '</span> <span class="nav-title">'.__( 'View', 'new-york-business' ).'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'new-york-business' ) . ' </span>',
				)
			);

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if($new_york_business_option['blog_sidebar_position']=='right'): ?>
		<div class="col-md-4 col-sm-4  <?php echo esc_attr($new_york_business_sidebar) ; ?>"> 
		<?php get_sidebar(); ?>
		</div>
	<?php endif; ?>
	</div>
</div><!-- .container -->

<?php
get_footer();
