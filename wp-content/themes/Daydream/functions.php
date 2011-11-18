<?php
/*
 *  Theme functions
 *  Be extremely careful when editing these files! You've been warned!
 */

/**********************/
/*   Haku framework   */
require( TEMPLATEPATH . '/haku/config.php');

/**************************/
/*   Wordpress features   */
if ( ! isset( $content_width ) ) {
	$content_width = 978;
}

/*********************/
/*   Theme metabox   */
if ( is_admin() ) {
	require( get_includes_dir() . '/metabox.php');
}

/******************/
/*   Shortcodes   */
require( get_includes_dir() . '/shortcodes.php');

/*******************/
/*   Theme setup   */
if ( ! function_exists('daydream_setup') ) {
	
	function daydream_setup() {
				
		/*****************************************/
		/*   Load current language translation   */
		load_theme_textdomain( 'haku', TEMPLATEPATH . '/languages' );
		
		$locale_file = TEMPLATEPATH . '/languages/' . get_locale() . '.php'; 	
		
		if ( is_readable( $locale_file ) ) {
			require_once( $locale_file );
		}
		
		/***************************************/
		/*   WordPress features registration   */
		register_nav_menu('primary', __('Primary Menu', 'haku') );
		
		add_theme_support('automatic-feed-links');
		
		add_theme_support('post-thumbnails');
		
		/*******************************/
		/*   Default thumbnail sizes   */
		set_post_thumbnail_size(181, get_theme_option('featured_image_height'), true);
		
		add_image_size('dayd_latests', 37, 37, true);
		
		add_image_size('dayd_showcase_slideshow', 867, 486, true);
		
		add_image_size('dayd_showcase_slideshow_thumbnail', 60, 60, true);
		
		add_image_size('dayd_showcase_single', 389, 251, true);
		
		add_image_size('dayd_showcase_2', 473, 280, true);
		
		add_image_size('dayd_showcase_3', 306, 198, true);
		
		add_image_size('dayd_showcase_4', 222, 198, true);
		
		add_image_size('dayd_slider', 938, get_theme_option('slider_height'), true);
				
		/***************/
		/*   Widgets   */
		haku_include_widget('search,archives,categories,comments,latests,twitter,video,maps,contact-form,text,screenshots,columns,testimonials');
		
		/**********************************/
		/*   Showcase custom post types   */
		$showcase_pages = get_pages('meta_key=_wp_page_template&meta_value=showcase.php');
		
		foreach ( $showcase_pages as $page ) {
			
			$meta = get_post_meta( $page->ID, '_dayd_showcase_settings', TRUE );
			$layout = meta_get('layout', $meta, 3);
			$no_tools = meta_get('tools', $meta);
			$is_slideshow = ( meta_get('layout', $meta) == 's' ? true : false );
			$has_custom_height = ( intval( meta_get('height', $meta) ) ? true : false );
			
			$labels = array(
				'name' => $page->post_title . ': ' . __('Items', 'haku'),
				'add_new' => __('Add New Item', 'haku'),
				'add_new_item' => __('New Item', 'haku'),
				'edit_item' => __('Edit Item', 'haku'),
				'all_items' => __('Browse', 'haku'),
				'view_item' => '',
				'search_items' => __('Search Items', 'haku'),
				'menu_name' => $page->post_title
			);
							
			$args = array(
				'labels' => $labels,
				'publicly_queryable' => true,
				'show_ui' => true, 
				'show_in_menu' => true,
				'exclude_from_search' => true,
				'menu_position' => 10,
				'query_var' => true,
				'capability_type' => 'page',
				'hierarchical' => true,
				'supports' => array('title', 'excerpt', 'thumbnail', 'tags'),
				'rewrite' => array('slug' => $page->post_name ),
				'taxonomies' => array('post_tag'),
				'menu_icon' => get_includes_dir('uri') . '/images/showcase_ui_icon.png',
			);
			
			/************************************************/
			/*   Showcase Slideshows don't need an editor   */
			if ( ! $is_slideshow ) {
				$args['supports'][] = 'editor';
			}
		  	
		  	/************************/
		  	/*   Custom post type   */
			register_post_type( 'showcase_'. $page->ID, $args );
			
			/************************************************************************/
			/*   Filtering tags are not needed in Slideshows & "normal" Showcases   */
			if ( ! $no_tools && ! $is_slideshow ) {
			
				$labels = array(
					'name' => __('Filter Tags', 'haku'),
					'search_items' => __('Search Filters', 'haku'),
					'popular_items' => __('Most Used Filters', 'haku'),
					'edit_item' => __('Edit Filter', 'haku'),
					'update_item' => __('Update Filter', 'haku'),
					'add_new_item' => __('Add New Filter', 'haku'),
					'separate_items_with_commas' => __('Separate filters with commas (e.g. red, blue, green)', 'haku'),
					'add_or_remove_items' => __('Add or remove filters', 'haku'),
					'choose_from_most_used' => __('Choose from the most used filters', 'haku')
				);
				
				/****************************/
				/*   Custom post type tags  */
				register_taxonomy( 'showcase_filter_' . $page->ID, 'showcase_'. $page->ID, array(
					'labels' => $labels,
					'hierarchical' => false,
					'show_ui' => true,
					'query_var' => true
				));
			
			}
			
			/***************************/
			/*   Custom images height  */
			if ( $has_custom_height ) {
							
				$user_custom_size = array( '_' . $page->post_name, 0, $meta['height'] );
				
				switch ( $layout ) {
					case 's':
						$user_custom_size[1] = 867;
					break;
					case '1':
						$user_custom_size[1] = 389;
					break;
					case '2':
						$user_custom_size[1] = 473;
					break;
					case '3':
						$user_custom_size[1] = 306;
					break;
					case '4':
						$user_custom_size[1] = 222;
					break;
				}
												
				add_image_size( $user_custom_size[0], $user_custom_size[1], $user_custom_size[2], true );
			
			}

		}
		
	}

}

