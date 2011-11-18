<?php
/*************************************/
/*   Showcase slideshow item setup   */
global $showcase;

/****************************/
/*   Item main attributes   */
$item = array(
	'full' => get_thumb_src( $post->ID, 'dayd_showcase_slideshow' ),
	'thumbnail' => get_thumb_src( $post->ID, 'dayd_showcase_slideshow_thumbnail' ),
	'cap_id' => '#caption_' . $post->post_name,
	'name' => $post->post_name
);

/****************************************/
/*   Getting user's custom thumbnail    */
if ( $showcase['has_custom_height'] ) {
	$item['full'] = '_' . $showcase['name'];
	$item['full'] = get_thumb_src( $post->ID, $item['full'] );
}
?>

<!-- Showcase item -->
<img src="<?php echo $item['full']; ?>" data-thumb="<?php echo $item['thumbnail']; ?>" data-caption="<?php echo esc_attr( $item['cap_id'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" />