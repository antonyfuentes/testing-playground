<?php
// Custom header function for text color
if ( ! function_exists( 'cryptocurrency_exchange_header_style' ) ) :
function cryptocurrency_exchange_header_style() {
	$cryptocurrency_exchange_header_text_color = get_header_textcolor(); 
	?>
	<style type="text/css" id="crypto-header-css">
			.header-content h1, .header-content h2, .header-content h3,
			.header-content h4, .header-content h5, .header-content h6,
			.header-content p, .header-content ul, .header-content ol, 
			.header-content li, .header-content a {
				color: #<?php echo esc_attr( $cryptocurrency_exchange_header_text_color );	?>;
			}
	</style>
	<?php
}
endif;
//customizer header settings
function cryptocurrency_exchange_header_image_customizer( $wp_customize ) {
	//$wp_customize->remove_control('header_textcolor');

	$wp_customize->add_section( 'header_image' , array(
		'title'      => __('Custom header settings','cryptocurrency-exchange'),
	) );
	$wp_customize->add_setting( 'cryptocurrency_exchange_header_one_name', array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('cryptocurrency_exchange_header_one_name', array(
		'label'   => __('Header Headline','cryptocurrency-exchange'),
		'section' => 'header_image',
		'type'    => 'text',
		'priority'   => 140,
	));
	$wp_customize->add_setting('cryptocurrency_exchange_header_one_text', array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'cryptocurrency_exchange_header_one_text', array(
		'label'   => __('Header Text','cryptocurrency-exchange'),
		'section' => 'header_image',
		'type'    => 'text',
		'priority'   => 140,
	));		
}
add_action( 'customize_register', 'cryptocurrency_exchange_header_image_customizer' );
?>