<?php
/********************/
/*   Page metabox   */
$dayd_page_attributes = array(
	'id' => '_dayd_page_attributes',
	'title' => __('Page Attributes', 'haku'),
	'types' => array('page'),
	'priority' => 'low',
	'template' => get_includes_dir() . '/metabox/page_attributes.php'
);

$dayd_page_attributes = new WPAlchemy_MetaBox( $dayd_page_attributes );

/************************/
/*   Showcase metabox   */
$dayd_showcase_settings = array(
	'id' => '_dayd_showcase_settings',
	'title' => __('Showcase Settings', 'haku'),
	'types' => array('page'),
	'hide_editor' => true,
	'priority' => 'high',
	'include_template' => 'showcase.php',
	'template' => get_includes_dir() . '/metabox/showcase_settings.php'
);

$dayd_showcase_settings = new WPAlchemy_MetaBox( $dayd_showcase_settings );

/*****************************/
/*   Showcase item metabox   */
$dayd_showcase_item_attributes = array(
	'id' => '_dayd_showcase_item_attributes',
	'title' => __('Item Attributes', 'haku'),
	'types' => get_theme_showcase_pages(),
	'priority' => 'low',
	'template' => get_includes_dir() . '/metabox/showcase_item_attributes.php'
);

$dayd_showcase_item_attributes = new WPAlchemy_MetaBox( $dayd_showcase_item_attributes );
?>