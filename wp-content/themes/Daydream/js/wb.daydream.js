/*
 *  Daydream
 *  http://themes.winterbits.com/daydream
 *
 *  Handcrafted with by Stefano Giliberti
 *  winterbits@gmail.com
 *  winterbits.com
 */
 
jQuery(function($){

	$("html").addClass("js");
	
});

jQuery(document).ready(function($){
	
	/*
		Selectors cache
	*/
	var doc = $(document),
		body = $("body"),
		img = $("#content img"),
		dayd_hero_slider = $("#hero_slider"),
		dayd_screenshots = $(".shots"),
		dayd_testimonials = $(".testimonials_slider"),
		dayd_tabs = $(".dayd_tabs"),
		dayd_togglers = $(".dayd_toggle"),
		dayd_portable_slider = $(".dayd_slider > div:not(.orbit-caption)"),
		dayd_html_video = $(".video-js"),
		dayd_lightbox = $(".dayd_lightbox, .dayd_showcase_lightbox > a, .wp-caption > a:has(img), .attachment > a:has(img)"),
		dayd_multi_lightbox = $(".dayd_multi_lightbox:has(a) > a, a.dayd_multi_lightbox"),
		dayd_cform_widget = $(".wb_dayd_cform_widget form");
		
	/*
		DOM manips
	*/	
	$("body > header .nav > li:has(ul) > a").append("<span></span>");
	
	$("#dayd_submenu li.current_page_item").append("<span></span>");
	
	if ( dayd_screenshots.length ) {
	
		body.append('<div id="dayd_bubble"><span></span></div>');

		var dayd_bubble = $("#dayd_bubble");
	
	}
	
	/*
		CSS/UI adjustments
	*/	
	$("body > header .nav > li > ul").each(function(){
		$(this).css("left", $(this).parent("li").outerWidth() / 2 - ( $(this).outerWidth() / 2 ) );
	});

	$("[data-href]").click(function(){
		window.location = $(this).attr("data-href");
	});
	
	/*
		UI animations
	*/
	$("body > header .nav ul li a").hover(function(){
		$(this).animate({ paddingLeft: "7px" }, { duration: 200, queue: false  });
	},
	function(){
		$(this).animate({ paddingLeft: 0 }, { duration: 200, queue: false  });
	});
	
	$("#dayd_submenu li:not(.current_page_item) a").hover(function(){
		$(this).animate({ paddingLeft: "18px" }, { duration: 200, queue: false  });
	},
	function(){
		$(this).animate({ paddingLeft: "12px" }, { duration: 200, queue: false  });
	});
		
	if ( is_single() ) {
		
		$("#dayd_post_comments .comment-content:has(.comment-reply-link)").hover(function(){
			
			$(this).find(".comment-reply-link").hide().fadeIn(250);
		
		},
		function(){
		
			$(this).find(".comment-reply-link").stop(true, true).hide();
			
		});
		
	}
	
	/*
		Daydream bubble
	*/
	$(".dayd_bubble")
		.hover(function(e){
						
			var $this = $(this),
				wb_tb_pos = $this.offset(),
				wb_tb_top = wb_tb_pos.top - $this.outerHeight() - 30 - doc.scrollTop();
						
			dayd_bubble
				.removeClass()
				.addClass( $this.attr("class") )
				.stop(true, true)
				.css({
					left: wb_tb_pos.left + $this.outerWidth() / 2 - 31,
					top: wb_tb_top
				})
				.fadeIn(200)
				.addClass("visible")
				.animate({
					top: wb_tb_top + 20
				},
				{
					duration: 450,
					easing: "easeOutBack",
					queue: false
				})
				
		},
		function(){
						
			dayd_bubble
				.stop(true, true)
				.fadeOut(150, function(){
					$(this).css({ left: 0, top: 0 })
				})
			
		})
		.click(function(){
			
			dayd_bubble
				.stop(true, true)
				.hide()
				.removeClass("visible")
				.css({ left: 0, top: 0 });
			
		});
	
	if ( dayd_screenshots.length ) {
	
		doc.scroll(function(){
			
			if ( dayd_bubble.hasClass("visible") ) {
				
				dayd_bubble.hide().css({ left: 0, top: 0 });

			}
						
		});
		
	}

	/*
		Plugins setup
	*/
	$("[placeholder]").placeholder();
	
	$("body > header .nav").superfish({
		autoArrows: false,
		dropShadows: false,
		animation: {
			opacity: "show",
			height: "show"
		},
		disableHI: true,
		speed: 300
	});
		
	$("[data-tip]").tipTip({
		attribute: "data-tip",
		delay: 100,
		defaultPosition: "bottom"
	});
	
	$("[data-tip-focus]").tipTip({
		attribute: "data-tip-focus",
		delay: 0,
		defaultPosition: "right",
		activation: "focus",
		edgeOffset: 7
	});
	
	dayd_lightbox.fancybox({
		padding: 0,
		overlayOpacity: .73,
		overlayColor: "#000",
		changeFade: 300,
		speedIn: 500,
		speedOut: 250,
		titlePosition: "over",
		centerOnScroll: true,
		hideOnContentClick: true,
		onStart: function(){
			$("#fancybox-wrap").addClass("loading");
		},
		onComplete: function(){
			$("#fancybox-outer").hover(function(){
				$("#fancybox-title").show();
			},
			function(){
				$("#fancybox-title").hide();
			});
			$("#fancybox-wrap").removeClass("loading");
		}
	});
	
	/*
		Super duper lightbox
	*/
	dayd_multi_lightbox.live("click", function(e){
		
		var $this = $(this),
			href = $this.attr("href"),
			is_image = ( href.match( /.(jpe?g|png|gif)$/ ) ? true : false ),
			is_youtube = ( href.indexOf( "youtube.com/watch" ) != -1 ? true : false ),
			is_vimeo = ( href.indexOf( "vimeo.com/" ) != -1 ? true : false ),
			is_html5 = ( href.match( /.(webm|mp4|ogv)$/ ) ? true : false );
			
		if ( is_youtube ) {
		
			$.fancybox({
				padding: 0,
				autoscale: false,
				overlayOpacity: .8,
				overlayColor: "#000",
				transitionIn: "elastic",
				speedOut: 250,
				titleShow: false,
				width: 700,
				height: 423,
				type: "swf",
				swf: { wmode: 'transparent' },
				href: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
				onStart: function(){
					$("#fancybox-wrap").addClass("loading swf_video");
				},
				onClosed: function(){
					$("#fancybox-wrap").removeClass("loading swf_video");
				}
			});
		
		}
		else if ( is_vimeo ) {
		
			$.fancybox({
				padding: 0,
				autoscale: false,
				overlayOpacity: .8,
				overlayColor: "#000",
				transitionIn: "elastic",
				speedOut: 250,
				titleShow: false,
				width: 700,
				height: 394,
				type: "swf",
				swf: { wmode: 'transparent' },
				href: this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
				onStart: function(){
					$("#fancybox-wrap").addClass("loading swf_video");
				},
				onClosed: function(){
					$("#fancybox-wrap").removeClass("loading swf_video");
				}
			});
			
		}
		else if ( is_html5 ) {
			
			var no_ext_href = ( href.substr( 0, href.lastIndexOf(".") ) || href );
			
			html5_video = '<div class="video-js-box">' +
						'<video class="video-js" width="700" height="394" controls="controls" preload="none">' +
						'<source src="' + no_ext_href + '.mp4' + '" type="video/mp4; codecs=\'avc1.42E01E, mp4a.40.2\'" />' +
						'<source src="' + no_ext_href + '.webm' + '" type="video/webm; codecs=\'vp8, vorbis\'" />' +
						'<source src="' + no_ext_href + '.ogv' + '" type="video/ogg; codecs=\'theora, vorbis\'" />' +
						'<object class="vjs-flash-fallback" width="700" height="394" type="application/x-shockwave-flash"' +
						'data="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf">' +
						'<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.7.swf" />' +
						'<param name="allowfullscreen" value="true" />' +
						'<param name="flashvars" value="config={\'clip\':{\'url\':\'' + href + '\',\'autoPlay\':false,\'autoBuffering\':false}}" />' +
						'</object>' +
						'</video>' +
						'</div>';
			
			$.fancybox({
				padding: 0,
				autoscale: false,
				overlayOpacity: .8,
				overlayColor: "#000",
				speedOut: 250,
				titleShow: false,
				width: 700,
				height: 394,
				content: html5_video,
				onStart: function(){
					$("#fancybox-wrap").addClass("loading");
				},
				onComplete: function(){
					VideoJS.setupAllWhenReady();
					$("#fancybox-wrap").removeClass("loading");
				}
			});
			
		}
		else if ( is_image ) {
			
			$.fancybox({
				padding: 0,
				overlayOpacity: .73,
				overlayColor: "#000",
				changeFade: 300,
				speedIn: 500,
				speedOut: 250,
				titlePosition: "over",
				hideOnContentClick: true,
				href: href,
				onStart: function(){
					$("#fancybox-wrap").addClass("loading");
				},
				onComplete: function(){
					$("#fancybox-outer").hover(function(){
						$("#fancybox-title").show();
					},
					function(){
						$("#fancybox-title").hide();
					});
					$("#fancybox-wrap").removeClass("loading");
				}
			});
			
		}
		else {
			
			$.fancybox({
				padding: 0,
				autoscale: false,
				width: "80%",
				height: "95%",
				overlayOpacity: .8,
				overlayColor: "#000",
				transitionOut: "none",
				speedIn: 500,
				speedOut: 250,
				titleShow: false,
				href: href,
				type: "iframe",
				onStart: function(){
					$("#fancybox-wrap").addClass("loading");
				},
				onComplete: function(){
					$("#fancybox-wrap").removeClass("loading");
				}
			});
				
		}
		
		e.preventDefault();	
		
	});
	
	
	$("marquee")
		.marquee()
		.hover(function(){
			$(this).trigger("stop");
		},
		function(){
			$(this).trigger("start");
		})
		
	$(".dayd_twitter_marquee").prepend('<div class="fade start"></div><div class="fade end"></div>')
	
	/*
		Tabs
	*/
	dayd_tabs.each(function(){
		
		var	tabs = $(this),
			tab_nav = tabs.find("nav"),
			tab = tabs.find("[data-tab-title]"),
			open_tab = tab.filter(".open").length;
		
		if ( ! open_tab ) {
			tab.filter(":first").addClass("open");
		}
		
		/*
			Anchors
		*/
		tab.each(function(){
			
			var $this = $(this);
						
			if ( $this.hasClass("open") ) {
				
				tab_nav.append('<a href="#" class="current">' + $this.attr("data-tab-title") + '</a>');
				
				$this.show().siblings().hide();
				
			}
			else {
				
				tab_nav.append('<a href="#">' + $this.attr("data-tab-title") + '</a>');
				
			}
			
		});
		
		/*
			Tab switch
		*/
		tab_nav.children("a").click(function(e){
			
			e.preventDefault();
			
			var $this = $(this);
							
			if ( ! $this.hasClass("current") ) {
				
				$this.addClass("current").siblings().removeClass();
									
				tabs.find("div > div:eq(" + $this.index() + ")").show().siblings().hide();
				
			}
			
		});
	
	});
		
	/*
		Content togglers
	*/
	dayd_togglers.each(function(){
		
		var $this = $(this);
		
		$this.find(".content").hide();
		
		$this.prepend('<span>' + $this.attr("data-toggle-title") + '</span>');
		
	});
	
	dayd_togglers.children("span").click(function(e){
		
		$(this).toggleClass("open").parent().find(".content").stop(true, true).slideToggle({ duration: 150, easing: "easeOutSine" });
		
		e.preventDefault();
		
	});
	
	/*
		Contact Form Widget
	*/
	dayd_cform_widget.submit(function(e){
				
		var form = $(this),
			contents = form.serialize(),
			fields = form.find("input[type='text'], textarea"),
			success_message = form.find(".wb_cform_success"),
			error;
		
		fields.each(function(){
			
			var $this = $(this),
				this_val = $.trim( $this.val() );
			
			if ( $this.attr("name") == 'wb_cform_email' && ! is_email( this_val ) ) {
				$this.focus()
				error = true;
			}
			else if ( this_val < 1 ) {
				$this.focus();
				error = true;
			}
			
		});
		
		if ( ! error ) {
			
			form.find(":submit").hide();
			
			$.post( dayd_ajax.url, "action=daydream_widget_cform_action&" + contents, function( response ) {
					
					if ( response ) {
					
						form.children("fieldset").slideUp(350, function(){
							
							success_message.fadeIn(150);
							
						});
						
					}
					
				}
			);
			
		}
		
		e.preventDefault();
		
	});
	
	/*
		Fades in completely loaded images
	*/
	img.imagesLoaded(function(){
	
		$(this).each(function(i){
			
			$(this).delay(i*45).animate({ opacity: 1 }, { duration: 230 });
			
		});
		
	})
	
	/*
		When the document is completely loaded
	*/
	$(window).load(function(){
		
		if ( is_home() ) {
		
			if ( dayd_hero_slider.hasClass("dayd_jcycle") ) {
				
				/*
					jCycle slider
				*/
				dayd_hero_jcycle();
				
			}
			else if ( dayd_hero_slider.hasClass("dayd_nivoslider") ) {
				
				/*
					Nivo slider
				*/				
				dayd_hero_nivoslider();
				
			}
			else if ( dayd_hero_slider.hasClass("dayd_orbit") ) {
				
				/*
					Orbit slider
				*/
				dayd_hero_orbit();
				
			}
			
		}
		
		/*
			Portable Slider
		*/
		dayd_portable_slider.each(function(){
			
			var slider = $(this),
				slide_with_caption = slider.find("img[data-inline-caption!='']");
			
			if ( slide_with_caption.length ) {
			
				slide_with_caption.each(function(){
					
					var $this = $(this),
						caption_id = $this.attr("data-caption"),
						caption = $this.attr("data-inline-caption");
					
					slider.parent().append('<div id="' + caption_id.substr( 1 ) + '" class="orbit-caption">' + caption + '</div>');
				
				});
			
			}
			
			slider.orbit();
			
		});
		
		/*
			Testimonials slider
		*/
		dayd_testimonials.each(function(){
									
			var dayd_testimonials_slider = $(this);
			
			dayd_testimonials_slider
				.prepend('<a href="#" class="dayd_arrow next"></a>')
				.prepend('<a href="#" class="dayd_arrow prev"></a>')
				.cycle({ 
				    fx: "fade",
				    slideExpr: ".slide",
				    timeout: 7000,
				    speed: 350,
				    next: dayd_testimonials_slider.find(".next"),
				    prev: dayd_testimonials_slider.find(".prev")
				})

		});
		
		/*
			HTML5 videos
		*/
		if ( dayd_html_video.length ) {
		
			VideoJS.setupAllWhenReady();
			
		}
		
	});

	/*
		jQuery cycle hero slider
	*/
	function dayd_hero_jcycle() {
		
		if ( dayd_hero_slider.find(".slide").length > 1 ) {
			dayd_hero_slider.after('<div id="hero_slider_nav"></div>')
		}
		
		dayd_hero_slider
			.height( dayd_hero_slider.find(".slide:first").outerHeight() )
			.cycle({ 
			    fx: dayd_slider.fx,
			    speed: parseInt( dayd_slider.speed ),
			    easing: dayd_slider.easing,
			    timeout: parseInt( dayd_slider.timeout ),
				slideExpr: ".slide",
			    containerResize: false,
			    pager: "#hero_slider_nav",
			    before: hero_slider_update,
			    pagerAnchorBuilder: hero_slider_pager
			});
		
		$("#hero_loading").slideUp(250);
		
		$("#hero_slider_nav").slideDown(250);
		
		function hero_slider_update(curr, next, opts) {
			dayd_hero_slider.animate({ height: $(next).height() }, { duration: opts.speed, easing: opts.easing, queue: false });
		}
		
		function hero_slider_pager() {
			return '<a href="#"></a>';
		}

		dayd_hero_slider.find(".video-js-box").click(function(){
			dayd_hero_slider.cycle("pause");
		});
		
	}
	
	/*
		Nivo slider hero slider
	*/
	function dayd_hero_nivoslider() {
		
		dayd_hero_slider
			.css("overflow", "visible")
			.nivoSlider({
				effect: dayd_slider.fx,
				slices: dayd_slider.slices,
				boxCols: dayd_slider.boxcols,
				boxRows: dayd_slider.boxrows,
				animSpeed: parseInt( dayd_slider.speed ),
				pauseTime: parseInt( dayd_slider.pausetime ),
				captionOpacity: parseFloat( dayd_slider.captionopacity )
			});
		
		var dayd_hero_slider_nav = dayd_hero_slider.find(".nivo-controlNav");
		
		dayd_hero_slider_nav.css({
			left: dayd_hero_slider_nav.parent().width() / 2 - ( dayd_hero_slider_nav.outerWidth() / 2 )
		});
		
	}
	
	/*
		Orbit hero slider
	*/
	function dayd_hero_orbit() {
		
		dayd_hero_slider.orbit({
			animation: dayd_slider.fx,
			animationSpeed: parseInt( dayd_slider.speed ),
			timer: dayd_slider.timer,
			advanceSpeed: parseInt( dayd_slider.advancespeed ),
			captionAnimation: dayd_slider.cap_fx,
			captionAnimationSpeed: parseInt( dayd_slider.cap_fx_speed ),
			bullets: true
		});
		
		var dayd_hero_slider_nav = dayd_hero_slider.parent().find(".orbit-bullets");
		
		dayd_hero_slider_nav.css({
			left: dayd_hero_slider_nav.parent().width() / 2 - ( dayd_hero_slider_nav.outerWidth() / 2 )
		});
		
	}
	
	/*
		Elegant functions
	*/
	function is_home() {
		if ( body.hasClass("home") ) {
			return true;
		}
	}
	
	function is_single() {
		if ( body.hasClass("single") ) {
			return true;
		}
	}
	
	function is_email( address ) {
		return address.match( /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	}
	
})