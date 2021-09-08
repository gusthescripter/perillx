<?php get_header(); ?>
	
	
	<?php
		if(is_active_sidebar('home_right_1')) {
			$width = '9';
		} else {
			$width = '12';
		}
	?>
	
	<h2>INDEXER</h2>
	<div class="row align-items-start">
		<div class="col-md-<?php echo $width; ?>">
	<?php
	
		while(have_posts()) {
			the_post();
			?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<?php }
		?>
		<img src="https://cdn-images-1.medium.com/max/2000/1*djSgmrebTL4MWZiS56JgOw.jpeg" width="100%">
		</div>
		<?php
		if( is_active_sidebar( 'home_right_1' ) ) { ?>
			
				<div id="primary-sidebar" class="primary-sidebar widget-area col-md-3" role="complementary">
					<?php dynamic_sidebar( 'home_right_1' ); ?>
				</div><!-- #primary-sidebar -->
	
			<?php }
			?> </div> <?php
	get_footer();
?>
