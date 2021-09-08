
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
  <div class="container-fluid container">
   
    <div class="row align-items-start" id="">
	<div class="col">
		<?php

			wp_nav_menu(array(
				'theme_location' => 'footerLocationOne',
				'menu_class' => 'list-unstyled me-auto mb-2 mb-lg-0',
				'add_li_class' => 'nav-item',
				'link_class' => 'p-link'
			));
		?>
		
	</div>
	<div class="col">

		<?php

			wp_nav_menu(array(
				'theme_location' => 'footerLocationTwo',
				'menu_class' => 'list-unstyled me-auto mb-2 mb-lg-0',
				'add_li_class' => 'nav-item',
				'link_class' => 'p-link'
			));
		?>
	</div>
    </div>
  </div>
</nav>
