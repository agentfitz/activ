<?php
/*
 *	Plugin Name: Daydream Google Maps
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_maps');

/*
 *	Widget registering
 */
function daydream_widget_maps() {
	register_widget('daydream_maps');
}

/*
 *	Widget class
 */
class daydream_maps extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_maps() {
	
		$widget_ops = array('classname' => 'wb_dayd_maps_widget', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_maps', '(Daydream) Google Maps', $widget_ops, $control_ops);
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['center'] = strip_tags( $new_instance['center'] );
		$instance['size'] = strip_tags( $new_instance['size'] );
		
		$instance['zoom'] = ( intval( $new_instance['zoom'] ) ? $new_instance['zoom'] : $instance['zoom'] );
		$instance['height'] = ( intval( $new_instance['height'] ) ? $new_instance['height'] : $instance['height'] );
		
		$instance['maptype'] = $new_instance['maptype'];
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form($instance) {

		/*
			Default settings
		*/
		$defaults = array('title' => __('Google Maps', 'haku'), 'center' => 'New York, NY', 'zoom' => 12, 'size' => '222x250', 'maptype' => 'roadmap');
		
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('center'); ?>"><?php _e('Location:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('center'); ?>" name="<?php echo $this->get_field_name('center'); ?>" value="<?php if ( isset( $instance['center'] ) ) echo $instance['center']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('zoom'); ?>"><?php _e('Zoom:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('zoom'); ?>" name="<?php echo $this->get_field_name('zoom'); ?>" value="<?php if ( isset( $instance['zoom'] ) ) echo $instance['zoom']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Size:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" value="<?php if ( isset( $instance['size'] ) ) echo $instance['size']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id('maptype'); ?>"><?php _e('Map type:', 'haku'); ?></label><br />
			<select id="<?php echo $this->get_field_id('maptype'); ?>" name="<?php echo $this->get_field_name('maptype'); ?>" class="widefat" style="width: 217px">
				<option <?php selected( $instance['maptype'], 'roadmap' ); ?> value="roadmap"><?php _e('Roadmap', 'haku'); ?></option>
				<option <?php selected( $instance['maptype'], 'satellite' ); ?> value="satellite"><?php _e('Satellite', 'haku'); ?></option>
				<option <?php selected( $instance['maptype'], 'terrain' ); ?> value="terrain"><?php _e('Terrain', 'haku'); ?></option>
				<option <?php selected( $instance['maptype'], 'hybrid' ); ?> value="hybrid"><?php _e('Hybrid', 'haku'); ?></option>
			</select>
		</p>
		
	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget($args, $instance) {
	
		extract($args);
		
		$title = $instance['title'];
		$center = urlencode( $instance['center'] );
		$zoom = urlencode( $instance['zoom'] );
		$size = urlencode( $instance['size'] );
		$maptype = urlencode( $instance['maptype'] );
		
		$map = '<img src="http://maps.googleapis.com/maps/api/staticmap?center=' . $center . '&zoom=' . $zoom . '&size='. $size .'&maptype='. $maptype . '&sensor=false" alt="" />';
		
		/*
			Before widget
		*/
		echo $before_widget;
		
		if ($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		<!-- Map -->
		
		<?php echo $map; ?>
		
		<!-- end: Map -->
		
		<?php
		/*
			After widget
		*/
		echo $after_widget;
		
	}
	
}

?>