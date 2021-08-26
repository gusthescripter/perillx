<?php
	if(! function_exists('perillx_styles')) {
		function perillx_styles() {
			wp_enqueue_script(
				'bootstrap', 
				get_template_directory_uri().'/resources/assets/js/bootstrap.bundle.js'
			);
			wp_enqueue_style(
				'bootstrap',
				get_template_directory_uri().'/resources/assets/css/bootstrap.css'
			);
			
		}
	}
	add_action('wp_enqueue_scripts', 'perillx_styles');
	
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
	
	function perillx_features() {
		register_nav_menu('headerMenuLocation', 'Header Menu Location');
		add_theme_support('title-tag');
		
	}
	
	add_action('after_setup_theme', 'perillx_features');
?>
