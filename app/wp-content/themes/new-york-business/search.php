<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package new-york-business
 * @since 1.0

 */

get_header(); 

$new_york_business_content = new_york_business_content_css();
$new_york_business_sidebar = new_york_business_sidebar_css();	
?>

<div class="container background">
  <header class="page-header">
  <div class="row">
    <div id="primary" class="<?php echo esc_attr($new_york_business_content) ; ?>  content-area">
      <main id="main" class="site-main search" role="main">
        <?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				if ( is_page() ) {
				
				  echo '<div class="multiple-content">';
					 get_template_part( 'template-parts/page/content', 'excerpt' );
				  echo '</div>';	
				} else {
				
				  echo '<div class="multiple-content">';				
					 get_template_part( 'template-parts/post/content', 'excerpt' );
				  echo '</div>';			
				}	

			endwhile; // End of the loop.

			the_posts_pagination(
				array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'new-york-business' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'new-york-business' ) . '</span> <span class="nav-title"><span>' . '<i class="fa fa-arrow-left" aria-hidden="true" ></i>' . '<span class="nav-title nav-margin-left" >'.__( 'View', 'new-york-business' ).'</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'new-york-business' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'new-york-business' ) . '</span> <span class="nav-title">'.__( 'View', 'new-york-business' ).'<span class="nav-margin-right"></span>' . '<i class="fa fa-arrow-right" aria-hidden="true"></i>'  . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'new-york-business' ) . ' </span>',
				)
			);

		else :
		?>
        <p>
          <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'new-york-business' ); ?>
        </p>
        <?php
				get_search_form();

		endif;
		?>
      </main>
      <!-- #main -->
    </div>
    <!-- #primary -->
    <div class="col-md-4 col-sm-4  <?php echo esc_attr($new_york_business_sidebar) ; ?>">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<!-- .container -->
<?php
get_footer();
