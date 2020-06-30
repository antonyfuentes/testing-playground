<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package new-york-business
 * @since 1.0

 */

get_header(); 

$new_york_business_content = new_york_business_content_css();
$new_york_business_sidebar = new_york_business_sidebar_css();

?>

<div class="container background">
	<div id="primary" class="<?php echo esc_attr($new_york_business_content); ?> content-area floateleft">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found text-center">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'new-york-business' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
				
				<div class="text-center">
				<i class="fa fa-exclamation-circle page-not-found"></i>
				<span class="page-not-found-text"><?php esc_html_e('404','new-york-business'); ?></span>
				<h2><?php esc_html_e( 'Search again?', 'new-york-business' ); ?></h2>
					<div align="center" class='form-404'>
					<?php get_search_form(); ?>
					</div>
				</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->	
	</div><!-- #primary -->
	
	<div class="col-md-4 col-sm-4 floatright <?php echo esc_attr($new_york_business_sidebar); ?>"> 
		<?php get_sidebar(); ?>
	</div>
		
</div><!-- .container -->

<?php
get_footer();

