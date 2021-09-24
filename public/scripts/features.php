<?php

	if(! function_exists('perillx_files')) {
		function perillx_files() {
			
			wp_enqueue_script(
				'node',
				get_template_directory_uri().'/build/index.js'
			);
			wp_enqueue_style(
				'bootstrap',
				get_template_directory_uri().'/style.css'
			);
			
		}
	}
	add_action('wp_enqueue_scripts', 'perillx_files');
	
	function perillx_features() {
		register_nav_menu('headerMenuLocation', 'Header Menu Location');
		register_nav_menu('footerLocationOne', 'Footer Location One');
		register_nav_menu('footerLocationTwo', 'Footer Location Two');

		
		add_theme_support('title-tag');
		
	}
	add_action('after_setup_theme', 'perillx_features');
	
	function loginTitle() {
		return get_bloginfo('name');
	}
	add_filter('login_headertext', 'loginTitle');
	
	function special_nav_class ($classes, $item) {
		if (in_array('current-menu-item', $classes) ){
			$classes[] = 'active ';
		}
		return $classes;
	}
	add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
	
	function add_menu_link_class( $atts, $item, $args ) {
		if (property_exists($args, 'link_class')) {
			$atts['class'] = $args->link_class;
		}
		return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );
	
	/**
	 * Register our sidebars and widgetized areas.
	 *
	 */
	function arphabet_widgets_init() {

		register_sidebar( array(
			'name'          => 'Home right sidebar',
			'id'            => 'home_right_1',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => 'Footer right sidebar',
			'id'            => 'footer_right_1',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'arphabet_widgets_init' );
	
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
});

if (is_customize_preview()) {
	
	add_action('wp_head', function() {
		$compiler = new ScssPhp\ScssPhp\Compiler();
 
		$source_scss = get_stylesheet_directory() . '/resources/assets/scss/style.scss';
		$scssContents = file_get_contents($source_scss);
		$import_path = get_stylesheet_directory() . '/resources/assets/scss';
		$compiler->addImportPath($import_path);
 
		$variables = [
			'$white' => get_theme_mod('theme-main', '#594c74'),
			'$secondary' => get_theme_mod('theme-secondary', '#555'),
			'$text-size' => get_theme_mod('theme-text-size', '12') . 'px',
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
		'$white' => get_theme_mod('theme-main', '#594c74'),
		'$secondary' => get_theme_mod('theme-secondary', '#555'),
		'$text-size' => get_theme_mod('theme-text-size', '12') . 'px',
	];		
	$compiler->setVariables($variables);
 
	$css = $compiler->compile($scssContents);
	//$css = 'test';
	if (!empty($css) && is_string($css)) {
		file_put_contents($target_css, $css);
	}
	//file_put_contents($target_css, 'test');
}

?>
