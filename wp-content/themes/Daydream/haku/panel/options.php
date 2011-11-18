<!--
/*
 *  Haku Framework
 *  Handcrafted by Stefano Giliberti
 *  winterbits@gmail.com
 *  winterbits.com
 */
-->

<!-- Tab -->
<div class="section wb_haku_options" data-tab="<?php _e('General', 'haku'); ?>">
	
	<!-- Form -->
	<form id="wb_haku_options_form">

	<!-- Options header -->
	<h1><?php _e('Logo', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Logo Image', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Button -->						
			<button class="wb_haku_image_upload"><?php _e('Open Media Library', 'haku'); ?></button>
			
			<!-- Option desc -->
			<p><?php _e('Choose your image, then click "Insert into post" to apply it.', 'haku'); ?></p>
			
			<!-- Real input -->
			<input type="text" placeholder="http://" class="wb_haku_image_upload_field <?php haku_hidden('logo_image'); ?>" name="logo_image" value="<?php echo esc_url( get_theme_option('logo_image') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix" data-twin="plain_logo">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Use Plain Text Logo', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('use_plain_logo'); ?> name="use_plain_logo" type="checkbox" value="use_plain_logo" />
			
			<!-- Option desc -->
			<p><?php _e('Check this to use a plain text logo rather than an image.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix <?php haku_hidden('use_plain_logo'); ?>" data-twin="plain_logo">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Plain Logo Text', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Text input -->
			<input type="text" placeholder="<?php echo esc_attr( get_bloginfo('name') ); ?>" name="plain_logo_text" value="<?php echo esc_attr( get_theme_option('plain_logo_text') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Favourites Icon', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Button -->						
			<button class="wb_haku_image_upload"><?php _e('Open Media Library', 'haku'); ?></button>
			
			<!-- Option desc -->
			<p><?php _e('Choose your image, then click "Insert into post" to apply it.', 'haku'); ?></p>
			
			<!-- Real input -->
			<input type="text" placeholder="http://" class="wb_haku_image_upload_field <?php haku_hidden('favicon'); ?>" name="favicon" value="<?php echo esc_url( get_theme_option('favicon') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Default Headlines', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Title', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Text input -->
			<input type="text" name="default_title" value="<?php echo esc_attr( get_theme_option('default_title') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Heading', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Text input -->
			<input type="text" name="default_heading" value="<?php echo esc_attr( get_theme_option('default_heading') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Force Both', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('force_headlines'); ?> name="force_headlines" type="checkbox" value="force_headlines" />
			
			<!-- Option desc -->
			<p><?php _e('Check this if you want to display the chosen strings in all sections.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Footer Info', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Left Area', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Textarea -->
			<textarea name="footer_left_content"><?php echo esc_textarea( get_theme_option('footer_left_content') ); ?></textarea>
			
			<!-- Option desc -->
			<p><?php _e('The content displayed on the left side of the Footer.', 'haku'); ?> <?php _e('You can use Shortcodes.', 'haku'); ?> (<a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#shortcodesList" target="_blank">?</a>)</p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Twitter Link', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Text input -->
			<input type="text" name="footer_right_twitter" value="<?php echo esc_attr( get_theme_option('footer_right_twitter') ); ?>" />
			
			<!-- Option desc -->
			<p><?php printf( __('The url to your %s profile.', 'haku'), 'Twitter' ); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Facebook Link', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Text input -->
			<input type="text" name="footer_right_facebook" value="<?php echo esc_attr( get_theme_option('footer_right_facebook') ); ?>" />
			
			<!-- Option desc -->
			<p><?php printf( __('The url to your %s profile.', 'haku'), 'Facebook' ); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Analytics', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Tracking Code', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Textarea -->
			<textarea placeholder="&lt;script type=&quot;text/javascript&quot;&gt; ... &lt;/script&gt;" name="analytics_code"><?php echo esc_textarea( get_theme_option('analytics_code') ); ?></textarea>
			
			<!-- Option desc -->
			<p><?php _e('The Tracking Code of your favorite Analytics Web Service.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
</div>
<!-- end: Tab -->

<!-- Tab -->
<div class="section wb_haku_options" data-tab="<?php _e('Appearance', 'haku'); ?>">
	
	<!-- Options header -->
	<h1><?php _e('Main Theme', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Theme colour', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku radio list -->
			<div class="wb_haku_radiopic_list"></div>
			
			<!-- Real input -->
			<select name="theme" class="wb_haku_radiopic_select hidden">
				<option <?php haku_selected('theme', 'daydream'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_01.png" value="daydream"></option>
				<option <?php haku_selected('theme', 'orange'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_02.png" value="orange"></option>
				<option <?php haku_selected('theme', 'green'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_03.png" value="green"></option>
				<option <?php haku_selected('theme', 'red'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_04.png" value="red"></option>
				<option <?php haku_selected('theme', 'aqua'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_05.png" value="aqua"></option>
				<option <?php haku_selected('theme', 'grey'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_06.png" value="grey"></option>
				<option <?php haku_selected('theme', 'black'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_07.png" value="black"></option>
				<option <?php haku_selected('theme', 'pixels'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_08.png" value="pixels"></option>
				<option <?php haku_selected('theme', 'wood'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_09.png" value="wood"></option>
				<option <?php haku_selected('theme', 'rusted'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_10.png" value="rusted"></option>
				<option <?php haku_selected('theme', 'moss'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_11.png" value="moss"></option>
				<option <?php haku_selected('theme', 'asphalt'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_12.png" value="asphalt"></option>
				<option <?php haku_selected('theme', 'graphite'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_13.png" value="graphite"></option>
				<option <?php haku_selected('theme', 'linen'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/theme_14.png" value="linen"></option>
			</select>
			
			<!-- Option desc -->
			<p><?php printf( __('The main colour of your website. Switch to "%s" to customize the Menu Bar colour.', 'haku'), __('Styling', 'haku') ); ?></p>
		
		</div>
		<!-- end: Option -->

	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Patterns', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Primary', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku radio list -->
			<div class="wb_haku_radiopic_list"></div>
			
			<!-- Real input -->
			<select name="primary_pattern" class="wb_haku_radiopic_select hidden">
				<option <?php haku_selected('primary_pattern', '01'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_01.png" value="01"></option>
				<option <?php haku_selected('primary_pattern', '02'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_02.png" value="02"></option>
				<option <?php haku_selected('primary_pattern', '03'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_03.png" value="03"></option>
				<option <?php haku_selected('primary_pattern', '04'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_04.png" value="04"></option>
				<option <?php haku_selected('primary_pattern', '05'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_05.png" value="05"></option>
				<option <?php haku_selected('primary_pattern', '06'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_06.png" value="06"></option>
				<option <?php haku_selected('primary_pattern', '07'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_07.png" value="07"></option>
				<option <?php haku_selected('primary_pattern', '08'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_08.png" value="08"></option>
				<option <?php haku_selected('primary_pattern', '09'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_09.png" value="09"></option>
				<option <?php haku_selected('primary_pattern', '10'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_10.png" value="10"></option>
				<option <?php haku_selected('primary_pattern', '11'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_11.png" value="11"></option>
				<option <?php haku_selected('primary_pattern', '12'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_12.png" value="12"></option>
				<option <?php haku_selected('primary_pattern', '13'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_13.png" value="13"></option>
				<option <?php haku_selected('primary_pattern', '14'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_14.png" value="14"></option>
				<option <?php haku_selected('primary_pattern', '15'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_15.png" value="15"></option>
				<option <?php haku_selected('primary_pattern', '16'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_16.png" value="16"></option>
				<option <?php haku_selected('primary_pattern', '17'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_17.png" value="17"></option>
				<option <?php haku_selected('primary_pattern', '18'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_18.png" value="18"></option>
				<option <?php haku_selected('primary_pattern', '19'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_19.png" value="19"></option>
				<option <?php haku_selected('primary_pattern', '20'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_20.png" value="20"></option>
				<option <?php haku_selected('primary_pattern', '21'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_21.png" value="21"></option>
				<option <?php haku_selected('primary_pattern', '22'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_22.png" value="22"></option>
				<option <?php haku_selected('primary_pattern', '23'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_23.png" value="23"></option>
				<option <?php haku_selected('primary_pattern', '24'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_24.png" value="24"></option>
				<option <?php haku_selected('primary_pattern', '25'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_25.png" value="25"></option>
			</select>
			
			<!-- Option desc -->
			<p><?php _e('This pattern will be applied to the "Hero" block, where the Slider and Page Titles are placed by default.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->

	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option -->
		<div>
			
			<!-- Button -->						
			<button class="wb_haku_image_upload"><?php _e('Open Media Library', 'haku'); ?></button>
			
			<!-- Option desc -->
			<p><?php _e('Choose a custom pattern image, then click "Insert into post" to apply it.', 'haku'); ?></p>
			
			<!-- Real input -->
			<input type="text" placeholder="http://" class="wb_haku_image_upload_field <?php haku_hidden('custom_primary_pattern'); ?>" name="custom_primary_pattern" value="<?php echo esc_url( get_theme_option('custom_primary_pattern') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Secondary', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku radio list -->
			<div class="wb_haku_radiopic_list"></div>
			
			<!-- Real input -->
			<select name="secondary_pattern" class="wb_haku_radiopic_select hidden">
				<option <?php haku_selected('secondary_pattern', '01'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_01.png" value="01"></option>
				<option <?php haku_selected('secondary_pattern', '02'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_02.png" value="02"></option>
				<option <?php haku_selected('secondary_pattern', '03'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_03.png" value="03"></option>
				<option <?php haku_selected('secondary_pattern', '04'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_04.png" value="04"></option>
				<option <?php haku_selected('secondary_pattern', '05'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_05.png" value="05"></option>
				<option <?php haku_selected('secondary_pattern', '06'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_06.png" value="06"></option>
				<option <?php haku_selected('secondary_pattern', '07'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_07.png" value="07"></option>
				<option <?php haku_selected('secondary_pattern', '08'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_08.png" value="08"></option>
				<option <?php haku_selected('secondary_pattern', '09'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_09.png" value="09"></option>
				<option <?php haku_selected('secondary_pattern', '10'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_10.png" value="10"></option>
				<option <?php haku_selected('secondary_pattern', '11'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_11.png" value="11"></option>
				<option <?php haku_selected('secondary_pattern', '12'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_12.png" value="12"></option>
				<option <?php haku_selected('secondary_pattern', '13'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_13.png" value="13"></option>
				<option <?php haku_selected('secondary_pattern', '14'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_14.png" value="14"></option>
				<option <?php haku_selected('secondary_pattern', '15'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_15.png" value="15"></option>
				<option <?php haku_selected('secondary_pattern', '16'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_16.png" value="16"></option>
				<option <?php haku_selected('secondary_pattern', '17'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_17.png" value="17"></option>
				<option <?php haku_selected('secondary_pattern', '18'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_18.png" value="18"></option>
				<option <?php haku_selected('secondary_pattern', '19'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_19.png" value="19"></option>
				<option <?php haku_selected('secondary_pattern', '20'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_20.png" value="20"></option>
				<option <?php haku_selected('secondary_pattern', '21'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_21.png" value="21"></option>
				<option <?php haku_selected('secondary_pattern', '22'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_22.png" value="22"></option>
				<option <?php haku_selected('secondary_pattern', '23'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_23.png" value="23"></option>
				<option <?php haku_selected('secondary_pattern', '24'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_24.png" value="24"></option>
				<option <?php haku_selected('secondary_pattern', '25'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_25.png" value="25"></option>
			</select>
			
			<!-- Option desc -->
			<p><?php _e('This pattern will be applied to the "Tools" area and to some secondary elements.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->

	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option -->
		<div>
			
			<!-- Button -->						
			<button class="wb_haku_image_upload"><?php _e('Open Media Library', 'haku'); ?></button>
			
			<!-- Option desc -->
			<p><?php _e('Choose a custom pattern image, then click "Insert into post" to apply it.', 'haku'); ?></p>
			
			<!-- Real input -->
			<input type="text" placeholder="http://" class="wb_haku_image_upload_field <?php haku_hidden('custom_secondary_pattern'); ?>" name="custom_secondary_pattern" value="<?php echo esc_url( get_theme_option('custom_secondary_pattern') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Tertiary', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku radio list -->
			<div class="wb_haku_radiopic_list"></div>
			
			<!-- Real input -->
			<select name="tertiary_pattern" class="wb_haku_radiopic_select hidden">
				<option <?php haku_selected('tertiary_pattern', '01'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_01.png" value="01"></option>
				<option <?php haku_selected('tertiary_pattern', '02'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_02.png" value="02"></option>
				<option <?php haku_selected('tertiary_pattern', '03'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_03.png" value="03"></option>
				<option <?php haku_selected('tertiary_pattern', '04'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_04.png" value="04"></option>
				<option <?php haku_selected('tertiary_pattern', '05'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_05.png" value="05"></option>
				<option <?php haku_selected('tertiary_pattern', '06'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_06.png" value="06"></option>
				<option <?php haku_selected('tertiary_pattern', '07'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_07.png" value="07"></option>
				<option <?php haku_selected('tertiary_pattern', '08'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_08.png" value="08"></option>
				<option <?php haku_selected('tertiary_pattern', '09'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_09.png" value="09"></option>
				<option <?php haku_selected('tertiary_pattern', '10'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_10.png" value="10"></option>
				<option <?php haku_selected('tertiary_pattern', '11'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_11.png" value="11"></option>
				<option <?php haku_selected('tertiary_pattern', '12'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_12.png" value="12"></option>
				<option <?php haku_selected('tertiary_pattern', '13'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_13.png" value="13"></option>
				<option <?php haku_selected('tertiary_pattern', '14'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_14.png" value="14"></option>
				<option <?php haku_selected('tertiary_pattern', '15'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_15.png" value="15"></option>
				<option <?php haku_selected('tertiary_pattern', '16'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_16.png" value="16"></option>
				<option <?php haku_selected('tertiary_pattern', '17'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_17.png" value="17"></option>
				<option <?php haku_selected('tertiary_pattern', '18'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_18.png" value="18"></option>
				<option <?php haku_selected('tertiary_pattern', '19'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_19.png" value="19"></option>
				<option <?php haku_selected('tertiary_pattern', '20'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_20.png" value="20"></option>
				<option <?php haku_selected('tertiary_pattern', '21'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_21.png" value="21"></option>
				<option <?php haku_selected('tertiary_pattern', '22'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_22.png" value="22"></option>
				<option <?php haku_selected('tertiary_pattern', '23'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_23.png" value="23"></option>
				<option <?php haku_selected('tertiary_pattern', '24'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_24.png" value="24"></option>
				<option <?php haku_selected('tertiary_pattern', '25'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/pattern_25.png" value="25"></option>
			</select>
			
			<!-- Option desc -->
			<p><?php _e('This pattern will be applied to Footer.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->

	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option -->
		<div>
			
			<!-- Button -->						
			<button class="wb_haku_image_upload"><?php _e('Open Media Library', 'haku'); ?></button>
			
			<!-- Option desc -->
			<p><?php _e('Choose a custom pattern image, then click "Insert into post" to apply it.', 'haku'); ?></p>
			
			<!-- Real input -->
			<input type="text" placeholder="http://" class="wb_haku_image_upload_field <?php haku_hidden('custom_tertiary_pattern'); ?>" name="custom_tertiary_pattern" value="<?php echo esc_url( get_theme_option('custom_tertiary_pattern') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
</div>
<!-- end: Tab -->

<!-- Tab -->
<div class="section wb_haku_options" data-tab="<?php _e('Slider Area', 'haku'); ?>">
	
	<!-- Options header -->
	<h1><?php _e('Hero Content', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix" data-twin="hero_custom">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Use Custom Content', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('hero_custom'); ?> name="hero_custom" type="checkbox" value="hero_custom" />
			
			<!-- Option desc -->
			<p><?php _e('Check this to replace the Slider with custom content.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix <?php haku_hidden('hero_custom'); ?>" data-twin="hero_custom">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Content', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Textarea -->
			<textarea name="hero_content"><?php echo esc_textarea( get_theme_option('hero_content') ); ?></textarea>
			
			<!-- Option desc -->
			<p><?php _e('Paragraphs are added automatically.', 'haku'); ?> <?php _e('You can use Shortcodes.', 'haku'); ?> (<a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#shortcodesList" target="_blank">?</a>)</p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Slider', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Slider', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku select box -->
			<select name="slider" class="chzn-select">
				<option <?php haku_selected('slider', ''); ?> value=""><?php _e('None', 'haku'); ?></option>
				<option <?php haku_selected('slider', 'jcycle'); ?> value="jcycle">Daydream Slider</option>
				<option <?php haku_selected('slider', 'nivoslider'); ?> value="nivoslider">Nivo Slider</option>
				<option <?php haku_selected('slider', 'orbit'); ?> value="orbit">Orbit Slider</option>
			</select>
			
			<!-- Option desc -->
			<p><?php _e('Choose your favorite Homepage Slider.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Images Height', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="1" data-max="1000" data-step="1"></div>
			<span class="wb_haku_slider_tip"><?php echo get_theme_option('slider_height'); ?> pixels</span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="slider_height" value="<?php echo esc_attr( get_theme_option('slider_height') ); ?>" />
			
			<!-- Option desc -->
			<p><?php _e('This setting only covers the Sliders that require a fixed height like the Nivo Slider and the Orbit Slider.', 'haku'); ?> <?php _e('After changing this value you must rebuild the WordPress Thumbnails using an external WordPress plugin.', 'haku'); ?> (<a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#thumbnails" target="_blank">?</a>)</p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Transition Speed', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="50" data-max="5000" data-step="50"></div>
			<span class="wb_haku_slider_tip" data-label="<?php echo esc_attr( strtolower( __('milliseconds', 'haku') ) ); ?>"><?php echo get_theme_option('slider_speed'); ?> <?php echo strtolower( __('milliseconds', 'haku') ); ?></span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="slider_speed" value="<?php echo esc_attr( get_theme_option('slider_speed') ); ?>" />
			
			<!-- Option desc -->
			<p><?php _e('The transition speed between slides.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Daydream Slider', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Transition Effect', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku select box -->
			<select name="jcycle_fx" class="chzn-select">
				<option <?php haku_selected('jcycle_fx', 'fade'); ?> value="fade"><?php _e('Fade', 'haku'); ?></option>
				<option <?php haku_selected('jcycle_fx', 'scrollUp'); ?> value="scrollUp"><?php _e('Scroll Up', 'haku'); ?></option>
				<option <?php haku_selected('jcycle_fx', 'scrollDown'); ?> value="scrollDown"><?php _e('Scroll Down', 'haku'); ?></option>
				<option <?php haku_selected('jcycle_fx', 'scrollLeft'); ?> value="scrollLeft"><?php _e('Scroll Left', 'haku'); ?></option>
				<option <?php haku_selected('jcycle_fx', 'scrollRight'); ?> value="scrollRight"><?php _e('Scroll Right', 'haku'); ?></option>
				<option <?php haku_selected('jcycle_fx', 'scrollHorz'); ?> value="scrollHorz"><?php _e('Scroll Horizontally', 'haku'); ?></option>
				<option <?php haku_selected('jcycle_fx', 'scrollVert'); ?> value="scrollVert"><?php _e('Scroll Vertically', 'haku'); ?></option>
			</select>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Animation Easing', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku select box -->
			<select name="jcycle_easing" class="chzn-select">
				<option <?php haku_selected('jcycle_easing', 'easeInOutQuad'); ?> value="easeInOutQuad">Quad</option>
				<option <?php haku_selected('jcycle_easing', 'easeOutCubic'); ?> value="easeOutCubic">Cubic</option>
				<option <?php haku_selected('jcycle_easing', 'easeInOutQuart'); ?> value="easeInOutQuart">Quart</option>
				<option <?php haku_selected('jcycle_easing', 'easeInOutQuint'); ?> value="easeInOutQuint">Quint</option>
				<option <?php haku_selected('jcycle_easing', 'easeInOutSine'); ?> value="easeInOutSine">Sine</option>
				<option <?php haku_selected('jcycle_easing', 'easeInOutExpo'); ?> value="easeInOutExpo">Expo</option>
				<option <?php haku_selected('jcycle_easing', 'easeInOutCirc'); ?> value="easeInOutCirc">Circ</option>
				<option <?php haku_selected('jcycle_easing', 'easeInOutElastic'); ?> value="easeInOutElastic">Elastic</option>
				<option <?php haku_selected('jcycle_easing', 'easeInOutBack'); ?> value="easeInOutBack">Back</option>
				<option <?php haku_selected('jcycle_easing', 'easeInOutBounce'); ?> value="easeInOutBounce">Bounce</option>
			</select>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Timeout', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="0" data-max="10000" data-step="500"></div>
			<span class="wb_haku_slider_tip" data-label="<?php echo esc_attr( strtolower( __('milliseconds', 'haku') ) ); ?>"><?php echo get_theme_option('jcycle_timeout'); ?> <?php echo strtolower( __('milliseconds', 'haku') ); ?></span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="jcycle_timeout" value="<?php echo esc_attr( get_theme_option('jcycle_timeout') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Nivo Slider', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Transition Effect', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku select box -->
			<select name="nivoslider_fx" class="chzn-select">
				<option <?php haku_selected('nivoslider_fx', 'random'); ?> value="random"><?php _e('Random', 'haku'); ?></option>
				<option <?php haku_selected('nivoslider_fx', 'fold'); ?> value="fold"><?php _e('Fold', 'haku'); ?></option>
				<option <?php haku_selected('nivoslider_fx', 'sliceDown'); ?> value="sliceDown"><?php _e('Slice Down', 'haku'); ?></option>
			</select>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Slices', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="2" data-max="50" data-step="1"></div>
			<span class="wb_haku_slider_tip" data-label="<?php echo esc_attr( strtolower( __('Slices', 'haku') ) ); ?>"><?php echo get_theme_option('nivoslider_slices'); ?> <?php echo strtolower( __('Slices', 'haku') ); ?></span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="nivoslider_slices" value="<?php echo esc_attr( get_theme_option('nivoslider_slices') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Box Columns', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="2" data-max="50" data-step="1"></div>
			<span class="wb_haku_slider_tip" data-label="<?php echo esc_attr( strtolower( __('columns', 'haku') ) ); ?>"><?php echo get_theme_option('nivoslider_boxcols'); ?> <?php echo strtolower( __('columns', 'haku') ); ?></span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="nivoslider_boxcols" value="<?php echo esc_attr( get_theme_option('nivoslider_boxcols') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Box Rows', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="2" data-max="50" data-step="1"></div>
			<span class="wb_haku_slider_tip" data-label="<?php echo esc_attr( strtolower( __('rows', 'haku') ) ); ?>"><?php echo get_theme_option('nivoslider_boxrows'); ?> <?php echo strtolower( __('rows', 'haku') ); ?></span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="nivoslider_boxrows" value="<?php echo esc_attr( get_theme_option('nivoslider_boxrows') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Pause Time', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="1500" data-max="10000" data-step="500"></div>
			<span class="wb_haku_slider_tip" data-label="<?php echo esc_attr( strtolower( __('milliseconds', 'haku') ) ); ?>"><?php echo get_theme_option('nivoslider_pausetime'); ?> <?php echo strtolower( __('milliseconds', 'haku') ); ?></span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="nivoslider_pausetime" value="<?php echo esc_attr( get_theme_option('nivoslider_pausetime') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Captions Opacity', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="0" data-max="1" data-step="0.1"></div>
			<span class="wb_haku_slider_tip" data-label="&nbsp;"><?php echo get_theme_option('nivoslider_captionopacity'); ?></span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="nivoslider_captionopacity" value="<?php echo esc_attr( get_theme_option('nivoslider_captionopacity') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Orbit Slider', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Transition Effect', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku select box -->
			<select name="orbit_fx" class="chzn-select">
				<option <?php haku_selected('orbit_fx', 'fade'); ?> value="fade"><?php _e('Fade', 'haku'); ?></option>
				<option <?php haku_selected('orbit_fx', 'horizontal-slide'); ?> value="horizontal-slide"><?php _e('Horizontal Slide', 'haku'); ?></option>
				<option <?php haku_selected('orbit_fx', 'vertical-slide'); ?> value="vertical-slide"><?php _e('Vertical Slide', 'haku'); ?></option>
				<option <?php haku_selected('orbit_fx', 'horizontal-push'); ?> value="horizontal-push"><?php _e('Horizontal Push', 'haku'); ?></option>
			</select>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Timer', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('orbit_timer'); ?> name="orbit_timer" type="checkbox" value="orbit_timer" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Captions Effect', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku select box -->
			<select name="orbit_cap_fx" class="chzn-select">
				<option <?php haku_selected('orbit_cap_fx', 'fade'); ?> value="fade"><?php _e('Fade', 'haku'); ?></option>
				<option <?php haku_selected('orbit_cap_fx', 'slideOpen'); ?> value="slideOpen"><?php _e('Slide', 'haku'); ?></option>
				<option <?php haku_selected('orbit_cap_fx', 'none'); ?> value="none"><?php _e('None', 'haku'); ?></option>
			</select>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Captions Speed', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="50" data-max="5000" data-step="50"></div>
			<span class="wb_haku_slider_tip" data-label="<?php echo esc_attr( strtolower( __('milliseconds', 'haku') ) ); ?>"><?php echo get_theme_option('orbit_cap_fx_speed'); ?> <?php echo strtolower( __('milliseconds', 'haku') ); ?></span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="orbit_cap_fx_speed" value="<?php echo esc_attr( get_theme_option('orbit_cap_fx_speed') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Advance Speed', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="50" data-max="10000" data-step="500"></div>
			<span class="wb_haku_slider_tip" data-label="<?php echo esc_attr( strtolower( __('milliseconds', 'haku') ) ); ?>"><?php echo get_theme_option('orbit_advancespeed'); ?> <?php echo strtolower( __('milliseconds', 'haku') ); ?></span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="orbit_advancespeed" value="<?php echo esc_attr( get_theme_option('orbit_advancespeed') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option notice -->
	<span class="wb_haku_notice"><?php printf( __('Switch to the "%s" section to start managing Slides!', 'haku'), '<strong>' . __('Slides', 'haku') . '</strong>' ); ?></span>
	
</div>
<!-- end: Tab -->

<!-- Tab -->
<div class="section wb_haku_options" data-tab="<?php _e('Styling', 'haku'); ?>">
	
	<!-- Options header -->
	<h1><?php _e('Fonts', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Headings Font', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku select box -->
			<select name="google_webfont" class="chzn-select">
				<option <?php haku_selected('google_webfont', 'Droid+Sans:400,700'); ?> value="Droid+Sans:400,700">Droid Sans</option>
				<option <?php haku_selected('google_webfont', 'Droid+Serif:700,400,400italic,700italic'); ?> value="Droid+Serif:700,400,400italic,700italic">Droid Serif</option>
				<option <?php haku_selected('google_webfont', 'Open+Sans:400italic,700italic,300italic,600italic,300,400,600,700'); ?> value="Open+Sans:400italic,700italic,300italic,600italic,300,400,600,700">Open Sans</option>
				<option <?php haku_selected('google_webfont', 'PT+Sans:400italic,400,700,700italic'); ?> value="PT+Sans:400italic,400,700,700italic">PT Sans</option>
				<option <?php haku_selected('google_webfont', 'Lobster'); ?> value="Lobster">Lobster</option>
				<option <?php haku_selected('google_webfont', 'Yanone+Kaffeesatz:300,400,700'); ?> value="Yanone+Kaffeesatz:300,400,700">Yanone Kaffeesatz</option>
				<option <?php haku_selected('google_webfont', 'Arvo:700,400italic,700italic,400'); ?> value="Arvo:700,400italic,700italic,400">Arvo</option>
				<option <?php haku_selected('google_webfont', 'Oswald'); ?> value="Oswald">Oswald</option>
				<option <?php haku_selected('google_webfont', 'The+Girl+Next+Door'); ?> value="The+Girl+Next+Door">The Girl Next Door</option>
				<option <?php haku_selected('google_webfont', 'Ubuntu:700italic,300,700,400italic,300italic,400'); ?> value="Ubuntu:700italic,300,700,400italic,300italic,400">Ubuntu</option>
				<option <?php haku_selected('google_webfont', 'Pacifico'); ?> value="Pacifico">Pacifico</option>
				<option <?php haku_selected('google_webfont', 'Copse'); ?> value="Copse">Copse</option>
				<option <?php haku_selected('google_webfont', 'Rock+Salt'); ?> value="Rock+Salt">Rock Salt</option>
				<option <?php haku_selected('google_webfont', 'Nobile:400,400italic,700,700italic'); ?> value="Nobile:400,400italic,700,700italic">Nobile</option>
				<option <?php haku_selected('google_webfont', 'Cherry+Cream+Soda'); ?> value="Cherry+Cream+Soda">Cherry Cream Soda</option>
				<option <?php haku_selected('google_webfont', 'Cabin+Sketch:700'); ?> value="Cabin+Sketch:700">Cabin Sketch</option>
				<option <?php haku_selected('google_webfont', 'Molengo'); ?> value="Molengo">Molengo</option>
				<option <?php haku_selected('google_webfont', 'Chewy'); ?> value="Chewy">Chewy</option>
				<option <?php haku_selected('google_webfont', 'Lato'); ?> value="Lato">Lato</option>
				<option <?php haku_selected('google_webfont', 'PT+Sans+Narrow:400,700'); ?> value="PT+Sans+Narrow:400,700">PT Sans Narrow</option>
				<option <?php haku_selected('google_webfont', 'Goudy+Bookletter+1911'); ?> value="Goudy+Bookletter+1911">Goudy Bookletter 1911</option>
				<option <?php haku_selected('google_webfont', 'Cantarell:700,400,400italic,700italic'); ?> value="Cantarell:700,400,400italic,700italic">Cantarell</option>
				<option <?php haku_selected('google_webfont', 'Arimo:700italic,400italic,400,700'); ?> value="Arimo:700italic,400italic,400,700">Arimo</option>
				<option <?php haku_selected('google_webfont', 'Cabin:700,400,600,700italic,400italic,600italic'); ?> value="Cabin:700,400,600,700italic,400italic,600italic">Cabin</option>
				<option <?php haku_selected('google_webfont', 'Vollkorn:700italic,400italic,400,700'); ?> value="Vollkorn:700italic,400italic,400,700">Vollkorn</option>
				<option <?php haku_selected('google_webfont', 'Cuprum'); ?> value="Cuprum">Cuprum</option>
				<option <?php haku_selected('google_webfont', 'Terminal+Dosis+Light'); ?> value="Terminal+Dosis+Light">Terminal Dosis Light</option>
				<option <?php haku_selected('google_webfont', 'Crimson+Text:400,400italic,600,600italic,700,700italic'); ?> value="Crimson+Text:400,400italic,600,600italic,700,700italic">Crimson Text</option>
				<option <?php haku_selected('google_webfont', 'Nunito:300,400,700'); ?> value="Nunito:300,400,700">Nunito</option>
				<option <?php haku_selected('google_webfont', 'Maven+Pro:400,500,700'); ?> value="Maven+Pro:400,500,700">Maven Pro</option>
				<option <?php haku_selected('google_webfont', 'Neucha'); ?> value="Neucha">Neucha</option>
				<option <?php haku_selected('google_webfont', 'Syncopate:700,400'); ?> value="Syncopate:700,400">Syncopate</option>
				<option <?php haku_selected('google_webfont', 'Inconsolata'); ?> value="Inconsolata">Inconsolata</option>
				<option <?php haku_selected('google_webfont', 'Neuton:400,400italic'); ?> value="Neuton:400,400italic">Neuton</option>
				<option <?php haku_selected('google_webfont', 'Allerta'); ?> value="Allerta">Allerta</option>
				<option <?php haku_selected('google_webfont', 'Didact+Gothic'); ?> value="Didact+Gothic">Didact Gothic</option>
				<option <?php haku_selected('google_webfont', 'Tinos:400italic,700,400,700italic'); ?> value="Tinos:400italic,700,400,700italic">Tinos</option>
				<option <?php haku_selected('google_webfont', 'Amaranth:400,400italic,700,700italic'); ?> value="Amaranth:400,400italic,700,700italic">Amaranth</option>
				<option <?php haku_selected('google_webfont', 'PT+Sans+Caption:400,700'); ?> value="PT+Sans+Caption:400,700">PT Sans Caption</option>
				<option <?php haku_selected('google_webfont', 'Mako'); ?> value="Mako">Mako</option>
				<option <?php haku_selected('google_webfont', 'Puritan:700italic,700,400italic,400'); ?> value="Puritan:700italic,700,400italic,400">Puritan</option>
				<option <?php haku_selected('google_webfont', 'Play:400,700'); ?> value="Play:400,700">Play</option>
				<option <?php haku_selected('google_webfont', 'Muli:400,300,300italic,400italic'); ?> value="Muli:400,300,300italic,400italic">Muli</option>
				<option <?php haku_selected('google_webfont', 'Rokkitt:700,400'); ?> value="Rokkitt:700,400">Rokkitt</option>
				<option <?php haku_selected('google_webfont', 'News+Cycle'); ?> value="News+Cycle">News Cycle</option>
				<option <?php haku_selected('google_webfont', 'Metrophobic'); ?> value="Metrophobic">Metrophobic</option>
				<option <?php haku_selected('google_webfont', 'Abel'); ?> value="Abel">Abel</option>
				<option <?php haku_selected('google_webfont', 'Istok+Web:700italic,400,700,400italic'); ?> value="Istok+Web:700italic,400,700,400italic">Istok Web</option>
				<option <?php haku_selected('google_webfont', 'Varela'); ?> value="Varela">Varela</option>
				<option <?php haku_selected('google_webfont', 'Quattrocento+Sans'); ?> value="Quattrocento+Sans">Quattrocento Sans</option>
				<option <?php haku_selected('google_webfont', 'Shanti'); ?> value="Shanti">Shanti</option>
				<option <?php haku_selected('google_webfont', 'Days+One'); ?> value="Days+One">Days One</option>
				<option <?php haku_selected('google_webfont', 'Varela+Round'); ?> value="Varela+Round">Varela+Round</option>
				<option <?php haku_selected('google_webfont', 'Leckerli+One'); ?> value="Leckerli+One">Leckerli One</option>
				<option <?php haku_selected('google_webfont', 'Questrial'); ?> value="Questrial">Questrial</option>
				<option <?php haku_selected('google_webfont', 'Actor'); ?> value="Actor">Actor</option>
				<option <?php haku_selected('google_webfont', 'Unna'); ?> value="Unna">Unna</option>
				<option <?php haku_selected('google_webfont', 'Vidaloka'); ?> value="Vidaloka">Vidaloka</option>
				<option <?php haku_selected('google_webfont', 'Hammersmith+One'); ?> value="Hammersmith+One">Hammersmith One</option>
			</select>
			
			<!-- Option desc -->
			<p><?php printf( __('Choose a %sGoogle Web Font%s to apply on the Headings.', 'haku'), '<strong>', '</strong>' ); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Body Font', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku select box -->
			<select name="font_family" class="chzn-select">
				<option <?php haku_selected('font_family', '"HelveticaNeue", "Helvetica-Neue", "Helvetica Neue", Helvetica, Arial, sans-serif'); ?> value='"HelveticaNeue", "Helvetica-Neue", "Helvetica Neue", Helvetica, Arial, sans-serif'>Helvetica Neue</option> 
				<option <?php haku_selected('font_family', 'Helvetica, Arial, sans-serif'); ?> value='Helvetica, Arial, sans-serif'>Helvetica</option> 
				<option <?php haku_selected('font_family', 'Arial, Helvetica, sans-serif'); ?> value='Arial, Helvetica, sans-serif'>Arial</option>
				<option <?php haku_selected('font_family', 'Baskerville, "Times New Roman", Times, serif'); ?> value='Baskerville, "Times New Roman", Times, serif'>Baskerville</option>
				<option <?php haku_selected('font_family', 'Cambria, Georgia, Times, "Times New Roman", serif'); ?> value='Cambria, Georgia, Times, "Times New Roman", serif'>Cambria</option>
				<option <?php haku_selected('font_family', '"Century Gothic", "Apple Gothic", sans-serif'); ?> value='"Century Gothic", "Apple Gothic", sans-serif'>Century Gothic</option>
				<option <?php haku_selected('font_family', 'Consolas, "Lucida Console", Monaco, monospace'); ?> value='Consolas, "Lucida Console", Monaco, monospace'>Consolas</option>
				<option <?php haku_selected('font_family', '"Copperplate Light", "Copperplate Gothic Light", serif'); ?> value='"Copperplate Light", "Copperplate Gothic Light", serif'>Copperlate Light</option>
				<option <?php haku_selected('font_family', '"Courier New", Courier, monospace'); ?> value='"Courier New", Courier, monospace'>Courier New</option>
				<option <?php haku_selected('font_family', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif'); ?> value='"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif'>Franklin Gothic Medium</option>
				<option <?php haku_selected('font_family', 'Futura, "Century Gothic", AppleGothic, sans-serif'); ?> value='Futura, "Century Gothic", AppleGothic, sans-serif'>Futura</option>
				<option <?php haku_selected('font_family', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif'); ?> value='Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif'>Geneva</option>
				<option <?php haku_selected('font_family', 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif'); ?> value='Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif'>Georgia</option>
				<option <?php haku_selected('font_family', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif'); ?> value='"Gill Sans", Calibri, "Trebuchet MS", sans-serif'>Gill Sans</option>
				<option <?php haku_selected('font_family', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif'); ?> value='Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif'>Impact</option>
				<option <?php haku_selected('font_family', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif'); ?> value='"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif'>Lucida Sans</option>
				<option <?php haku_selected('font_family', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif'); ?> value='Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif'>Palatino</option>
				<option <?php haku_selected('font_family', 'Tahoma, Geneva, Verdana'); ?> value='Tahoma, Geneva, Verdana'>Tahoma</option>
				<option <?php haku_selected('font_family', 'Times, "Times New Roman", Georgia, serif'); ?> value='Times, "Times New Roman", Georgia, serif'>Times</option>
				<option <?php haku_selected('font_family', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif'); ?> value='"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif'>Trebuchet MS</option>
				<option <?php haku_selected('font_family', 'Verdana, Geneva, Tahoma, sans-serif'); ?> value='Verdana, Geneva, Tahoma, sans-serif'>Verdana</option>
			</select>
			
			<!-- Option desc -->
			<p><?php _e('Choose a font to use on normal text.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Menu Bar', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix" data-twin="custom_menu_bar">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Customize Menu Bar', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('custom_menu_bar'); ?> name="custom_menu_bar" type="checkbox" value="custom_menu_bar" />
			
			<!-- Option desc -->
			<p><?php _e('Check this if you want to customize the Menu Bar.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix <?php haku_hidden('custom_menu_bar'); ?>" data-twin="custom_menu_bar">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Height', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="20" data-max="150" data-step="1"></div>
			<span class="wb_haku_slider_tip"><?php echo get_theme_option('menu_bar_height'); ?> pixels</span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="menu_bar_height" value="<?php echo esc_attr( get_theme_option('menu_bar_height') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix <?php haku_hidden('custom_menu_bar'); ?>" data-twin="custom_menu_bar">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Background', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Button -->						
			<button class="wb_haku_image_upload"><?php _e('Open Media Library', 'haku'); ?></button>
			
			<!-- Option desc -->
			<p><?php _e('Choose your image, then click "Insert into post" to apply it.', 'haku'); ?></p>
			
			<!-- Real input -->
			<input type="text" placeholder="http://" class="wb_haku_image_upload_field <?php haku_hidden('menu_bar_background'); ?>" name="menu_bar_background" value="<?php echo esc_url( get_theme_option('menu_bar_background') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix <?php haku_hidden('custom_menu_bar'); ?>" data-twin="custom_menu_bar">
		
		<!-- Option -->
		<div>
			
			<!-- Picker -->
			<a href="#" class="wb_haku_picker"></a>
			
			<!-- Real input -->
			<input type="text" name="menu_bar_colour" class="hidden" value="<?php echo esc_attr( get_theme_option('menu_bar_colour') ); ?>" />
			
			<!-- Option desc -->
			<p><?php _e('Choose a plain colour to apply on the Menu Bar.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix <?php haku_hidden('custom_menu_bar'); ?>" data-twin="custom_menu_bar">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Text Size', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="11" data-max="20" data-step="1"></div>
			<span class="wb_haku_slider_tip"><?php echo get_theme_option('menu_bar_text_size'); ?> pixels</span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="menu_bar_text_size" value="<?php echo esc_attr( get_theme_option('menu_bar_text_size') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Body', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Text Colour', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Picker -->
			<a href="#" class="wb_haku_picker"></a>
			
			<!-- Real input -->
			<input type="text" name="body_color" class="hidden" value="<?php echo esc_attr( get_theme_option('body_color') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Background Colour', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Picker -->
			<a href="#" class="wb_haku_picker"></a>
			
			<!-- Real input -->
			<input type="text" name="background_color" class="hidden" value="<?php echo esc_attr( get_theme_option('background_color') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Headings Colour', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Picker -->
			<a href="#" class="wb_haku_picker"></a>
			
			<!-- Real input -->
			<input type="text" name="headings_color" class="hidden" value="<?php echo esc_attr( get_theme_option('headings_color') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->

	<!-- Options header -->
	<h1><?php _e('Links', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Standby Colour', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Picker -->
			<a href="#" class="wb_haku_picker"></a>
			
			<!-- Real input -->
			<input type="text" name="links_color" class="hidden" value="<?php echo esc_attr( get_theme_option('links_color') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Mouseover Colour', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Picker -->
			<a href="#" class="wb_haku_picker"></a>
			
			<!-- Real input -->
			<input type="text" name="links_hover_color" class="hidden" value="<?php echo esc_attr( get_theme_option('links_hover_color') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Showcase', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Filter Tags Colour', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Picker -->
			<a href="#" class="wb_haku_picker"></a>
			
			<!-- Real input -->
			<input type="text" name="filter_tags_color" class="hidden" value="<?php echo esc_attr( get_theme_option('filter_tags_color') ); ?>" />
			
			<!-- Option desc -->
			<p><?php _e('The background colour of the Filtering Tags links.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Direct Styling', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('CSS Code', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Textarea -->
			<textarea placeholder="h1 { font-size: <?php echo rand( 1, 100 ); ?>px; }" name="css_code"><?php echo esc_textarea( get_theme_option('css_code') ); ?></textarea>
			
			<!-- Option desc -->
			<p><?php _e('You can paste here any CSS code and it will be automatically applied to the theme.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
</div>
<!-- end: Tab -->

<!-- Tab -->
<div class="section wb_haku_options" data-tab="<?php _e('Layout', 'haku'); ?>">
	
	<!-- Options header -->
	<h1><?php _e('Structure', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Pages Layout', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku radio list -->
			<div class="wb_haku_radiopic_list"></div>
			
			<!-- Real input -->
			<select name="default_sidebar_align" class="wb_haku_radiopic_select hidden">
				<option <?php haku_selected('default_sidebar_align', 'left'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/layout_01.png" value="left"></option>
				<option <?php haku_selected('default_sidebar_align', 'right'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/layout_02.png" value="right"></option>
			</select>
			
			<!-- Option desc -->
			<p><?php _e('The default pages layout. You can customize each page settings in the edit mode.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Header Layout', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku radio list -->
			<div class="wb_haku_radiopic_list"></div>
			
			<!-- Real input -->
			<select name="header_layout" class="wb_haku_radiopic_select hidden">
				<option <?php haku_selected('header_layout', 'classic'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/layout_03.png" value="classic"></option>
				<option <?php haku_selected('header_layout', 'invert'); ?> data-radiopic="<?php echo get_haku_var('panel_uri'); ?>/images/layout_04.png" value="invert"></option>
			</select>
			
			<!-- Option desc -->
			<p><?php _e('By default, the Logo is positioned on the left side and the Navigation Menu on the opposite side.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Sidebar', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix" data-twin="plain_logo">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Disable Submenu', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('disable_submenu'); ?> name="disable_submenu" type="checkbox" value="disable_submenu" />
			
			<!-- Option desc -->
			<p><?php _e('Check this to disable all Submenus (Parents menu).', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Blog Posts', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Featured Images Height', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Slider -->
			<div class="wb_haku_slider" data-min="1" data-max="500" data-step="1"></div>
			<span class="wb_haku_slider_tip"><?php echo get_theme_option('featured_image_height'); ?> pixels</span>
			
			<!-- Real input -->
			<input type="text" class="hidden" name="featured_image_height" value="<?php echo esc_attr( get_theme_option('featured_image_height') ); ?>" />
			
			<!-- Option desc -->
			<p><?php _e('After changing this value you must rebuild the WordPress Thumbnails using an external WordPress plugin.', 'haku'); ?> (<a href="<?php echo get_stylesheet_directory_uri(); ?>/docs/Help.html#thumbnails" target="_blank">?</a>)</p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Author and Date', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('post_author'); ?> name="post_author" type="checkbox" value="post_author" />
			
			<!-- Option desc -->
			<p><?php _e('Check this to show the post author and date.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Comments Count', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('post_comments_count'); ?> name="post_comments_count" type="checkbox" value="post_comments_count" />
			
			<!-- Option desc -->
			<p><?php _e('Check this to show the post comments count.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Category', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('post_category'); ?> name="post_category" type="checkbox" value="post_category" />
			
			<!-- Option desc -->
			<p><?php _e('Check this to show the post category.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Tags', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('post_tags'); ?> name="post_tags" type="checkbox" value="post_tags" />
			
			<!-- Option desc -->
			<p><?php _e('Check this to show the post tags.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Facebook Sharing', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('post_facebook_share'); ?> name="post_facebook_share" type="checkbox" value="post_facebook_share" />
			
			<!-- Option desc -->
			<p><?php printf( __('Check this to show the %s share button.', 'haku'), 'Facebook' ); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Twitter Sharing', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('post_twitter_share'); ?> name="post_twitter_share" type="checkbox" value="post_twitter_share" />
			
			<!-- Option desc -->
			<p><?php printf( __('Check this to show the %s share button.', 'haku'), 'Twitter' ); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Google Sharing', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('post_google_share'); ?> name="post_google_share" type="checkbox" value="post_google_share" />
			
			<!-- Option desc -->
			<p><?php printf( __('Check this to show the %s share button.', 'haku'), 'Google +1' ); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Trackbacks', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('post_trackbacks'); ?> name="post_trackbacks" type="checkbox" value="post_trackbacks" />
			
			<!-- Option desc -->
			<p><?php _e('Check this to show trackbacks inside the comments section.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Pages', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix" data-twin="plain_logo">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Comments', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('page_responses'); ?> name="page_responses" type="checkbox" value="page_responses" />
			
			<!-- Option desc -->
			<p><?php _e('Check this to enable comments and trackbacks on pages.', 'haku'); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
</div>
<!-- end: Tab -->

<!-- Tab -->
<div class="section wb_haku_options" data-tab="<?php _e('Extras', 'haku'); ?>">
	
	<!-- Options header -->
	<h1><?php _e('Exclude Categories', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Exclude', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Haku multiple select box -->
			<select multiple data-placeholder="<?php echo esc_attr( __('Choose a category', 'haku') ); ?>" name="exclude_category[]" class="chzn-select">
				<?php foreach ( haku_list_categories() as $name => $id ) : ?>
				<option <?php haku_multiple_selected( 'exclude_category', $id ); ?> value="<?php echo esc_attr( $id ); ?>"><?php echo esc_attr( $name ); ?></option>
				<?php endforeach; ?>
			</select>
			
			<!-- Option desc -->
			<p><?php printf( __('The selected categories will be excluded from every single section of your awesome website (%s).', 'haku'), get_bloginfo('name') ); ?></p>
			
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('WordPress', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Login Logo', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Button -->						
			<button class="wb_haku_image_upload"><?php _e('Open Media Library', 'haku'); ?></button>
			
			<!-- Option desc -->
			<p><?php _e('Choose your image, then click "Insert into post" to apply it.', 'haku'); ?> <strong><?php _e('Max width:', 'haku'); ?></strong> 300</p>
			
			<!-- Real input -->
			<input type="text" placeholder="http://" class="wb_haku_image_upload_field <?php haku_hidden('wp_login_logo'); ?>" name="wp_login_logo" value="<?php echo esc_url( get_theme_option('wp_login_logo') ); ?>" />
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Gravatar', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Button -->						
			<button class="wb_haku_image_upload"><?php _e('Open Media Library', 'haku'); ?></button>
			
			<!-- Option desc -->
			<p><?php _e('Choose your image, then click "Insert into post" to apply it.', 'haku'); ?> <strong><?php _e('Max size:', 'haku'); ?></strong> 250x250</p>
			
			<!-- Real input -->
			<input type="text" placeholder="http://" class="wb_haku_image_upload_field <?php haku_hidden('wp_gravatar'); ?>" name="wp_gravatar" value="<?php echo esc_url( get_theme_option('wp_gravatar') ); ?>" />
			
			<!-- Option notice -->
			<span class="wb_haku_notice"><?php _e('To apply your Gravatar image, go to Settings &rarr; Discussion, scroll to the bottom of the page and select it.', 'haku'); ?></span>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Javascript', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Load jQuery Locally', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('jquery_local'); ?> name="jquery_local" type="checkbox" value="jquery_local" />
			
			<!-- Option desc -->
			<p><?php _e('By default, the jQuery Library is loaded from the Google Servers to improve the overall loading performances.', 'haku'); ?> (<a href="http://encosia.com/3-reasons-why-you-should-let-google-host-jquery-for-you/" target="_blank">?</a>)</p>

		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	<!-- Options header -->
	<h1><?php _e('Theme Updates', 'haku'); ?></h1>
	
	<!-- Option group -->
	<div class="wb_haku_optgroup clearfix" data-twin="plain_logo">
		
		<!-- Option info -->
		<div class="aside">
		
			<!-- Label -->
			<label><?php _e('Check for updates', 'haku'); ?></label>
			
		</div>
		<!-- end: Option info -->
		
		<!-- Option -->
		<div>
			
			<!-- Checkbox -->
			<a href="#" class="wb_haku_checkbox"></a>
			
			<!-- Real input -->
			<input <?php haku_checked('theme_update'); ?> name="theme_update" type="checkbox" value="theme_update" />
			
			<!-- Option desc -->
			<p><?php printf( __('Check this if you want to be notified when a new update for %s is available.', 'haku'), get_theme_name() ); ?></p>
		
		</div>
		<!-- end: Option -->
							
	</div>
	<!-- end: Option group -->
	
	</form>
	<!-- end: Form -->
	
</div>
<!-- end: Tab -->

<!-- Tab -->
<div class="section haku_slides haku_manager" data-tab="<?php _e('Slides', 'haku'); ?>">
	
	<!-- Options header -->
	<h1><?php _e('Homepage Slides', 'haku'); ?></h1>
	
	<!-- Slides container -->
	<div id="haku_slides_container"></div>
	
	<!-- Add button -->
	<a href="#" id="haku_add_slide" class="wb_haku_button"><?php _e('Add New Slide', 'haku'); ?></a>
	
</div>
<!-- end: Tab -->

<!-- Tab -->
<div class="section haku_sidebars haku_manager" data-tab="<?php _e('Sidebars', 'haku'); ?>">
	
	<!-- Options header -->
	<h1><?php _e('Custom Sidebars', 'haku'); ?></h1>
	
	<!-- Slides container -->
	<div id="haku_sidebars_container"></div>
	
	<!-- Add button -->
	<a href="#" id="haku_add_sidebar" class="wb_haku_button"><?php _e('Add New Sidebar', 'haku'); ?></a>
	
	<?php if ( ! get_theme_slides('theme_sidebars') ) : ?>
	
	<!-- Option notice -->
	<span class="wb_haku_notice"><?php _e('You can assign a different Sidebar to each page choosing your Sidebar under the "Page Attributes" Box when in the edit mode.', 'haku'); ?></span>
	
	<?php endif; ?>
	
</div>
<!-- end: Tab -->