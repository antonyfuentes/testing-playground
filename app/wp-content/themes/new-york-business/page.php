<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package new-york-business
 * @since 1.0
 */

get_header();
//get default options
global $new_york_business_option;

$new_york_business_content = new_york_business_content_css();
$new_york_business_sidebar = new_york_business_sidebar_css();

?>

<div class="container background">
   <div class="row">
	<?php if($new_york_business_option['layout_section_post_one_column']==false): ?>
		<?php if($new_york_business_option['blog_sidebar_position']=='left'): ?>
		<div class="col-md-4 col-sm-4 col-xs-12 floateleft  <?php echo esc_attr($new_york_business_sidebar); ?>"> 
		<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	<?php endif; ?>    
	<div id="primary" class="<?php echo esc_attr($new_york_business_content); ?>   content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main --> 

	</div><!-- #primary -->
	<?php if($new_york_business_option['blog_sidebar_position']=='right'): ?>
		<?php if($new_york_business_option['layout_section_post_one_column']==false): ?>
			<div class="col-md-4 col-sm-4  col-xs-12  <?php echo esc_attr($new_york_business_sidebar); ?>" > 
			<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>	
  </div>		
</div><!-- .container -->

<?php
get_footer();
