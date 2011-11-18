<?php
/*
 *  Theme shortcodes
 */

/**********************/
/*   Editor Buttons   */
function dayd_quicktags_styles() {
	wp_register_style('dayd_quicktags_style', get_includes_dir('uri') . '/quicktags/quicktags.css', '', get_theme_version() );
	wp_enqueue_style('dayd_quicktags_style');
}

function dayd_quicktags() {
	wp_register_script('dayd_quicktags', get_includes_dir('uri') . '/quicktags/quicktags.js', array('quicktags'), get_theme_version() );
	wp_enqueue_script('dayd_quicktags');
}

if ( is_wp_edit() ) {
	add_action( 'admin_print_styles', 'dayd_quicktags_styles' );
	add_action( 'admin_enqueue_scripts', 'dayd_quicktags' );
}	

/************************/
/*   [button][/button]  */
function button_shortcode( $atts, $content = '' ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'color' => '',
				'link' => home_url(),
			),
			$atts
		)
	);
	
	$class = array('dayd_button');
	
	switch ( $color ) {
		case 'orange';
			$class[] = 'dayd_button_orange';
		break;
		case 'blue':
			$class[] = 'dayd_button_blue';
		break;
		case 'red';
			$class[] = 'dayd_button_red';
		break;
		case 'green':
			$class[] = 'dayd_button_green';
		break;
		case 'grey':
			$class[] = 'dayd_button_grey';
		break;
		case 'violet':
			$class[] = 'dayd_button_violet';
		break;
		case 'black':
			$class[] = 'dayd_button_black';
		break;
	}
	
	$class = haku_nice_classes( $class, true );
	
	// Shortcode
	$shortcode = '<a href="' . esc_url( $link ) . '" class="' . $class . '"><span>' . $content . '</span></a>';
		
	return $shortcode;
	
}

add_shortcode( 'button', 'button_shortcode' );

/**************************/
/*   [dropcap][/dropcap]  */
function dropcap_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = '<span class="dayd_dcap">' . do_shortcode( $content ) . '</span>';
		
	return $shortcode;

}
add_shortcode( 'dropcap', 'dropcap_shortcode' );

/**********************/
/*   [quote][/quote]  */
function quote_shortcode( $atts, $content = '' ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'align' => '',
				'cite' => '',
			),
			$atts
		)
	);
	
	switch ( $align ) {
		case 'left':
			$class = 'alignleft';
		break;
		case 'right':
			$class = 'alignright';
		break;
		default:
			$class = '';
	}
	
	// Shortcode
	$shortcode = '<blockquote class="' . $class . '">';
	$shortcode .= do_shortcode( $content );
	$shortcode .= ( $cite ? '<cite>' . $cite . '</cite>' : '' );
	$shortcode .= '</blockquote>';
	
	return $shortcode;
	
}
add_shortcode( 'quote', 'quote_shortcode' );

/**************************/
/*   [message][/message]  */
function message_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = '<span class="dayd_message">' . $content . '</span>';
		
	return $shortcode;
	
}
add_shortcode( 'message', 'message_shortcode' );

/**********************/
/*   [alert][/alert]  */
function alert_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = '<span class="dayd_message dayd_alert">' . $content . '</span>';
		
	return $shortcode;
	
}
add_shortcode( 'alert', 'alert_shortcode' );

/**************************/
/*   [success][/success]  */
function success_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = '<span class="dayd_message dayd_success">' . $content . '</span>';
		
	return $shortcode;
	
}
add_shortcode( 'success', 'success_shortcode' );

/************************/
/*   [notice][/notice]  */
function notice_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = '<span class="dayd_message dayd_notice">' . $content . '</span>';
		
	return $shortcode;
	
}
add_shortcode( 'notice', 'notice_shortcode' );

/********************/
/*   [tabs][/tabs]  */
function tabs_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = '<div class="dayd_tabs">';
	$shortcode .= '<nav></nav>';
	$shortcode .= '<div>';
	$shortcode .= do_shortcode( $content );
	$shortcode .= '</div>';
	$shortcode .= '</div>';
		
	return $shortcode;
	
}
add_shortcode( 'tabs', 'tabs_shortcode' );

