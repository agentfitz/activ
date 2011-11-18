<!-- Metabox container -->
<div class="haku_metabox">

	<!-- Metabox group title -->
	<h4><?php _e('General settings', 'haku'); ?></h4>
	
	<!-- Select box metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Gallery layout:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('layout'); ?>

			<select name="<?php $mb->the_name(); ?>">
				<option value=""><?php _e('Choose an option', 'haku'); ?></option>
				<option value="s" <?php $mb->the_select_state('s'); ?>><?php _e('Slideshow', 'haku'); ?></option>
				<option value="1" <?php $mb->the_select_state('1'); ?>><?php _e('Single Column', 'haku'); ?></option>
				<option value="2" <?php $mb->the_select_state('2'); ?>><?php _e('2 Columns', 'haku'); ?></option>
				<option value="3" <?php $mb->the_select_state('3'); ?>><?php _e('3 Columns', 'haku'); ?></option>
				<option value="4" <?php $mb->the_select_state('4'); ?>><?php _e('4 Columns', 'haku'); ?></option>
			</select>

		</div>
		<!-- end: Input column -->
		
		<!-- Local usage -->
		<?php $current_layout = ( $mb->get_the_value() ? $mb->get_the_value() : 3 ); ?>
		<?php $current_is_slideshow = ( $mb->get_the_value() == 's' ? true : false ); ?>
	
	</div>
	<!-- end: Select box metabox -->
	
	<?php if ( $current_is_slideshow ) : ?>
	
	<!-- Metabox group title -->
	<h4><?php _e('Slideshow layout', 'haku'); ?></h4>
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Slideshow height:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('height'); ?>
	
			<input type="text" name="<?php $mb->the_name(); ?>" placeholder="486" value="<?php $mb->the_value(); ?>"/>

			<span><?php _e('After changing this value you must rebuild the WordPress Thumbnails using an external WordPress plugin.', 'haku'); ?> (<a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#thumbnails" target="_blank">?</a>)</span>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Input text metabox -->
	
	<!-- Metabox group title -->
	<h4><?php _e('Slideshow settings', 'haku'); ?></h4>
	
	<!-- Select box metabox -->
	<div class="haku_metabox_group">
	
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Transition effect:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('slideshow_fx'); ?>

			<select name="<?php $mb->the_name(); ?>">
				<option value="fade" <?php $mb->the_select_state('fade'); ?>><?php _e('Fade', 'haku'); ?></option>
				<option value="horizontal-slide" <?php $mb->the_select_state('horizontal-slide'); ?>><?php _e('Horizontal Slide', 'haku'); ?></option>
				<option value="vertical-slide" <?php $mb->the_select_state('vertical-slide'); ?>><?php _e('Vertical Slide', 'haku'); ?></option>
				<option value="horizontal-push" <?php $mb->the_select_state('horizontal-push'); ?>><?php _e('Horizontal Push', 'haku'); ?></option>
			</select>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Select box metabox -->
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Transition speed:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('slideshow_ms'); ?>

			<input type="text" name="<?php $mb->the_name(); ?>" placeholder="800" value="<?php $mb->the_value(); ?>"/>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Input text metabox -->
	
	<!-- Select box metabox -->
	<div class="haku_metabox_group no_desc">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Captions effect:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('slideshow_cap_fx'); ?>

			<select name="<?php $mb->the_name(); ?>">
				<option value="slideOpen" <?php $mb->the_select_state('slideOpen'); ?>><?php _e('Slide', 'haku'); ?></option>
				<option value="fade" <?php $mb->the_select_state('fade'); ?>><?php _e('Fade', 'haku'); ?></option>
				<option value="none" <?php $mb->the_select_state('none'); ?>><?php _e('None', 'haku'); ?></option>
			</select>

		</div>
		<!-- end: Input column -->

	</div>
	<!-- end: Select box metabox -->
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Captions speed:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('slideshow_cap_ms'); ?>

			<input type="text" name="<?php $mb->the_name(); ?>" placeholder="800" value="<?php $mb->the_value(); ?>"/>

		</div>
		<!-- end: Input column -->

	</div>
	<!-- end: Input text metabox -->
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Disable Timer', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('slideshow_no_timer'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="slideshow_no_timer" <?php $mb->the_checkbox_state('slideshow_no_timer'); ?>/>

		</div>
		<!-- end: Input column -->
		
		<!-- Local usage -->
		<?php $current_timer_is_off = $mb->get_the_value(); ?>
		
	</div>
	<!-- end: Checkbox metabox -->
	
	<?php if ( ! $current_timer_is_off ) : ?>
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Pause on mouseover', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('slideshow_pause'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="slideshow_pause_on" <?php $mb->the_checkbox_state('slideshow_pause_on'); ?>/>

		</div>
		<!-- end: Input column -->

	</div>
	<!-- end: Checkbox metabox -->
	
	<?php endif; ?>
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Disable Thumbnails', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('slideshow_no_thumbs'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="slideshow_no_thumbs" <?php $mb->the_checkbox_state('slideshow_no_thumbs'); ?>/>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Checkbox metabox -->
	
	<?php endif; ?>
	
	<?php if ( ! $current_is_slideshow ) : ?>
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Items per page:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('ipp'); ?>

			<input type="text" name="<?php $mb->the_name(); ?>" placeholder="9" value="<?php $mb->the_value(); ?>"/>

			<span><?php _e('The number of items to show in each page.', 'haku'); ?> (Default: 9, <strong><?php _e('Total posts:', 'haku'); ?> <?php echo get_theme_post_type_posts( $_GET['post'] ); ?></strong>)</span>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Input text metabox -->
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Images height:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('height'); ?>

			<?php 
			switch ( $current_layout ) {
				case '1':
					$height = 251;
				break;
				case '2':
					$height = 280;
				break;
				case '3':
					$height = 198;
				break;
				case '4':
					$height = 198;
				break;
			}
			?>

			<input type="text" name="<?php $mb->the_name(); ?>" placeholder="<?php echo $height; ?>" value="<?php $mb->the_value(); ?>"/>

			<span><?php _e('After changing this value you must rebuild the WordPress Thumbnails using an external WordPress plugin.', 'haku'); ?> (<a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#thumbnails" target="_blank">?</a>)</span>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Input text metabox -->
	
	<hr />
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Disable Tools', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('no_tools'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="no_tools" <?php $mb->the_checkbox_state('no_tools'); ?>/>
			<span><?php _e('Disable Filtering, Search and Instant Pagination.', 'haku'); ?></span>

		</div>
		<!-- end: Input column -->

		<!-- Local usage -->
		<?php $current_tools_are_off = $mb->get_the_value(); ?>
		
	</div>
	<!-- end: Checkbox metabox -->
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Hide Titles', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('no_titles'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="no_titles" <?php $mb->the_checkbox_state('no_titles'); ?>/>

		</div>
		<!-- end: Input column -->

	</div>
	<!-- end: Checkbox metabox -->
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Hide Excerpts', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('no_excerpts'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="no_excerpts" <?php $mb->the_checkbox_state('no_excerpts'); ?>/>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Checkbox metabox -->
	
	<?php if ( ! $current_tools_are_off ) : ?>
	
	<!-- Metabox group title -->
	<h4><?php _e('Tools', 'haku'); ?></h4>
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Disable Search', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('no_search'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="no_search" <?php $mb->the_checkbox_state('no_search'); ?>/>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Checkbox metabox -->
	
	<?php endif; ?>
	
	<?php endif; ?>
	
	<!-- Metabox group title -->
	<h4><?php _e('Ordering', 'haku'); ?></h4>
	
	<!-- Select box metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Order items by:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('orderby'); ?>

			<select name="<?php $mb->the_name(); ?>">
				<option value="date" <?php $mb->the_select_state('date'); ?>><?php _e('Date', 'haku'); ?></option>
				<option value="ID" <?php $mb->the_select_state('ID'); ?>>ID</option>
				<option value="title" <?php $mb->the_select_state('title'); ?>><?php _e('Title', 'haku'); ?></option>
				<option value="rand" <?php $mb->the_select_state('rand'); ?>><?php _e('Random', 'haku'); ?></option>
				<option value="modified" <?php $mb->the_select_state('modified'); ?>><?php _e('Last modified date', 'haku'); ?></option>
			</select>

		</div>
		<!-- end: Input column -->

		<!-- Local usage -->
		<?php $is_current_order_random = ( $mb->get_the_value() == 'rand' ? true : false ); ?>
	
	</div>
	<!-- end: Select box metabox -->
	
	<?php if ( ! $is_current_order_random ) : ?>
	
	<!-- Select box metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Items order:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('order'); ?>

			<select name="<?php $mb->the_name(); ?>">
				<option value="DESC" <?php $mb->the_select_state('DESC'); ?>><?php _e('Descending', 'haku'); ?></option>
				<option value="ASC" <?php $mb->the_select_state('ASC'); ?>><?php _e('Ascending', 'haku'); ?></option>
			</select>

		</div>
		<!-- end: Input column -->
	
	</div>
	<!-- end: Select box metabox -->
	
	<?php endif; ?>
	
	<!-- Checkbox helper -->
	<?php $mb->the_field('_checkbox_helper'); ?>
	<input class="hidden" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	
</div>
<!-- end: Metabox container -->