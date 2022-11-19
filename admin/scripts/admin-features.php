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
	
	require_once(get_stylesheet_directory().'/vendor/scssphp/scssphp/scss.inc.php');

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
		
		$wp_customize->add_setting('theme-footer', ['default' => '']);
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'theme-footer', [
			'section' => 'theme-variables',
			'label' => __('Footer BG', 'txtdomain'),
			'priority' => 20
		]));
		
		$wp_customize->add_setting('theme-footer-color', ['default' => '#555']);
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme-footer-color', [
			'section' => 'theme-variables',
			'label' => __('Footer color', 'txtdomain'),
			'priority' => 20
		]));
	});

	if (is_customize_preview()) {
		
		add_action('wp_head', function() {
			$compiler = new ScssPhp\ScssPhp\Compiler();
	 
			$source_scss = get_stylesheet_directory() . '/resources/assets/scss/style.scss';
			$scssContents = file_get_contents($source_scss);
			$import_path = get_stylesheet_directory() . '/resources/assets/scss';
			$compiler->addImportPath($import_path);
	 
			$variables = [
				'$navbar-custom-icon-color' => get_theme_mod('theme-main', '#594c74'),
				'$secondary' => get_theme_mod('theme-secondary', '#555'),
				'$text-size' => get_theme_mod('theme-text-size', '12') . 'px',
				'$footer-bg' => get_theme_mod('footer-bg', '#fff')
			];
			$compiler->setVariables($variables);
	 
			$css = $compiler->compile($scssContents);
			if (!empty($css) && is_string($css)) {
				echo '<style type="text/css">' . $css . '</style>';
			}
		});
	}
	add_action('customize_save_after', 'style_saver');

	function style_saver() {
		$compiler = new ScssPhp\ScssPhp\Compiler();
	 
		$source_scss = get_stylesheet_directory() . '/resources/assets/scss/style.scss';
		$scssContents = file_get_contents($source_scss);
		$import_path = get_stylesheet_directory() . '/resources/assets/scss';
		$compiler->addImportPath($import_path);
		$target_css = get_stylesheet_directory() . '/style.css';
	 
		$variables = [
			'$navbar-custom-icon-color' => get_theme_mod('theme-main', '#594c74'),
			'$secondary' => get_theme_mod('theme-secondary', '#555'),
			'$text-size' => get_theme_mod('theme-text-size', '12') . 'px',
			'$footer-bg' => get_theme_mod('footer-bg', '#fff')
		];		
		$compiler->setVariables($variables);
	 
		$css = $compiler->compile($scssContents);
		//$css = 'test';
		if (!empty($css) && is_string($css)) {
			file_put_contents($target_css, $css);
		}
	}

?>
