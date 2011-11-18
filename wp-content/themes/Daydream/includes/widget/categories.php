<?php
/*
 *	Plugin Name: Daydream Categories
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_categories');

/*
 *	Widget registering
 */
function daydream_widget_categories() {
	register_widget('daydream_categories');
}

/*
 *	Widget class
 */
class daydream_categories extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_categories() {
	
		$widget_ops = array('classname' => 'wb_dayd_list_widget', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_categories', '(Daydream) '.__('Categories', 'haku'), $widget_ops, $control_ops );
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['limit'] = ( intval( $new_instance['limit'] ) ? $new_instance['limit'] : $instance['limit'] );
		
		$instance['post_count'] = $new_instance['post_count'];
		$instance['orderby'] = $new_instance['orderby'];
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
		$defaults = array('title' => __('Categories', 'haku'), 'post_count' => 'on', 'orderby' => 'name', 'order' => 'ASC', 'limit' => 5 );
		
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
				
		<!-- Widget Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order by:', 'haku'); ?></label><br />
			<select id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" class="widefat" style="width: 217px">
				<option <?php selected( $instance['orderby'], 'ID' ); ?> value="ID">ID</option>
				<option <?php selected( $instance['orderby'], 'name' ); ?> value="name"><?php _e('Name', 'haku'); ?></option>
				<option <?php selected( $instance['orderby'], 'slug' ); ?> value="slug">Slug</option>
				<option <?php selected( $instance['orderby'], 'count' ); ?> value="count"><?php _e('Post count', 'haku'); ?></option>
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
		$orderby = $instance['orderby'];
		$order = $instance['order'];
		$limit = $instance['limit'];
		$exclude = haku_format_exclude_categories('exclude_category');
		
		$dayd_list = wp_list_categories("exclude=$exclude&title_li=&echo=0&show_count=$post_count&orderby=$orderby&order=$order&number=$limit");
		$dayd_list = str_replace( '</a> (', '<span>', $dayd_list );
		$dayd_list = str_replace( ')', '</span></a>', $dayd_list );
		
		/*
			Before widget
		*/
		echo $before_widget;
		
		if ($title) {
			echo $before_title . $title . $after_title;
		}
		?>
		
		<!-- Categories widget -->
		
		<ul>
			<?php echo $dayd_list; ?>
		</ul>

		<!-- end: Categories widget -->
		
		<?php
		/*
			After widget
		*/
		echo $after_widget;
		
	}
	
}

?>