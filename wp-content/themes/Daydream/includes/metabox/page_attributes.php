<!-- Metabox container -->
<div class="haku_metabox">
	
	<?php if ( ! isset( $_GET['post'] ) || ! meta_obtain('no_hero', '_dayd_page_attributes', $_GET['post'] ) ) : ?>
	
	<!-- Input text metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Page Headline', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('page_headline'); ?>

			<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	
		</div>
		<!-- end: Input column -->

	</div>
	<!-- end: Input text metabox -->
	
	<?php endif; ?>
		
	<?php if ( ! isset( $_GET['post'] ) || ! meta_obtain('no_sidebar', '_dayd_page_attributes', $_GET['post'] ) && haku_get_page_template( $_GET['post'] ) != 'showcase.php' ) : ?>
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Invert Sidebar Position', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('sidebar_invert'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="sidebar_invert" <?php $mb->the_checkbox_state('sidebar_invert'); ?>/>
	
		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Checkbox metabox -->
	
	<hr />
	
	<?php endif; ?>
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Hide Top Bar', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('no_hero'); ?>
	
			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="no_hero" <?php $mb->the_checkbox_state('no_hero'); ?>/>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Checkbox metabox -->
	
	<?php if ( ! isset( $_GET['post'] ) || haku_get_page_template( $_GET['post'] ) != 'showcase.php' ) : ?>
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Hide Sidebar', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('no_sidebar'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="no_sidebar" <?php $mb->the_checkbox_state('no_sidebar'); ?>/>

		</div>
		<!-- end: Input column -->
		
		<!-- Local usage -->
		<?php $no_sidebar = $mb->get_the_value(); ?>
		
	</div>
	<!-- end: Checkbox metabox -->
	
	<?php if ( ! $no_sidebar ) : ?>
	
	<!-- Checkbox metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Hide Submenu', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('no_submenu'); ?>

			<input type="checkbox" name="<?php $mb->the_name(); ?>" value="no_submenu" <?php $mb->the_checkbox_state('no_submenu'); ?>/>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Checkbox metabox -->
		
	<!-- Select box metabox -->
	<div class="haku_metabox_group">
		
		<!-- Info column -->
		<div class="aside">

			<label><?php _e('Sidebar:', 'haku'); ?></label>

		</div>
		<!-- end: Info column -->
		
		<!-- Input column -->
		<div class="section">

			<?php $mb->the_field('sidebar'); ?>

			<select name="<?php $mb->the_name(); ?>">
			
				<?php foreach ( haku_list_sidebars() as $sidebar ) : ?>
				
					<option value="<?php echo $sidebar; ?>" <?php $mb->the_select_state( $sidebar ); ?>><?php echo $sidebar; ?></option>
					
				<?php endforeach; ?>
				
			</select>

		</div>
		<!-- end: Input column -->
		
	</div>
	<!-- end: Select box metabox -->
		
	<?php endif; ?>
	
	<?php endif; ?>
	
	<!-- Checkbox helper -->
	<?php $mb->the_field('_checkbox_helper'); ?>

	<input class="hidden" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
	
</div>
<!-- end: Metabox container -->