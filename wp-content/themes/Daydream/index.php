<?php get_header(); ?>

<?php get_template_part('hero'); ?>
	
	<!-- 978 content container -->
	<div id="content" class="container clearfix">
		
		<?php get_sidebar(); ?>
		
		<!-- Content column -->
		<section class="content_col">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<?php get_template_part('loop', get_post_format() ); ?>
				
			<?php endwhile; ?>
			
			<!-- Previous posts link -->
			<div id="dayd_pagination_prev">
				<?php previous_posts_link( __('Newer entries', 'haku') ); ?>
			</div>
			
			<!-- Next posts link -->
			<div id="dayd_pagination_next">
				<?php next_posts_link( __('Show more', 'haku') ); ?>
			</div>
			
			<?php else : ?>
				
			<?php get_template_part('not-found'); ?>

			<?php endif; ?>
			
		</section>
		<!-- end: Content column -->
		
	</div>
	<!-- end: Container -->
	
<?php get_footer(); ?>