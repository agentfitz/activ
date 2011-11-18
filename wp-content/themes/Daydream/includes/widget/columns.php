<?php
/*
 *	Plugin Name: Daydream Columns
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_columns');

/*
 *	Widget registering
 */
function daydream_widget_columns() {
	register_widget('daydream_columns');
}

/*
 *	Widget class
 */
class daydream_columns extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_columns() {
	
		$widget_ops = array('classname' => 'wb_dayd_columns', 'description' => '');
		
		$control_ops = array('width' => 400, 'height' => '');

		$this->WP_Widget('daydream_widget_columns', '(Daydream) ' . __('Columns', 'haku'), $widget_ops, $control_ops);
		
	}
	
	/*
	 *	Widget update
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['size'] = $new_instance['size'];
		$instance['height'] = ( intval( $new_instance['height'] ) ? $new_instance['height'] : $instance['height'] );
		$instance['icon'] = $new_instance['icon'];
		
		$instance['col_1'] = $new_instance['col_1'];
		$instance['col_1_icon'] = $new_instance['col_1_icon'];
		
		$instance['col_2'] = $new_instance['col_2'];
		$instance['col_2_icon'] = $new_instance['col_2_icon'];
		
		$instance['col_3'] = $new_instance['col_3'];
		$instance['col_3_icon'] = $new_instance['col_3_icon'];
		
		$instance['col_4'] = $new_instance['col_4'];
		$instance['col_4_icon'] = $new_instance['col_4_icon'];
		
		$instance['col_5'] = $new_instance['col_5'];
		$instance['col_5_icon'] = $new_instance['col_5_icon'];
		
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
			'size' => '',
			'height' => '',
			'icon' => '',
			
			'col_1' => '',
			'col_1_icon' => '',
			
			'col_2' => '',
			'col_2_icon' => '',
			
			'col_3' => '',
			'col_3_icon' => '',
			
			'col_4' => '',
			'col_4_icon' => '',
			
			'col_5' => '',
			'col_5_icon' => ''
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
				
		<!-- Switcher container -->
		<div class="<?php echo ( $instance['size'] ? 'hidden' : 'not_selected' ); ?>">
			
			<!-- Widget Title -->
			<h4 style="margin: 0 0 7px;"><?php _e('Setup', 'haku'); ?></h4>
			
			<!-- Widget Select Box -->
			<p>
				<label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Columns:', 'haku'); ?></label><br />
				<select id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" class="widefat" style="width: 400px">
					<option <?php selected( $instance['size'], 2 ); ?> value="2">2</option>
					<option <?php selected( $instance['size'], 3 ); ?> value="3">3</option>
					<option <?php selected( $instance['size'], 4 ); ?> value="4">4</option>
					<option <?php selected( $instance['size'], 5 ); ?> value="5">5</option>
				</select>
			</p>
			
			<!-- Widget Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'haku'); ?></label><br />
				<input id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php if ( isset( $instance['height'] ) ) echo $instance['height']; ?>" class="widefat" style="width: 400px" />
			</p>
			
			<!-- Description -->
			<p class="description"><?php _e('The height of all columns.', 'haku'); ?> <?php _e('Optional.', 'haku'); ?></p>
			
			<!-- Widget Checkbox -->
			<p>
				<input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('icon'); ?>" name="<?php echo $this->get_field_name('icon'); ?>" <?php checked( $instance['icon'], 'on' ); ?> /> 
				<label for="<?php echo $this->get_field_id('icon'); ?>"><?php _e('Use Icons', 'haku'); ?></label>
			</p>
			
			<!-- Description -->
			<p class="description"><?php _e('Check this if you want to show an Icon on the left side of every column.', 'haku'); ?> <?php _e('Optional.', 'haku'); ?></p>
			
			<!-- Widget Separator -->
			<hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 18px 0 15px; padding: 0;" />
			
			<!-- Widget Title -->
			<h4 style="margin: 0 0 7px;"><?php _e('Icon Field', 'haku'); ?></h4>
			<p class="description"><?php _e('You can either enter a url to a custom icon or a number referencing to a Daydream icon.', 'haku'); ?> (<a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#iconsList" target="_blank">?</a>) <strong><?php _e('Recommended size:', 'haku'); ?></strong> 35x35</p>
		
		</div>
		<!-- end: Switcher container -->
				
		<?php if ( $instance['size'] ) : ?>
		
		<!-- Description -->
		<p class="description"><strong><?php echo $instance['size']; ?></strong> <?php _e('Columns', 'haku'); ?> <?php if ( $instance['height'] ) printf( __('%s pixels tall', 'haku'), '<strong>' . $instance['height'] . '</strong>' ); ?> <?php if ( $instance['icon'] ) echo '<strong>' . __('with icons', 'haku') . '</strong>'; ?></p>
		
		<!-- Widget Title -->
		<h4 style="margin: 0 0 7px;"><?php _e('Column', 'haku'); ?> 1</h4>
		
		<!-- Widget Textarea Input -->
		<p>
			<textarea id="<?php echo $this->get_field_id('col_1'); ?>" name="<?php echo $this->get_field_name('col_1'); ?>" style="width: 400px; height:  150px;"><?php echo $instance['col_1']; ?></textarea>
		</p>
		
		<?php if ( $instance['icon'] ) : ?>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('col_1_icon'); ?>"><?php _e('Icon:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('col_1_icon'); ?>" name="<?php echo $this->get_field_name('col_1_icon'); ?>" value="<?php if ( isset( $instance['col_1_icon'] ) ) echo $instance['col_1_icon']; ?>" class="widefat" style="width: 400px" />
		</p>
		
		<?php endif; ?>
		
		<!-- Widget Separator -->
		<hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 18px 0 15px; padding: 0;" />
		
		<!-- Widget Title -->
		<h4 style="margin: 0 0 7px;"><?php _e('Column', 'haku'); ?> 2</h4>
		
		<!-- Widget Textarea Input -->
		<p>
			<textarea id="<?php echo $this->get_field_id('col_2'); ?>" name="<?php echo $this->get_field_name('col_2'); ?>" style="width: 400px; height:  150px;"><?php echo $instance['col_2']; ?></textarea>
		</p>
		
		<?php if ( $instance['icon'] ) : ?>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('col_2_icon'); ?>"><?php _e('Icon:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('col_2_icon'); ?>" name="<?php echo $this->get_field_name('col_2_icon'); ?>" value="<?php if ( isset( $instance['col_2_icon'] ) ) echo $instance['col_2_icon']; ?>" class="widefat" style="width: 400px" />
		</p>
		
		<?php endif; ?>
		
		<?php if ( $instance['size'] > 2 ) : ?>
		
		<!-- Widget Separator -->
		<hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 18px 0 15px; padding: 0;" />
		
		<!-- Widget Title -->
		<h4 style="margin: 0 0 7px;"><?php _e('Column', 'haku'); ?> 3</h4>
		
		<!-- Widget Textarea Input -->
		<p>
			<textarea id="<?php echo $this->get_field_id('col_3'); ?>" name="<?php echo $this->get_field_name('col_3'); ?>" style="width: 400px; height:  150px;"><?php echo $instance['col_3']; ?></textarea>
		</p>
		
		<?php if ( $instance['icon'] ) : ?>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('col_3_icon'); ?>"><?php _e('Icon:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('col_3_icon'); ?>" name="<?php echo $this->get_field_name('col_3_icon'); ?>" value="<?php if ( isset( $instance['col_3_icon'] ) ) echo $instance['col_3_icon']; ?>" class="widefat" style="width: 400px" />
		</p>
		
		<?php endif; ?>
		
		<?php endif; ?>
		
		<?php if ( $instance['size'] > 3 ) : ?>
		
		<!-- Widget Separator -->
		<hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 18px 0 15px; padding: 0;" />
		
		<!-- Widget Title -->
		<h4 style="margin: 0 0 7px;"><?php _e('Column', 'haku'); ?> 4</h4>
		
		<!-- Widget Textarea Input -->
		<p>
			<textarea id="<?php echo $this->get_field_id('col_4'); ?>" name="<?php echo $this->get_field_name('col_4'); ?>" style="width: 400px; height:  150px;"><?php echo $instance['col_4']; ?></textarea>
		</p>
		
		<?php if ( $instance['icon'] ) : ?>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('col_4_icon'); ?>"><?php _e('Icon:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('col_4_icon'); ?>" name="<?php echo $this->get_field_name('col_4_icon'); ?>" value="<?php if ( isset( $instance['col_4_icon'] ) ) echo $instance['col_4_icon']; ?>" class="widefat" style="width: 400px" />
		</p>
		
		<?php endif; ?>
		
		<?php endif; ?>
		
		<?php if ( $instance['size'] > 4 ) : ?>
		
		<!-- Widget Separator -->
		<hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 18px 0 15px; padding: 0;" />
		
		<!-- Widget Title -->
		<h4 style="margin: 0 0 7px;"><?php _e('Column', 'haku'); ?> 5</h4>
		
		<!-- Widget Textarea Input -->
		<p>
			<textarea id="<?php echo $this->get_field_id('col_5'); ?>" name="<?php echo $this->get_field_name('col_5'); ?>" style="width: 400px; height:  150px;"><?php echo $instance['col_5']; ?></textarea>
		</p>
		
		<?php if ( $instance['icon'] ) : ?>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('col_5_icon'); ?>"><?php _e('Icon:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('col_5_icon'); ?>" name="<?php echo $this->get_field_name('col_5_icon'); ?>" value="<?php if ( isset( $instance['col_5_icon'] ) ) echo $instance['col_5_icon']; ?>" class="widefat" style="width: 400px" />
		</p>
		
		<?php endif; ?>
		
		<?php endif; ?>
		
		<?php endif; ?>
		
	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget( $args, $instance ) {
	
		extract( $args );
		
		$size = $instance['size'];
		$height = $instance['height'];
		$icon = $instance['icon'];
		
		$col_1 = $instance['col_1'];
		$col_1_icon = ( intval( $instance['col_1_icon'] ) ? get_stylesheet_directory_uri() . '/images/symbols/is_' . $instance['col_1_icon'] . '.png' : esc_url( $instance['col_1_icon'] ) );
		
		$col_2 = $instance['col_2'];
		$col_2_icon = ( intval( $instance['col_2_icon'] ) ? get_stylesheet_directory_uri() . '/images/symbols/is_' . $instance['col_2_icon'] . '.png' : esc_url( $instance['col_2_icon'] ) );
		
		$col_3 = $instance['col_3'];
		$col_3_icon = ( intval( $instance['col_3_icon'] ) ? get_stylesheet_directory_uri() . '/images/symbols/is_' . $instance['col_3_icon'] . '.png' : esc_url( $instance['col_3_icon'] ) );
		
		$col_4 = $instance['col_4'];
		$col_4_icon = ( intval( $instance['col_4_icon'] ) ? get_stylesheet_directory_uri() . '/images/symbols/is_' . $instance['col_4_icon'] . '.png' : esc_url( $instance['col_4_icon'] ) );
		
		$col_5 = $instance['col_5'];
		$col_5_icon = ( intval( $instance['col_5_icon'] ) ? get_stylesheet_directory_uri() . '/images/symbols/is_' . $instance['col_5_icon'] . '.png' : esc_url( $instance['col_5_icon'] ) );
		
		$class = array();
		
		switch ( $size ) {
			case '2':
				$class[] = 'half';
			break;
			case '3':
				$class[] = 'one_third';
			break;
			case '4':
				$class[] = 'one_fourth';
			break;
			case '5':
				$class[] = 'one_fifth';
			break;
		}
		
		if ( $icon ) {
			$class[] = 'col_icon';
		}
		
		$class = haku_nice_classes( $class, true );

		?>
		
		<!-- Columns container -->
		<div class="clearfix">
			
			<!-- Column -->
			<div class="<?php echo $class; ?>" style="<?php if ( $height ) echo 'height: ' . $height . 'px;'; ?>">
				
				<?php if ( $col_1_icon ) : ?>
				
				<img src="<?php echo $col_1_icon; ?>" alt="" />
				
				<div>
				
				<?php endif; ?>
				
				<?php echo apply_filters( 'autobr_clear_filter', do_shortcode( $col_1 ) ); ?>
				
				<?php if ( $col_1_icon ) : ?>
				
				</div>
				
				<?php endif; ?>
				
			</div>
			<!-- end: Column -->
			
			<!-- Column -->
			<div class="<?php echo $class; ?>">
				
				<?php if ( $col_2_icon ) : ?>
				
				<img src="<?php echo $col_2_icon; ?>" alt="" />
				
				<div>
				
				<?php endif; ?>
				
				<?php echo apply_filters( 'autobr_clear_filter', do_shortcode( $col_2 ) ); ?>
				
				<?php if ( $col_2_icon ) : ?>
				
				</div>
				
				<?php endif; ?>
				
			</div>
			<!-- end: Column -->
			
			<?php if ( $size > 2 ) : ?>
			
			<!-- Column -->
			<div class="<?php echo $class; ?>">
				
				<?php if ( $col_3_icon ) : ?>
				
				<img src="<?php echo $col_3_icon; ?>" alt="" />
				
				<div>
				
				<?php endif; ?>
				
				<?php echo apply_filters( 'autobr_clear_filter', do_shortcode( $col_3 ) ); ?>
				
				<?php if ( $col_3_icon ) : ?>
				
				</div>
				
				<?php endif; ?>
				
			</div>
			<!-- end: Column -->
			
			<?php endif; ?>
			
			<?php if ( $size > 3 ) : ?>
			
			<!-- Column -->
			<div class="<?php echo $class; ?>">
				
				<?php if ( $col_4_icon ) : ?>
				
				<img src="<?php echo $col_4_icon; ?>" alt="" />
				
				<div>
				
				<?php endif; ?>
				
				<?php echo apply_filters( 'autobr_clear_filter', do_shortcode( $col_4 ) ); ?>
				
				<?php if ( $col_4_icon ) : ?>
				
				</div>
				
				<?php endif; ?>
				
			</div>
			<!-- end: Column -->
			
			<?php endif; ?>
			
			<?php if ( $size > 4 ) : ?>
			
			<!-- Column -->
			<div class="<?php echo $class; ?>">
				
				<?php if ( $col_5_icon ) : ?>

				<img src="<?php echo $col_5_icon; ?>" alt="" />
				<div>

				<?php endif; ?>
				
				<?php echo apply_filters( 'autobr_clear_filter', do_shortcode( $col_5 ) ); ?>
				
				<?php if ( $col_5_icon ) : ?>

				</div>
				
				<?php endif; ?>
				
			</div>
			<!-- end: Column -->
			
			<?php endif; ?>
		
		</div>
		<!-- end: Columns container -->
		
		<?php
		
	}
	
}

?>