<?php
/*
 *	Plugin Name: Daydream Testimonials
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_testimonials');

/*
 *	Widget registering
 */
function daydream_widget_testimonials() {
	register_widget('daydream_testimonials');
}

/*
 *	Widget class
 */
class daydream_testimonials extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_testimonials() {
	
		$widget_ops = array('classname' => 'wb_dayd_testimonials_widget', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_testimonials', '(Daydream) '.__('Testimonials', 'haku'), $widget_ops, $control_ops);
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['category'] = $new_instance['category'];
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form($instance) {

		/*
			Default settings
		*/
		$defaults = array('category' => '');
		
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<!-- Widget Select Box -->
		<p>
			<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Pick from:', 'haku'); ?></label><br />
			<select id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" class="widefat" style="width: 217px">
				<option value=""><?php _e('Choose a category', 'haku'); ?></option>
				<?php foreach ( haku_list_categories() as $name => $id ) : ?>
				<option <?php selected( $instance['category'], $id ); ?> value="<?php echo $id; ?>"><?php echo esc_attr( $name ); ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		
		<!-- Description -->
		<p class="description"><?php printf( __('You can hide the chosen category from all other areas of your website navigating to the "%s" section of the Daydream Control Panel.', 'haku'), '<strong>' . __('Extras', 'haku') . '</strong>' ); ?></p>

	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget($args, $instance) {
	
		extract($args);
		
		$category = $instance['category'];
		
		if ( $category ) :
		
		$testimonials = new WP_Query("cat=$category&post_status=publish");
		
		// Javascript
		global $dayd_enqueue_jcycle;
		$dayd_enqueue_jcycle = true;
		
		?>
		
		<!-- Testimonials -->
		
		<div class="testimonials_slider clearfix">
			
			<?php if ( $testimonials->have_posts() ) : while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
			
			<!-- Testimonial -->
			<div class="slide clearfix">
				
				<!-- Slide -->
				<div>
					
					<!-- Picture -->
					<?php if ( has_post_thumbnail() ) the_post_thumbnail('full', array('title' => '') ); ?>
					
					<!-- Bubble -->
					<div>

						<div class="arrow"></div>
						
						<p><?php echo apply_filters( 'autop_clear_filter', get_the_excerpt() ); ?>
						
						<span><?php the_title(); ?></span></p>
						
					</div>
					<!-- end: Bubble -->
				
				</div>
				<!-- end: Slide -->
				
			</div>
			<!-- end: Testimonial -->
			
			<?php endwhile; endif; wp_reset_postdata();  ?>
						
		</div>

		<!-- end: Testimonials -->
		
		<?php
		
		endif;
		
	}
	
}

?>