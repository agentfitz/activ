<?php
/*
 *  User custom styles
 */

define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');
header("Content-type: text/css");
?>
/*----------------------------------------------------------------------------
	GOOGLE WEB FONT
----------------------------------------------------------------------------*/

h1, h2, h3, h4, h5, h6 {
	font-family: "<?php echo haku_get_font_name( get_theme_option('google_webfont') ); ?>", sans-serif;
}

#hero .container > span {
	font-family: "<?php echo haku_get_font_name( get_theme_option('google_webfont') ); ?>", sans-serif;
}


/*----------------------------------------------------------------------------
	PRIMARY PATTERN
----------------------------------------------------------------------------*/

<?php 
$selected_pattern = get_stylesheet_directory_uri() . '/images/patterns/pattern_' . get_theme_option('primary_pattern') . '.png';
$pattern = ( get_theme_option('custom_primary_pattern') ? get_theme_option('custom_primary_pattern') : $selected_pattern );
?>

#hero {
	background: url(<?php echo $pattern; ?>) repeat;
}


/*----------------------------------------------------------------------------
	SECONDARY PATTERN
----------------------------------------------------------------------------*/

<?php 
$selected_pattern = get_stylesheet_directory_uri() . '/images/patterns/pattern_' . get_theme_option('secondary_pattern') . '.png';
$pattern = ( get_theme_option('custom_secondary_pattern') ? get_theme_option('custom_secondary_pattern') : $selected_pattern );
?>

#tools {
	background: url(<?php echo $pattern; ?>) repeat;
}

#content > aside .dayd_search {
	background: url(<?php echo $pattern; ?>) repeat;
}

.wp-caption {
	background: url(<?php echo $pattern; ?>) repeat;
}


/*----------------------------------------------------------------------------
	TERTIARY PATTERN
----------------------------------------------------------------------------*/

<?php 
$selected_pattern = get_stylesheet_directory_uri() . '/images/patterns/pattern_' . get_theme_option('tertiary_pattern') . '.png';
$pattern = ( get_theme_option('custom_tertiary_pattern') ? get_theme_option('custom_tertiary_pattern') : $selected_pattern );
?>

#dock-area {
	background: url(<?php echo $pattern; ?>) repeat;
}

body > footer {
	background: url(<?php echo $pattern; ?>) repeat;
}

<?php if ( get_theme_option('slider') && get_theme_option('slider') != 'jcycle' ) : ?>

/*----------------------------------------------------------------------------
	SLIDER
----------------------------------------------------------------------------*/

<?php if ( get_theme_option('slider') == 'nivoslider' ) : ?>

#hero_slider.dayd_nivoslider {
	height: <?php echo get_theme_option('slider_height'); ?>px;
}

<?php elseif ( get_theme_option('slider') == 'orbit' ) : ?>

#hero_slider.dayd_orbit { 
	height: <?php echo get_theme_option('slider_height'); ?>px;
}

<?php endif; ?>

<?php endif; ?>

/*----------------------------------------------------------------------------
	STYLING
----------------------------------------------------------------------------*/

<?php if ( get_theme_option('font_family') || get_theme_option('body_color') || get_theme_option('background_color') ) : ?>

body {
	
	<?php if ( get_theme_option('font_family') ) : ?>
	font-family: <?php echo get_theme_option('font_family'); ?>;
	<?php endif; ?>
	
	<?php if ( get_theme_option('body_color') ) : ?>
	color: <?php echo get_theme_option('body_color'); ?>;
	<?php endif; ?>
	
	<?php if ( get_theme_option('background_color') ) : ?>
	background: <?php echo get_theme_option('background_color'); ?>;
	<?php endif; ?>

}

<?php endif; ?>

<?php if ( get_theme_option('custom_menu_bar') ): ?>

body > header ,
body > header .nav,
body > header .nav li a,
body > header .nav > li.current-menu-item > a,
body > header .nav > li.current-menu-ancestor > a {
	background: none;
}

body > header .nav li a {
	text-shadow: 0 -1px 1px rgba(0, 0, 0, .35);
}

body > header .nav > li.current-menu-item > a,
body > header .nav > li.current-menu-ancestor > a {
	text-shadow: 0 1px 1px rgba(0, 0, 0, .35);
}

