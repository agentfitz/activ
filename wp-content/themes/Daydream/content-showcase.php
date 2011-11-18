<!-- Post -->
<article <?php post_class('clearfix'); ?> id="showcase_item_<?php the_ID(); ?>">

	<div id="showcaseFeaturedImgCnt">
	<?php bdw_get_images(); ?>
	</div>
	
	<h2><?php get_custom_field('project_tagline', true); ?></h2>

	<!-- Post content -->
	<?php the_content(); ?>

	<?php wp_link_pages( array('before' => '<h5>' . __('Pages:', 'haku'), 'after' => '</h5>') ); ?>
		
</article>
<!-- end: Post -->

<!-- Post comments -->
<section id="dayd_post_comments">

	<?php comments_template('', true); ?>
	
</section>
<!-- end: Post comments -->