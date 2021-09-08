
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent ">
  <div class="container-fluid container">
    <?php the_custom_logo();?><a class="navbar-brand" href="#"><div class="site-branding"><p class="site-title"><?php echo get_bloginfo('name'); ?></p></div></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
		<?php

			wp_nav_menu(array(
				'theme_location' => 'headerMenuLocation',
				'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
				'add_li_class' => 'nav-item',
				'link_class' => 'p-link'
			));
		?>
		
    </div>
  </div>
</nav>
