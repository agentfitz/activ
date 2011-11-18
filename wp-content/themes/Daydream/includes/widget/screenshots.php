<?php
/*
 *	Plugin Name: Daydream Screenshots
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_screenshots');

/*
 *	Widget registering
 */
function daydream_widget_screenshots() {
	register_widget('daydream_screenshots');
}

/*
 *	Widget class
 */
class daydream_screenshots extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_screenshots() {
	
		$widget_ops = array('classname' => 'wb_dayd_screenshots', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_screenshots', '(Daydream) ' . __('Screenshots', 'haku'), $widget_ops, $control_ops);
		
	}
	
	/*
	 *	Widget update
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['el_1_pic'] = esc_url( $new_instance['el_1_pic'] );
		$instance['el_1_title'] = $new_instance['el_1_title'];
		$instance['el_1_desc'] = $new_instance['el_1_desc'];
		$instance['el_1_link'] = esc_url( $new_instance['el_1_link'] );
		$instance['el_1_lightbox'] = $new_instance['el_1_lightbox'];
		
		$instance['el_2_pic'] = esc_url( $new_instance['el_2_pic'] );
		$instance['el_2_title'] = $new_instance['el_2_title'];
		$instance['el_2_desc'] = $new_instance['el_2_desc'];
		$instance['el_2_link'] = esc_url( $new_instance['el_2_link'] );
		$instance['el_2_lightbox'] = $new_instance['el_2_lightbox'];
		
		$instance['el_3_pic'] = esc_url( $new_instance['el_3_pic'] );
		$instance['el_3_title'] = $new_instance['el_3_title'];
		$instance['el_3_desc'] = $new_instance['el_3_desc'];
		$instance['el_3_link'] = esc_url( $new_instance['el_3_link'] );
		$instance['el_3_lightbox'] = $new_instance['el_3_lightbox'];
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form( $instance ) {

		/*
			Default settings
		*/
		$defaults = array(
			'el_1_pic' => '',
			'el_1_title' => '',
			'el_1_desc' => '',
			'el_1_link' => '',
			'el_1_lightbox' => '',
			
			'el_2_pic' => '',
			'el_2_title' => '',
			'el_2_desc' => '',
			'el_2_link' => '',
			'el_2_lightbox' => '',
			
			'el_3_pic' => '',
			'el_3_title' => '',
			'el_3_desc' => '',
			'el_3_link' => '',
			'el_3_lightbox' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<!-- Widget Title -->
		<h4 style="margin: 0 0 7px;"><?php _e('Left Item', 'haku'); ?></h4>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_1_pic'); ?>"><?php _e('Picture:', 'haku'); ?> <small class="description">(<?php _e('Recommended size:', 'haku') ?> 50x50)</small></label><br />
			<input id="<?php echo $this->get_field_id('el_1_pic'); ?>" placeholder="http://" name="<?php echo $this->get_field_name('el_1_pic'); ?>" value="<?php echo $instance['el_1_pic']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_1_title'); ?>"><?php _e('Title:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('el_1_title'); ?>" name="<?php echo $this->get_field_name('el_1_title'); ?>" value="<?php echo $instance['el_1_title']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_1_desc'); ?>"><?php _e('Description:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('el_1_desc'); ?>" name="<?php echo $this->get_field_name('el_1_desc'); ?>" value="<?php echo $instance['el_1_desc']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_1_link'); ?>"><?php _e('Link:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('el_1_link'); ?>" placeholder="http://" name="<?php echo $this->get_field_name('el_1_link'); ?>" value="<?php echo $instance['el_1_link']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<?php if ( $instance['el_1_link'] ) : ?>
		
		<!-- Widget Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('el_1_lightbox'); ?>" name="<?php echo $this->get_field_name('el_1_lightbox'); ?>" <?php checked( $instance['el_1_lightbox'], 'on' ); ?> /> 
			<label for="<?php echo $this->get_field_id('el_1_lightbox'); ?>"><?php _e('Use Lightbox', 'haku'); ?></label>
		</p>
		
		<?php endif; ?>
		
		<!-- Widget Separator -->
		<hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 18px 0 15px; padding: 0;" />
		
		<!-- Widget Title -->
		<h4 style="margin: 0 0 7px;"><?php _e('Central Item', 'haku'); ?></h4>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_2_pic'); ?>"><?php _e('Picture:', 'haku'); ?> <small class="description">(<?php _e('Recommended size:', 'haku') ?> 50x50)</small></label><br />
			<input id="<?php echo $this->get_field_id('el_2_pic'); ?>" placeholder="http://" name="<?php echo $this->get_field_name('el_2_pic'); ?>" value="<?php echo $instance['el_2_pic']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_2_title'); ?>"><?php _e('Title:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('el_2_title'); ?>" name="<?php echo $this->get_field_name('el_2_title'); ?>" value="<?php echo $instance['el_2_title']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_2_desc'); ?>"><?php _e('Description:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('el_2_desc'); ?>" name="<?php echo $this->get_field_name('el_2_desc'); ?>" value="<?php echo $instance['el_2_desc']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_2_link'); ?>"><?php _e('Link:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('el_2_link'); ?>" placeholder="http://" name="<?php echo $this->get_field_name('el_2_link'); ?>" value="<?php echo $instance['el_2_link']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<?php if ( $instance['el_2_link'] ) : ?>
		
		<!-- Widget Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('el_2_lightbox'); ?>" name="<?php echo $this->get_field_name('el_2_lightbox'); ?>" <?php checked( $instance['el_2_lightbox'], 'on' ); ?> /> 
			<label for="<?php echo $this->get_field_id('el_2_lightbox'); ?>"><?php _e('Use Lightbox', 'haku'); ?></label>
		</p>
		
		<?php endif; ?>
		
		<!-- Widget Separator -->
		<hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 18px 0 15px; padding: 0;" />
		
		<!-- Widget Title -->
		<h4 style="margin: 0 0 7px;"><?php _e('Right Item', 'haku'); ?></h4>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_3_pic'); ?>"><?php _e('Picture:', 'haku'); ?> <small class="description">(<?php _e('Recommended size:', 'haku') ?> 50x50)</small></label><br />
			<input id="<?php echo $this->get_field_id('el_3_pic'); ?>" placeholder="http://" name="<?php echo $this->get_field_name('el_3_pic'); ?>" value="<?php echo $instance['el_3_pic']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_3_title'); ?>"><?php _e('Title:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('el_3_title'); ?>" name="<?php echo $this->get_field_name('el_3_title'); ?>" value="<?php echo $instance['el_3_title']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_3_desc'); ?>"><?php _e('Description:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('el_3_desc'); ?>" name="<?php echo $this->get_field_name('el_3_desc'); ?>" value="<?php echo $instance['el_3_desc']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('el_3_link'); ?>"><?php _e('Link:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('el_3_link'); ?>" placeholder="http://" name="<?php echo $this->get_field_name('el_3_link'); ?>" value="<?php echo $instance['el_3_link']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<?php if ( $instance['el_3_link'] ) : ?>
		
		<!-- Widget Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('el_3_lightbox'); ?>" name="<?php echo $this->get_field_name('el_3_lightbox'); ?>" <?php checked( $instance['el_3_lightbox'], 'on' ); ?> /> 
			<label for="<?php echo $this->get_field_id('el_3_lightbox'); ?>"><?php _e('Use Lightbox', 'haku'); ?></label>
		</p>
		
		<?php endif; ?>
		
	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget( $args, $instance ) {
	
		extract( $args );
		
		$el_1 = array(
			'pic' => $instance['el_1_pic'],
			'title' => $instance['el_1_title'],
			'desc' => $instance['el_1_desc'],
			'link' => $instance['el_1_link'],
			'lightbox' => $instance['el_1_lightbox']
		);
		
		$el_2 = array(
			'pic' => $instance['el_2_pic'],
			'title' => $instance['el_2_title'],
			'desc' => $instance['el_2_desc'],
			'link' => $instance['el_2_link'],
			'lightbox' => $instance['el_2_lightbox']
		);
		
		$el_3 = array(
			'pic' => $instance['el_3_pic'],
			'title' => $instance['el_3_title'],
			'desc' => $instance['el_3_desc'],
			'link' => $instance['el_3_link'],
			'lightbox' => $instance['el_3_lightbox']
		);

		?>
		
		<?php if(strpos($el_1['title'], "Assessment")){ ?>
			<div id="shotCnt">
		<?php }?>
		
		<!-- Screenshots list -->
		<ul class="shots clearfix">
			
			<!-- Screenshot -->
			<li class="<?php if ( $el_1['lightbox'] && haku_get_url_type( $el_1['link'] ) ) echo ( haku_get_url_type( $el_1['link'] ) == 'image' ? 'dayd_bubble increase' : 'dayd_bubble play' ); ?>">
										
				<!-- Link -->
				<a href="<?php echo $el_1['link']; ?>" class="<?php echo ( $el_1['lightbox'] ? 'dayd_multi_lightbox' : '' ); ?>">
									
					<?php if ( $el_1['pic'] ) : ?>
					
					<!-- Icon -->
					<img src="<?php echo $el_1['pic']; ?>" alt="" />
					
					<?php endif; ?>
					
					<?php if ( $el_1['title'] ) : ?>
					
					<!-- Title -->
					<h3><?php echo $el_1['title']; ?></h3>
					
					<?php endif; ?>
					
					<?php if ( $el_1['desc'] ) : ?>
					
					<!-- Tagline -->
					<span><?php echo $el_1['desc']; ?></span>
					
					<?php endif; ?>
								
				</a>
				<!-- end: Link -->
				
			</li>
			<!-- end: Screenshot -->
			
			<!-- Screenshot -->
			<li class="<?php if ( $el_2['lightbox'] && haku_get_url_type( $el_2['link'] ) ) echo ( haku_get_url_type( $el_2['link'] ) == 'image' ? 'dayd_bubble increase' : 'dayd_bubble play' ); ?>">
										
				<!-- Link -->
				<a href="<?php echo $el_2['link']; ?>" class="<?php echo ( $el_2['lightbox'] ? 'dayd_multi_lightbox' : '' ); ?>">
									
					<?php if ( $el_2['pic'] ) : ?>
					
					<!-- Icon -->
					<img src="<?php echo $el_2['pic']; ?>" alt="" />
					
					<?php endif; ?>
					
					<?php if ( $el_2['title'] ) : ?>
					
					<!-- Title -->
					<h3><?php echo $el_2['title']; ?></h3>
					
					<?php endif; ?>
					
					<?php if ( $el_2['desc'] ) : ?>
					
					<!-- Tagline -->
					<span><?php echo $el_2['desc']; ?></span>
					
					<?php endif; ?>
								
				</a>
				<!-- end: Link -->
				
			</li>
			<!-- end: Screenshot -->
			
			<!-- Screenshot -->
			<li class="no-margin <?php if ( $el_3['lightbox'] && haku_get_url_type( $el_3['link'] ) ) echo ( haku_get_url_type( $el_3['link'] ) == 'image' ? 'dayd_bubble increase' : 'dayd_bubble play' ); ?>">
										
				<!-- Link -->
				<a href="<?php echo $el_3['link']; ?>" class="<?php echo ( $el_3['lightbox'] ? 'dayd_multi_lightbox' : '' ); ?>">
									
					<?php if ( $el_3['pic'] ) : ?>
					
					<!-- Icon -->
					<img src="<?php echo $el_3['pic']; ?>" alt="" />
					
					<?php endif; ?>
					
					<?php if ( $el_3['title'] ) : ?>
					
					<!-- Title -->
					<h3><?php echo $el_3['title']; ?></h3>
					
					<?php endif; ?>
					
					<?php if ( $el_3['desc'] ) : ?>
					
					<!-- Tagline -->
					<span><?php echo $el_3['desc']; ?></span>
					
					<?php endif; ?>
								
				</a>
				<!-- end: Link -->
				
			</li>
			<!-- end: Screenshot -->
		
		</ul>
		<!-- end: Screenshots list -->
		
		<?php if(strpos($el_1['title'], "Management")){ ?>
			</div><!-- end: shotCnt -->
		<?php }?>
		
		<?php
		
	}
	
}

?>