/******************/
/*   [tab][/tab]  */
function tab_shortcode( $atts, $content = '' ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'name' => 'Tab',
				'open' => '',
			),
			$atts
		)
	);
	
	$status = ( $open ? 'open' : '' );
	
	// Shortcode
	$shortcode = '<div data-tab-title="' . esc_attr( $name ) . '" class="' . $status . '">';
	$shortcode .= do_shortcode( $content );
	$shortcode .= '</div>';
		
	return $shortcode;
	
}
add_shortcode( 'tab', 'tab_shortcode' );

/************************/
/*   [toggle][/toggle]  */
function toggler_shortcode( $atts, $content = '' ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'name' => __('Toggle content', 'haku')
			),
			$atts
		)
	);
	
	// Shortcode
	$shortcode = '<div class="dayd_toggle" data-toggle-title="' . esc_attr( $name ) . '">';
	$shortcode .= '<div class="content">';
	$shortcode .= do_shortcode( $content );
	$shortcode .= '</div>';
	$shortcode .= '</div>';
	
	return $shortcode;
	
}
add_shortcode( 'toggle', 'toggler_shortcode' );

/********************/
/*   [code][/code]  */
function code_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = '<pre><code>' . $content . '</code></pre>';
	
	$shortcode = apply_filters( 'autop_clear_filter', $shortcode );
		
	return $shortcode;
	
}
add_shortcode( 'code', 'code_shortcode' );

/************************/
/*   [twitter-marquee]  */
function twitter_marquee_shortcode( $atts ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'username' => '',
				'size' => '',
				'tweets' => 5,
				'speed' => 1
			),
			$atts
		)
	);
	
	$class = array('dayd_twitter_marquee');
	
	switch ( $size ) {
		case 'small':
			$class[] = 'small';
		break;
		case 'medium':
			$class[] = 'medium';
		break;
	}
	
	$class = haku_nice_classes( $class, true );
	
	switch ( $speed ) {
		case 'fast':
			$speed = 5;
		break;
		case 'normal':
			$speed = 3;
		break;
		case 'slow':
			$speed = 1;
		break;
	}
	
	$haku_tweets = haku_get_tweets( $username, $tweets );
	
	// Shortcode
	$shortcode = '<div class="' . $class . '">';
	$shortcode .= '<marquee scrollamount="' . esc_attr( $speed ) . '">';
	
	if ( $haku_tweets ) {
		foreach ( $haku_tweets as $tweets => $tweet ) {
			$shortcode .= '<span>' . $tweet['content'] . '</span>';
		}
	}
	else {
		$shortcode .= '<span>' . sprintf( __('No tweets found from "%s"', 'haku') , $username ) . '</span>';
	}
	
	$shortcode .= '</marquee>';
	$shortcode .= '</div>';
		
	return $shortcode;
	
}
add_shortcode( 'twitter-marquee', 'twitter_marquee_shortcode' );

/****************/
/*   [youtube]  */
function youtube_shortcode( $atts ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'url' => '',
				'size' => '',
			),
			$atts
		)
	);
	
	$class = array('dayd_video');
	
	if ( $size == 'small' ) {
		$class[] = 'small_size';
		$size = array( 500, 311 );
	}
	elseif ( $size == 'large' ) {
		$class[] = 'large_size';
		$size = array( 900, 536 );
	}
	elseif ( intval( $size ) ) {
		$size = explode( 'x', $size );
		$size = array( $size[0], $size[1] );
		$style = 'width: '. $size[0] . 'px; height: ' . $size[1] . 'px;';
	}
	else {
		$size = array( 640, 390 );
	}
	
	$class = haku_nice_classes( $class, true );
	
	$id = haku_get_video_id( esc_url( $url ) );
	
	$video = '<iframe type="text/html" width="' . $size[0] . '" height="' . $size[1] . '" src="http://www.youtube.com/embed/' . $id . '?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
	
	// Shortcode
	$shortcode = '<div class="' . $class . '">';
	$shortcode .= '<div';
	
	if ( isset( $style ) ) {
		$shortcode .= ' style="' . $style . '"';
	}
	
	$shortcode .= '>';
	$shortcode .= $video;
	$shortcode .= '</div>';
	$shortcode .= '</div>';
	
	return $shortcode;
	
}
add_shortcode( 'youtube', 'youtube_shortcode' );