body > header .nav li:hover {
	background: url(<?php echo get_stylesheet_directory_uri(); ?>/colours/user/top_hover.png) repeat;
}

body > header .nav > li.current-menu-item,
body > header .nav > li.current-menu-ancestor {
	background: url(<?php echo get_stylesheet_directory_uri(); ?>/colours/user/top_active.png) repeat;
}

body > header .nav li a span {
	background: url(<?php echo get_stylesheet_directory_uri(); ?>/colours/user/drop-icon.png) no-repeat;
}

body > header {

	height: <?php echo get_theme_option('menu_bar_height'); ?>px;
	
	<?php if ( get_theme_option('menu_bar_background') ) : ?>
	background-image: url(<?php echo get_theme_option('menu_bar_background'); ?>);
	background-repeat: repeat;
	<?php endif; ?>
	
	background-color: <?php echo get_theme_option('menu_bar_colour'); ?>;
	
}

body > header .logo {
	line-height: <?php echo get_theme_option('menu_bar_height'); ?>px;
}

body > header .nav li {
	font-size: <?php echo get_theme_option('menu_bar_text_size'); ?>px;
	line-height: <?php echo get_theme_option('menu_bar_height'); ?>px;
}

.nav li:hover ul,
.nav li.sfHover ul {
	top: <?php echo get_theme_option('menu_bar_height'); ?>px;
}

<?php endif; ?>

<?php if ( get_theme_option('body_color') ) : ?>

#content > aside .wb_dayd_latests_widget ul li small,
.dayd_post > div footer .post_cat {

	<?php if ( get_theme_option('body_color') ) : ?>
	color: <?php echo get_theme_option('body_color'); ?>;
	<?php endif; ?>

}

<?php endif; ?>

<?php if ( get_theme_option('background_color') ) : ?>

.dayd_tabs nav .current {

	<?php if ( get_theme_option('background_color') ) : ?>
	background: <?php echo get_theme_option('background_color'); ?>;
	<?php endif; ?>

}

<?php endif; ?>

<?php if ( get_theme_option('headings_color') ) : ?>

/*
	Headings
*/
h1, h2, h3, h4, h5, h6 {

	<?php if ( get_theme_option('headings_color') ) : ?>
	color: <?php echo get_theme_option('headings_color'); ?>;
	<?php endif; ?>

}

<?php endif; ?>

<?php if ( get_theme_option('links_color') ) : ?>

/*
	Links
*/
a, a:active, a:visited,
#content > aside .wb_dayd_latests_widget ul li a,
#content > aside .wb_dayd_latests_widget ul li h5 a,
#dayd_submenu li a,
.wb_dayd_list_widget ul li a,
.wb_dayd_comments_widget ul li a,
#dayd_pagination_next a,
#dayd_pagination_prev a,
.dayd_tabs nav a,
.dayd_tabs nav .current,
.dayd_tabs nav .current:hover {
	
	<?php if ( get_theme_option('links_color') ) : ?>
	color: <?php echo get_theme_option('links_color'); ?>;
	<?php endif; ?>
	
}

<?php endif; ?>

<?php if ( get_theme_option('links_hover_color') ) : ?>

a:hover,
#dayd_submenu li a:hover,
#content > aside .wb_dayd_latests_widget ul li:hover h5 a,
.wb_dayd_list_widget ul li a:hover,
.wb_dayd_comments_widget ul li a:hover,
.dayd_post > div .post_title a:hover,
.dayd_post > div footer .post_cat a:hover,
.dayd_tabs nav a:hover {
	
	<?php if ( get_theme_option('links_hover_color') ) : ?>
	color: <?php echo get_theme_option('links_hover_color'); ?>;
	<?php endif; ?>
	
}

<?php endif; ?>

<?php if ( get_theme_option('filter_tags_color') ) : ?>

#showcase_tools #dayd_taglist li {
	background-color: <?php echo get_theme_option('filter_tags_color'); ?>;
}

<?php endif; ?>

<?php if ( get_theme_option('css_code') ) : ?>

/*----------------------------------------------------------------------------
	CUSTOM STYLES
----------------------------------------------------------------------------*/

<?php echo get_theme_option('css_code'); ?>

<?php endif; ?>