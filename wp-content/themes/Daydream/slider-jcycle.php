<?php
/********************/
/*   Slider setup   */
global $dayd_enqueue_jcycle;
$dayd_enqueue_jcycle = true;

/************************/
/*   Slider js output   */
$js_opt = array(
	'speed' => get_theme_option('slider_speed'),
	'fx' => get_theme_option('jcycle_fx'),
	'easing' => get_theme_option('jcycle_easing'),
	'timeout' => get_theme_option('jcycle_timeout')
);

wp_localize_script('dayd_js_plugins', 'dayd_slider', $js_opt );
?>

<!-- jQuery slider -->
<div id="hero_slider" class="dayd_jcycle clearfix">
	
	<?php foreach ( get_theme_slides('theme_slides') as $slide_id => $slide ) : ?>
	
	<?php
	/****************************/
	/*   Slide layout classes   */
	if ( isset( $slide['layout'] ) ) {
		$content_class = ( $slide['layout'] == 'normal' ? array('right', 'left') : array('left', 'right') );
	}
	else {
		$content_class = array('right', 'left');
	}
	
	/*******************/
	/*   Slide class   */
	$slide_class = ( ! $slide['picture'] || ! $slide['content'] ? 'full_size' : 'normal_size' );
	
	/*************************/
	/*   Slide video sizes   */
	if ( haku_get_url_type( $slide['picture'] ) != 'image' ) {
		if ( haku_get_url_type( $slide['picture'] ) == 'youtube' ) {
			$video_size = ( $slide_class == 'full_size' ? array( 938, 350 ) : array( 400, 255 ) );
		}
		else {
			$video_size = ( $slide_class == 'full_size' ? array( 938, 350 ) : array( 400, 225 ) );
		}
	}
	?>
	
	<!-- Slide -->
	<div class="slide clearfix <?php echo $slide_class; ?>" id="slide_<?php echo $slide_id; ?>">
		
		<?php if ( $slide['picture'] ) : ?>
		
		<!-- Slide media -->
		<div class="slide_picture <?php echo $content_class[0]; ?>">
			
			<?php if ( isset( $slide['url'] ) && haku_get_url_type( $slide['picture'] ) == 'image' ) : ?>

			<a href="<?php echo esc_url( $slide['url'] ); ?>" class="<?php echo ( isset( $slide['lightbox'] ) ? 'dayd_multi_lightbox' : 'normal_slide' ); ?>">

			<?php endif; ?>
			
			<?php if ( haku_get_url_type( $slide['picture'] ) == 'youtube' ) : $id = haku_get_video_id( $slide['picture'] ); ?>
			
			<!-- Youtube Video -->
			<iframe type="text/html" width="<?php echo $video_size[0]; ?>" height="<?php echo $video_size[1]; ?>" src="http://www.youtube.com/embed/<?php echo $id; ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
			
			<?php elseif ( haku_get_url_type( $slide['picture'] ) == 'vimeo' ) : $id = haku_get_video_id( $slide['picture'] ); ?>
			
			<!-- Vimeo Video -->
			<iframe src="http://player.vimeo.com/video/<?php echo $id; ?>?title=0&amp;byline=0&amp;portrait=0" width="<?php echo $video_size[0]; ?>" height="<?php echo $video_size[1]; ?>" frameborder="0"></iframe>
			
			<?php elseif ( haku_get_url_type( $slide['picture'] ) == 'video' ) : $no_ext_url = preg_replace('/\\.[^.\\s]{3,4}$/', '', $slide['picture'] ); ?>
			
			<!-- HTML5 Video -->
			<div class="video-js-box">
				<video class="video-js" width="<?php echo $video_size[0]; ?>" height="<?php echo $video_size[1]; ?>" controls="controls" preload="none">
					<source src="<?php echo $no_ext_url; ?>.mp4" type="video/mp4; codecs='avc1.42E01E, mp4a.40.2'" />
					<source src="<?php echo $no_ext_url; ?>.webm" type="video/webm; codecs='vp8, vorbis'" />
					<source src="<?php echo $no_ext_url; ?>.ogv" type="video/ogg; codecs='theora, vorbis'" />
					<object class="vjs-flash-fallback" width="<?php echo $video_size[0]; ?>" height="<?php echo $video_size[1]; ?>" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf">
						<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf" />
						<param name="allowfullscreen" value="true" />
						<param name="flashvars" value="config={'clip':{'url':'<?php echo esc_url( $slide['picture'] ); ?>','autoPlay':false,'autoBuffering':false}}" />
					</object>
				</video>
				<!-- end: <video> -->
			</div>
			<!-- end: HTML5 Video -->
			
			<?php else : ?>
						
			<img src="<?php echo esc_url( $slide['picture'] ); ?>" alt="" />
			
			<?php endif; ?>
			
			<?php if ( isset( $slide['url'] ) && haku_get_url_type( $slide['picture'] ) == 'image' ) : ?>

			</a>

			<?php endif; ?>
			
		</div>
		<!-- end: Slide media -->
		
		<?php endif; ?>
		
		<?php if ( $slide['content'] ) : ?>
		
		<!-- Slide content -->
		<div class="slide_content <?php echo $content_class[1]; ?>">
		
			<?php echo apply_filters( 'the_content', stripslashes( $slide['content'] ) ); ?>
			
		</div>
		<!-- end: Slide content -->
		
		<?php endif; ?>
		
	</div>
	<!-- end: Slide -->
	
	<?php endforeach; ?>
	
</div>
<!-- end: jQuery slider -->

<!-- Loading gif -->
<div id="hero_loading"></div>