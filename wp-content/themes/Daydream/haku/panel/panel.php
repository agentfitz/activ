<!--
/*
 *  Haku Framework
 *  Handcrafted by Stefano Giliberti
 *  winterbits@gmail.com
 *  winterbits.com
 */
-->

<div id="wb_haku" data-referer="<?php echo wp_create_nonce('haku_nonce'); ?>">
		
	<!-- Noscript -->
	<noscript><?php _e('Javascript is required.', 'haku'); ?></noscript>
	
	<!-- Popup -->
	<div id="wb_haku_popup">
		
		<!-- Delete button -->
		<a href="#" class="wb_haku_drop"></a>
		
		<!-- Message -->
		<h1><?php _e('Are you sure you want to reset?', 'haku'); ?></h1>
		
		<!-- Confirmation button -->
		<a href="#" id="wb_haku_popup_confirm"><?php _e('Reset', 'haku'); ?></a>
		
	</div>
	<!-- end: Popup -->
	
	<!-- Header -->
	<div class="header">
		
		<!-- Heading -->
		<h1><strong><?php echo get_theme_name(); ?> <?php echo get_theme_version(); ?></strong> <?php _e('Control Panel', 'haku'); ?></h1>
		
		<!-- Tools -->
		<a id="wb_haku_save" class="wb_haku_button" href="#"><?php _e('Save Settings', 'haku'); ?> <span>0</span></a>
		
		<!-- Haku search -->
		<input type="text" id="wb_haku_search" placeholder="<?php echo esc_attr( __('Search Settings', 'haku') ); ?>" value="" maxlength="25" />
		
		<!-- Info -->
		<a href="#" id="wb_haku_i"></a>
		
		<!-- Infolist -->
		<ul id="wb_haku_infolist">
		
			<li><a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html" target="_blank"><?php _e('Documentation', 'haku'); ?></a></li>
			
			<li><a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#shortcodesList" target="_blank"><?php _e('Shortcodes List', 'haku'); ?></a></li>
			
			<li><a href="http://help.winterbits.com/">Help Center</a></li>
						
			<?php if ( get_option( get_haku_var('theme') ) ) : ?>
			
			<li><a href="#reset-options"><?php _e('Reset Options', 'haku'); ?></a></li>

			<?php endif; ?>
			
		</ul>
		<!-- end: Infolist -->
		
	</div>
	<!-- end: Header -->
	
	<!-- Main container -->
	<div id="wb_haku_container" class="clearfix">
	
		<!-- Sidebar -->
		<div class="aside">
			
			<!-- Menu -->
			<ul></ul>
			
		</div>
		<!-- end: Sidebar -->
		
		<!-- Tabs container -->
		<div>
			
			<!-- Theme options -->
			<?php require( get_haku_var('panel') . '/options.php' ); ?>
			
			<!-- Version -->
			<span id="haku_version"><?php _e('Version', 'haku'); ?> <?php echo get_haku_var('$'); ?></span>
			
		</div>
		<!-- end: Tabs container -->
		
	</div>
	<!-- end: Main container -->

	<!-- Footer -->
	<div class="footer">
		
		<span><!-- haku by winterbits --></span>
		
	</div>
	<!-- end: Footer -->

</div>