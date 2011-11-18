<?php
/*
 *	Plugin Name: Daydream Search
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_search');

/*
 *	Widget registering
 */
function daydream_widget_search() {
	register_widget('daydream_search');
}

/*
 *	Widget class
 */
class daydream_search extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_search() {
	
		$widget_ops = array('classname' => 'dayd_search', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_search', '(Daydream) '.__('Search', 'haku'), $widget_ops, $control_ops);
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
	
		$instance['placeholder'] = strip_tags( $new_instance['placeholder'] );
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form($instance) {

		/*
			Default settings
		*/
		$defaults = array('placeholder' => __('Search', 'haku'));
		
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('placeholder'); ?>"><?php _e('Label:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('placeholder'); ?>" name="<?php echo $this->get_field_name('placeholder'); ?>" value="<?php echo $instance['placeholder']; ?>" class="widefat" style="width: 217px" />
		</p>

	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget($args, $instance) {
	
		extract($args);
		
		$placeholder = $instance['placeholder'];
				
		/*
			Before widget
		*/
		echo $before_widget;
		?>
		
		<!-- Search widget -->

		<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>" class="dayd_search_input">
			<input name="s" type="text" placeholder="<?php echo esc_attr( $placeholder ); ?>" value="<?php the_search_query(); ?>" />
		</form>
			
		<!-- end: Search widget -->
		
		<?php
		/*
			After widget
		*/
		echo $after_widget;
		
	}
	
}

?>