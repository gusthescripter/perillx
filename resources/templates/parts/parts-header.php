
	<header class="header">
		<style>
		.brand-color-nav {
			background-color: #8026c0;
		}
		</style>
		<div class="brand-color-nav">
<?php
	get_template_part('resources/templates/nav/nav', 'top');
?>
		</div>
		<style>
			<?php if(get_header_image() && is_home()) { ?>
			#showcase {
				background-image: url("<?php header_image(); ?>"), linear-gradient(#8026c0, #36daf3);
				padding: 88px;
				height: 400px;
				background-position: right bottom;
				background-repeat: no-repeat;
				background-size: contain;
			}
			<?php } else { ?>
			#showcase {
				background-image: url("<?php header_image(); ?>"), linear-gradient(#8026c0, #36daf3);
				padding: 28px;
				height: 120px;
				background-position: right bottom;
				background-repeat: no-repeat;
				background-size: contain;
			}
			<?php } ?>
		</style>
		
		<div id="showcase" class="header_image"><br><div class="container site-branding"><p class="site-description"><?php if(get_header_image() && is_home()) {echo get_bloginfo('description');} else {  the_title();} ?></p></div><br></div>
		
	</header>
<br>
<div class="container-md">
