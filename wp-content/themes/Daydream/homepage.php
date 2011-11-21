<?php
/*
 *  TEMPLATE NAME: Widgetized Homepage
 */
?>

<?php get_header(); ?>

<?php get_template_part('hero'); ?>
	
	<?php if ( is_active_sidebar('dayd_home_tools') ) : ?>
	
	<!-- Tools -->
	<section id="tools" class="clearfix">
		
		<!-- 978 container -->
		<div class="container">
			
			<!-- Tools area -->
			<?php dynamic_sidebar('dayd_home_tools'); ?>
			
			<?php 
				$project_args = array(
					'post_type' => 'showcase_2'
				);
				$projects = new WP_Query($project_args);	
			?>
			<div id="homeProjectContainer">
				<h3>Check out some of our recent projects</h3>
				<?php
					$counter = 1; 
					while($projects->have_posts() && $counter < 4): $projects->the_post(); ?>
				<div class="project">
					<?php 
						$img_attr = array( 'title' => 'turtles' );
					 	$counter++;
					?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php echo get_the_post_thumbnail($post->ID, array(150,150), $img_attr ); ?>
					</a>
				</div>
				<?php endwhile; ?>
			</div>
							
		</div>
		<!-- end: Container -->
		
	</section>
	<!-- end: Tools -->
	
	<?php endif; ?>
	
	<!-- 978 content container -->
	<?php /* ?>
	<section id="content" class="container clearfix">
		
		<!-- Home content -->
		
		<?php dynamic_sidebar('dayd_home_1'); ?>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
		<?php the_content(); ?>
			
		<?php endwhile; endif; ?>
		
		<?php dynamic_sidebar('dayd_home_2'); ?>
		
		<!-- end: Home content -->
		
	</section>
	<!-- end: Container -->
	<?php */ ?>
	
<?php get_footer(); ?>