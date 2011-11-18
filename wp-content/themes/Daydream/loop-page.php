<!-- Post -->
<article <?php post_class('clearfix'); ?> id="page_<?php the_ID(); ?>">
		
	<!-- Post content -->
	<?php the_content(); ?>

	<?php wp_link_pages( array('before' => '<h5>' . __('Pages:', 'haku'), 'after' => '</h5>') ); ?>
		
</article>
<!-- end: Post -->

<?php if ( get_theme_option('page_responses') ) : ?>

<!-- Post comments -->
<section id="dayd_post_comments">

	<?php comments_template('', true); ?>
	
</section>
<!-- end: Post comments -->

<?php endif; ?>