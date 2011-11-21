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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	
	<!--[if (gte IE 6)&(lte IE 8)]>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/selectivizr-min.js"></script>
	<![endif]-->
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
		
	<!-- WP head -->
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?> id="<?php echo the_slug(); ?>">

<?php remove_filter ('the_content', 'wpautop'); /* STOPS WORDPRESS FROM ADDING FRIGGIN P TAGS */ ?>
	
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
					<a href="#" class="button small">free consultation</a>				
				</div>
			</div>
			
			<!-- Menu -->
			<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'menu_class' => 'nav', 'fallback_cb' => '') ); ?>
			<!-- end: Menu -->
		
		</div>
		<!-- end: Container -->
				
	</header>
	<!-- end: Top bar -->
	
	
<script>
	$(function(){
		var $benefits = $("#primaryBenefitsList li");
		var counter = 0;
		
		$benefits.each(function(i, elem){
			$li = $(this);
			$li.find("span").html("<a href='#' id='nextBenefit'>" + getNextBenefitText(i) + "</a> | <a href='index.cfm?event=showTour&amp;feature=" + $li.attr("rel") + "'>learn more</a>");
		});
		
		$("a#nextBenefit").click(function(e){
			var $thisBenefit = $benefits.filter(".active");
			var $nextBenefit = $thisBenefit.next();
			if($nextBenefit.length == 0){
				window.location = "/about";
			}
			else{
				$thisBenefit.removeClass("active");
				$nextBenefit.addClass("active");
			}
			e.preventDefault();
		});
		
		function getNextBenefitText(){
			var listText = "what else?,so what?,tell me more,that all you got?,I'm not impressed,interesting";
			var textArr = listText.split(",");
			if(counter >= textArr.length){
				counter = 0;
			}
			var thisItem = textArr[counter];
			counter++;
			return thisItem;
		}
		
	});
</script>
	
	<?php if(is_front_page()){ ?>
		<div id="tagline_wrapper">
			<div id="tagline_container">
				<h1><a href="#" id="nextBenefit">tell me more about Lefty</a></h1>
				<ul id="primaryBenefitsList">
					<li class="active"><h1>Lefty is a full service web design and development agency</h1></li>
					<li><h1>At Lefty, we make our clients more efficient &ndash; and more profitable</h1></li>
					<li><h1>Lefty believes in building websites that are easy to maintain</h1></li>
					<li><h1>Lefty understands the importance of reaching your target market online</h1></li>
				</ul>				
			</div>
		</div>
	<?php } ?>