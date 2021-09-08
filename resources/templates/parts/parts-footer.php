
<footer class="footer">
<?php get_template_part( 'resources/templates/nav/nav', 'bottom' ); ?>

<?php
		if( is_active_sidebar( 'footer_right_1' ) ) { ?>
				<div id="primary-sidebar" class="primary-sidebar widget-area container" role="complementary">
					<?php dynamic_sidebar( 'footer_right_1' ); ?>
				</div><!-- #primary-sidebar -->
	
			<?php } ?>

<div class="container"><span><p>&copy; 2021 | <?php echo get_bloginfo('name'); ?></p></span></div>
</footer>


