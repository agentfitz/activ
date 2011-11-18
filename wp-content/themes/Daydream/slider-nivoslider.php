<?php
/************************/
/*   Slider js output   */
$js_opt = array(
	'speed' => get_theme_option('slider_speed'),
	'fx' => get_theme_option('nivoslider_fx'),
	'slices' => get_theme_option('nivoslider_slices'),
	'boxcols' => get_theme_option('nivoslider_boxcols'),
	'boxrows' => get_theme_option('nivoslider_boxrows'),
	'pausetime' => get_theme_option('nivoslider_pausetime'),
	'captionopacity' => get_theme_option('nivoslider_captionopacity')
);

wp_localize_script('dayd_js_plugins', 'dayd_slider', $js_opt );
?>

<!-- jQuery slider -->
<div id="hero_slider" class="dayd_nivoslider clearfix">
	
	<?php foreach ( get_theme_slides('theme_slides') as $slide_id => $slide ) : ?>
	
	<!-- Slide -->

	<?php if ( isset( $slide['url'] ) ) : ?>

	<a href="<?php echo esc_url( $slide['url'] ); ?>" class="<?php echo ( isset( $slide['lightbox'] ) ? 'dayd_multi_lightbox' : 'normal_slide' ); ?>">

	<?php endif; ?>

	<img src="<?php echo haku_get_custom_thumbnail( esc_url( $slide['picture'] ), 'dayd_slider' ); ?>" title="<?php if ( $slide['content'] ) echo '#caption_' . $slide_id; ?>" id="slide_<?php echo $slide_id; ?>" alt="" />
	
	<?php if ( isset( $slide['url'] ) ) : ?>

	</a>

	<?php endif; ?>
	
	<!-- end: Slide -->
	
	<?php endforeach; ?>
	
</div>
<!-- end: jQuery slider -->

<!-- Slider captions -->

<?php foreach ( get_theme_slides('theme_slides') as $slide_id => $slide ) : if ( $slide['content'] ) : ?>

<!-- Caption -->
<div id="<?php echo 'caption_' . $slide_id; ?>" class="hidden">
    <?php echo apply_filters( 'the_content', stripslashes( $slide['content'] ) ); ?>
</div>

<?php endif; endforeach; ?>

<!-- end: Slider caption -->