<?php
/*
 *  Haku Framework
 *  Handcrafted by Stefano Giliberti
 *  winterbits@gmail.com
 *  winterbits.com
 */

/***************************/
/*   Save options action   */
function haku_save_options_action() {
	
	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/
	$form_contents = $_POST;

	unset( $form_contents['action'], $form_contents['haku_referer'] );
	
	$current_options = get_option( get_haku_var('theme') );
	
	if ( is_array( $current_options ) ) {
		
		if ( array_equal( $current_options, $form_contents ) ) {
			$response = ':)';
		}
		else {
			$response = ( update_option( get_haku_var('theme'), $form_contents ) ? ':)' : haku_error( 1 ) );
		}
	
	}
	else {
		
		$response = ( update_option( get_haku_var('theme'), $form_contents ) ? ':)' : haku_error( 2 ) );
		
	}
		
	/*
		Response
	*/
	die( $response );

}

add_action( 'wp_ajax_haku_save_options', 'haku_save_options_action' );

/****************************/
/*   Reset options action   */
function haku_options_reset_action() {
	
	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/
	$current_options = get_option( get_haku_var('theme') );

	if ( is_array( $current_options ) ) {
		$response = ( delete_option( get_haku_var('theme') ) ? ':)' : haku_error( 3 ) );
	}
	else {
		$response = ':)';
	}
	
	/*
		Response
	*/
	die( $response );

}

add_action( 'wp_ajax_haku_options_reset', 'haku_options_reset_action' );

