<!-- Search form -->
<form action="<?php echo home_url('/'); ?>" method="get">
	<fieldset>
		<p>
			<input type="text" name="s" placeholder="<?php echo esc_attr( __('Search', 'haku') ); ?>" value="<?php the_search_query(); ?>" />
		</p>
	</fieldset>
</form>
<!-- end: Search form -->