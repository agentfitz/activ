<?php if ( ! isset( $post ) || isset( $post ) && ! meta_obtain('no_sidebar', '_dayd_page_attributes', $post->ID ) ) : ?>
	
	<!-- Side column -->
	<aside class="<?php dayd_sidebar_class( meta_obtain('sidebar_invert', '_dayd_page_attributes', $post->ID ) ); ?>">
		
		<?php 
		/****************/
		/*   Submenu    */
		if ( isset( $post ) && ! get_theme_option('disable_submenu') && ! meta_obtain('no_submenu', '_dayd_page_attributes', $post->ID ) ) {
			dayd_submenu( $post->ID, $post->post_parent );
		}
		?>
		
		<?php dayd_dynamic_sidebar( ( isset( $post ) ? $post->ID : false ) ); ?>
		
	</aside>
	<!-- end: Side column -->
	
<?php endif; ?>