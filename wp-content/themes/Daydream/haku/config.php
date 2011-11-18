<?php 
/*
 *  Haku Framework
 *  Handcrafted by Stefano Giliberti
 *  winterbits@gmail.com
 *  winterbits.com
 */

/********************/
/*   Main configs   */
$haku = array(
	
	'theme' => 'daydream',
	'theme_slides' => 'daydream_slides',
	'theme_sidebars' => 'daydream_sidebars',
	'theme_includes' => TEMPLATEPATH . '/includes',
	'theme_includes_uri' => get_template_directory_uri() . '/includes',
	'theme_xml' => 'http://version.winterbits.com/daydream.xml',
	
	'$' => '1.3',
	'.' => TEMPLATEPATH . '/haku',
	'includes' => TEMPLATEPATH . '/haku/includes',
	'includes_uri' => get_template_directory_uri() . '/haku/includes',
	'panel' => TEMPLATEPATH . '/haku/panel',
	'panel_uri' => get_template_directory_uri() . '/haku/panel',
	'panel_includes_uri' => get_template_directory_uri() . '/haku/panel/includes',
	
	'str_error' => __("Sorry, there was an unxpected error - try again. \n\nIf this error keeps annoying you, please, contact the theme author Stefano at winterbits@gmail.com or open a new help request on help.winterbits.com. Thanks! \n\nError code: %s", 'haku')
	
);

/*****************************/
/*   Default theme options   */
$theme_defaults = array(

	'logo_image' => null,
	'use_plain_logo' => false,
	'favicon' => null,
	'plain_logo_text' => get_bloginfo('name'),
	'default_title' => get_bloginfo('name'),
	'default_heading' => get_bloginfo('description'),
	'force_headlines' => false,

	'footer_left_content' => '&copy; Copyright 2011. Powered by [link url="http://wordpress.org"]WordPress[/link]. [tooltip caption="Buy me!"][link url="http://themes.winterbits.com/daydream"]Daydream Theme[/link][/tooltip] by [link url="http://winterbits.com"]Stefano Giliberti[/link].',
	'footer_right_twitter' => 'http://www.twitter.com/',
	'footer_right_facebook' => 'http://www.facebook.com/',
	'analytics_code' => null,
	
	'theme' => 'daydream',
	'primary_pattern' => '01',
	'custom_primary_pattern' => null,
	'secondary_pattern' => '02',
	'custom_secondary_pattern' => null,
	'tertiary_pattern' => '03',
	'custom_tertiary_pattern' => null,
	
	'hero_custom' => false,
	'hero_content' => null,
	'slider' => 'jcycle',
	'slider_height' => 316,
	'slider_speed' => 250,
	'jcycle_fx' => 'scrollHorz',
	'jcycle_easing' => 'easeInOutSine',
	'jcycle_timeout' => 0,
	'nivoslider_fx' => 'random',
	'nivoslider_slices' => 15,
	'nivoslider_boxcols' => 8,
	'nivoslider_boxrows' => 4,
	'nivoslider_pausetime' => 3000,
	'nivoslider_captionopacity' => 0.8,
	'orbit_fx' => 'horizontal-push',
	'orbit_timer' => true,
	'orbit_cap_fx' => 'slideOpen',
	'orbit_cap_fx_speed' => 800,
	'orbit_advancespeed' => 3000,
	
	'font_family' => null,
	'body_color' => null,
	'custom_menu_bar' => false,
	'menu_bar_height' => 57,
	'menu_bar_background' => null,
	'menu_bar_colour' => '#21b6f2',
	'menu_bar_text_size' => 13,
	'background_color' => null,
	'google_webfont' => 'Open+Sans:400italic,700italic,300italic,600italic,300,400,600,700',
	'headings_color' => null,
	'links_color' => null,
	'links_hover_color' => null,
	'filter_tags_color' => null,
	'css_code' => null,
	
	'default_sidebar_align' => 'right',
	'header_layout' => 'classic',
	'disable_submenu' => false,
	'featured_image_height' => 152,
	'post_author' => true,
	'post_comments_count' => true,
	'post_category' => true,
	'post_tags' => false,
	'post_facebook_share' => true,
	'post_twitter_share' => true,
	'post_google_share' => true,
	'post_trackbacks' => true,
	'page_responses' => true,
	
	'exclude_category' => null,
	'wp_login_logo' => null,
	'wp_gravatar' => null,
	'jquery_local' => false,
	'theme_update' => false
	
);

/***************************/
/*   Framework functions   */
require( $haku['.'] . '/functions.php' );

/********************************/
/*   WP Alchemy metabox class   */
require( $haku['includes'] . '/metabox.php' );

if ( is_wp_edit() ) {
	wp_register_style('haku_metabox_css', $haku['includes_uri'] . '/metabox.css', '', get_theme_version() );
	wp_register_script('haku_metabox_js', $haku['includes_uri'] . '/metabox.js', '', get_theme_version(), 1 );
	wp_enqueue_style('haku_metabox_css');
	wp_enqueue_script('haku_metabox_js');
}

/***************************/
/*   Theme options panel   */
require( $haku['panel'] . '/setup.php' );

/***************************/
/*   Updates notifier   */
if ( get_theme_option('theme_update') ) {
	require( $haku['.'] . '/update.php' );
}

?>