<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<meta name="description" content="">
		<meta name="author" content="">

		<meta name="viewport" content="width=device-width">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php the_custom_logo();?></a><a class="navbar-brand" href="#"><div class="site-branding"><p class="site-title"><?php echo get_bloginfo('name'); ?></p></div></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<?php

			wp_nav_menu(array(
				'theme_location' => 'headerMenuLocation',
				'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
				'add_li_class' => 'g-text',
				'link_class' => ' g-color'
			));
		?>
		
    </div>
  </div>
</nav>
		<?php

			//echo '<h1>'.get_bloginfo('name').'</h1>';
			//echo '<div class="container site-branding"><p class="site-description">'.get_bloginfo('description').'</p></div>';
		?>
		<style>
			#showcase {
				background-image: url("<?php //header_image(); ?>");
				padding: 88px;
			}
		</style>
		<div id="" class="header_image"><br><div class="container site-branding"><p class="site-description"><?php echo get_bloginfo('description'); ?></p></div><br></div>

	</header>
<br>
<div class="container">
