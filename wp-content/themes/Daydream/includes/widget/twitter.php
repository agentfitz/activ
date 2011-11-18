<?php
/*
 *	Plugin Name: Daydream Twitter
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_twitter');

/*
 *	Widget registering
 */
function daydream_widget_twitter() {
	register_widget('daydream_twitter');
}

/*
 *	Widget class
 */
class daydream_twitter extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_twitter() {
	
		$widget_ops = array('classname' => 'wb_dayd_twitter_widget', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_twitter', '(Daydream) Twitter', $widget_ops, $control_ops);
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['number'] = ( intval( $new_instance['number'] ) ? $new_instance['number'] : $instance['number'] );
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form($instance) {

		/*
			Default settings
		*/
		$defaults = array('title' => __('Latest Tweets', 'haku'), 'number' => 3);
		
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('username'); ?>"><?php _e('Username:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php if ( isset( $instance['username'] ) ) echo $instance['username']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" class="widefat" style="width: 217px" />
		</p>

	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget($args, $instance) {
	
		extract($args);
		
		$title = $instance['title'];
		$username = $instance['username'];
		$number = $instance['number'];
		
		$haku_tweets = haku_get_tweets( $username, $number );
		
		/*
			Before widget
		*/
		echo $before_widget;
		
		if ($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		<!-- Tweets list -->
		
		<ul>
			
			<!-- Tweet -->
			<?php if ( $haku_tweets ) : foreach ( $haku_tweets as $tweets => $tweet ) : ?>
			
			<!-- Tweet -->
			<li data-href="<?php echo $tweet['link']; ?>">
				<span><?php echo $tweet['content']; ?> <time datetime="<?php echo $tweet['datetime']; ?>"><?php echo $tweet['date']; ?></time></span>
			</li>
			<!-- end: Tweet -->
				
			<?php endforeach; else: ?>
						
			<p><em><?php printf( __('No tweets found from "%s"', 'haku') , $instance['username'] ); ?></em></p>
			
			<?php endif; ?>
			<!-- end: Tweet -->
				
		</ul>

		<!-- end: Tweets list -->
		
		<?php
		/*
			After widget
		*/
		echo $after_widget;
		
	}
	
}

?>