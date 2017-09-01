<?php
/**
 * Pencil Theme Customizer.
 *
 * @package pencil
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pencil_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		$wp_customize->add_setting( 'header_logo', array(
		'type'           => 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo', array(
		'label'   => esc_html__( 'Header Logo', 'pencil' ),
		'section'     => 'title_tagline',
				'priority'       => 70,
		) ) );

		$wp_customize->add_section( 'home_page', array(
			'title'          => esc_html__( 'Home Page', 'pencil' ),
				'priority'       => 1000,
		'description'    => esc_html__( 'Blog Home Page Settings', 'pencil' ),
		) );

	$wp_customize->add_setting( 'home_page_layout', array(
		'default'        => 'masonry',
				'sanitize_callback' => 'pencil_sanitize_select_home_page_layout',
		) );

		// Section Blog Home Page.
	$wp_customize->add_control( 'home_page_layout', array(
		'label'   => esc_html__( 'Blog Home Page Layout', 'pencil' ),
		'section' => 'home_page',
		'type'    => 'select',
		'choices' => array(
						'masonry'  => esc_html__( 'Masonry + Sidebar', 'pencil' ),
						'list' => esc_html__( 'List + Sidebar', 'pencil' ),
					'' => esc_html__( 'Masonry (No Sidebar)', 'pencil' ),
			),
		) );

		$wp_customize->add_setting( 'home_page_slider_img_number', array(
		'default'        => 1,
				'sanitize_callback' => 'absint',
		) );

	$wp_customize->add_control( 'home_page_slider_img_number', array(
		'label'   => esc_html__( 'Number of Images to Show in Slider', 'pencil' ),
		'section' => 'home_page',
		'type'    => 'number',
				'input_attrs' => array(
					'min'   => 1,
					'max'   => 2,
					'step'  => 1,
					// 'class' => 'test-class test',
					// 'style' => 'color: #0a0',
				),
		) );

		$wp_customize->add_setting( 'home_page_slider_height', array(
		'default'        => 300,
				'sanitize_callback' => 'absint',
		) );

	$wp_customize->add_control( 'home_page_slider_height', array(
		'label'   => esc_html__( 'Height of Home Page Slider', 'pencil' ),
		'section' => 'home_page',
				'description'    => esc_html__( '(in pixels)', 'pencil' ),
		'type'    => 'number',
				'input_attrs' => array(
					'min'   => 100,
					'max'   => 1000,
					'step'  => 1,
				),
		) );

		$wp_customize->add_setting( 'home_page_slider_img_size', array(
		'default'        => 'full',
				'sanitize_callback' => 'pencil_sanitize_select_home_page_slider_img_size',
		) );

	$wp_customize->add_control( 'home_page_slider_img_size', array(
		'label'   => esc_html__( 'Slider Image Size', 'pencil' ),
		'section' => 'home_page',
				'description'    => esc_html__( 'From >Settings>Media', 'pencil' ),
		'type'    => 'select',
		'choices' => array(
						'thumbnail'  => esc_html__( 'Thumbnail', 'pencil' ),
						'medium' => esc_html__( 'Medium', 'pencil' ),
					'large' => esc_html__( 'Large', 'pencil' ),
						'full' => esc_html__( 'Full', 'pencil' ),
			),
		) );

	$wp_customize->add_setting( 'home_page_slider_play_speed', array(
		'default'        => 0,
				'sanitize_callback' => 'absint',
		) );

	$wp_customize->add_control( 'home_page_slider_play_speed', array(
		'label'   => esc_html__( 'Sliding speed of Home Page Slider (in ms)', 'pencil' ),
		'section' => 'home_page',
				'description'    => esc_html__( '0 to disable autoplay', 'pencil' ),
		'type'    => 'number',
				'input_attrs' => array(
					'min'   => 0,
					'max'   => 10000,
					'step'  => 100,
				),
		) );

		// Section Single Page.
		$wp_customize->add_section( 'single_page', array(
			'title'          => esc_html__( 'Single Post', 'pencil' ),
				'priority'       => 1010,
		'description'    => esc_html__( 'Single Post Settings', 'pencil' ),
		) );

		$wp_customize->add_setting( 'single_page_sidebar', array(
		'default'        => true,
				'sanitize_callback' => 'pencil_sanitize_checkbox',
		) );

	$wp_customize->add_control( 'single_page_sidebar', array(
		'label'   => esc_html__( 'Enable Sidebar', 'pencil' ),
		'section' => 'single_page',
		'type'    => 'checkbox',
		) );

		$wp_customize->add_setting( 'single_post_navigation', array(
		'default'        => true,
				'sanitize_callback' => 'pencil_sanitize_checkbox',
		) );

	$wp_customize->add_control( 'single_post_navigation', array(
		'label'   => esc_html__( 'Enable Single Post Navigation', 'pencil' ),
		'section' => 'single_page',
		'type'    => 'checkbox',
		) );

		// Social icons.
		$wp_customize->add_section( 'social_icons', array(
			'title'          => esc_html__( 'Social Icons', 'pencil' ),
				'priority'       => 1020,
		'description'    => esc_html__( 'Links to social profiles in menu', 'pencil' ),
		) );

		$wp_customize->add_setting( 'social_icons_twitter', array(
		'default'        => '',
				'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'social_icons_twitter', array(
		'label'   => esc_html__( 'Twitter', 'pencil' ),
		'section' => 'social_icons',
		'type'    => 'text',
		) );

	$wp_customize->add_setting( 'social_icons_facebook', array(
		'default'        => '',
				'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'social_icons_facebook', array(
		'label'   => esc_html__( 'Facebook', 'pencil' ),
		'section' => 'social_icons',
		'type'    => 'text',
		) );

		$wp_customize->add_setting( 'social_icons_googleplus', array(
		'default'        => '',
				'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'social_icons_googleplus', array(
		'label'   => esc_html__( 'Google Plus', 'pencil' ),
		'section' => 'social_icons',
		'type'    => 'text',
		) );

		$wp_customize->add_setting( 'social_icons_instagram', array(
		'default'        => '',
				'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'social_icons_instagram', array(
		'label'   => esc_html__( 'Instagram', 'pencil' ),
		'section' => 'social_icons',
		'type'    => 'text',
		) );

		$wp_customize->add_setting( 'social_icons_pinterest', array(
		'default'        => '',
				'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'social_icons_pinterest', array(
		'label'   => esc_html__( 'Pinterest', 'pencil' ),
		'section' => 'social_icons',
		'type'    => 'text',
		) );

		// Footer text.
		$wp_customize->add_section( 'footer', array(
			'title'          => esc_html__( 'Footer', 'pencil' ),
				'priority'       => 1030,
		// 'description'    => esc_html__( 'Links to social profiles in menu', 'pencil' ),
		) );

		$wp_customize->add_setting( 'footer_text', array(
		'default'        => '<a href="https://wordpress.org/">Proudly powered by WordPress</a><span class="sep"> | </span>Theme: Pencil by <a href="http://fatthemes.com">Fat</a>',
				'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'footer_text', array(
		'label'   => esc_html__( 'Footer Text', 'pencil' ),
		'section' => 'footer',
		'type'    => 'textarea',
		) );

		// Section - "other settings".
		$wp_customize->add_section( 'other_settings', array(
			'title'          => esc_html__( 'Advanced', 'pencil' ),
				'priority'       => 1040,
		'description'    => esc_html__( 'Advanced Settings', 'pencil' ),
		) );

		$wp_customize->add_setting( 'wpp_styling', array(
		'default'        => false,
				'sanitize_callback' => 'pencil_sanitize_checkbox',
		) );

	$wp_customize->add_control( 'wpp_styling', array(
		'label'   => esc_html__( 'Enable WordPress Popular Posts Original Output (needs page refresh)', 'pencil' ),
		'section' => 'other_settings',
		'type'    => 'checkbox',
		) );

		$wp_customize->add_setting( 'sticky_sidebar', array(
		'default'        => true,
				'sanitize_callback' => 'pencil_sanitize_checkbox',
		) );

	$wp_customize->add_control( 'sticky_sidebar', array(
		'label'   => esc_html__( 'Enable Sticky Sidebar', 'pencil' ),
		'section' => 'other_settings',
		'type'    => 'checkbox',
		) );

		$wp_customize->add_setting( 'smooth_scroll', array(
		'default'        => true,
				'sanitize_callback' => 'pencil_sanitize_checkbox',
		) );

	$wp_customize->add_control( 'smooth_scroll', array(
		'label'   => esc_html__( 'Enable Smooth Scrolling', 'pencil' ),
		'section' => 'other_settings',
		'type'    => 'checkbox',
		) );
}
add_action( 'customize_register', 'pencil_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pencil_customize_preview_js() {
	wp_enqueue_script( 'pencil_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'pencil_customize_preview_js' );

/**
 * Sanitize checkbox.
 *
 * @param type $value user input.
 * @return boolean
 */
function pencil_sanitize_checkbox( $value ) {
	if ( in_array( $value, array( true, false ), true ) ) {
		return $value;
	}
}

/**
 * Sanitize select home_page_layout.
 *
 * @param type $value user input.
 * @return string
 */
function pencil_sanitize_select_home_page_layout( $value ) {
	if ( in_array( $value, array( '', 'list', 'masonry' ), true ) ) {
		return $value;
	}
}

/**
 * Sanitize select.
 *
 * @param type $value user input.
 * @return string
 */
function pencil_sanitize_select_home_page_slider_img_size( $value ) {
	if ( in_array( $value, array( 'thumbnail', 'medium', 'large', 'full' ), true ) ) {
		return $value;
	}
}
