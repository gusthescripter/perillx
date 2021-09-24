<?php
	
	function perillx_post_types() {
		register_post_type('event', array(
			'public' => true,
			'labels' => array(
				'name' => 'Events',
				'add_new_item' => 'Add New Event',
				'edit_item' => 'Edit Event',
				'all_items' => 'All Events',
				'singular_name' => 'Event'
			),
			'menu_icon' => 'dashicons-palmtree'
		));
	}
	add_action('init', 'perillx_post_types');
	
	function add_additional_class_on_li($classes, $item, $args) {
		if(isset($args->add_li_class)) {
			$classes[] = $args->add_li_class;
		}
		return $classes;
	}
	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
	
	function perillx_custom_logo_setup() {
		$defaults = array(
			'height'               => 60,
			'width'                => 60,
			'flex-height'          => true,
			'flex-width'           => true,
			'header-text'          => array( 'site-title', 'site-description' ),
			'unlink-homepage-logo' => true, 
		);
	 
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'perillx_custom_logo_setup' );
	
	function perillx_custom_header_setup() {
		$args = array(
			'default-image'      => '',
			'default-text-color' => '000',
			'width'              => 600,
			'height'             => 250,
			'flex-width'         => true,
			'flex-height'        => true
		);
		add_theme_support( 'custom-header', $args );
		
	}
	add_action( 'after_setup_theme', 'perillx_custom_header_setup' );
	
/**add_action( 'customize_register', 'wpse_customize_custom_header_meta' );
function wpse_customize_custom_header_meta( \WP_Customize_Manager $wp_customize ) {

    $wp_customize->add_setting(
        'custom_header_meta[background_position]',
        array(
            'default'    => 'left',
            'capability' => 'edit_theme_options',
            'type'       => 'option'
        )
    );

    $wp_customize->add_control(
        'custom_header_background_position',
        array(
            'settings' => 'custom_header_meta[background_position]',
            'label'    => __( 'Background position:', 'textdomain' ),
            'section'  => 'header_image',
            'type'     => 'select',
            'choices'  => array(
                'right' => 'right',
                'left'  => 'left'
            )
        )
    );

    $wp_customize->add_setting(
        'custom_header_meta[background_size]',
        array(
            'default'    => 'auto',
            'capability' => 'edit_theme_options',
            'type'       => 'option'
        )
    );

    $wp_customize->add_control(
        'custom_header_background_size',
        array(
            'settings' => 'custom_header_meta[background_size]',
            'label'    => __( 'Background size:', 'textdomain' ),
            'section'  => 'header_image',
            'type'     => 'select',
            'choices'  => array(
                'auto'    => 'auto',
                'cover'   => 'cover',
                'contain' => 'contain'
            )
        )
    );

}

add_action( 'wp_enqueue_scripts', 'wpse_rowling_inline_styles' );
function wpse_rowling_inline_styles() {

    // Get custom header meta from customizer with defaults.
    $default_header_meta = array(
        'background_position' => 'left',
        'background_size'     => 'auto'
    );
    $header_meta = get_option( 'custom_header_meta', $default_header_meta );

    // Render header meta as CSS parameters.
    $header_styles = '';
    foreach ( $header_meta as $key => $val ) {
        $header_styles .= str_replace( '_', '-', $key ) . ':' . $val . ';';
    }

    // Render header image as CSS parameters.
    if ( get_header_image() ) {
        $header_image = get_theme_mod( 'header_image_data' );
        $header_styles .= 'background-image:url(' .header_image(). ');';
        $header_styles .= 'width:600px;';
        $header_styles .= 'height:400px;';
    }

    // Finally render CSS selector with parameters.
    $custom_css = ".header_image { $header_styles }";

    wp_add_inline_style( 'custom_style', $custom_css );

}**/
	
	/**$args = array(
		'default-color' => '000000'
	);
	add_theme_support( 'custom-background', $args );**/
	
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => 'repeat',
		'default-position-x'     => 'left',
			'default-position-y'     => 'top',
			'default-size'           => 'auto',
		'default-attachment'     => 'scroll',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
	
	/**add_theme_support( 'custom-background', array(
		'wp-head-callback' => 'wpse_189361_custom_background_cb',
		'default-color'    => '000000',
		'default-image'    => '%1$s/images/background.jpg',
	));

	function wpse_189361_custom_background_cb() {
		ob_start();

		_custom_background_cb(); // Default handler

		$style = ob_get_clean();
		$style = str_replace( 'body.custom-background', '#featured-home-image', $style );

		echo $style;
	}**/

	add_action('customize_register', function($wp_customize) {
		$wp_customize->add_section('theme-variables', [
			'title' => __('Theme Variables', 'txtdomain'),
			'priority' => 25
		]);
	 
		$wp_customize->add_setting('theme-main', ['default' => '#594c74']);
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme-main', [
			'section' => 'theme-variables',
			'label' => __('Main theme color', 'txtdomain'),
			'priority' => 10
		]));
	 
		$wp_customize->add_setting('theme-secondary', ['default' => '#555']);
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme-secondary', [
			'section' => 'theme-variables',
			'label' => __('Secondary theme color', 'txtdomain'),
			'priority' => 20
		]));
		$wp_customize->add_setting('theme-text-size', ['default' => '12']);
		$wp_customize->add_control('theme-text-size', [
			'section' => 'theme-variables',
			'label' => __('Text size', 'txtdomain'),
			'type' => 'number',
			'priority' => 30,
			'input_attrs' => ['min' => 8, 'max' => 20, 'step' => 1]
		]);
	});
	
	

?>
