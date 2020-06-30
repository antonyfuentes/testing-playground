<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package new-york-business
 * @since 1.0
 */

get_header(); 
//get default options
global $new_york_business_option;

$new_york_business_content = new_york_business_content_css();
$new_york_business_sidebar = new_york_business_sidebar_css();

?>

<div class="container background" >
  <div class="row">
	<?php if($new_york_business_option['layout_section_post_one_column']==false): ?>
		<?php if($new_york_business_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4  col-xs-12 floateleft" > 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?> 
	<div id="primary" class="<?php echo esc_attr($new_york_business_content); ?>  content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'new-york-business' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'new-york-business' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'new-york-business' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'new-york-business' ) . '</span> <span class="nav-title">%title<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
					)
				);

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if($new_york_business_option['blog_sidebar_position']=='right'): ?>
		<?php if($new_york_business_option['layout_section_post_one_column']==false): ?>
			<div class="col-md-4 col-sm-4  col-xs-12 floateright <?php echo esc_attr($new_york_business_sidebar) ; ?>"> 
			<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>	
 </div>	
</div><!-- .container -->

<?php 
get_footer();
