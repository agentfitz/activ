<?php
/*
 *  Haku Framework
 *  Handcrafted by Stefano Giliberti
 *  winterbits@gmail.com
 *  winterbits.com
 */

/******************/
/*   Haku Panel   */
function haku_panel_register() {
	$panel = add_theme_page( get_theme_name() . ' ' . get_theme_version(), get_theme_name(), 'switch_themes', 'haku-panel', 'haku_panel' );
	add_action( 'admin_print_styles-' . $panel, 'haku_panel_includes' );
}

add_action( 'admin_menu', 'haku_panel_register' );

function haku_panel() {
	require( get_haku_var('panel') . '/panel.php' );
}

function haku_panel_includes() {

	wp_register_style('haku_css',  get_haku_var('panel_includes_uri') . '/style.css', '', get_haku_var('$') );
	wp_register_script('haku_js_jqueryui', get_haku_var('panel_includes_uri') . '/js/jquery-ui.js', '', get_haku_var('$'), 1);
	wp_register_script('haku_js_plugins', get_haku_var('panel_includes_uri') . '/js/jquery.plugins.js', '', get_haku_var('$'), 1);
	wp_register_script('haku_js', get_haku_var('panel_includes_uri') . '/js/wb.haku.js', '', get_haku_var('$'), 1);
	
	wp_enqueue_style('thickbox');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('media-upload');
	wp_enqueue_style('haku_css');
	wp_enqueue_script('haku_js_jqueryui');
	wp_enqueue_script('haku_js_plugins');
	wp_enqueue_script('haku_js');

}

function haku_panel_actions() {
	require( get_haku_var('panel') . '/actions.php' );
}

add_action( 'admin_init', 'haku_panel_actions' );

?>