/**************/
/*   [vimeo]  */
function vimeo_shortcode( $atts ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'url' => '',
				'size' => '',
			),
			$atts
		)
	);
	
	$class = array('dayd_video');
	
	if ( $size == 'small' ) {
		$class[] = 'small_size';
		$size = array( 500, 281 );
	}
	elseif ( $size == 'large' ) {
		$class[] = 'large_size';
		$size = array( 900, 506 );
	}
	elseif ( intval( $size ) ) {
		$size = explode( 'x', $size );
		$size = array( $size[0], $size[1] );
		$style = 'width: '. $size[0] . 'px; height: ' . $size[1] . 'px;';
	}
	else {
		$size = array( 640, 360 );
	}

	$class = haku_nice_classes( $class, true );
	
	$id = haku_get_video_id( esc_url( $url ) );
	
	$video = '<iframe src="http://player.vimeo.com/video/' . $id . '?title=0&amp;byline=0&amp;portrait=0" width="' . $size[0] . '" height="' . $size[1] . '" frameborder="0"></iframe>';
	
	// Shortcode
	$shortcode = '<div class="' . $class . '">';
	$shortcode .= '<div';
	
	if ( isset( $style ) ) {
		$shortcode .= ' style="' . $style . '"';
	}
	
	$shortcode .= '>';
	$shortcode .= $video;
	$shortcode .= '</div>';
	$shortcode .= '</div>';
	
	return $shortcode;
	
}
add_shortcode( 'vimeo', 'vimeo_shortcode' );

/**************/
/*   [video]  */
function video_shortcode( $atts ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'url' => '',
				'size' => '',
			),
			$atts
		)
	);
	
	$class = array('dayd_video');
	
	if ( $size == 'small' ) {
		$class[] = 'small_size';
		$size = array( 500, 281 );
	}
	elseif ( $size == 'large' ) {
		$class[] = 'large_size';
		$size = array( 900, 506 );
	}
	elseif ( intval( $size ) ) {
		$size = explode( 'x', $size );
		$size = array( $size[0], $size[1] );
		$style = 'width: '. $size[0] . 'px; height: ' . $size[1] . 'px;';
	}
	else {
		$size = array( 640, 360 );
	}
	
	$class = haku_nice_classes( $class, true );
	
	$url = esc_url( $url );

	$no_ext_url = preg_replace('/\\.[^.\\s]{3,4}$/', '', $url );
	
	$video = '<div class="video-js-box">';
	$video .= '<video class="video-js" width="' . $size[0] . '" height="' . $size[1] . '" controls="controls">';
	$video .= '<source src="' .$no_ext_url . '.mp4" type="video/mp4; codecs=\'avc1.42E01E, mp4a.40.2\'" />';
	$video .= '<source src="' .$no_ext_url . '.webm" type="video/webm; codecs=\'vp8, vorbis\'" />';
	$video .= '<source src="' .$no_ext_url . '.ogv" type="video/ogg; codecs=\'theora, vorbis\'" />';
	$video .= '<object class="vjs-flash-fallback" width="' . $size[0] . '" height="' . $size[1] . '"';
	$video .= 'type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf">';
	$video .= '<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf" />';
	$video .= '<param name="allowfullscreen" value="true" />';
	$video .= '<param name="flashvars" value="config={\'clip\':{\'url\':\'' .$url . '\',\'autoPlay\':false,\'autoBuffering\':false}}" />';
	$video .= '</object>';
	$video .= '</video>';
	$video .= '</div>';
	
	// Shortcode
	$shortcode = '<div class="' . $class . '">';
	$shortcode .= '<div';
	
	if ( isset( $style ) ) {
		$shortcode .= ' style="' . $style . '"';
	}
	
	$shortcode .= '>';
	$shortcode .= $video;
	$shortcode .= '</div>';
	$shortcode .= '</div>';
	
	return $shortcode;
	
}
add_shortcode( 'video', 'video_shortcode' );

/************************/
/*   [slider][/slider]  */
function slider_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = '<div class="dayd_slider">';
	$shortcode .= '<div>';
	$shortcode .= do_shortcode( $content );
	$shortcode .= '</div>';
	$shortcode .= '</div>';
	
	$shortcode = apply_filters( 'autop_clear_filter', $shortcode );
	
	return $shortcode;
	
}
add_shortcode( 'slider', 'slider_shortcode' );

