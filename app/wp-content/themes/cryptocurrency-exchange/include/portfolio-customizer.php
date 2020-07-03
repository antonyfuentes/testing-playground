<?php 

		//6. Portfolio Settings Start ======================================
		$wp_customize->add_section( 'cryptocurrency_portfolio_section' , array(
				'title'      	=> __( 'HomePage Portfolio Settings', 'cryptocurrency-exchange' ),
				'priority'      => 6,
				'panel'      	=> 'cryptocurrency_exchange_theme_options',
			) 
		);
		
			//Enable Portfolio
			$wp_customize->add_setting( 'cryptocurrency_exchange_portfolio_section', array(
					'default'     		=> 'inactive',
					'sanitize_callback' => 'cryptocurrency_exchange_sanitize_radio'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_section', array(
					'type'      => 'radio',
					'label'     => __('Portfolio Section', 'cryptocurrency-exchange'),
					'section'   => 'cryptocurrency_portfolio_section',
					'priority'  => 1,
					'choices'   => array(
						'active'       => __( 'Active', 'cryptocurrency-exchange' ),
						'inactive'     => __( 'Inactive', 'cryptocurrency-exchange' ),
					),
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_section_title', array(
					'default' 			=> esc_html('Our Projects','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_section_title', array(
					'label' 	=> __( 'Section title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 1,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_section_desc', array(
					'default' 			=> esc_html('Our Powerful Ideas and Projects','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_section_desc', array(
					'label' 	=> __( 'Section Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 1,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);

			//portfolio One
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 'portfolio_one', array(
						'label' 	=> __('Portfolio One', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_portfolio_section',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 2,
						'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
					) 
				)
			);
			
			//Portfolio Image one
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_image_1', array(
					'default' 			=> get_template_directory_uri() . '/images/project01.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'cryptocurrency_exchange_portfolio_image_1', array(
					   'label'          => __( 'Upload Portfolio Image', 'cryptocurrency-exchange' ),
					   'type'           => 'image',
					   'section'        => 'cryptocurrency_portfolio_section',
					   'settings'       => 'cryptocurrency_exchange_portfolio_image_1',
					   'priority'       => 3,
						'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
					)
				)
			);
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_title_1', array(
					'default' 			=> esc_html('Crypto Market','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_title_1', array(
					'label' 	=> __( 'Project Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 4,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);
			
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_desc_1', array(
					'default' 			=> esc_html('Lorem Ipsum is simply dummy text','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_desc_1', array(
					'label' 	=> __( 'Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 5,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);
			
			 //Portfolio Two
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 'portfolio_two', array(
						'label' 	=> __('Portfolio Two', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_portfolio_section',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 6,
						'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
					) 
				)
			);
			
			
			//Portfolio Image Two
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_image_2', array(
					'default' 			=> get_template_directory_uri() . '/images/project02.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'cryptocurrency_exchange_portfolio_image_2', array(
					   'label'          => __( 'Upload Portfolio Image', 'cryptocurrency-exchange' ),
					   'type'           => 'image',
					   'section'        => 'cryptocurrency_portfolio_section',
					   'settings'       => 'cryptocurrency_exchange_portfolio_image_2',
					   'priority'       => 8,
						'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
					)
				)
			);
			
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_title_2', array(
					'default' 			=> esc_html('Business Deal','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_title_2', array(
					'label' 	=> __( 'Project Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 10,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_desc_2', array(
					'default' 			=> esc_html('Lorem Ipsum is simply dummy text','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_desc_2', array(
					'label' 	=> __( 'Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 13,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);
			
			//Portfolio Three
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 'portfolio_three', array(
						'label' 	=> __('Portfolio Three', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_portfolio_section',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 15,
						'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
					) 
				)
			);
			
			
			//Portfolio Image Two
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_image_3', array(
					'default' 			=> get_template_directory_uri() . '/images/project03.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'cryptocurrency_exchange_portfolio_image_3', array(
					   'label'          => __( 'Upload Portfolio Image', 'cryptocurrency-exchange' ),
					   'type'           => 'image',
					   'section'        => 'cryptocurrency_portfolio_section',
					   'settings'       => 'cryptocurrency_exchange_portfolio_image_3',
					   'priority'       => 20,
						'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
					)
				)
			);
			
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_title_3', array(
					'default' 			=> esc_html('Crypto Wallet','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_title_3', array(
					'label' 	=> __( 'Project Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 25,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_desc_3', array(
					'default' 			=> esc_html('Lorem Ipsum is simply dummy text.','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_desc_3', array(
					'label' 	=> __( 'Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 28,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);
				
			//Portfolio Four
			$wp_customize->add_setting('cryptocurrency_title', array(
					'type'              => 'info_control',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_attr',            
				)
			);
			
			$wp_customize->add_control( new cryptocurrency_exchange_info( $wp_customize, 'portfolio_four', array(
						'label' 	=> __('Portfolio Four', 'cryptocurrency-exchange'),
						'section' 	=> 'cryptocurrency_portfolio_section',
						'settings' 	=> 'cryptocurrency_title',
						'priority' 	=> 30,
						'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
					) 
				)
			);
			
			
			//Portfolio Image Two
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_image_4', array(
					'default' 			=> get_template_directory_uri() . '/images/project04.jpg',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'cryptocurrency_exchange_portfolio_image_4', array(
					   'label'          => __( 'Upload Portfolio Image', 'cryptocurrency-exchange' ),
					   'type'           => 'image',
					   'section'        => 'cryptocurrency_portfolio_section',
					   'settings'       => 'cryptocurrency_exchange_portfolio_image_4',
					   'priority'       => 35,
						'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
					)
				)
			);
			
			
			//Title
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_title_4', array(
					'default' 			=> esc_html('Working Time','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_title_4', array(
					'label' 	=> __( 'Project Title', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 40,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);
			
			//Description
			$wp_customize->add_setting('cryptocurrency_exchange_portfolio_desc_4', array(
					'default' 			=> esc_html('Lorem Ipsum is simply dummy text','cryptocurrency-exchange'),
					'sanitize_callback' => 'wp_filter_nohtml_kses'
				)
			);
			$wp_customize->add_control('cryptocurrency_exchange_portfolio_desc_4', array(
					'label' 	=> __( 'Description', 'cryptocurrency-exchange' ),
					'section' 	=> 'cryptocurrency_portfolio_section',
					'type' 		=> 'text',
					'priority' 	=> 45,
					'active_callback' => 'cryptocurrency_exchange_portfolio_callback',
				)
			);

			//Portfolio Radio Button Show And Hide Funcion			
			function cryptocurrency_exchange_portfolio_callback( $cryptocurrency_exchange_portfolio_control ) {
				$cryptocurrency_exchange_portfolio_radio_setting = $cryptocurrency_exchange_portfolio_control->manager->get_setting('cryptocurrency_exchange_portfolio_section')->value();
				$cryptocurrency_exchange_portfolio_control_id = $cryptocurrency_exchange_portfolio_control->id;
				
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_section_title'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_section_desc'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_column_layout'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				//portfolio one
				if ( $cryptocurrency_exchange_portfolio_control_id == 'portfolio_one'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_image_1'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_title_1'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_desc_1'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				//portfolio two			
				if ( $cryptocurrency_exchange_portfolio_control_id == 'portfolio_two'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_image_2'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_title_2'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_desc_2'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				//portfolio three
				if ( $cryptocurrency_exchange_portfolio_control_id == 'portfolio_three'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_image_3'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_title_3'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_desc_3'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				//portfolio four
				if ( $cryptocurrency_exchange_portfolio_control_id == 'portfolio_four'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_image_4'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_title_4'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				if ( $cryptocurrency_exchange_portfolio_control_id == 'cryptocurrency_exchange_portfolio_desc_4'  && $cryptocurrency_exchange_portfolio_radio_setting == 'active' ) return true;
				  
				return false;
			}
		//6. Portfolio Settings End ======================================