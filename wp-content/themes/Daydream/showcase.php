<?php
/*
 *  TEMPLATE NAME: Daydream Showcase
 */
?>
<?php get_header(); ?>

<?php get_template_part('hero'); ?>

<?php
/**********************/
/*   Showcase setup   */
global $post;

/******************************/
/*   Getting showcase metas   */
$meta = get_post_meta( $post->ID, '_dayd_showcase_settings', true );

/******************************/
/*   Showcase main settings   */
$showcase = array(
	'id' => $post->ID,
	'name' => $post->post_name,
	'class' => array('container clearfix'),
	'layout' => meta_get('layout', $meta, 3),
	'is_slideshow' => ( meta_get('layout', $meta) == 's' ? true : false ),
	'loop' => ( meta_get('layout', $meta) == 's' ? 'slideshow' : 'showcase' ),
	'terms' => get_terms( 'showcase_filter_' . $post->ID ),
	'post_type' => 'showcase_' . $post->ID,
	'ipp' => ( intval( meta_get('ipp', $meta) ) ? meta_get('ipp', $meta) : 9 ),
	'no_titles' => meta_get('no_titles', $meta),
	'no_excerpts' => meta_get('no_excerpts', $meta),
	'no_info' => ( meta_get('no_titles', $meta) && meta_get('no_excerpts', $meta) ? true : false ),
	'no_tools' => meta_get('no_tools', $meta),
	'no_search' => meta_get('no_search', $meta),
	'has_custom_height' => ( intval( meta_get('height', $meta) ) ? true : false ),
	'order' => meta_get('order', $meta, 'DESC'),
	'orderby' => meta_get('orderby', $meta, 'date')
);

$showcase['class'][] = ( $showcase['is_slideshow'] ? 'dayd_showcase_slideshow' : 'dayd_showcase' );
$showcase['class'][] = ( $showcase['no_tools'] || $showcase['is_slideshow']  ? 'no_tools' : 'with_tools' );

/********************************************/
/*   Converting classes to a nice string    */
$showcase['class'] = haku_nice_classes( $showcase['class'], true );

$showcase['js_opt'] = array('ipp' => $showcase['ipp'] );

/***************************/
/*   Slideshow js output   */
if ( $showcase['is_slideshow'] ) {
	$slideshow_js_opt = array(
		'fx' => meta_get('slideshow_fx', $meta, 'fade'),
		'speed' => ( intval( meta_get('slideshow_ms', $meta) ) ? meta_get('slideshow_ms', $meta) : 800 ),
		'cap_fx' => meta_get('slideshow_cap_fx', $meta, 'slideOpen'),
		'cap_speed' => ( intval( meta_get('slideshow_cap_ms', $meta) ) ? meta_get('slideshow_cap_ms', $meta) : 800 ),
		'timer' => ( meta_get('slideshow_no_timer', $meta) ? false : true ),
		'pause' => ( meta_get('slideshow_pause', $meta) ? true : false ),
		'thumbs' => ( meta_get('slideshow_no_thumbs', $meta) ? false : true )
	);
	$showcase['js_opt'] = $slideshow_js_opt;
}

/*****************/
/*   Js output   */
if ( ! $showcase['no_tools'] || $showcase['is_slideshow'] ) {
	wp_localize_script('dayd_js_showcase', 'dayd_slideshow', $showcase['js_opt'] );
}

/****************/
/*   WP query   */
$query = 'post_type=' . $showcase['post_type'];
$query .= '&posts_per_page=' . ( $showcase['no_tools'] ? $showcase['ipp'] : '-1' );
$query .= '&order=' . $showcase['order'];
$query .= '&orderby=' . $showcase['orderby'];
$query .= '&paged=' . ( get_query_var('paged') ? get_query_var('paged') : true );

?>
	
	<?php if ( ! $showcase['no_tools'] && ! $showcase['is_slideshow'] ) : ?>
	
	<!-- Tools -->
	<section id="tools" class="clearfix">
		
		<!-- 978 container -->
		<div id="showcase_tools" class="container clearfix">
			
			<?php if ( $showcase['terms'] ) : ?>
			
			<!-- Tag list -->
			<ul id="dayd_taglist">
			
				<li data-filter="#"><?php _e('All', 'haku'); ?></li>
				
				<?php if ( is_array( $showcase['terms'] ) ) : foreach ( $showcase['terms'] as $filter ) : ?>
				
				<li data-filter="<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></li>
				
				<?php endforeach; endif; ?>
				
			</ul>
			<!-- end: Tag list -->
			
			<?php endif; ?>
			
			<?php if ( ! $showcase['no_search'] && ! $showcase['no_info'] ) : ?>
			
			<!-- Search -->
			<div class="dayd_search_input">
				<input name="search" type="text" placeholder="<?php echo esc_attr( __('Search', 'haku') ); ?>" maxlength="25" />
			</div>
			<!-- end: Search -->
			
			<?php endif; ?>
			
		</div>
		<!-- end: Container -->
		
	</section>
	<!-- end: Tools -->
	
	<?php endif; ?>
	
	<!-- 978 content container -->
	<div id="content" class="<?php echo $showcase['class']; ?>">
		
		<?php query_posts( $query ); if ( have_posts() ) : ?>
		
		<?php if ( $showcase['is_slideshow'] ) : ?>
		
		<!-- Showcase slideshow -->
		<div id="showcase_slideshow">
		
		<?php endif; ?>
			
			<?php while ( have_posts() ) : the_post(); ?>
				
			<?php get_template_part('loop', $showcase['loop'] ); ?>
			
			<?php endwhile; ?>
		
		<?php if ( $showcase['is_slideshow'] ) : ?>
		
		</div>
		<!-- end: Showcase slideshow -->
				
			<!-- Slideshow captions -->
		
			<?php while ( have_posts() ) : the_post(); if ( has_excerpt() ) : ?>
			
			<!-- Caption -->
			<div id="caption_<?php echo $post->post_name; ?>" class="orbit-caption"><?php echo get_the_excerpt(); ?></div>
				
			<?php endif; endwhile; ?>
			
			<!-- end: Slideshow caption -->
				
		<?php else : ?>
				
			<!-- Clearing floats -->
			<div class="clear"></div>
		
			<?php if ( $showcase['no_tools'] ) : ?>
			
			<!-- Previous posts link -->
			<div id="dayd_pagination_prev">
				<?php previous_posts_link( __('Newer entries', 'haku') ); ?>
			</div>
			
			<!-- Next posts link -->
			<div id="dayd_pagination_next">
				<?php next_posts_link( __('Show more', 'haku') ); ?>
			</div>
			
			<?php else : ?>
			
			<!-- Previous posts link -->
			<div id="dayd_pagination_prev">
				<a href="#"><?php _e('Newer entries', 'haku'); ?></a>
			</div>
			
			<!-- Next posts link -->
			<div id="dayd_pagination_next">
				<a href="#"><?php _e('Show more', 'haku'); ?></a>
			</div>
			
			<?php endif; ?>
		
		<?php endif; ?>
		
		<?php endif; ?>
		
	</div>
	<!-- end: Container -->

<?php wp_reset_query(); ?>

<?php get_footer(); ?>