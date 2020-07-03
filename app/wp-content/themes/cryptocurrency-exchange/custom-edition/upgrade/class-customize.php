<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Cryptocurrency_Exchange_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->cryptocurrency_exchange_setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function cryptocurrency_exchange_setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . '/custom-edition/upgrade/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Cryptocurrency_Exchange_Customize_Section_Pro' );

		// doc sections.
		$manager->add_section(
			new Cryptocurrency_Exchange_Customize_Section_Pro(
				$manager,
				'cryptocurrency-exchange',
				array(
					'title'    => esc_html__( 'Theme Documentation', 'cryptocurrency-exchange' ),
					'pro_text' => esc_html__( 'Read Docs', 'cryptocurrency-exchange' ),
					'pro_url'  => 'https://awplife.com/cryptocurrency-wordpress-theme-setup/',
					'priority'  => 1
				)
			)
		);
	 
		// upgrade sections.
		$manager->add_section(
			new Cryptocurrency_Exchange_Customize_Section_Pro(
				$manager,
				'upgrade-pro',
				array(
					'title'    => esc_html__( 'Upgrade To Premium', 'cryptocurrency-exchange'),
					'pro_text' => esc_html__( 'Get Premium', 'cryptocurrency-exchange'),
					'pro_url'  => 'https://awplife.com/wordpress-themes/crypto-premium/',
					'priority'  => 500
				)
			)
		);
		
		/* // upgrade sections.
		$manager->add_section(
			new Cryptocurrency_Exchange_Customize_Section_Pro(
				$manager,
				'upgrade-pross',
				array(
					'title'    => esc_html__( 'Other Features', 'cryptocurrency-exchange'),
					'pro_text' => esc_html__( 'View', 'cryptocurrency-exchange'),
					'pro_url'  => '',
					'priority'  => 30
				)
			)
		); */
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'cryptocurrency-exchange-customize-controls', trailingslashit( get_template_directory_uri() ) . '/custom-edition/upgrade/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'cryptocurrency-exchange-customize-controls', trailingslashit( get_template_directory_uri() ) . '/custom-edition/upgrade/customize-controls.css' );
	}
}

// Doing this customizer
Cryptocurrency_Exchange_Customize::get_instance();