add_action( 'after_setup_theme', 'daydream_setup' );

/*********************/
/*   Theme sidebars  */
function theme_register_sidebars() {
	
	$sidebar = array(
		'name' => __('Main Sidebar', 'haku'),
		'id' => 'dayd_sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	);
	
	register_sidebar( $sidebar );
	
	$sidebar = array(
		'name' => 'Footer 1',
		'id' => 'dayd_footer_1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	);
	
	register_sidebar( $sidebar );
	
	$sidebar = array(
		'name' => 'Footer 2',
		'id' => 'dayd_footer_2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	);
	
	register_sidebar( $sidebar );
	
	$sidebar = array(
		'name' => 'Footer 3',
		'id' => 'dayd_footer_3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	);
	
	register_sidebar( $sidebar );
	
	$sidebar = array(
		'name' => 'Footer 4',
		'id' => 'dayd_footer_4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	);
	
	register_sidebar( $sidebar );
	
	/************************/
	/*   Homepage sidebars  */
	$home_page = get_pages('meta_key=_wp_page_template&meta_value=homepage.php');
	
	if ( $home_page ) {
		
		$sidebar = array(
			'name' => __('(Homepage) Tools Area', 'haku'),
			'id' => 'dayd_home_tools',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		);
		
		register_sidebar( $sidebar );
		
		$sidebar = array(
			'name' => __('(Homepage) Before Content', 'haku'),
			'id' => 'dayd_home_1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		);
		
		register_sidebar( $sidebar );
		
		$sidebar = array(
			'name' => __('(Homepage) After Content', 'haku'),
			'id' => 'dayd_home_2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		);
		
		register_sidebar( $sidebar );
	
	}
	
	/********************************/
	/*   Custom generated sidebars  */
	if ( get_theme_slides('theme_sidebars') ) {
		
		foreach ( get_theme_slides('theme_sidebars') as $sidebar_id => $sidebar ) {
			
			$sidebar = array(
				'name' => stripslashes( $sidebar['name'] ),
				'id' => $sidebar['slug'],
				'description' => stripslashes( $sidebar['desc'] ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4>',
				'after_title' => '</h4>',
			);
			
			register_sidebar( $sidebar );
			
		}
	
	}
	
}

add_action( 'widgets_init', 'theme_register_sidebars' );

/***********************/
/*   Theme javascript  */
function theme_register_javascript() {

	wp_deregister_script('jquery');
	wp_register_script('jquery', get_jquery_dir(), '', get_theme_version(), 1);
	wp_register_script('dayd_js_plugins', get_stylesheet_directory_uri() . '/js/jquery.plugins.js', '', get_theme_version(), 1);
	wp_register_script('dayd_js_init', get_stylesheet_directory_uri() . '/js/wb.daydream.js', '', get_theme_version(), 1);
	wp_register_script('dayd_js_showcase', get_stylesheet_directory_uri() . '/js/wb.daydream.showcase.js', '', get_theme_version(), 1);
	wp_register_script('dayd_js_jquery_cycle', get_stylesheet_directory_uri() . '/js/jquery.cycle.js', '', get_theme_version(), 1);
	wp_register_script('dayd_js_jquery_nivoslider', get_stylesheet_directory_uri() . '/js/jquery.nivo.slider.pack.js', '', get_theme_version(), 1);
	
	if ( is_active_widget( false, false, 'daydream_widget_cform' ) ) {
		wp_localize_script('dayd_js_init', 'dayd_ajax', array('url' => admin_url('admin-ajax.php') ) );
	}
	
}

if ( ! is_admin() ) {
	add_action( 'init', 'theme_register_javascript' );
}

function theme_print_javascript() {
	
	wp_print_scripts('jquery');
	wp_print_scripts('dayd_js_plugins');
	wp_print_scripts('dayd_js_init');
	
	if ( is_page_template('showcase.php') ) {
		 wp_print_scripts('dayd_js_showcase');
	}
	
	global $dayd_enqueue_jcycle;
 
	if ( $dayd_enqueue_jcycle ) {
 		wp_print_scripts('dayd_js_jquery_cycle');
 	}
 	
 	if ( get_theme_option('slider') == 'nivoslider' ) {
 		wp_print_scripts('dayd_js_jquery_nivoslider');
 	}
 	
}

add_action( 'wp_footer', 'theme_print_javascript' );

/****************************/
/*   Google Analytics code  */
function user_analytics_code() {
	echo get_theme_option('analytics_code');
}

if ( get_theme_option('analytics_code') ) {
	add_action( 'wp_footer', 'user_analytics_code' );
}

/***************************/
/*   jQuery load location  */
function get_jquery_dir() {
	$dir = ( get_theme_option('jquery_local') ? get_stylesheet_directory_uri() . '/js/jquery.js' : 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' );
	return $dir;
}

/***************************/
/*   Categories exclusion  */
function dayd_exclude_category( $query ) {
	if ( $query->is_home || $query->is_search || $query->is_date ) {
		$query->set( 'cat', haku_format_exclude_categories('exclude_category') );
		return $query;
	}
}

function dayd_exclude_getarchives( $where ) {
	$category = haku_format_exclude_categories('exclude_category', '');
	$query = haku_filter_get_archives( $where, $category );
	return $query;
}

if ( get_theme_option('exclude_category', false) ) {
	add_filter( 'pre_get_posts', 'dayd_exclude_category' );
	add_filter( 'getarchives_where', 'dayd_exclude_getarchives', 10, 2 );
}

/*****************************/
/*   Theme custom functions  */
function is_theme_post_type() { 
	if ( strpos( get_post_type(), 'showcase_' ) !== false ) {
		return true;
	}
}

function get_page_id_by_theme_post_type() {
	$id = get_post_type();
	$id = str_replace('showcase_', '', $id);
	return $id;
}

function get_page_title_by_theme_post_type() {
	$title = get_page_id_by_theme_post_type();
	$title = get_the_title( $title );
	return $title;
}

function get_theme_post_type_posts( $post_id ) {
	$number = 'showcase_' . $post_id;
	$number = new WP_Query("post_type=$number&status=publish");
	wp_reset_query();
	$number = $number->found_posts;
	return $number;
}

function get_theme_showcase_pages( $showcases = array() ) {
	$pages = get_pages('meta_key=_wp_page_template&meta_value=showcase.php');
	foreach ( $pages as $page ) {
		$layout = meta_obtain('layout', '_dayd_showcase_settings', $page->ID);
		if ( $layout != 's' ) {
			$showcases[] = 'showcase_' . $page->ID;
		}
	}
	return $showcases;
}

/***************************************/
/*   Showcase current menu item class  */
function add_theme_post_type_current_class( $classes, $item ) {
	if ( is_theme_post_type() ) {
		if ( get_page_id_by_theme_post_type() == $item->object_id ) {
			$classes[] = 'current-menu-item current_page_item';
		}
		else {
			$classes = str_replace( 'current_page_parent', '', $classes );
		}
	}
	return $classes;
}

add_filter( 'nav_menu_css_class', 'add_theme_post_type_current_class', 10, 2 );

/******************/
/*   Header logo  */
function dayd_logo() {
	$image_logo_url = ( get_theme_option('logo_image') ?  get_theme_option('logo_image') : get_stylesheet_directory_uri() . '/colours/' . get_theme_option('theme') . '/logo.png' );
	$image_logo = '<img src="' . $image_logo_url . '" alt="' . esc_attr( get_bloginfo('name') ) . '" />';
	echo ( get_theme_option('use_plain_logo') ? get_theme_option('plain_logo_text') : $image_logo );
}

/**********************/
/*   Favourites Icon  */
function dayd_favicon() {
	$favicon = ( get_theme_option('favicon') ?  get_theme_option('favicon') : get_stylesheet_directory_uri() . '/images/etc/favicon.ico' );
	echo $favicon;
}

/*********************************/
/*   Footer columns flexibility  */
function dayd_footer_aside_class( $aside_number = 0 ) {

	$aside_class = 'one_fourth';

	if ( is_active_sidebar('dayd_footer_1') ) {
		$aside_number++;
	}

	if ( is_active_sidebar('dayd_footer_2') ) {
		$aside_number++;
	}
	
	if ( is_active_sidebar('dayd_footer_3') ) {
		$aside_number++;
	}
	
	if ( is_active_sidebar('dayd_footer_4') ) {
		$aside_number++;
	}
	
	if ( $aside_number <= 2 ) {
		$aside_class = 'half';
	}
	elseif ( $aside_number == 3 ) {
		$aside_class = 'one_third';
	}

	echo $aside_class;

}

/**************/
/*   Sidebar  */
function dayd_dynamic_sidebar( $post_id ) {
	$custom_sidebar = ( $post_id ? meta_obtain('sidebar', '_dayd_page_attributes', $post_id) : false );
	$sidebar = ( $custom_sidebar ? $custom_sidebar : 'dayd_sidebar' );
	dynamic_sidebar( $sidebar );
}

/*****************************/
/*   Header container class  */
function dayd_header_container_class() {
	$class = array('container');
	$class[] = get_theme_option('header_layout');
	$class = haku_nice_classes( $class, true );
	echo $class;
}

/********************/
/*   Sidebar class  */
function dayd_sidebar_class( $custom_align = false ) {
	$class = ( $custom_align ? ( get_theme_option('default_sidebar_align') == 'right' ? 'left' : 'right' ) : get_theme_option('default_sidebar_align') );
	echo $class;
}

/***************************/
/*   Content column class  */
function dayd_content_class( $post_id ) {
	$class = ( meta_obtain('no_sidebar', '_dayd_page_attributes', $post_id) ? 'no_sidebar_content' : 'content_col' );
	echo $class;
}

/***********************/
/*   Daydream submenu  */
function dayd_submenu( $post_id, $post_parent, $has_children = false ) {
	
	$has_children = ( wp_list_pages("&child_of=$post_id&echo=0") ? true : false );
		
	if ( is_page() && $post_parent ) {
	    $list = wp_list_pages("title_li=&include=$post_parent&echo=0&sort_column=post_date");
	    $list .= wp_list_pages("title_li=&child_of=$post_parent&echo=0&sort_column=post_date");
	}
	elseif ( $has_children ) {
	    $list = wp_list_pages("title_li=&include=$post_id&echo=0&sort_column=post_date");
	    $list .= wp_list_pages("title_li=&child_of=$post_id&echo=0&sort_column=post_date");
	}
	
	if ( isset( $list ) ) :
	?>
		
	<!-- Sub menu -->
	<ul id="dayd_submenu">
		<?php echo $list; ?>
	</ul>
	<!-- end: Sub menu -->
	
	<?php
	endif;
	
}

/*************************************/
/*   Enables shortcodes in excerpts  */
add_filter('the_excerpt', 'do_shortcode');

/******************************/
/*   Adds the "ms_win" class  */
function ms_win_body_class( $classes ) {
	if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Win' ) ) {
		$classes[] = 'ms_win';
	}
	return $classes;
}

add_filter('body_class','ms_win_body_class');

/********************************/
/*   Read more link adjustment  */
function remove_more_jump_link( $link ) { 
	$offset = strpos( $link, '#more-' );
	if ( $offset ) {
		$end = strpos($link, '"',$offset);
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}

add_filter('the_content_more_link', 'remove_more_jump_link');

/*********************************/
/*   Protected post custom form  */
function dayd_password_form() {
	$password_form = '<form class="dayd_password_form" action="' . get_option('siteurl') . '/wp-pass.php" method="post">';
	$password_form .= '<p>'.__('This post is password protected. To view it enter your password below.', 'haku').'</p>';
	$password_form .= '<input name="post_password" type="password" />';
	$password_form .= '</form>';
	return $password_form;
}

add_filter('the_password_form', 'dayd_password_form');

/**********************/
/*   Custom Gravatar  */
function dayd_gravatar( $avatar_defaults ) {
    $gravatar = ( get_theme_option('wp_gravatar') ? get_theme_option('wp_gravatar') : get_stylesheet_directory_uri() . '/images/etc/gravatar.png' );
    $avatar_defaults[ $gravatar ] = get_bloginfo('name');
    return $avatar_defaults;
}

add_filter('avatar_defaults', 'dayd_gravatar');

/************************/
/*   Custom Login Logo  */
function dayd_login_logo() {
	$login_logo = ( get_theme_option('wp_login_logo') ? get_theme_option('wp_login_logo') : get_includes_dir('uri') . '/images/wp_login_logo.png' );
    echo '<style type="text/css"> h1 a { background: url(' . $login_logo . ') center no-repeat !important; } </style>';
}

add_action('login_head', 'dayd_login_logo');

/********************/
/*   Post comments  */
if ( ! function_exists('daydream_comments') ) {

	function daydream_comments( $comment, $args, $depth ) {
	
		$GLOBALS['comment'] = $comment;
		
		$avatar_size = ( $comment->comment_parent != '0' ? 31 : 48 );
		$dayd_awaiting = ( $comment->comment_approved == '0' ? 'dayd_awaiting' : false );
		?>
		
		<!-- Comment -->
		<li <?php comment_class( $dayd_awaiting ); ?> id="comment-<?php comment_ID(); ?>">
			
			<!-- Comment reply path -->
			<span class="dayd_comment_path"></span>
			
			<!-- Comment container -->
			<div class="clearfix">
			
				<!-- Comment meta -->
				<div class="comment-author vcard">
					
					<!-- Author picture -->
					<?php echo get_avatar( $comment, $avatar_size ); ?>
					
					<!-- Author name, comment date -->
					<span>
						<?php echo get_comment_author_link(); ?>
						<time datetime="<?php echo get_comment_date(DATE_W3C); ?>"><?php echo get_comment_date('F j, Y'); ?> - <?php echo get_comment_time('g:i'); ?></time>
					</span>
													
				</div>
				<!-- end: Comment meta -->
				
				<!-- Comment bubble -->
				<div class="comment-content">
					
					<span class="dayd_comment_arrow"></span>
					
					<?php if ( $dayd_awaiting ) : ?>
						
						<div>
							<em><?php _e( 'Your comment is awaiting moderation.', 'haku' ); ?></em>
						</div>
						
					<?php else: ?>
						
						<div>
							<?php echo esc_html( strip_tags( get_comment_text() ) ); ?>
							<?php edit_comment_link( __('(Edit)', 'haku') ); ?>
						</div>
						
						<?php if ( get_option('comment_registration') && is_user_logged_in() || ! get_option('comment_registration') ) : ?>
						
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __('Reply', 'haku' ), 'depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>
						
						<?php endif; ?>
						
					<?php endif; ?>
																
				</div>
				<!-- end: Comment bubble -->
			
			</div>
			<!-- end: Comment container -->
			
		<?php if ( $depth > 1 ) : ?>
		</li>
		<?php endif; ?>
		
		<!-- end: Comment -->
			
		<?php
	
	}

}

/*****************/
/*   Post pings  */
if ( ! function_exists('daydream_pings') ) {

	function daydream_pings( $comment, $args, $depth ) {
	
		$GLOBALS['comment'] = $comment;
		
		?>
		
		<!-- Pingback -->
		<li class="post pingback"><?php _e('Pingback:', 'haku'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'haku' ), '<span class="edit-link">', '</span>' ); ?>
		<!-- end: Pingback -->
			
		<?php
	
	}

}


function bdw_get_images() {
 
    // Get the post ID
    // $iPostID = $post->ID;
    $iPostID = get_the_ID();
 
    // Get images for this post
    $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );
 
    // If images exist for this page
    if($arrImages) {
 
        // Get array keys representing attached image numbers
        $arrKeys = array_keys($arrImages);
 
        /******BEGIN BUBBLE SORT BY MENU ORDER************/
        // Put all image objects into new array with standard numeric keys (new array only needed while we sort the keys)
        foreach($arrImages as $oImage) {
            $arrNewImages[] = $oImage;
        }
 
        // Bubble sort image object array by menu_order TODO: Turn this into std "sort-by" function in functions.php
        for($i = 0; $i < sizeof($arrNewImages) - 1; $i++) {
            for($j = 0; $j < sizeof($arrNewImages) - 1; $j++) {
                if((int)$arrNewImages[$j]->menu_order > (int)$arrNewImages[$j + 1]->menu_order) {
                    $oTemp = $arrNewImages[$j];
                    $arrNewImages[$j] = $arrNewImages[$j + 1];
                    $arrNewImages[$j + 1] = $oTemp;
                }
            }
        }
 
        // Reset arrKeys array
        $arrKeys = array();
 
        // Replace arrKeys with newly sorted object ids
        foreach($arrNewImages as $oNewImage) {
            $arrKeys[] = $oNewImage->ID;
        }
        /******END BUBBLE SORT BY MENU ORDER**************/
 
        // Get the first image attachment
        $iNum = $arrKeys[0];
 
        // Get the thumbnail url for the attachment
        $sThumbUrl = wp_get_attachment_thumb_url($iNum);
 
        // UNCOMMENT THIS IF YOU WANT THE FULL SIZE IMAGE INSTEAD OF THE THUMBNAIL
        $sImageUrl = wp_get_attachment_url($iNum);
 
        // Build the <img> string
        $sImgString = '<a href="' . get_permalink() . '">' .
                            '<img src="' . $sImageUrl . '" height="267" width="710" alt="Thumbnail Image" title="Thumbnail Image" />' .
                      '</a>';
 
        // Print the image
        echo $sImgString;
    }
}

function get_custom_field($key, $echo = FALSE) {
	global $post;
	$custom_field = get_post_meta($post->ID, $key, true);
	if ($echo == FALSE) return $custom_field;
	echo $custom_field;
}


?>