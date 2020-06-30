<?php
/**
 * Theme Customizer
 */
function cryptocurrency_exchange_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here
	wp_enqueue_style('buy-now-css', CRYPTO_THEME_URL .'/css/buy-now.css');
	//Titles
	class cryptocurrency_exchange_info extends WP_Customize_Control {
		public $type = 'info';
		public $label = '';
		public function render_content() {
		?>
			<h3 style="margin-top:30px;border-left:2px solid #181818;padding:7px;background-color:#c1c1c13b;color:#232020;text-transform:uppercase;text-align:center;"><?php echo esc_html( $this->label ); ?></h3>
		<?php
		}
	}
		
	if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'cryptocurrency_exchange_More_Control' ) ) :
	class cryptocurrency_exchange_More_Control extends WP_Customize_Control {

		/**
		* Render the content on the theme customizer page
		*/
		public function render_content() {
			?>
			<label style="overflow: hidden; zoom: 1;">
				<div class="col-md-4 col-sm-6">
					<img class="crypto_img_responsive" src="<?php echo esc_url(CRYPTO_THEME_URL .'/images/crypto-premium.png'); ?>">
				</div>
				<div class="col-md-4 col-sm-6 cryptocurrency-btn2">
					<a href="https://awplife.com/wordpress-themes/crypto-premium/" target="blank" class="btn btn-success btn"><?php esc_html_e('Upgrade to Crypto Premium','cryptocurrency-exchange'); ?> </a>
				</div>
				<div class="col-md-3 col-sm-6">
					<h3 class="features-btn"><?php echo esc_html_e( 'Crypto Premium - Features','cryptocurrency-exchange'); ?></h3>
					<ul>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design','cryptocurrency-exchange'); ?> </li>					
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Translation Ready','cryptocurrency-exchange'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multi Purpose','cryptocurrency-exchange'); ?>  </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('High Performance','cryptocurrency-exchange'); ?>  </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Font Awesome Icons','cryptocurrency-exchange'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Blog Template','cryptocurrency-exchange'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multi Color Option','cryptocurrency-exchange'); ?></li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Advanced Typography','cryptocurrency-exchange'); ?>   </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible','cryptocurrency-exchange'); ?>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Theme Layout','cryptocurrency-exchange'); ?>  </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Ultimate Portfolio layout with Isotope effect','cryptocurrency-exchange'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Home Page Active/Inactive Sections','cryptocurrency-exchange'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Support Access','cryptocurrency-exchange'); ?> </li>
						<li class="background-box"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Homepage Section Draggable','cryptocurrency-exchange'); ?> </li>
					</ul>
				</div>
				<hr>
			</label>
			<?php
		}
	}
	endif;	
		
		
		
		$wp_customize->remove_control('blogdescription');
		//cryptocurrency exchange Theme Options
		$wp_customize->add_panel('cryptocurrency_exchange_theme_options', array(
				'title' 	=> __( 'Theme Options', 'cryptocurrency-exchange' ),
				'priority' 	=> 1,
			)
		);

		
		//1. Upgrade To Crypto Premium ======================================
		$wp_customize->add_section( 'upgrade_crypto_premium' , array(
			'title'      	=> __( 'Upgrade to Premium', 'cryptocurrency-exchange' ),
			'priority'   	=> 1,
			'panel'=>'cryptocurrency_exchange_theme_options',
		) );

			$wp_customize->add_setting( 'upgrade_crypto_premium', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new cryptocurrency_exchange_More_Control( $wp_customize, 'upgrade_crypto_premium', array(
				'label'    => __( 'Crypto Premium', 'cryptocurrency-exchange' ),
				'section'  => 'upgrade_crypto_premium',
				'settings' => 'upgrade_crypto_premium',
				'priority' => 1,
			) ) ); 
		//1. Upgrade To Crypto Premium ======================================
	
		
		
		//4. Slider Settings Start ======================================
		$wp_customize->add_section( 'cryptocurrency_slider_option' , array(
				'title'      	=> __( 'HomePage Slider Settings', 'cryptocurrency-exchange' ),
				'description'   => __('You can only add limited slides Into Free version. ', 'cryptocurrency-exchange'),
				'priority'      => 4,
				'panel'      	=> 'cryptocurrency_exchange_theme_options',
			) 
		);
		
			//Enable Slider			
			$wp_customize->add_setting( 'cryptocurrency_exchange_slider_section', array(
					'default'      		=> 'inactive',
					'sanitize_callback' => 'cryptocurrency_exchange_sanitize_radio'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_section', array(
					'type'      => 'radio',
					'label'     => __('Slider Section', 'cryptocurrency-exchange'),
					'section'   => 'cryptocurrency_slider_option',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'cryptocurrency-exchange' ),
						'inactive'     => __( 'Inactive', 'cryptocurrency-exchange' ),
					),
				)
			);
			
			//Slide One =============
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 's1', array(
						'label' 	=> __('Slide One', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_slider_option',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 3,
						'active_callback' => 'cryptocurrency_exchange_slider_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('cryptocurrency_exchange_slider_image_1', array(
					'default' 			=> get_template_directory_uri() . '/images/slider/slider1.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'cryptocurrency_exchange_slider_image_1', array(
					   'label'          => __( 'Upload your image for the slide one', 'cryptocurrency-exchange' ),
					   'type'           => 'image',
					   'section'        => 'cryptocurrency_slider_option',
					   'settings'       => 'cryptocurrency_exchange_slider_image_1',
					   'priority'       => 4,
						'active_callback' => 'cryptocurrency_exchange_slider_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_slider_title_1', array(
					'default' 			=> esc_html('Slide show title one','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
					
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_title_1', array(
					'label' 	=> __( 'Title for the slide one', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type' 		=> 'text',
					'priority' 	=> 5,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_slider_desc_1', array(
					'default' 			=> esc_html('Lorem ipsum is dummy text used in web designs.','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_desc_1', array(
					'label' 	=> __( 'Slider Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type'		=> 'textarea',
					'priority' 	=> 5,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Button Link
			$wp_customize->add_setting('cryptocurrency_exchange_slider_btn_link_1', array(
					'default' 			=> esc_html('#','cryptocurrency-exchange'),
					'sanitize_callback' => 'esc_url_raw'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_btn_link_1', array(
					'label' 	=> __( 'Button Link', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type' 		=> 'url',
					'priority'	=> 6,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Button Text
			$wp_customize->add_setting('cryptocurrency_exchange_slider_btn_text_1', array(
					'default' 			=> esc_html('Learn More','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_btn_text_1', array(
					'label' 	=> __( 'Button Text', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type' 		=> 'text',
					'priority' 	=> 7,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Slide Two =============
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 's2', array(
						'label' 	=> __('Slide Two', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_slider_option',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 8,
						'active_callback' => 'cryptocurrency_exchange_slider_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('cryptocurrency_exchange_slider_image_2', array(
					'default' 			=> get_template_directory_uri() . '/images/slider/slider2.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'cryptocurrency_exchange_slider_image_2', array(
					   'label'          => __( 'Upload your image for the slide two', 'cryptocurrency-exchange' ),
					   'type'           => 'image',
					   'section'        => 'cryptocurrency_slider_option',
					   'settings'       => 'cryptocurrency_exchange_slider_image_2',
					   'priority'       => 9,
						'active_callback' => 'cryptocurrency_exchange_slider_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_slider_title_2', array(
					'default' 			=> esc_html('Slide show title two','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_title_2', array(
					'label' 	=> __( 'Title for the slide two', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type' 		=> 'text',
					'priority' 	=> 10,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_slider_desc_2', array(
					'default' 			=> esc_html('Lorem ipsum is dummy text used in web designs.','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_desc_2', array(
					'label' 	=> __( 'Slider Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type' 		=> 'textarea',
					'priority' 	=> 11,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Button Link
			$wp_customize->add_setting('cryptocurrency_exchange_slider_btn_link_2', array(
					'default' 			=> esc_html('#','cryptocurrency-exchange'),
					'sanitize_callback' => 'esc_url_raw'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_btn_link_2', array(
					'label' 	=> __( 'Button Link', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type' 		=> 'url',
					'priority' 	=> 12,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Button Text
			$wp_customize->add_setting('cryptocurrency_exchange_slider_btn_text_2', array(
					'default' 			=> esc_html('Read More','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_btn_text_2', array(
					'label' 	=> __( 'Button Text', 'cryptocurrency-exchange' ),
					'section'	=> 'cryptocurrency_slider_option',
					'type' 		=> 'text',
					'priority'  => 13,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Slide Three =============
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 's3', array(
						'label' 	=> __('Slide Three', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_slider_option',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 14,
						'active_callback' => 'cryptocurrency_exchange_slider_callback',
					) 
				)
			);    
			
			$wp_customize->add_setting('cryptocurrency_exchange_slider_image_3', array(
					'default' 			=> get_template_directory_uri() . '/images/slider/slider3.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'cryptocurrency_exchange_slider_image_3', array(
					   'label'          => __( 'Upload your image for the slide three', 'cryptocurrency-exchange' ),
					   'type'           => 'image',
					   'section'        => 'cryptocurrency_slider_option',
					   'settings'       => 'cryptocurrency_exchange_slider_image_3',
					   'priority'       => 15,
						'active_callback' => 'cryptocurrency_exchange_slider_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_slider_title_3', array(
					'default' 			=> esc_html('Slide show title three','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'

				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_title_3', array(
					'label' 	=> __( 'Title for the slide three', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type' 		=> 'text',
					'priority' 	=> 16,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_slider_desc_3', array(
					'default' 			=> esc_html('Lorem ipsum is dummy text used in web designs.','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_desc_3', array(
					'label' 	=> __( 'Slider Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type' 		=> 'textarea',
					'priority' 	=> 17,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Button Link
			$wp_customize->add_setting('cryptocurrency_exchange_slider_btn_link_3', array(
					'default' 			=> esc_html('#','cryptocurrency-exchange'),
					'sanitize_callback' => 'esc_url_raw'

				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_btn_link_3', array(
					'label' 	=> __( 'Button Link', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_slider_option',
					'type' 		=> 'url',
					'priority' 	=> 18,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Button Text
			$wp_customize->add_setting('cryptocurrency_exchange_slider_btn_text_3', array(
					'default' 			=> esc_html('Download Now','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_slider_btn_text_3', array(
					'label' 	=> __( 'Button Text', 'cryptocurrency-exchange' ),
					'section'	=> 'cryptocurrency_slider_option',
					'type' 		=> 'text',
					'priority'  => 19,
					'active_callback' => 'cryptocurrency_exchange_slider_callback',
				)
			);
			
			//Slider Radio Button Show And Hide Funcion			
			function cryptocurrency_exchange_slider_callback( $cryptocurrency_slider_control ) {
				$cryptocurrency_slider_radio_setting = $cryptocurrency_slider_control->manager->get_setting('cryptocurrency_exchange_slider_section')->value();
				$cryptocurrency_slider_control_id = $cryptocurrency_slider_control->id;
				//slide one
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_speed'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_autoplay'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 's1'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_image_1'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_title_1'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_desc_1'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_btn_link_1'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_btn_text_1'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				//slide two
				if ( $cryptocurrency_slider_control_id == 's2'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_image_2'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_title_2'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_desc_2'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_btn_link_2'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_btn_text_2'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				//slide three
				if ( $cryptocurrency_slider_control_id == 's3'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_image_3'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_title_3'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_desc_3'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_btn_link_3'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_slider_control_id == 'cryptocurrency_exchange_slider_btn_text_3'  && $cryptocurrency_slider_radio_setting == 'active' ) return true;
				
				return false;
			}	
		//4. Slider Settings End ======================================
		
		
		
		//5. Service Settings Start ======================================
		$wp_customize->add_section( 'cryptocurrency_service_option' , array(
				'title'      	=> __( 'HomePage Service Settings', 'cryptocurrency-exchange' ),
				'priority'      => 5,
				'panel'      	=> 'cryptocurrency_exchange_theme_options',
			) 
		);
		
			//Enable Service
			$wp_customize->add_setting( 'cryptocurrency_exchange_service_section', array(
					'default'     		=> 'inactive',
					'sanitize_callback' => 'cryptocurrency_exchange_sanitize_radio'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_section', array(
					'type'      => 'radio',
					'label'     => __('Service Section', 'cryptocurrency-exchange'),
					'section'   => 'cryptocurrency_service_option',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'cryptocurrency-exchange' ),
						'inactive'     => __( 'Inactive', 'cryptocurrency-exchange' ),
					),
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_service_section_title', array(
					'default' 			=> esc_html('Our Service','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_section_title', array(
					'label' 	=> __( 'Section Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 1,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_service_section_desc', array(
					'default' 			=> esc_html('We are here to make your website look more elegant and stylish!','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_section_desc', array(
					'label' 	=> __( 'Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 1,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			
			//Service One ================
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 'service_one', array(
						'label' 	=> __('Service One', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_service_option',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 2,
						'active_callback' => 'cryptocurrency_exchange_service_callback',
					) 
				)
			);
			
			
			//Icon
			$wp_customize->add_setting('cryptocurrency_exchange_service_icon_1', array(
					'default' 			=> esc_html('fa-handshake-o','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_icon_1', array(
					'label' 	=> __( 'Service Icon', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 3,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_service_title_1', array(
					'default' 			=> esc_html('Buy and Sell','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_title_1', array(
					'label' 	=> __( 'Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 4,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_service_desc_1', array(
					'default' 			=> esc_html('The passage is attributed to an typesetter in the 15th century who is thought to have scrambled parts of use in a specimen book','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_desc_1', array(
					'label' 	=> __( 'Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 5,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			 //Service Two ================
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 'service_two', array(
						'label' 	=> __('Service Two', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_service_option',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 6,
						'active_callback' => 'cryptocurrency_exchange_service_callback',
					) 
				)
			);
		
			//Icon
			$wp_customize->add_setting('cryptocurrency_exchange_service_icon_2', array(
					'default' 			=> esc_html('fa-line-chart','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_icon_2', array(
					'label' 	=> __( 'Service Icon', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 7,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_service_title_2', array(
					'default' 			=> esc_html('Live Exchange','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_title_2', array(
					'label' 	=> __( 'Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 8,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_service_desc_2', array(
					'default' 			=> esc_html('The passage is attributed to an typesetter in the 15th century who is thought to have scrambled parts of use in a specimen book','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_desc_2', array(
					'label' 	=> __( 'Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 9,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			//Service Three ================
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 'service_three', array(
						'label' 	=> __('Service Three', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_service_option',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 10,
						'active_callback' => 'cryptocurrency_exchange_service_callback',
					) 
				)
			);
			
			//Icon
			$wp_customize->add_setting('cryptocurrency_exchange_service_icon_3', array(
					'default' 			=> esc_html('fa-money','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			
			$wp_customize->add_control('cryptocurrency_exchange_service_icon_3', array(
					'label' 	=> __( 'Service Icon', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 11,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_service_title_3', array(
					'default' 			=> esc_html('Secure Wallet','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_title_3', array(
					'label' 	=> __( 'Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 12,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_service_desc_3', array(
					'default' 			=> esc_html('The passage is attributed to an typesetter in the 15th century who is thought to have scrambled parts of use in a specimen book','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_service_desc_3', array(
					'label' 	=> __( 'Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_service_option',
					'type' 		=> 'text',
					'priority' 	=> 13,
					'active_callback' => 'cryptocurrency_exchange_service_callback',
				)
			); 
				
			//Service Radio Button Show And Hide Funcion			
			function cryptocurrency_exchange_service_callback( $cryptocurrency_service_control ) {
				$cryptocurrency_service_radio_setting = $cryptocurrency_service_control->manager->get_setting('cryptocurrency_exchange_service_section')->value();
				$cryptocurrency_service_control_id = $cryptocurrency_service_control->id;
				
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_section_title'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_section_desc'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				//service one
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_column_layout'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'service_one'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_icon_1'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_title_1'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_desc_1'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				//service two			
				if ( $cryptocurrency_service_control_id == 'service_two'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_icon_2'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_title_2'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_desc_2'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				//service three
				if ( $cryptocurrency_service_control_id == 'service_three'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_icon_3'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_title_3'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_service_control_id == 'cryptocurrency_exchange_service_desc_3'  && $cryptocurrency_service_radio_setting == 'active' ) return true;
				  
				return false;
			}
		//5. Service Settings End ======================================
		
		//6. Portfolio Settings
		include( get_template_directory() . '/include/portfolio-customizer.php');
		//6. Portfolio Settings	
		
		
		
		//7. Blog Options Settings Start ======================================
		$wp_customize->add_section( 'cryptocurrency_exchange_blog_option' , array(
				'title'      	=> __( 'HomePage Blog Settings', 'cryptocurrency-exchange' ),
				'description'	=> __( 'You can change blog page layout and single blog page layout from here.', 'cryptocurrency-exchange' ),
				'priority'      => 7,
				'panel'      	=> 'cryptocurrency_exchange_theme_options',
			) 
		);
				
			//Enable Blog
			$wp_customize->add_setting( 'cryptocurrency_exchange_blog_section', array(
					'default'     		=> 'inactive',
					'sanitize_callback' => 'cryptocurrency_exchange_sanitize_radio'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_blog_section', array(
					'type'      => 'radio',
					'label'     => __('Blog Section', 'cryptocurrency-exchange'),
					'section'   => 'cryptocurrency_exchange_blog_option',
					'settings'   => 'cryptocurrency_exchange_blog_section',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'cryptocurrency-exchange' ),
						'inactive'     => __( 'Inactive', 'cryptocurrency-exchange' ),
					),
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_blog_section_title', array(
					'default' 			=> esc_html('Latest News & Blog','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_blog_section_title', array(
					'label' 	=> __( 'Section Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_exchange_blog_option',
					'type' 		=> 'text',
					'priority' 	=> 2,
					'active_callback' => 'cryptocurrency_exchange_blog_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_blog_section_desc', array(
					'default' 			=> esc_html('Your latest posts displayed inside a nice slider. You can customize what the slider looks like.','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_blog_section_desc', array(
					'label' 	=> __( 'Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_exchange_blog_option',
					'type' 		=> 'text',
					'priority' 	=> 3,
					'active_callback' => 'cryptocurrency_exchange_blog_callback',
				)
			);
			
			//Blog Radio Button Show And Hide Funcion			
			function cryptocurrency_exchange_blog_callback( $cryptocurrency_exchange_blog_control ) {
				$cryptocurrency_exchange_blog_setting = $cryptocurrency_exchange_blog_control->manager->get_setting('cryptocurrency_exchange_blog_section')->value();
				$cryptocurrency_exchange_blog_control_id = $cryptocurrency_exchange_blog_control->id;
				if ( $cryptocurrency_exchange_blog_control_id == 'cryptocurrency_exchange_blog_section_title'  && $cryptocurrency_exchange_blog_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_blog_control_id == 'cryptocurrency_exchange_blog_section_desc'  && $cryptocurrency_exchange_blog_setting == 'active' ) return true;
				return false;
			}
		
		//7. Blog Options Settings End ======================================
			
			//8. testimonial Settings Settings Start ======================================
		$wp_customize->add_section( 'cryptocurrency_exchange_testimonial_settings' , array(
				'title'      	=> __( 'HomePage Testimonial Settings', 'cryptocurrency-exchange' ),
				'priority'      => 8,
				'panel'			=> 'cryptocurrency_exchange_theme_options'
			) 
		);
		
			//Enable Testimonial
			$wp_customize->add_setting( 'cryptocurrency_exchange_testimonial_section', array(
					'default'     		=> 'inactive',
					'sanitize_callback' => 'cryptocurrency_exchange_sanitize_radio'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_testimonial_section', array(
					'type'      => 'radio',
					'label'     => __('Testimonial Section', 'cryptocurrency-exchange'),
					'section'   => 'cryptocurrency_exchange_testimonial_settings',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'cryptocurrency-exchange' ),
						'inactive'     => __( 'Inactive', 'cryptocurrency-exchange' ),
					),
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_testimonial_section_title', array(
					'default' 			=> esc_html('What People Say','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_testimonial_section_title', array(
					'label' 	=> __( 'Section Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_exchange_testimonial_settings',
					'type' 		=> 'text',
					'priority' 	=> 1,
					'active_callback' => 'cryptocurrency_exchange_testimonial_callback',
				)
			);
			
			//Testimonial Section Description
			$wp_customize->add_setting('cryptocurrency_exchange_testimonial_section_desc', array(
					'default' 			=> esc_html('Lorem Ipsum is simply dummy text of the printing and typesetting industry standard dummy text ever since.','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_testimonial_section_desc', array(
					'label' 	=> __( 'Section Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_exchange_testimonial_settings',
					'type' 		=> 'text',
					'priority' 	=> 2,
					'active_callback' => 'cryptocurrency_exchange_testimonial_callback',
				)
			);
			
			
			 
			//Testimonial one
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 'cryptocurrency_exchange_testimonial_section_info', array(
				'label' 	=> __('Testimonial', 'cryptocurrency-exchange'),
				'section' 	=> 'cryptocurrency_exchange_testimonial_settings',
				'settings'  => 'cryptocurrency_title',
				'priority' 	=> 3,
				'active_callback' => 'cryptocurrency_exchange_testimonial_callback',
			)));    
			
			$wp_customize->add_setting('cryptocurrency_exchange_testimonial_image_1', array(
					'default' 			=> get_template_directory_uri() . '/images/testimonial.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'cryptocurrency_exchange_testimonial_image_1', array(
					   'label'          => __( 'Client Image', 'cryptocurrency-exchange' ),
					   'type'           => 'image',
					   'section'        => 'cryptocurrency_exchange_testimonial_settings',
					   'settings'       => 'cryptocurrency_exchange_testimonial_image_1',
					   'priority'       => 4,
						'active_callback' => 'cryptocurrency_exchange_testimonial_callback',
					)
				)
			);
			
			//Testimonial client Description
			$wp_customize->add_setting('cryptocurrency_exchange_testimonial_description', array(
					'default' 			=> esc_html('We are here to make your website look more elegant and stylish!','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_testimonial_description', array(
					'label' 	=> __( 'Client Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_exchange_testimonial_settings',
					'type' 		=> 'text',
					'priority' 	=> 6,
					'active_callback' => 'cryptocurrency_exchange_testimonial_callback',
				)
			);
			
			//Client Title
			$wp_customize->add_setting('cryptocurrency_exchange_testimonial_client_title', array(
					'default' 			=> esc_html('Jannie Smith','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_testimonial_client_title', array(
					'label' 	=> __( 'Client Name', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_exchange_testimonial_settings',
					'type' 		=> 'text',
					'priority' 	=> 7,
					'active_callback' => 'cryptocurrency_exchange_testimonial_callback',
				)
			);
			
			//Client Designation
			$wp_customize->add_setting('cryptocurrency_exchange_testimonial_client_designation', array(
					'default' 			=> esc_html('Marketing Department','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_testimonial_client_designation', array(
					'label' 	=> __( 'Designation', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_exchange_testimonial_settings',
					'type' 		=> 'text',
					'priority' 	=> 8,
					'active_callback' => 'cryptocurrency_exchange_testimonial_callback',
				)
			);
			
			//testimonial Radio Button Show And Hide Funcion			
			function cryptocurrency_exchange_testimonial_callback( $cryptocurrency_exchange_testimonial_control ) {
				$cryptocurrency_exchange_testimonial_radio_setting = $cryptocurrency_exchange_testimonial_control->manager->get_setting('cryptocurrency_exchange_testimonial_section')->value();
				$cryptocurrency_exchange_testimonial_control_id = $cryptocurrency_exchange_testimonial_control->id;
				//testimonial section
				if ( $cryptocurrency_exchange_testimonial_control_id == 'cryptocurrency_exchange_testimonial_section_title'  && $cryptocurrency_exchange_testimonial_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_testimonial_control_id == 'cryptocurrency_exchange_testimonial_section_desc'  && $cryptocurrency_exchange_testimonial_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_testimonial_control_id == 'cryptocurrency_exchange_testimonial_bg_image'  && $cryptocurrency_exchange_testimonial_radio_setting == 'active' ) return true;
				//Testimonial one data
				if ( $cryptocurrency_exchange_testimonial_control_id == 'cryptocurrency_exchange_testimonial_section_info'  && $cryptocurrency_exchange_testimonial_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_testimonial_control_id == 'cryptocurrency_exchange_testimonial_image_1'  && $cryptocurrency_exchange_testimonial_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_testimonial_control_id == 'cryptocurrency_exchange_testimonial_description'  && $cryptocurrency_exchange_testimonial_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_testimonial_control_id == 'cryptocurrency_exchange_testimonial_client_title'  && $cryptocurrency_exchange_testimonial_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_testimonial_control_id == 'cryptocurrency_exchange_testimonial_client_designation'  && $cryptocurrency_exchange_testimonial_radio_setting == 'active' ) return true;
				return false;
			}
		//8. testimonial Settings Settings Start ======================================
	
		//10. Social Icon Settings
		$wp_customize->add_section( 'cryptocurrency_exchange_topbar_settings' , array(
				'title'      	=> __( 'Email & Icon Settings', 'cryptocurrency-exchange' ),
				'priority'      => 10,
				'panel'			=> 'cryptocurrency_exchange_theme_options',
				'description'	=> __('Social Media icons will disappear if you leave it blank', 'cryptocurrency-exchange')
			) 
		);
			
			//Email setting
			$wp_customize->add_setting('cryptocurrency_email_detaill', array(
					'default' 			=> esc_html('','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_email_detaill', array(
					'label' 	=> __( 'Email', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_exchange_topbar_settings',
					'type' 		=> 'text',
					'priority' 	=> 2,
				)
			);
			
			
			//Social Media
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',     
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 'social_media', array(
						'label' 	=> __('Social Media', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_exchange_topbar_settings',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 4,
					) 
				)
			);
			
			//Facebook link
			$wp_customize->add_setting( 'cryptocurrency_exchange_fb_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'cryptocurrency_exchange_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'cryptocurrency_exchange_fb_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable Facebook Icon?', 'cryptocurrency-exchange'),
					'section'     => 'cryptocurrency_exchange_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('cryptocurrency_exchange_facebook_url', array( 
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('cryptocurrency_exchange_facebook_url', array(
					'description' 	=> __('Enter your Facebook url', 'cryptocurrency-exchange'),
					'section' 		=> 'cryptocurrency_exchange_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			//Twitter URL
			$wp_customize->add_setting( 'cryptocurrency_exchange_tweet_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'cryptocurrency_exchange_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'cryptocurrency_exchange_tweet_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable Twitter Icon?', 'cryptocurrency-exchange'),
					'section'     => 'cryptocurrency_exchange_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('cryptocurrency_exchange_twitter_url', array( 
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('cryptocurrency_exchange_twitter_url', array(
					'description' 	=> __('Enter your Twitter url', 'cryptocurrency-exchange'),
					'section' 		=> 'cryptocurrency_exchange_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			
			//Instagram URL
			$wp_customize->add_setting( 'cryptocurrency_exchange_insta_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'cryptocurrency_exchange_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'cryptocurrency_exchange_insta_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable Instagram Icon?', 'cryptocurrency-exchange'),
					'section'     => 'cryptocurrency_exchange_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('cryptocurrency_exchange_instagram_url', array(
					'default' 			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('cryptocurrency_exchange_instagram_url', array(
					'description'	=> __('Enter your Instagram url', 'cryptocurrency-exchange'),
					'section' 		=> 'cryptocurrency_exchange_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
			//YouTube URL
			$wp_customize->add_setting( 'cryptocurrency_exchange_youtube_link_disable', array(
					'default'           => 1,
					'sanitize_callback' => 'cryptocurrency_exchange_sanitize_checkbox',
				)
			);
			$wp_customize->add_control( 'cryptocurrency_exchange_youtube_link_disable', array(
					'type'        => 'checkbox',
					'label'       => __('Disable YouTube Icon?', 'cryptocurrency-exchange'),
					'section'     => 'cryptocurrency_exchange_topbar_settings',
					'priority' 	  => 4,
				)
			);
			
			$wp_customize->add_setting('cryptocurrency_exchange_youtube_url', array(
					'default'			=> '',
					'sanitize_callback' => 'esc_url_raw'
					) 
				);
			$wp_customize->add_control('cryptocurrency_exchange_youtube_url', array(
					'description' 	=> __('Enter your YouTube url', 'cryptocurrency-exchange'),
					'section' 		=> 'cryptocurrency_exchange_topbar_settings',
					'type' 			=> 'url',
					'priority' 		=> 4,
				)
			);
						

		$wp_customize->get_setting( 'blogname' )->transport        = 'refresh';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'refresh';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector'        => '.logo-text a',
				'render_callback' => 'cryptocurrency_customize_partial_blogname',
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => 'cryptocurrency_customize_partial_blogdescription',
			) );
		}

}
add_action( 'customize_register', 'cryptocurrency_exchange_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cryptocurrency_customize_partial_blogname() {

	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cryptocurrency_customize_partial_blogdescription() {

	bloginfo( 'description' );
}


/**

/**
	Sanitize
**/
//checkbox sanitization function
function cryptocurrency_exchange_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return 0;
	}
}
     
//radio box sanitization function
function cryptocurrency_exchange_sanitize_radio( $input, $setting ) {
 
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible radio box options 
	$choices = $setting->manager->get_control( $setting->id )->choices;
					 
	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
	 
}

//select sanitization function
function cryptocurrency_exchange_sanitize_select( $input, $setting ) {
 
	//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	$input = sanitize_key($input);

	//get the list of possible select options 
	$choices = $setting->manager->get_control( $setting->id )->choices;

	//return input if valid or return default option
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
	 
}

/**
 * Function to sanitize alpha color.
 *
 * @param string $input Hex or RGBA color.
 *
 * @return string
 */
function cryptocurrency_exchange_sanitize_hex_colors( $input ) {
	// Is this an rgba color or a hex?
	$mode = ( false === strpos( $input, 'rgba' ) ) ? 'hex' : 'rgba';

	if ( 'rgba' === $mode ) {
		return cryptocurrency_exchange_sanitize_rgba( $input );
	} else {
		return sanitize_hex_color( $input );
	}
}
?>