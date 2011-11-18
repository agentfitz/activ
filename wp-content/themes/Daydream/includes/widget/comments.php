<?php
/*
 *	Plugin Name: Daydream Latest Comments
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.1
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_comments');

/*
 *	Widget registering
 */
function daydream_widget_comments() {
	register_widget('daydream_comments');
}

/*
 *	Widget class
 */
class daydream_comments extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_comments() {
	
		$widget_ops = array('classname' => 'wb_dayd_comments_widget', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_comments', '(Daydream) '.__('Recent Comments', 'haku'), $widget_ops, $control_ops);
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		$total_comments = wp_count_comments();
		
		$instance['number'] = ( intval( $new_instance['number'] ) ? ( $new_instance['number'] > $total_comments->approved ? $total_comments->approved : $new_instance['number'] ) : $instance['number'] );
		
		$instance['length'] = $new_instance['length'];
		$instance['order'] = $new_instance['order'];
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form($instance) {

		/*
			Default settings
		*/
		$defaults = array('title' => __('Recent comments', 'haku'), 'number' => 3, 'length' => '', 'order' => 'DESC');
		
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" style="width: 217px" />
		</p>
				
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $instance['number']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id('length'); ?>"><?php _e('Length:', 'haku'); ?></label><br />
			<select id="<?php echo $this->get_field_id('length'); ?>" name="<?php echo $this->get_field_name('length'); ?>" class="widefat" style="width: 217px">
				<option <?php selected( $instance['length'], 12 ); ?> value="12"><?php _e('Short', 'haku'); ?></option>
				<option <?php selected( $instance['length'], 30 ); ?> value="30"><?php _e('Medium', 'haku'); ?></option>
				<option <?php selected( $instance['length'], 1 ); ?> value="1"><?php _e('Full', 'haku'); ?></option>
			</select>
		</p>
		
		<!-- Widget Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order:', 'haku'); ?></label><br />
			<select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" class="widefat" style="width: 217px">
				<option <?php selected( $instance['order'], 'ASC' ); ?> value="ASC"><?php _e('Ascending', 'haku'); ?></option>
				<option <?php selected( $instance['order'], 'DESC' ); ?> value="DESC"><?php _e('Descending', 'haku'); ?></option>
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
		$number = $instance['number'];
		$order = $instance['order'];
		$length = $instance['length'];
		
		$dayd_comments = get_comments("status=approve&number=$number&order=$order");
		
		/*
			Before widget
		*/
		echo $before_widget;
		
		if ($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		<!-- Comments widget -->
		
		<ul>
			<?php foreach ($dayd_comments as $comment) : ?>
			
			<?php $comment_content = ( $length == 1 ? $comment->comment_content : haku_shorten( $comment->comment_content, $length ) ); ?>
			
			<!-- Comment -->
			<li>
				<a title="<?php printf( __('Link to %s', 'haku') , get_the_title( $comment->comment_post_ID )); ?>" href="<?php echo get_permalink( $comment->comment_post_ID ); ?>#comment-<?php echo $comment->comment_ID; ?>">
					<p>&ldquo;<?php echo esc_html( strip_tags( $comment_content ) ); ?>&rdquo;</p>
					<span>On <strong><?php echo get_the_title( $comment->comment_post_ID ); ?></strong>, <?php echo haku_nice_date( get_comment_date('U', $comment->comment_ID ) ); ?></span>
				</a>
			</li>
			<!-- end: Comment -->
				
			<?php endforeach; ?>
		</ul>

		<!-- end: Comments widget -->
		
		<?php
		/*
			After widget
		*/
		echo $after_widget;
		
	}
	
}

?>