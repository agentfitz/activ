	<!-- Widgets columns -->
	<?php /* ?>
	<section id="dock-area" class="clearfix">
		
		<!-- 978 container -->
		<div class="container">
			
			<?php if ( is_active_sidebar('dayd_footer_1') ) : ?>
			
			<!-- One fourth column -->
			<aside class="<?php dayd_footer_aside_class(); ?>">
			
				<?php dynamic_sidebar('dayd_footer_1'); ?>
				
			</aside>
			<!-- end: One fourth column -->
			
			<?php endif; ?>
			
			<?php if ( is_active_sidebar('dayd_footer_2') ) : ?>
			
			<!-- One fourth column -->
			<aside class="<?php dayd_footer_aside_class(); ?>">
				
				<?php dynamic_sidebar('dayd_footer_2'); ?>
				
			</aside>
			<!-- end: One fourth column -->
			
			<?php endif; ?>
			
			<?php if ( is_active_sidebar('dayd_footer_3') ) : ?>
			
			<!-- One fourth column -->
			<aside class="<?php dayd_footer_aside_class(); ?>">
				
				<?php dynamic_sidebar('dayd_footer_3'); ?>
				
			</aside>
			<!-- end: One fourth column -->
			
			<?php endif; ?>
			
			<?php if ( is_active_sidebar('dayd_footer_4') ) : ?>
			
			<!-- One fourth column -->
			<aside class="<?php dayd_footer_aside_class(); ?>">
				
				<?php dynamic_sidebar('dayd_footer_4'); ?>
				
			</aside>
			<!-- end: One fourth column -->
			
			<?php endif; ?>
		
		</div>
		<!-- end: Container -->
		
	</section>
	<!-- end: Widgets columns -->
	<?php */ ?>
	
	<?php if ( get_theme_option('footer_left_content') || get_theme_option('footer_right_twitter') || get_theme_option('footer_right_facebook')  ) : ?>
	
	<!-- Copyright etc. -->
	<footer>
		
		<!-- 978 container -->
		<div class="container">
			
			<!-- Copyright -->
			<span><?php echo do_shortcode( get_theme_option('footer_left_content') ); ?></span>
			
			<?php if ( get_theme_option('footer_right_twitter') ) : ?>
			
			<!-- Social link -->
			<a href="<?php echo esc_url( get_theme_option('footer_right_twitter') ); ?>" class="dayd_social dayd_twitter"><?php _e('Follow us on', 'haku'); ?></a>
			
			<?php endif; ?>
			
			<?php if ( get_theme_option('footer_right_facebook') ) : ?>
			
			<!-- Social link -->
			<a href="<?php echo esc_url( get_theme_option('footer_right_facebook') ); ?>" class="dayd_social dayd_facebook"><?php _e('Become a fan on', 'haku'); ?></a>
			
			<?php endif; ?>
			
		</div>
		<!-- end: Container -->
		
	</footer>
	<!-- end: Copyright -->
	
	<?php endif; ?>
	
	<!-- WP footer -->
	<?php wp_footer(); ?>
		
</body>

<!-- Designed by Stefano Giliberti, winterbits.com - Proudly powered by WordPress, http://wordpress.org -->

</html>