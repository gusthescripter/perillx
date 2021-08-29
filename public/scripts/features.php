<?php

	if(! function_exists('perillx_files')) {
		function perillx_files() {
			wp_enqueue_script(
				'bootstrap', 
				get_template_directory_uri().'/resources/assets/js/bootstrap.bundle.js'
			);
			wp_enqueue_script(
				'node',
				get_template_directory_uri().'/src/index.js'
			);
			wp_enqueue_style(
				'bootstrap',
				get_template_directory_uri().'/resources/assets/css/bootstrap.css'
			);
			
		}
	}
	add_action('wp_enqueue_scripts', 'perillx_files');
	
	function perillx_features() {
		register_nav_menu('headerMenuLocation', 'Header Menu Location');
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

?>
