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
	


?>
