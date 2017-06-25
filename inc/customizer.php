<?php
/**
 * pedamuse Theme Customizer
 *
 * @package pedamuse
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'pedamuse_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function pedamuse_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'pedamuse_customize_register' );

if ( ! function_exists( 'pedamuse_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function pedamuse_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'pedamuse_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'pedamuse' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width, sidebar defaults and Blog Type', 'pedamuse' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'pedamuse_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'pedamuse' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'pedamuse' ),
					'section'     => 'pedamuse_theme_layout_options',
					'settings'    => 'pedamuse_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'pedamuse' ),
						'container-fluid' => __( 'Full width container', 'pedamuse' ),
					),
					'priority'    => '10',
				)
			) );

		$wp_customize->add_setting( 'pedamuse_sidebar_position', array(
			'default'           => 'right',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pedamuse_sidebar_position', array(
					'label'       => __( 'Sidebar Positioning', 'pedamuse' ),
					'description' => __( "Set sidebar's default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.",
					'pedamuse' ),
					'section'     => 'pedamuse_theme_layout_options',
					'settings'    => 'pedamuse_sidebar_position',
					'type'        => 'select',
					'choices'     => array(
						'right' => __( 'Right sidebar', 'pedamuse' ),
						'left'  => __( 'Left sidebar', 'pedamuse' ),
						'both'  => __( 'Left & Right sidebars', 'pedamuse' ),
						'none'  => __( 'No sidebar', 'pedamuse' ),
					),
					'priority'    => '20',
				)
			) );

		// pedamuse blog type
		$wp_customize->add_setting( 'pedamuse_blog_type', array(
			'default'           => 'normal',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pedamuse_blog_type', array(
					'label'       => __( 'Blog Type', 'pedamuse' ),
					'description' => __( "Choose between Normal Blog and Pin Layout Type Blog", 'pedamuse' ),
					'section'     => 'pedamuse_theme_layout_options',
					'settings'    => 'pedamuse_blog_type',
					'type'        => 'select',
					'choices'     => array(
						'normal'       => __( 'Normal Blog Presentation', 'pedamuse' ),
						'pins' => __( 'Pins Blog Presentation', 'pedamuse' ),
						'double' => __( 'Two Column Blog Presentation', 'pedamuse' ),
					),
					'priority'    => '15',
				)
			) );

		/////// pedamuse front page ///////

		// small text 
		$wp_customize->add_setting( 'pedamuse_message_small', array(
			'default'           => '',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pedamuse_message_small', 
				array(
			    'type' => 'text',
			    'priority' => 10,
			    'section' => 'static_front_page',
				'settings'    => 'pedamuse_message_small',
			    'label' => __( 'Enter Smaller text here', 'pedamuse' ),
			    'description' => '',
					)
			) );

		// bigger text 
		$wp_customize->add_setting( 'pedamuse_message_bigger', array(
			'default'           => '',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pedamuse_message_bigger', 
				array(
			    'type' => 'textarea',
			    'priority' => 10,
			    'section' => 'static_front_page',
				'settings'    => 'pedamuse_message_bigger',
			    'label' => __( 'Enter Bigger text here', 'pedamuse' ),
			    'description' => '',
					)
			) );

		// button 1 text 
		$wp_customize->add_setting( 'pedamuse_btn_1_txt', array(
			'default'           => '',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pedamuse_btn_1_txt', 
				array(
			    'type' => 'text',
			    'priority' => 10,
			    'section' => 'static_front_page',
				'settings'    => 'pedamuse_btn_1_txt',
			    'label' => __( 'Enter button 1 text here', 'pedamuse' ),
			    'description' => '',
					)
			) );

		// button 1 url
		$wp_customize->add_setting( 'btn_url_1', array(
			    'default' => '',
			    'type' => 'theme_mod',
			    'capability' => 'edit_theme_options',
			    'transport' => '',
			    'sanitize_callback' => 'esc_url',
			) );
			 
			$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				 'btn_url_1', array(
			    'type' => 'url',
			    'priority' => 10,
			    'section' => 'static_front_page',
				'settings'    => 'btn_url_1',
			    'label' => __( 'Button 1 url', 'pedamuse' ),
			    'description' => '',
				)
			) );

		// button 2 text 
		$wp_customize->add_setting( 'pedamuse_btn_2_txt', array(
			'default'           => '',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pedamuse_btn_2_txt', 
				array(
			    'type' => 'text',
			    'priority' => 10,
			    'section' => 'static_front_page',
				'settings'    => 'pedamuse_btn_2_txt',
			    'label' => __( 'Enter button 2 text here', 'pedamuse' ),
			    'description' => '',
					)
			) );

        // button 2 url
		$wp_customize->add_setting( 'btn_url_2', array(
			    'default' => '',
			    'type' => 'theme_mod',
			    'capability' => 'edit_theme_options',
			    'transport' => '',
			    'sanitize_callback' => 'esc_url',
			)  );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				 'btn_url_2', array(
			    'type' => 'url',
			    'priority' => 10,
			    'section' => 'static_front_page',
				'settings'    => 'btn_url_2',
			    'label' => __( 'Button 2 url', 'pedamuse' ),
			    'description' => '',
				)
			) );

		// image upload

		$wp_customize->add_setting( 'pedamuse_image_featurette', array(
		    'type' => 'theme_mod',
		    'capability' => 'edit_theme_options',
		    'sanitize_callback' => 'absint',
	        'default'      => '',
		) );

		$wp_customize->add_control(
		  new WP_Customize_Media_Control( 
		  	$wp_customize, 
		  	'pedamuse_image_featurette',
		  	 array(
			    'label' => __( 'Upload the featurette image', 'pedamuse' ),
			    'section' => 'static_front_page',
				'settings'    => 'pedamuse_image_featurette',
			    'description' => '',
			)	
		));		// image upload

		$wp_customize->add_setting( 'pedamuse_featured_space_image', array(
		    'type' => 'theme_mod',
		    'capability' => 'edit_theme_options',
		    'sanitize_callback' => 'absint',
	        'default'      => '',
		) );

		$wp_customize->add_control(
		  new WP_Customize_Media_Control( 
		  	$wp_customize, 
		  	'pedamuse_featured_space_image',
		  	 array(
			    'label' => __( 'Upload the Featured Spaces BG image', 'pedamuse' ),
			    'section' => 'static_front_page',
				'settings'    => 'pedamuse_featured_space_image',
			    'description' => '',
			)	
		));


		// $wp_customize->add_setting(  );

		// $wp_customize->add_control(
		// 	new WP_Customize_Control(
		// 		$wp_customize,

		// 	) );

	}
} // endif function_exists( 'pedamuse_theme_customize_register' ).
add_action( 'customize_register', 'pedamuse_theme_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'pedamuse_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function pedamuse_customize_preview_js() {
		wp_enqueue_script( 'pedamuse_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}
add_action( 'customize_preview_init', 'pedamuse_customize_preview_js' );
