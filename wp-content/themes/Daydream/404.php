<?php get_header(); ?>

<?php get_template_part('hero'); ?>
	
	<!-- 978 content container -->
	<div id="content" class="container clearfix">
		
		<?php get_sidebar(); ?>
		
		<!-- Content column -->
		<section class="content_col">

			<?php get_template_part('not-found'); ?>

		</section>
		<!-- end: Content column -->
		
	</div>
	<!-- end: Container -->
	
<?php get_footer(); ?>