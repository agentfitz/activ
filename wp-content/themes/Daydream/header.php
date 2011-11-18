<!doctype html>

<!--[if IE 7 ]> <html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if gte IE 9 ]> <html class="ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	
	<!-- Meta -->
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<!-- Page title -->
	<title><?php wp_title('-', 1, 'right'); ?> <?php bloginfo('name'); ?></title>
	
	<!-- Profile -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<!-- Favourites icon -->
	<link rel="shortcut icon" href="<?php echo dayd_favicon(); ?>">
	
	<!-- Google web fonts -->
	<link href="http://fonts.googleapis.com/css?family=<?php echo get_theme_option('google_webfont'); ?>" rel="stylesheet" type="text/css">
	
	<!-- CSS -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=<?php echo get_theme_version(); ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/colours/<?php echo get_theme_option('theme'); ?>/theme.css?v=<?php echo get_theme_version(); ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/user.php?v=<?php echo get_theme_version(); ?>">
	
	<!--[if lte IE 9]>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/ie-style.php?v=<?php echo get_theme_version(); ?>">
	<![endif]-->
	
	<!-- Pingback -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--[if (gte IE 6)&(lte IE 8)]>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/selectivizr-min.js"></script>
	<![endif]-->
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
		
	<!-- WP head -->
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<!-- Top bar -->
	<header>
		
		<!-- 978 container -->
		<div class="<?php dayd_header_container_class(); ?>">
		
			<!-- Logo --> 
			<h1 class="logo">
				<a href="<?php echo home_url(); ?>"><?php dayd_logo(); ?></a>
			</h1>
			
			<div id="top_nav">
				<span>get started</span>
				<div id="top_nav_inner">
					<a href="#">request a proposal</a>				
				</div>
			</div>
			
			<!-- Menu -->
			<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'menu_class' => 'nav', 'fallback_cb' => '') ); ?>
			<!-- end: Menu -->
		
		</div>
		<!-- end: Container -->
				
	</header>
	<!-- end: Top bar -->