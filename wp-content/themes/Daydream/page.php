<?php get_header(); ?>

<?php get_template_part('hero'); ?>
	
	<!-- 978 content container -->
	<div id="content" class="container clearfix">
		
		<?php get_sidebar(); ?>
				
		<!-- Content column -->
		<section class="<?php dayd_content_class( $post->ID ); ?>">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<?php get_template_part('loop', 'page'); ?>
				
			<?php endwhile; endif; ?>
			
		</section>
		<!-- end: Content column -->
		
	</div>
	<!-- end: Container -->
	
<?php get_footer(); ?>