/**************/
/*   [slide]  */
function slide_shortcode( $atts ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'url' => '',
				'caption' => '',
			),
			$atts
		)
	);
	
	// Shortcode
	$caption_id = ( $caption ? uniqid('#caption_') : '' );
	$shortcode = '<img data-inline-caption="' . esc_attr( $caption ) . '" data-caption="' . $caption_id . '" src="' . esc_url( $url ) . '" alt="">';
		
	return $shortcode;
	
}
add_shortcode( 'slide', 'slide_shortcode' );

/****************************/
/*   [lightbox][/lightbox]  */
function lightbox_shortcode( $atts, $content = '' ) {

	// Shortcode
	$shortcode = '<span class="dayd_multi_lightbox">' . do_shortcode( $content ) . '</span>';
	
	return $shortcode;
	
}
add_shortcode( 'lightbox', 'lightbox_shortcode' );

/**************************/
/*   [tooltip][/tooltip]  */
function tiptip_shortcode( $atts, $content = '' ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'caption' => '',
			),
			$atts
		)
	);
	
	// Shortcode
	$shortcode = '<span data-tip="' . esc_attr( $caption ) . '">' . do_shortcode( $content ) . '</span>';
	
	$shortcode = apply_filters( 'autop_clear_filter', $shortcode );	
	
	return $shortcode;
	
}
add_shortcode( 'tooltip', 'tiptip_shortcode' );

/**********************************************/
/*   [columns-container][/columns-container]  */
function columns_container_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = '<div class="clearfix">' . do_shortcode( $content ) . '</div>';
	
	$shortcode = apply_filters( 'autop_clear_filter', $shortcode );	
	
	return $shortcode;
	
}
add_shortcode( 'columns-container', 'columns_container_shortcode' );

/************************/
/*   [column][/column]  */
function column_shortcode( $atts, $content = '' ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'size' => '',
				'icon' => '',
				'height' => '',
				'last' => ''
			),
			$atts
		)
	);
	
	$class = array();
	
	switch ( $size ) {
		case '1/2':
		case '2':
			$class[] = 'half';
		break;
		case '1/3':
		case '3':
			$class[] = 'one_third';
		break;
		case '1/4':
		case '4':
			$class[] = 'one_fourth';
		break;
		case '1/5':
		case '5':
			$class[] = 'one_fifth';
		break;
		case '2/3':
		case '2-3':
			$class[] = 'two_third';
		break;
		case '3/4':
		case '3-4':
			$class[] = 'three_fourth';
		break;
	}
	
	if ( $icon ) {
		$class[] = 'col_icon';
	}
	
	if ( $last ) {
		$class[] = 'no-margin';
	}
	
	$class = haku_nice_classes( $class, true );
	
	// Shortcode
	$shortcode = '<div class="' . $class . '"';
	
	if ( intval( $height ) ) {
		$shortcode .= ' style="height: ' . $height . 'px"'; 
	}
	
	$shortcode .= '>';
	
	if ( $icon ) {
		$icon = ( intval( $icon ) ? get_stylesheet_directory_uri() . '/images/symbols/is_' . $icon . '.png' : esc_url( $icon ) );
		$shortcode .= '<img src="' . $icon . '" alt="" />';
		$shortcode .= '<div>';
	}
	
	$shortcode .= apply_filters( 'autobr_clear_filter', do_shortcode( $content ) );
	
	if ( $icon ) {
		$shortcode .= '</div>';
	}
	
	$shortcode .= '</div>';
	
	return $shortcode;
	
}
add_shortcode( 'column', 'column_shortcode' );

/*********************/
/*   [reset-floats]  */
function reset_floats_shortcode() {

	// Shortcode
	$shortcode = '<div class="clear"></clear>';
	
	return $shortcode;
	
}
add_shortcode( 'reset-floats', 'reset_floats_shortcode' );

/************************/
/*   [slogan][/slogan]  */
function slogan_shortcode( $atts, $content = '' ) {

	// Shortcode
	$shortcode = '<h3 class="promo">' . do_shortcode( $content ) . '</h3>';
	
	return $shortcode;
	
}
add_shortcode( 'slogan', 'slogan_shortcode' );

