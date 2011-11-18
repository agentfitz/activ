<?php
/*
 *  Haku Framework
 *  Handcrafted by Stefano Giliberti
 *  winterbits@gmail.com
 *  winterbits.com
 *
 *  Based on a Joao Araujo's script ( http://bit.ly/8XpksA )
 *
 */

function get_latest_theme_version() {
	
	$db_cache_field = get_haku_var('theme') . '_cache';
	$db_cache_field_last_updated = $db_cache_field . '_last';
	$last = get_option( $db_cache_field_last_updated );
	
	if ( ! $last || ( ( time() - $last ) > 86400 ) ) {
	
		if ( function_exists('curl_init') ) {
			$ch = curl_init( get_haku_var('theme_xml') );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_HEADER, 0 );
			curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
			$cache = curl_exec( $ch );
			curl_close( $ch );
		}
		else {
			$cache = file_get_contents( get_haku_var('theme_xml') );
		}
		
		if ( $cache ) {			
			update_option( $db_cache_field, $cache );
			update_option( $db_cache_field_last_updated, time() );
		} 

		$notifier_data = get_option( $db_cache_field );

	}
	else {

		$notifier_data = get_option( $db_cache_field );

	}

	if ( strpos( (string) $notifier_data, '<notifier>' ) === false ) {
		$notifier_data = '<?xml version="1.0.0" encoding="UTF-8"?><notifier><latest>1.0.0</latest><changelog></changelog></notifier>';
	}
	
	$xml = @simplexml_load_string( $notifier_data ); 

	return $xml;

}

function update_notifier_menu() {

	if ( ! function_exists('simplexml_load_string') || ! current_user_can('switch_themes') ) return;
	
	$xml = get_latest_theme_version();

	if ( version_compare( $xml->latest, get_theme_version(), '>' ) ) {
		add_dashboard_page( get_theme_name() . ' Theme Updates', get_theme_name() . '<span class="update-plugins count-1"><span class="update-count">' . $xml->latest . '</span></span>', 'switch_themes', get_haku_var('theme'), 'theme_update_notify');
	}
	
}

add_action('admin_menu', 'update_notifier_menu');  

function update_notifier_bar_menu() {
	
	global $wp_admin_bar;
	
	if ( ! function_exists('simplexml_load_string') || ! is_admin_bar_showing() || ! current_user_can('switch_themes') ) return;
	
	$xml = get_latest_theme_version();

	if ( version_compare( $xml->latest, get_theme_version(), '>' ) ) {
		
		$menu = array(
			'id' => get_haku_var('theme'),
			'title' => get_theme_name() . ' <span id="ab-updates">' . $xml->latest . ' ' . __('Available', 'haku') . '</span>',
			'href' => get_admin_url() . 'index.php?page=' . get_haku_var('theme')
		);
		
		$wp_admin_bar->add_menu( $menu );
		
	}
	
}

add_action( 'admin_bar_menu', 'update_notifier_bar_menu', 1000 );

function theme_update_notify() {

	$xml = get_latest_theme_version();

	?>
	
	<!-- Wrapper -->
	<div class="wrap">
		
		<!-- WP Icon -->
		<div id="icon-themes" class="icon32"></div>

		<h2 style="margin-bottom: 15px;"><?php echo get_theme_name(); ?> <?php echo $xml->latest; ?> <?php _e('Available', 'haku'); ?>!</h2>
	    
	    <div class="updated"><p><strong><?php printf( __('A new version of %s has just become available!', 'haku'), get_theme_name() ); ?></strong> <?php printf( __('Head over %s, login into your account, switch to the "Downloads" section and re-download %s, just like you did the first time.', 'haku'), '<a href="http://themeforest.net" target="_blank">ThemeForest.net</a>', get_theme_name() ); ?></p></div>
		
		<!-- Theme picture -->
		<img style="float: left; margin: 10px 35px 0 10px;" src="<?php echo get_stylesheet_directory_uri() . '/screenshot.png'; ?>" />
		
		<!-- Info -->
		<div style="float: left; width: 500px;">
		
			<h2 style="padding-top: 0;"><?php _e('Things you should know', 'haku'); ?></h2>
			<p><?php printf( __('Before updating, I recommend you to perform a quick backup of your current version of %s (%s). There&rsquo;s no risk that something might corrupt your database, but you might lose any eventual change you made on the theme itself.', 'haku'), get_theme_name(), get_theme_version() ); ?></p>
			<p><?php _e('Your theme path:', 'haku'); ?> <code><?php echo TEMPLATEPATH; ?></code></p>
		    
		    <h3><?php _e('How to update?', 'haku'); ?></h3>
		    <p><?php echo sprintf( __('Updating a theme is pretty much like installing it. Download it, extract the .zip package, find the theme folder (do not upload the entire package!). Now, if you have no idea of what a FTP connection is, simply delete the current version of %s and upload the new one. Otherwise, connect to your server, navigate to the WordPress themes folder and replace the whole theme folder.', 'haku'), get_theme_name() ); ?></p>
			
			<p><?php _e('Your themes path:', 'haku'); ?> <code><?php echo get_theme_root(); ?></code></p>
			
			<h3><?php _e('I still need help.', 'haku'); ?></h3>
			<p><?php echo sprintf( __('If you still need help, don&rsquo;t hesitate to contact me via the %s or through my ThemeForest.net %s Contact Form.', 'haku'), '<a href="http://help.winterbits.com">Help Center</a>', '<a href="">' . __('Profile Page', 'haku') . '</a>' ); ?></p>
			
		</div>
		<!-- end: Info -->
		
		<div class="clear"></div>
		
	    <h3><?php _e('What&rsquo;s changed?', 'haku'); ?></h3>

	    <div><?php echo $xml->changelog; ?></div>

	</div>
	<!-- end: Wrapper -->
	
	<?php
    
}

?>