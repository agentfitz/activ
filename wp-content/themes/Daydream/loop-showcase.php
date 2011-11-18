<?php
/***************************/
/*   Showcase item setup   */
global $showcase;

/**************************/
/*   Getting item metas   */
$meta = get_post_meta( $post->ID, '_dayd_showcase_item_attributes', true );

/****************************/
/*   Item main attributes   */
$item = array(
	'class' => array('showcase_item', 'clearfix'),
	'thumbnail' => 'dayd_showcase_single',
	'filters' => haku_nice_classes( get_the_terms( $post->ID, 'showcase_filter_' . $showcase['id'] ) ),
	'title_attr' => get_the_excerpt(),
	'title_wrap' => array('<h3>', '</h3>'),
	'href' => get_permalink(),
	'has_lightbox' => meta_get('lightbox', $meta ),
	'lightbox' => meta_get('lightbox_type', $meta, 'image'),
	'lightbox_href' => meta_get('lightbox_href', $meta ),
	'lightbox_gallery' => meta_get('lightbox_gallery', $meta ),
	'custom_link' => meta_get('link', $meta ),
	'lightbox_cap' => meta_get('lightbox_cap', $meta )
);

/*******************************/
/*   Setting main attributes   */
switch ( $showcase['layout'] ) {
	case '1':
		$item['class'][] = 'single_col';
		$item['title_wrap'] = array('<h2>', '</h2>');
	break;
	case '2':
		$item['class'][] = 'half';
		$item['thumbnail'] = 'dayd_showcase_2';
	break;
	case '3':
		$item['class'][] = 'one_third';
		$item['thumbnail'] = 'dayd_showcase_3';
	break;
	case '4':
		$item['class'][] = 'one_fourth';
		$item['thumbnail'] = 'dayd_showcase_4';
	break;
};

/**************************/
/*   Item info classes    */
if ( $showcase['no_info'] ) {
	$item['class'][] = 'no_info';
}
else if ( $showcase['no_titles'] ) {
	$item['class'][] = 'no_title';
}
else if ( $showcase['no_excerpts'] ) {
	$item['class'][] = 'no_excerpt';
}

/********************/
/*   Custom link    */
if ( $item['custom_link'] ) {
	$item['href'] = $item['custom_link'];
}

/*****************/
/*   Lightbox    */
if ( $item['has_lightbox'] ) {

	$item['title_attr'] = ( $item['lightbox_cap'] ? $item['lightbox_cap'] : $item['title_attr'] );
	
	switch ( $item['lightbox'] ) {
		case 'image':
			$item['class'][] = 'dayd_showcase_lightbox';
			$item['class'][] = 'picture_item';
			$item['href'] = get_thumb_src( $post->ID, 'full' );
			$item['href'] = ( $item['lightbox_href'] ? $item['lightbox_href'] : $item['href'] );
		break;
		case 'video':
			$item['class'][] = 'dayd_multi_lightbox';
			$item['class'][] = 'media_item';
			$item['href'] = $item['lightbox_href'];
		break;
		case 'website':
			$item['class'][] = 'dayd_multi_lightbox';
			$item['class'][] = 'iframe_item';
			$item['href'] = ( $item['lightbox_href'] ? $item['lightbox_href'] : $item['href'] );
		break;
	}
	
}

/********************************************/
/*   Converting classes to a nice string    */
$item['class'] = haku_nice_classes( $item['class'], true );

/****************************************/
/*   Getting user's custom thumbnail    */
if ( $showcase['has_custom_height'] ) {
	$item['thumbnail'] = '_' . $showcase['name'];
}
?>

<!-- Showcase item -->
<div class="<?php echo $item['class']; ?>" data-filter="<?php echo esc_attr( $item['filters'] ); ?>">
	
	<!-- Picture -->
	<a href="<?php echo esc_url( $item['href'] ); ?>" data-lightbox-gallery="<?php echo sanitize_title( $item['lightbox_gallery'] ); ?>" title="<?php echo esc_attr( $item['title_attr'] ); ?>"><?php if ( has_post_thumbnail() ) the_post_thumbnail( $item['thumbnail'], array('title' => '') ); ?><span></span></a>
	
	<?php if ( ! $showcase['no_info'] ) : ?>

	<!-- Description -->
	<div>
		<?php if ( ! $showcase['no_titles'] ) the_title( $item['title_wrap'][0], $item['title_wrap'][1] ); ?>
		<?php if ( ! $showcase['no_excerpts'] ) the_excerpt(); ?>
	</div>

	<?php endif; ?>
	
</div>
<!-- end: Showcase item -->