/********************/
/*   [mark][/mark]  */
function mark_shortcode( $atts, $content = '' ) {

	// Shortcode
	$shortcode = '<mark>' . do_shortcode( $content ) . '</mark>';
	
	return $shortcode;
	
}
add_shortcode( 'mark', 'mark_shortcode' );

/************/
/*   [sep]  */
function hr_shortcode() {

	// Shortcode
	$shortcode = '<hr />';
	
	return $shortcode;
	
}
add_shortcode( 'sep', 'hr_shortcode' );

/************/
/*   [map]  */
function map_shortcode( $atts ) {

	// Attributes
	extract(
		shortcode_atts(
			array(
				'center' => 'New York, NY',
				'zoom' => 12,
				'size' => '400x250',
				'maptype' => 'roadmap',
			),
			$atts
		)
	);
	
	// Shortcode
	$shortcode = '<img src="http://maps.googleapis.com/maps/api/staticmap?center=' . $center . '&zoom=' . $zoom . '&size='. $size .'&maptype='. $maptype . '&sensor=false" alt="" />';
	
	return $shortcode;
	
}
add_shortcode( 'map', 'map_shortcode' );

/*********************/
/*   [testimonials]  */
function testimonials_shortcode( $atts, $content = '' ) {
		
	// Attributes
	extract(
		shortcode_atts(
			array(
				'category' => ''
			),
			$atts
		)
	);
	
	$shortcode = null;
	
	$testimonials = new WP_Query("category_name=$category&post_status=publish");
	
	// Shortcode
	if ( $testimonials->have_posts() ) {
		
		$shortcode = '<div class="testimonials_slider clearfix">';
		
		while ( $testimonials->have_posts() ) {
			
			$testimonials->the_post();
			
			$shortcode .= '<div class="slide clearfix">';
			$shortcode .= '<div>';
			$shortcode .= '<img src="' . get_thumb_src( get_the_ID(), 'full' ) . '" alt="" />';
			$shortcode .= '<div>';
			$shortcode .= '<div class="arrow"></div>';
			$shortcode .= '<p>';
			$shortcode .= apply_filters( 'autop_clear_filter', get_the_content() );
			$shortcode .= '<span>';
			$shortcode .= get_the_title();
			$shortcode .= '</span>';
			$shortcode .= '</p>';
			$shortcode .= '</div>';
			$shortcode .= '</div>';
			$shortcode .= '</div>';
		
		}
		
		$shortcode .= '</div>';
	
	}
	
	wp_reset_postdata();
	
	// Javascript
	global $dayd_enqueue_jcycle;
	$dayd_enqueue_jcycle = true;
	
	return $shortcode;
	
}
add_shortcode( 'testimonials', 'testimonials_shortcode' );

/********************/
/*   [link][/link]  */
function link_shortcode( $atts, $content = '' ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'url' => home_url()
			),
			$atts
		)
	);
	
	// Shortcode
	$shortcode = '<a href="' . esc_url( $url ) . '">' . do_shortcode( $content ) . '</a>';
	
	return $shortcode;
	
}
add_shortcode( 'link', 'link_shortcode' );

/************/
/*   [pic]  */
function pic_shortcode( $atts, $content = '' ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'url' => get_theme_option('logo')
			),
			$atts
		)
	);
	
	// Shortcode
	$shortcode = '<img src="' . esc_url( $url ) . '" alt="" />';
	
	return $shortcode;
	
}
add_shortcode( 'pic', 'pic_shortcode' );

/****************/
/*   [sidebar]  */
function sidebar_shortcode( $atts, $content = '' ) {
	
	// Attributes
	extract(
		shortcode_atts(
			array(
				'id' => 'dayd_sidebar'
			),
			$atts
		)
	);
	
	// Shortcode
	ob_start();

	dynamic_sidebar( $id );

	$shortcode = ob_get_contents();

	ob_end_clean();
	
	return $shortcode;

}
add_shortcode( 'sidebar', 'sidebar_shortcode' );

/******************/
/*   [raw][/raw]  */
function raw_shortcode( $atts, $content = '' ) {
	
	// Shortcode
	$shortcode = apply_filters( 'autop_clear_filter', do_shortcode( $content ) );
	
	return $shortcode;
	
}
add_shortcode( 'raw', 'raw_shortcode' );

?>