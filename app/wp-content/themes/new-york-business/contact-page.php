<?php
/**
 * Template Name:Contact-Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package new-york-business
 * @since 1.0

 */

get_header(); 

global $new_york_business_option;	
if ( class_exists( 'WP_Customize_Control' ) ) {
   $new_york_business_default_settings = new new_york_business_settings();
   $new_york_business_option = wp_parse_args(get_option( 'new_york_business_option', array() ) , $new_york_business_default_settings->default_data());  
}
?>

<div id="primary" class="content-area featured-section">
  <main id="main" class="site-main" role="main">
  <section id="contact">
  <div class="svc-section-body section-padding">
    <div class="container">
      <div class="row">
        <?php if($new_york_business_option['contact_section_title']!=''): ?>
        <h1 class="section-title text-center"><?php echo esc_html( $new_york_business_option['contact_section_title'] ); ?></h1>
        <?php endif; ?>
        <?php if($new_york_business_option['contact_section_description']!=''): ?>
        <p class="section-desc wow animated fadeInUp"><?php echo esc_html( $new_york_business_option['contact_section_description'] ); ?></p>
        <?php endif; ?>
      </div>
      <div>
        <?php
			while ( have_posts() ) :
				the_post();
            ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">
            <?php the_content(); ?>
          </div>
          <!-- .entry-content -->
        </article>
        <!-- #post-## -->
        <?php endwhile; ?>
      </div>
    </div>
    <!-- .container -->
  </div>
</div>
</section>
</main>
<!-- #main -->
</div>
<!-- #primary -->
<?php
get_footer();
