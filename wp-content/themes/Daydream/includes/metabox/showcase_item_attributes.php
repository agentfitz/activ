<!-- Metabox container -->
<div class="haku_metabox">
	
	<!-- Metabox group title -->
	<h4><?php _e('Lightbox', 'haku'); ?></h4>
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
	
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Use Lightbox', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('lightbox'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="lightbox" <?php $mb->the_checkbox_state('lightbox'); ?>/>

		</div>
		<!-- end: Input column -->
		
		<!-- Local usage -->
		<?php $has_lightbox = $mb->get_the_value(); ?>
		
	</div>
	<!-- end: Checkbox metabox -->
	
	<?php if ( $has_lightbox ) : ?>
	
	<!-- Metabox group title -->
	<h4><?php _e('Lightbox Settings', 'haku'); ?></h4>
	
	<!-- Select box metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Content type:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('lightbox_type'); ?>

			<select name="<?php $mb->the_name(); ?>">
				<option value="image" <?php $mb->the_select_state('image'); ?>><?php _e('Image', 'haku'); ?></option>
				<option value="video" <?php $mb->the_select_state('video'); ?>><?php _e('Video', 'haku'); ?></option>
				<option value="website" <?php $mb->the_select_state('website'); ?>><?php _e('Website', 'haku'); ?></option>
			</select>

		</div>
		<!-- end: Input column -->
		
		<!-- Local usage -->
		<?php $lightbox_type = $mb->get_the_value(); ?>
	
	</div>
	<!-- end: Select box metabox -->
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Url:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('lightbox_href'); ?>

			<?php
			switch ( $lightbox_type ) {
				default:
					$placeholder = ( has_post_thumbnail( $_GET['post'] ) ? get_thumb_src( $_GET['post'], 'full' ) : 'http://' );
				break;
				case 'video':
					$placeholder = 'http://';
				break;
				case 'website':
					$placeholder = get_permalink( $_GET['post'] );
				break;
			}
			?>

			<input type="text" name="<?php $mb->the_name(); ?>" placeholder="<?php echo $placeholder; ?>" value="<?php $mb->the_value(); ?>"/>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Input text metabox -->
		
	<?php if ( $lightbox_type == 'image' || ! $lightbox_type ) : ?>
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Caption:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('lightbox_cap'); ?>

			<input type="text" name="<?php $mb->the_name(); ?>" placeholder="<?php echo haku_get_excerpt( $_GET['post'] ); ?>" value="<?php $mb->the_value(); ?>"/>

		</div>
		<!-- end: Input column -->
					
	</div>
	<!-- end: Input text metabox -->
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Gallery:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('lightbox_gallery'); ?>

			<?php
			$placeholder = array('Venice 2011', 'Summer \'89', 'Project 01', 'John Doe Logo', 'Photographic Set 027', 'Gallery 01', 'Project A', 'Zombies', 'Kittens', 'Bacon', '19 August 2011', 'Gadgets', date('l'), get_bloginfo('name') );
			$placeholder = __('e.g.', 'haku') . ' ' . $placeholder[ rand( 0, count( $placeholder ) - 1 ) ];
			?>

			<input type="text" name="<?php $mb->the_name(); ?>" placeholder="<?php echo $placeholder; ?>" value="<?php $mb->the_value(); ?>"/>

			<span><?php _e('Use the exact same value on every item you want to group.', 'haku'); ?></span>

		</div>
		<!-- end: Input column -->

	</div>
	<!-- end: Input text metabox -->
	
	<?php endif; ?>
	
	<?php endif; ?>
	
	<?php if ( ! $has_lightbox ) : ?>
	
	<!-- Metabox group title -->
	<h4><?php _e('Custom Link', 'haku'); ?></h4>
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group last">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Link to:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('link'); ?>

			<input type="text" name="<?php $mb->the_name(); ?>" placeholder="http://" value="<?php $mb->the_value(); ?>"/>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Input text metabox -->
	
	<?php endif; ?>
		
	<!-- Checkbox helper -->
	<?php $mb->the_field('_checkbox_helper'); ?><input class="hidden" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	
</div>
<!-- end: Metabox container -->