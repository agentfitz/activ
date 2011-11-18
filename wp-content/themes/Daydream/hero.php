<?php if ( ! isset( $post ) || isset( $post ) && ! meta_obtain('no_hero', '_dayd_page_attributes', $post->ID ) ) : ?>
	
	<?php if ( is_front_page() && ! get_theme_option('slider') && ! get_theme_option('hero_custom') ) return; ?>
	
	<!-- Hero -->
	<section id="hero">
		
		<!-- 978 container -->
		<div class="container clearfix">
			
			<?php if ( is_front_page() ) : ?>
				
				<?php if ( get_theme_option('hero_custom') ) : ?>
				
				<!-- Homepage custom content -->
				<?php echo apply_filters( 'the_content', get_theme_option('hero_content') ); ?>
				
				<?php elseif ( get_theme_option('slider') ) : ?>
				
				<!-- Homepage slider -->
				<?php get_template_part('slider', get_theme_option('slider') ); ?>
				
				<?php endif; ?>
						
			<?php elseif ( get_theme_option('force_headlines') ) : ?>
			
				<!-- Page heading -->
				<h1><?php echo get_theme_option('default_title'); ?></h1>
				
				<!-- Page subline -->
				<span><?php echo get_theme_option('default_heading'); ?></span>
				
			<?php elseif ( is_home() ) : ?>
				
				<!-- Page heading -->
				<h1><?php single_post_title(); ?></h1>

				<!-- Page subline -->
				<span><?php echo meta_obtain('page_headline', '_dayd_page_attributes', get_page_id_by_single_post_title() ); ?></span>
				
			<?php elseif ( is_page() ) : ?>
				
				<!-- Page heading -->
				<h1><?php single_post_title(); ?></h1>
								
				<!-- Page subline -->
				<span><?php echo meta_obtain('page_headline', '_dayd_page_attributes', $post->ID ); ?></span>
			
			<?php elseif ( is_theme_post_type() ) : ?>
				
				<!-- Page heading -->
				<h1><?php echo get_page_title_by_theme_post_type(); ?></h1>
				
				<!-- Page subline -->
				<span><?php echo meta_obtain('page_headline', '_dayd_page_attributes', get_page_id_by_theme_post_type() ); ?></span>
			
			<?php elseif ( is_single() ) : ?>
			
				<!-- Page heading -->
				<h1><?php single_post_title(); ?></h1>
			
			<?php elseif ( is_archive() ) : ?>
				
				<?php if ( is_day() ) : ?>
				
				<!-- Page heading -->
				<h1><strong><?php echo get_the_date(); ?></strong></h1>
					
				<?php elseif ( is_month() ) : ?>
				
				<!-- Page heading -->
				<h1><strong><?php echo get_the_date('F Y'); ?></strong></h1>
					
				<?php elseif ( is_year() ) : ?>
				
				<!-- Page heading -->
				<h1><strong><?php echo get_the_date('Y'); ?></strong></h1>
					
				<?php elseif ( is_category() ) : ?>
				
				<!-- Page heading -->
				<h1>#<strong><?php single_cat_title(); ?></strong></h1>
				
				<?php elseif ( is_tag() ) : ?>
				
				<!-- Page heading -->
				<h1>#<strong><?php single_tag_title(); ?></strong></h1>
				
				<?php elseif ( is_author() ) : ?>
				
				<!-- Page heading -->
				<h1>@<strong><?php echo get_current_author(); ?></strong></h1>
					
				<?php endif; ?>
				
				<!-- Page subline -->
				<span><?php _e('Archives', 'haku'); ?></span>

			<?php else : ?>
				
				<!-- Page heading -->
				<h1><?php echo get_theme_option('default_title'); ?></h1>
				
				<!-- Page subline -->
				<span><?php echo get_theme_option('default_heading'); ?></span>
			
			<?php endif; ?>
			
		</div>
		<!-- end: Container -->
		
	</section>
	<!-- end: Hero -->
	
<?php endif; ?>