/***************************/
/*   Slides fetch action   */
function haku_load_slides_action() {
	
	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/
	$is_jcycle = ( get_theme_option('slider') == 'jcycle' ? true : false );
	
	if ( get_theme_slides('theme_slides') ) : ?>

	<!-- Haku sortable -->
	<ul class="haku_sortable">
	
		<?php foreach ( get_theme_slides('theme_slides') as $slide_id => $slide ) : ?>
	
		<li id="haku_el_<?php echo $slide_id; ?>">
			
			<!-- Form -->
			<form action="/" class="wb_haku_element_update">
				
				<!-- Slide order/id keeper -->
				<input type="text" name="order" class="hidden" value="<?php echo $slide['order']; ?>" />
				
				<!-- Element -->
				<div class="wb_haku_element" data-id="<?php echo $slide_id; ?>">
				
					<!-- Option group -->
					<div class="wb_haku_optgroup clearfix">
						
						<!-- Option info -->
						<div class="aside">
						
							<!-- Label -->
							<label><?php _e('Picture', 'haku'); ?></label>
							
						</div>
						<!-- end: Option info -->
						
						<!-- Option -->
						<div>
							
							<!-- Button -->						
							<button class="wb_haku_image_upload"><?php _e('Open Media Library', 'haku'); ?></button>
							
							<!-- Option desc -->
							<p><?php _e('Choose your image, then click "Insert into post" to apply it.', 'haku'); ?></p>
							
							<input type="text" placeholder="http://" class="wb_haku_image_upload_field trigger_change <?php if ( ! $is_jcycle ) haku_hidden( $slide['picture'], false ); ?>" name="picture" value="<?php echo esc_url( stripslashes( $slide['picture'] ) ); ?>" />
							
							<?php if ( $is_jcycle ) : ?>
							
							<!-- Option desc -->
							<p><?php _e('You can also enter a Youtube, Vimeo or HTML5 video link.', 'haku'); ?></p>
							
							<?php endif; ?>

						</div>
						<!-- end: Option -->
											
					</div>
					<!-- end: Option group -->
					
					<!-- Option group -->
					<div class="wb_haku_optgroup clearfix">
						
						<!-- Option info -->
						<div class="aside">
						
							<!-- Label -->
							<label><?php _e('Content', 'haku'); ?></label>
							
						</div>
						<!-- end: Option info -->
						
						<!-- Option -->
						<div>
							
							<!-- Content -->
							<textarea name="content"><?php echo esc_textarea( stripslashes( $slide['content'] ) ); ?></textarea>
							
							<!-- Option desc -->
							<p><?php _e('Paragraphs are added automatically.', 'haku'); ?> <?php _e('You can use Shortcodes.', 'haku'); ?> (<a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#shortcodesList" target="_blank">?</a>)</p>
							
						</div>
						<!-- end: Option -->
											
					</div>
					<!-- end: Option group -->
					
					<?php if ( $is_jcycle && ! $slide['picture'] && ! $slide['content'] || $is_jcycle && $slide['picture'] && $slide['content'] ) : ?>
									
					<!-- Option group -->
					<div class="wb_haku_optgroup clearfix">
						
						<!-- Option info -->
						<div class="aside">
						
							<!-- Label -->
							<label><?php _e('Content Layout', 'haku'); ?></label>
							
						</div>
						<!-- end: Option info -->
						
						<!-- Option -->
						<div>
							
							<!-- Haku radio list -->
							<div class="wb_haku_radiopic_list"></div>
							
							<select name="layout" class="wb_haku_radiopic_select hidden trigger_change">
								<option <?php if ( isset( $slide['layout'] ) ) selected( $slide['layout'], 'normal' ); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/layout_04.png" value="normal"></option>
								<option <?php if ( isset( $slide['layout'] ) ) selected( $slide['layout'], 'inverted' ); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/layout_03.png" value="inverted"></option>
							</select>
						
						</div>
						<!-- end: Option -->
											
					</div>
					<!-- end: Option group -->
					
					<?php endif; ?>
					
					<?php if ( $slide['picture'] ) : ?>
					
					<!-- Option group -->
					<div class="wb_haku_optgroup clearfix">
						
						<!-- Option info -->
						<div class="aside">
						
							<!-- Label -->
							<label><?php _e('Url', 'haku'); ?></label>
							
						</div>
						<!-- end: Option info -->
						
						<!-- Option -->
						<div>
							
							<!-- Text input -->
							<input type="text" placeholder="http://" name="url" value="<?php if ( isset( $slide['url'] ) ) echo esc_url( stripslashes( $slide['url'] ) ); ?>" />
						
						</div>
						<!-- end: Option -->
											
					</div>
					<!-- end: Option group -->
					
					<?php endif; ?>
					
					<?php if ( isset( $slide['url'] ) && !empty( $slide['url'] ) ) : ?>
					
					<!-- Option group -->
					<div class="wb_haku_optgroup clearfix">
						
						<!-- Option info -->
						<div class="aside">
						
							<!-- Label -->
							<label><?php _e('Use Lightbox', 'haku'); ?></label>
							
						</div>
						<!-- end: Option info -->
						
						<!-- Option -->
						<div>
							
							<!-- Checkbox -->
							<a href="#" class="wb_haku_checkbox trigger_change"></a>
							<input <?php if ( isset( $slide['lightbox'] ) ) checked( $slide['lightbox'], 'lightbox' ); ?> name="lightbox" type="checkbox" value="lightbox" />
						
						</div>
						<!-- end: Option -->
											
					</div>
					<!-- end: Option group -->
					
					<?php endif; ?>
					
					<!-- Grabbing spot -->
					<div class="wb_haku_grab"></div>
					
					<!-- Delete button -->
					<a href="#" class="wb_haku_drop"></a>
					
				</div>
				<!-- end: Element -->
			
			</form>
			<!-- end: Form -->

		</li>
	
		<?php endforeach; ?>
	
	</ul>
	<!-- end: Haku sortable -->

	<?php

	endif;
	
	/*
		Response
	*/
	die();
	
}

add_action( 'wp_ajax_haku_load_slides', 'haku_load_slides_action' );

/*************************/
/*   Add slides action   */
function haku_add_slide_action() {

	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/
	$current_slides = get_option( get_haku_var('theme_slides') );
	
	$current_id = 0;
	
	if ( $current_slides ) {
		$latest_id = array_keys( $current_slides );
		$latest_id = end( $latest_id );
		$current_id = $latest_id;
		$current_id++;
	}
	
	$default_data = array(
		'order' => $current_id,
		'picture' => null,
		'content' => null,
		'layout' => 'normal',
		'lightbox' => false,
		'url' => null
	);
		
	$to_update = array();
	
	if ( $current_slides ) {
		$current_values = $current_slides;
		$current_values[] = $default_data;
		$to_update = $current_values;
	}
	else {
		$final_values = $default_data;
		$to_update[] = $final_values;
	}

	if ( update_option( get_haku_var('theme_slides') , $to_update ) ) {

		$response = ':)';
		
	}
	else {
	
		$response = haku_error( 4 );
		
	}
	
	/*
		Response
	*/
	die( $response );
	
}

add_action( 'wp_ajax_haku_add_slide', 'haku_add_slide_action' );

/****************************/
/*   Delete slides action   */
function haku_delete_slide_action() {
	
	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/
	$form_contents = $_POST;
	
	unset( $form_contents['action'], $form_contents['haku_referer'] );
	
	$slide_id = $form_contents['id'];
	
	$current_slides = get_option( get_haku_var('theme_slides') );
	
	unset( $current_slides[ $slide_id ] );
	
	if ( update_option(  get_haku_var('theme_slides') , $current_slides ) ) {
	
		$response = ':)';
		
	}
	else {
	
		$response = haku_error( 5 );
		
	}
	
	/*
		Response
	*/
	die( $response );
	
}

add_action( 'wp_ajax_haku_delete_slide', 'haku_delete_slide_action' );

/****************************/
/*   Update slides action   */
function haku_update_slide_action() {
	
	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/
	$form_contents = $_POST;
		
	$slide_id = $form_contents['id'];
	
	unset( $form_contents['action'], $form_contents['haku_referer'], $form_contents['id'] );
		
	$current_slides = get_option( get_haku_var('theme_slides') );
	
	$current_slides[ $slide_id ] = $form_contents;
		
	if ( update_option( get_haku_var('theme_slides') , $current_slides) ) {
		
		$response = ':)';
		
	}
	else {
		
		$response = haku_error( 6 );
		
	}
	
	/*
		Response
	*/
	die( $response );

}

add_action( 'wp_ajax_haku_update_slide', 'haku_update_slide_action' );

/**************************/
/*   Sort slides action   */
function haku_order_slides_action() {
	
	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/
	$sort_data = $_POST['order'];
	
	parse_str( $sort_data );
			
	$current_slides = get_option( get_haku_var('theme_slides') );
	
	foreach ( $haku_el as $order => $id ) {
		$current_slides[ $id ]['slide_ord'] = $order;
	}
	
	array_reorder( $current_slides, 'slide_ord' );
		
	if ( update_option( get_haku_var('theme_slides') , $current_slides ) ) {
	
		$response = ':)';
		
	}
	else {
	
		$response = haku_error( 7 );
	
	}
	
	/*
		Response
	*/
	die( $response );
	
}

add_action( 'wp_ajax_haku_order_slides', 'haku_order_slides_action' );

/*****************************/
/*   Sidebars fetch action   */
function haku_load_sidebars_action() {
	
	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/	
	if ( get_theme_slides('theme_sidebars') ) : ?>

	<?php foreach ( get_theme_slides('theme_sidebars') as $sidebar_id => $sidebar ) : ?>
	
	<!-- Form -->
	<form action="/" class="wb_haku_element_update">
		
		<!-- Sidebar id keeper -->
		<input type="text" name="slug" class="hidden" value="<?php echo $sidebar['slug']; ?>" />
		
		<!-- Element -->
		<div class="wb_haku_element" data-id="<?php echo $sidebar_id; ?>">
			
			<!-- Sidebar header -->
			<div class="header">
				
				<!-- Title -->
				<input type="text" name="name" value="<?php echo esc_attr( stripslashes( $sidebar['name'] ) ); ?>" />
				
				<!-- Id -->
				<span data-tip="<?php printf( __('Usage: %s', 'haku'), '[sidebar id=' . $sidebar['slug'] . ']' ); ?>"><?php echo $sidebar['slug']; ?></span>
				
			</div>
			<!-- end: Sidebar header -->
			
			<!-- Sidebar description -->
			<input type="text" name="desc" value="<?php echo esc_attr( stripslashes( $sidebar['desc'] ) ); ?>" maxlength="85" />
			
			<!-- Delete button -->
			<a href="#" class="wb_haku_drop"></a>
			
		</div>
		<!-- end: Element -->
	
	</form>
	<!-- end: Form -->
	
	<?php endforeach; ?>

	<?php

	endif;
	
	/*
		Response
	*/
	die();
	
}

add_action( 'wp_ajax_haku_load_sidebars', 'haku_load_sidebars_action' );

/**************************/
/*   Add sidebar action   */
function haku_add_sidebar_action() {

	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	$current_sidebars = get_option( get_haku_var('theme_sidebars') );

	$current_id = 0;
	
	if ( $current_sidebars ) {
		$latest_id = array_keys( $current_sidebars );
		$latest_id = end( $latest_id );
		$current_id = $latest_id;
		$current_id++;
	}
	
	$default_data = array(
		'slug' => 'haku_sidebar_' . $current_id,
		'name' => sprintf( esc_attr( __('%s&rsquo;s Sidebar', 'haku') ), haku_get_user() ) . ' ' . $current_id,
		'desc' => sprintf( esc_attr( __('Sidebar generated by %s for "%s" using %s!', 'haku') ), haku_get_user(), get_bloginfo('name'), get_theme_name() )
	);
		
	$to_update = array();
	
	if ( $current_sidebars ) {
		$current_values = $current_sidebars;
		$current_values[] = $default_data;
		$to_update = $current_values;
	}
	else {
		$final_values = $default_data;
		$to_update[] = $final_values;
	}

	if ( update_option( get_haku_var('theme_sidebars') , $to_update ) ) {

		$response = ':)';
		
	}
	else {
	
		$response = haku_error( 8 );
		
	}
	
	/*
		Response
	*/
	die( $response );
	
}

add_action( 'wp_ajax_haku_add_sidebar', 'haku_add_sidebar_action' );

/*****************************/
/*   Delete sidebar action   */
function haku_delete_sidebar_action() {
	
	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/
	$form_contents = $_POST;
	
	unset( $form_contents['action'], $form_contents['haku_referer'] );
	
	$sidebar_id = $form_contents['id'];
	
	$current_sidebars = get_option( get_haku_var('theme_sidebars') );
	
	unset( $current_sidebars[ $sidebar_id ] );
	
	if ( update_option(  get_haku_var('theme_sidebars') , $current_sidebars ) ) {
	
		$response = ':)';
		
	}
	else {
	
		$response = haku_error( 9 );
		
	}
	
	/*
		Response
	*/
	die( $response );
	
}

add_action('wp_ajax_haku_delete_sidebar', 'haku_delete_sidebar_action');

/*****************************/
/*   Update sidebar action   */
function haku_update_sidebar_action() {
	
	/*
		Security check
	*/
	check_ajax_referer('haku_nonce', 'haku_referer');
	
	/*
		Processing
	*/
	$form_contents = $_POST;
		
	$sidebar_id = $form_contents['id'];
	
	unset( $form_contents['action'], $form_contents['haku_referer'], $form_contents['id'] );
		
	$current_sidebars = get_option( get_haku_var('theme_sidebars') );
	
	$current_sidebars[ $sidebar_id ] = $form_contents;
		
	if ( update_option( get_haku_var('theme_sidebars') , $current_sidebars ) ) {
		
		$response = ':)';
		
	}
	else {
		
		$response = haku_error( 10 );
		
	}
	
	/*
		Response
	*/
	die( $response );

}

add_action( 'wp_ajax_haku_update_sidebar', 'haku_update_sidebar_action' );

?>