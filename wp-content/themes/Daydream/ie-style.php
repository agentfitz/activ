<?php
/*
 *  Internet Explorer personal styles
 */

define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');
header("Content-type: text/css");
?>
/*----------------------------------------------------------------------------
	JAVASCRIPT PLUGINS STYLES
----------------------------------------------------------------------------*/

.ie7 #fancybox-content .video-js-box,
.ie8 #fancybox-content .video-js-box {
	overflow: visible;
}

.fancybox-ie .fancybox-bg { background: transparent !important; }
.fancybox-ie #fancybox-bg-n { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/images/plugins/fancy_shadow_n.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-ne { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/images/plugins/fancy_shadow_ne.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-e { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/images/plugins/fancy_shadow_e.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-se { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/images/plugins/fancy_shadow_se.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-s { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/images/plugins/fancy_shadow_s.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-sw { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/images/plugins/fancy_shadow_sw.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-w { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/images/plugins/fancy_shadow_w.png', sizingMethod='scale'); }
.fancybox-ie #fancybox-bg-nw { filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo get_stylesheet_directory_uri(); ?>/images/plugins/fancy_shadow_nw.png', sizingMethod='scale'); }


/*----------------------------------------------------------------------------
	INTERNET EXPLORER FIXES (EW!)
----------------------------------------------------------------------------*/

.ie7 legend { margin-left: -7px; } 
.ie7 input[type="checkbox"] { vertical-align: baseline; }
.ie7 img { -ms-interpolation-mode: bicubic; }

.ie7 body > header .nav li a {
	display: inline-block;
}

.ie7 #hero {
	z-index: 1;
}

.ie7 body > header,
.ie8 body > header {
	box-shadow: 0 2px 4px #ccc;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 #hero,
.ie8 #hero {
	box-shadow: 0 2px 4px #ccc;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 #hero_slider .slide,
.ie8 #hero_slider .slide {
	background: transparent !important;
}

.ie7 .dayd_nivoslider,
.ie8 .dayd_nivoslider {
	box-shadow: 0 2px 7px #ccc;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 .home #tools {
	padding-bottom: 27px;
}

.ie7 .home #tools,
.ie8 .home #tools {
	box-shadow: inset 0 -2px 4px #000;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 .shots li,
.ie8 .shots li {
	box-shadow: 0 1px 4px #cecece;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie8 .shots li {
	position: relative;
}

.ie7 #hero_slider .slide .slide_picture,
.ie8 #hero_slider .slide .slide_picture {
	box-shadow: 0 1px 15px #bebebe;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 body > header .nav li ul,
.ie8 body > header .nav li ul {
	box-shadow: 0 5px 7px #919191;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 body > header .nav li ul li a {
	display: block;
}

.ie8 #dock-area {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie8 .testimonials_slider .slide > div img {
	box-shadow: 0 1px 3px #bebebe;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie8 .testimonials_slider .slide > div > div {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 #dock-area .wb_dayd_latests_widget ul li {
	width: 100%;
}

.ie7 #content > aside .wb_dayd_latests_widget ul li {
	width: 100%;
}

.ie7 #dock-area .wb_dayd_twitter_widget ul li,
.ie8 #dock-area .wb_dayd_twitter_widget ul li {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 #dock-area .wb_dayd_cform_widget form input[type="submit"],
.ie8 #dock-area .wb_dayd_cform_widget form input[type="submit"] {
	margin-top: 8px;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie #dock-area .wb_dayd_cform_widget form input[type="submit"] {
	filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}

.ie7 body > footer,
.ie8 body > footer {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 body > footer span {
	float: left;
}

.ie .orbit-wrapper .timer {
	display: none;
}

.ie7 .orbit-wrapper .orbit-caption {
	bottom: -10px;
}

.ie7 .orbit-wrapper .orbit-caption,
.ie8 .orbit-wrapper .orbit-caption {
	background: #333;
}

.ie7 .orbit-bullets li {
	float: left;
}

.ie7 .dayd_twitter_marquee,
.ie8 .dayd_twitter_marquee {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 .wp-caption,
.ie8 .wp-caption {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 .dayd_tabs,
.ie8 .dayd_tabs {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 .dayd_toggle,
.ie8 .dayd_toggle {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 #content > aside .dayd_search,
.ie8 #content > aside .dayd_search {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 .wb_dayd_list_widget ul li a span {
	display: none;
}

.ie8 .wb_dayd_list_widget ul li a span {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 #dayd_submenu li:last-child a,
.ie8 #dayd_submenu li:last-child a {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 #tools {
	padding-bottom: 10px;
}

.ie7 #showcase_tools #dayd_taglist {
	padding-top: 5px;
}

.ie7 #showcase_tools #dayd_taglist li {
	float: left;
	margin-right: 5px;
}

.ie8 .dayd_slider > div {
	box-shadow: 0 2px 7px #ccc;
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 #dayd_post_comments .comment-reply-link,
.ie8 #dayd_post_comments .comment-reply-link {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

/*
	color: inherit; on ie7
*/
.ie7 #dock-area .wb_dayd_latests_widget ul li a,
.ie7 .wb_dayd_list_widget ul li a,
.ie7 .shots li a,
.ie7 .dayd_post > div .post_title a {
	color: expression(this.parentNode.currentStyle['color']);
}

.ie7 input[type="submit"],
.ie8 input[type="submit"] {
	behavior: url(<?php echo get_stylesheet_directory_uri(); ?>/js/PIE.php);
}

.ie7 input[type="submit"] {
	overflow: visible;
}

.ie7 input[type="submit"],
.ie8 input[type="submit"] {
	box-shadow: 0 1px 3px #9e9e9e;
}