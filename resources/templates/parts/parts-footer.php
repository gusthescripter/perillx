
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col">
<?php get_template_part( 'resources/templates/nav/nav', 'bottom' ); ?>
			</div>
			<div class="col">
<?php
		if( is_active_sidebar( 'footer_right_1' ) ) { ?>
				<div id="primary-sidebar" class="primary-sidebar widget-area col-md-3" role="complementary">
					<?php dynamic_sidebar( 'footer_right_1' ); ?>
				</div><!-- #primary-sidebar -->
		<?php } ?>
			</div>
		</div>
	</div>
<div class="container"><span><p>&copy; 2021 | <?php echo get_bloginfo('name'); ?></p></span></div>
</footer>

