<?php
/*
 *	Plugin Name: Daydream Text
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_text');

/*
 *	Widget registering
 */
function daydream_widget_text() {
	register_widget('daydream_text');
}

/*
 *	Widget class
 */
class daydream_text extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_text() {
	
		$widget_ops = array('classname' => 'wb_dayd_text_widget', 'description' => __('A shortcode enabled text widget.', 'haku') );
		
		$control_ops = array('width' => 500, 'height' => 350);

		$this->WP_Widget('daydream_widget_text', '(Daydream) ' . __('Text', 'haku'), $widget_ops, $control_ops);
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['text'] = ( current_user_can('unfiltered_html') ? $new_instance['text'] : stripslashes( wp_filter_post_kses( addslashes( $new_instance['text'] ) ) ) );

		$instance['autop'] = $new_instance['autop'];
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form($instance) {

		/*
			Default settings
		*/
		$defaults = array('text' => '', 'autop' => 'on');
		
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<!-- Widget Textarea Input -->
		<p>
			<textarea id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" style="width: 500px; height:  350px;"><?php echo $instance['text']; ?></textarea>
		</p>
		
		<!-- Widget Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('autop'); ?>" name="<?php echo $this->get_field_name('autop'); ?>" <?php checked( $instance['autop'], 'on' ); ?> />
			<label for="<?php echo $this->get_field_id('autop'); ?>"><?php printf( __('Automatically add Paragraphs %s and Line breaks %s', 'haku'), '<code>&lt;p></code>', '<code>&lt;br /></code>' ); ?></label>
		</p>
		
		<!-- Description -->
		<p class="description"><?php _e('You can use Shortcodes.', 'haku'); ?> (<a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#shortcodesList" target="_blank">?</a>)</p>
		
	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget($args, $instance) {
	
		extract($args);
		
		$autop = $instance['autop'];
		$text = ( $autop ? wpautop( $instance['text'] ) : $instance['text'] );
		$text = do_shortcode( $text );
				
		/*
			Before widget
		*/
		echo $before_widget;
		
		echo $text;
				
		/*
			After widget
		*/
		echo $after_widget;
		
	}
	
}

?>