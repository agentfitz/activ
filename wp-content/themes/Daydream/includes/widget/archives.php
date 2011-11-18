<?php
/*
 *	Plugin Name: Daydream Archives
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_archives');

/*
 *	Widget registering
 */
function daydream_widget_archives() {
	register_widget('daydream_archives');
}

/*
 *	Widget class
 */
class daydream_archives extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_archives() {
	
		$widget_ops = array('classname' => 'wb_dayd_list_widget', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_archives', '(Daydream) '.__('Archives', 'haku'), $widget_ops, $control_ops );
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['limit'] = ( intval( $new_instance['limit'] )  ? $new_instance['limit'] : $instance['limit'] );

		$instance['post_count'] = $new_instance['post_count'];
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form($instance) {

		/*
			Default settings
		*/
		$defaults = array('title' => __('Archives', 'haku'), 'post_count' => 'on', 'limit' => 10);
		
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" style="width: 217px" />
		</p>
				
		<!-- Widget Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('post_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>" <?php checked( $instance['post_count'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('post_count'); ?>"><?php _e('Show post count', 'haku'); ?></label>
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" value="<?php echo $instance['limit']; ?>" class="widefat" style="width: 217px" />
		</p>

	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget($args, $instance) {
	
		extract($args);
		
		$title = $instance['title'];
		$post_count = $instance['post_count'];
		$post_count = ( $post_count ? 1 : 0 );
		$limit = $instance['limit'];
		
		$dayd_list = wp_get_archives("echo=0&show_post_count=$post_count&limit=$limit");
		$dayd_list = str_replace( '</a>&nbsp;(', '<span>', $dayd_list );
		$dayd_list = str_replace( ')', '</span></a>', $dayd_list );
		
		/*
			Before widget
		*/
		echo $before_widget;
		
		if ($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		<!-- Archives widget -->
		
		<ul>
			<?php echo $dayd_list; ?>
		</ul>

		<!-- end: Archives widget -->
		
		<?php
		/*
			After widget
		*/
		echo $after_widget;
		
	}
	
}

?>