<?php
/*
 *	Plugin Name: Daydream Video
 *	Plugin URI: http://themes.winterbits.com/daydream
 *	Version: 1.0
 *	Author: Stefano Giliberti
 *	Author URI: http://winterbits.com
 */

/*
 *	Add function to widgets_init that'll load the widget
 */
add_action('widgets_init', 'daydream_widget_video');

/*
 *	Widget registering
 */
function daydream_widget_video() {
	register_widget('daydream_video');
}

/*
 *	Widget class
 */
class daydream_video extends WP_Widget {

	/*
	 *	Widget setup
	 */
	function daydream_video() {
	
		$widget_ops = array('classname' => 'wb_dayd_video_widget', 'description' => '');
		
		$control_ops = array('width' => '', 'height' => '');

		$this->WP_Widget('daydream_widget_video', '(Daydream) Video', $widget_ops, $control_ops);
		
	}
	
	/*
	 *	Widget update
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['url'] = esc_url( $new_instance['url'] );
		
		$instance['width'] = ( intval( $new_instance['width'] ) ? $new_instance['width'] : $instance['width'] );
		$instance['height'] = ( intval( $new_instance['height'] ) ? $new_instance['height'] : $instance['height'] );
		
		$instance['host'] = $new_instance['host'];
		
		return $instance;
	}
	
	/*
	 *	Displays the widget settings
	 */
	function form($instance) {

		/*
			Default settings
		*/
		$defaults = array('title' => __('Moving Pictures!', 'haku'), 'width' => 222, 'height' => 156);
		
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Url:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('url'); ?>" placeholder="http://" name="<?php echo $this->get_field_name('url'); ?>" value="<?php if ( isset( $instance['url'] ) ) echo esc_url( $instance['url'] ); ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Description -->
		<p class="description"><?php _e('HTML5 videos will automatically fallback to Flash if the browser does not support it.', 'haku'); ?></p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php if ( isset( $instance['width'] ) ) echo $instance['width']; ?>" class="widefat" style="width: 217px" />
		</p>
		
		<!-- Widget Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('Height:', 'haku'); ?></label><br />
			<input id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" value="<?php if ( isset( $instance['height'] ) ) echo $instance['height']; ?>" class="widefat" style="width: 217px" />
		</p>
		
	<?php
	}
	
	/*
	 *	Widget display
	 */
	function widget($args, $instance) {
	
		extract($args);
		
		$title = $instance['title'];
		$host = $instance['host'];
		$url = $instance['url'];
		$width = $instance['width'];
		$height = $instance['height'];
				
		/*
			Before widget
		*/
		echo $before_widget;
		
		if ($title) {
			echo $before_title . $title . $after_title;
		}
		
		if ( $url ) :
		?>
		
		<!-- Video -->
		
		<div class="dayd_video">
			
			<!-- Video container -->
			<div style="width: <?php echo $width; ?>px">
			
				<?php if ( haku_get_url_type( $url ) == 'youtube' ) : $id = haku_get_video_id( $url ); ?>
				
				<!-- Youtube Video -->
				<iframe type="text/html" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" src="http://www.youtube.com/embed/<?php echo $id; ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
			
				<?php elseif ( haku_get_url_type( $url ) == 'vimeo' ) : $id = haku_get_video_id( $url ); ?>
				
				<!-- Vimeo Video -->
				<iframe src="http://player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" frameborder="0"></iframe>
				
				<?php elseif ( haku_get_url_type( $url ) == 'video' ) : $no_ext_url = preg_replace('/\\.[^.\\s]{3,4}$/', '', $url ); ?>
								
				<!-- HTML5 Video -->
				<div class="video-js-box">
					<video class="video-js" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" controls="controls" preload="none">
						<source src="<?php echo $no_ext_url; ?>.mp4" type="video/mp4; codecs='avc1.42E01E, mp4a.40.2'" />
						<source src="<?php echo $no_ext_url; ?>.webm" type="video/webm; codecs='vp8, vorbis'" />
						<source src="<?php echo $no_ext_url; ?>.ogv" type="video/ogg; codecs='theora, vorbis'" />
						<object class="vjs-flash-fallback" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf">
							<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf" />
							<param name="allowfullscreen" value="true" />
							<param name="flashvars" value="config={'clip':{'url':'<?php echo esc_url( $url ); ?>','autoPlay':false,'autoBuffering':false}}" />
						</object>
					</video>
					<!-- end: <video> -->
				</div>
				<!-- end: HTML5 Video -->
				
				<?php endif; ?>
			
			</div>
			<!-- end: Video container -->
			
		</div>

		<!-- end: Video -->
		
		<?php
		endif;
		
		/*
			After widget
		*/
		echo $after_widget;
		
	}
	
}

?>