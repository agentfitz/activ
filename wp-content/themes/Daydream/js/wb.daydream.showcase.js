/*
 *  Daydream
 *  http://themes.winterbits.com/daydream
 *
 *  Handcrafted with by Stefano Giliberti
 *  winterbits@gmail.com
 *  winterbits.com
 */

jQuery(document).ready(function($){
	
	/*
		Selectors cache
	*/
	var dayd_showcase_tools = $("#showcase_tools"),
		dayd_showcase_tools_search = dayd_showcase_tools.find(".dayd_search_input input"),
		dayd_showcase_tools_search_width = dayd_showcase_tools_search.width(),
		dayd_showcase = $(".dayd_showcase"),
		dayd_showcase_slideshow = $("#showcase_slideshow");
 	
	/*
		UI animations
	*/
	dayd_showcase_tools_search
		.focus(function(){
			$(this).animate({ width: dayd_showcase_tools_search_width * 2 }, { duration: 150, queue: false, easing: "easeOutSine" });
		})
		.focusout(function(){
			if ( ! jQuery.trim( $(this).val() ).length ) {
				$(this).animate({ width: dayd_showcase_tools_search_width }, { duration: 150, queue: false, easing: "easeInSine" });
			}
		});
	
	$(".dayd_showcase .showcase_item > a span")
		.hover(function(){
			$(this).animate({ opacity: .8 }, { duration: 300, queue: false });
		},
		function(){
			$(this).animate({ opacity: 0 }, { duration: 300, queue: false });
		})
		.click(function(){
			$(this).animate({ opacity: 0 }, { duration: 300, queue: false });
		});

	/*
		Showcase search, filtering, pagination
	*/
	if ( dayd_showcase_tools.length ) {
		
		wb_dayd_showcase_functions();
		
	}
	
	/*
		When the document is completely loaded
	*/
	$(window).load(function(){
		
		/*
			Showcase slideshow
		*/
		if ( dayd_showcase_slideshow.length ) {
			
			dayd_showcase_slideshow_orbit();
			
		}
		
	});
	
	/*
		Showcase search and filtering
	*/
	function wb_dayd_showcase_functions() {
		
		var dayd_tools_li = dayd_showcase_tools.find("li"),
			dayd_showcase_items = dayd_showcase.children(".showcase_item"),
			dayd_showcase_items_count = dayd_showcase_items.length - 1,
			dayd_showcase_columns = dayd_showcase.children(".showcase_item:first").attr("class").split(" ")[2],
			dayd_showcase_filter_reset = dayd_showcase_tools.find("li[data-filter='#']"),
			dayd_showcase_math,
			dayd_showcase_ipp = parseInt( dayd_slideshow.ipp ),
			dayd_showcase_pagination = dayd_showcase.children("#dayd_pagination_prev, #dayd_pagination_next"),
			dayd_showcase_pagination_next = dayd_showcase.children("#dayd_pagination_next"),
			dayd_showcase_pagination_prev = dayd_showcase.children("#dayd_pagination_prev"),
			dayd_showcase_paged = 1,
			dayd_showcase_paged_start,
			dayd_showcase_paged_end;
		
		dayd_showcase_tools.animate({ opacity: 1 }, { duration: 250 });

		dayd_showcase_filter_reset.hide();
		
		switch (dayd_showcase_columns) {
			case "half":
				dayd_showcase_math = 2;
			break;
			case "one_third":
				dayd_showcase_math = 3;
			break;
		  	case "one_fourth":
		  		dayd_showcase_math = 4;
		  	break;
		  	case "one_fifth":
		  		dayd_showcase_math = 5;
		  	break;
			default:
				dayd_showcase_math = 0;
		}
		
		/*
			Filtering
		*/
		dayd_tools_li.click(function(){
			
			var	$this = $(this),
				dayd_showcase_filter = $this.attr("data-filter");
			
			if ( dayd_showcase_filter == "#" || $this.hasClass("current") ) {
			
				dayd_showcase_reset( true );
				
				dayd_showcase_filter_unlock();
				
			}
			else if ( ! $this.hasClass("current") ) {
				
				$this.addClass("current").siblings().removeClass();
				
				if ( is_dayd_showcase_altered() ) {
				
					dayd_showcase_reset();
					
					if ( $.trim( dayd_showcase_tools_search.val() ) ) {
						
						dayd_showcase_items.removeHighlight();
					
					}
	
				}
													
				dayd_showcase_items.hide().each(function( items ){
										
					var $this = $(this),
						curr_item_filter = $this.attr("data-filter");
					
					if ( curr_item_filter.indexOf( dayd_showcase_filter ) != -1 ) {
						
						$this.show();
																	
					}
					
					if ( items == dayd_showcase_items_count ) {
					
						wb_dayd_reodd();
					
					}
					
					dayd_showcase_flag();
					
				});
				
				if ( dayd_showcase_filter_reset.is(":hidden") ) {
				
					dayd_showcase_filter_reset.fadeIn();
					
				}
				
			}
			
		});
		
		/*
			Search
		*/
		dayd_showcase_tools_search.keyup(function(e){
			
			var dayd_search_input = $(this).val(),
				dayd_search_input_length = $.trim( dayd_search_input ).length,
				dayd_showcase_selected,
				dayd_showcase_selected_visible,
				dayd_showcase_selected_offset;
			
			if ( is_dayd_showcase_altered() ) {
											
				dayd_showcase_items.removeHighlight();
			
			}
						
			if ( dayd_search_input_length > 1 ) {

				dayd_showcase_selected = dayd_showcase.find(".showcase_item:Contains('" + dayd_search_input + "')"),
				dayd_showcase_selected_visible = dayd_showcase_selected.filter(":visible");
								
				if ( dayd_search_input_length < 4 && dayd_showcase_selected_visible.length ) {
					
					dayd_showcase_items.css("opacity", .3);
										
					dayd_showcase_selected.each(function(){
														
						$(this).css("opacity", 1).find("h2, h3, p").highlight( dayd_search_input );
																				
					});
				
				}
				else if ( dayd_showcase_selected.length ) {

					dayd_showcase_items.hide();
										
					dayd_showcase_selected.each(function(){
						
						$(this).show().find("h2, h3, p").highlight( dayd_search_input );
							
						wb_dayd_reodd();
												
					});
					
				}
				else if ( ! dayd_showcase_selected.length ) {
				
					dayd_showcase_items.css("opacity", 1);
					
				}
				
				if ( e.keyCode == 27 ) {
					
					dayd_showcase_reset_search();
					
					dayd_showcase_reset();
					
					dayd_showcase_items.removeHighlight();
					
				}
				else if (e.keyCode == 13) {
									
					dayd_showcase_selected_offset = dayd_showcase_selected_visible.offset().top - $(window).scrollTop();
								
					if ( dayd_showcase_selected_offset > window.innerHeight ) {
					
						$("html, body").animate({ scrollTop: dayd_showcase_selected_offset }, { duration: 350, easing: "easeOutSine", queue: false });
						
						return false;
						
					}
					
				}
				
				dayd_showcase_flag();
				
				dayd_showcase_filter_unlock();
				
			}
			else if ( is_dayd_showcase_altered() ) {
								
				dayd_showcase_reset();
				
				wb_dayd_reodd();

			}
			
		});
		
		function dayd_showcase_flag() {
			
			dayd_showcase.addClass("altered");
			
			dayd_showcase_pagination.hide();
		
		}
		
		function dayd_showcase_reset( fade ) {
			
			dayd_showcase_items.removeClass("no-margin margin-right").css("opacity", 1);
			
			dayd_showcase.removeClass("altered");
			
			dayd_showcase_paged = 1;
			
			dayd_showcase_paginate( fade ? true : null );
			
		}
		
		function dayd_showcase_reset_search() {
			
			dayd_showcase_tools_search
				.blur()
				.val( null ).
				animate({ width: dayd_showcase_tools_search_width }, { duration: 150, queue: false, easing: "easeInSine" });
			
		}
		
		function dayd_showcase_filter_unlock() {
			
			dayd_showcase_filter_reset.hide();
			
			dayd_tools_li.removeClass("current");
		
		}
		
		function is_dayd_showcase_altered() {
		
			if ( dayd_showcase.hasClass("altered") ) {
			
				return true;
				
			}
			
		}
		
		/*
			Pagination
		*/
		if ( dayd_showcase_items.length > dayd_showcase_ipp ) {
										
			dayd_showcase_pagination_prev.click(function(e){
			
				dayd_showcase_paged--;
				dayd_showcase_paginate();
				
				e.preventDefault();
				
			});
	
			dayd_showcase_pagination_next.click(function(e){
			
				dayd_showcase_paged++;
				dayd_showcase_paginate();
				
				e.preventDefault();

			});
		
			dayd_showcase_paginate();
			
		}
		else {
			
			dayd_showcase_pagination.remove();
		
		}
		
		function dayd_showcase_paginate( fade ) {
			
			dayd_showcase_paged_start = ( ( dayd_showcase_paged - 1 ) * dayd_showcase_ipp ),
			dayd_showcase_paged_end = dayd_showcase_paged_start + dayd_showcase_ipp;
			
			dayd_showcase_items.each(function( items ){
			
				var $this = $(this);
				
				if ( items >= dayd_showcase_paged_start && items < dayd_showcase_paged_end ) {
					
					if ( fade ) {
						$this.fadeIn(450);
					}
					else {
						$this.show();
					}
				
				}
				else {
					
					$this.hide();
					
				}
				
				if ( dayd_showcase_paged_end >= dayd_showcase_items.length ) {
				
					dayd_showcase_pagination_next.hide();
					
				}
				else {
				
					dayd_showcase_pagination_next.show();
					
				}
				
				if ( dayd_showcase_paged_start >= 1 ) {
					
					dayd_showcase_pagination_prev.show();
				
				}
				else {
					
					dayd_showcase_pagination_prev.hide();
				
				}
				
				if ( items == dayd_showcase_items_count ) {
					wb_dayd_reodd();
				
				}
				
			});	
		
		}
		
		function wb_dayd_reodd() {
					
			if ( dayd_showcase_math ) {
						
				dayd_showcase_items.filter(":visible").each(function(i){
				
					var z = (i + 1) % dayd_showcase_math,
						$this = $(this);
					
					$this.removeClass("no-margin margin-right")
					
					if (z === 0) {
						$this.addClass("no-margin");
					}
					else {
						$this.addClass("margin-right");
					}
					
				});
				
			}
	
		}
		
	}
	
	/*
		Showcase slideshow
	*/
	function dayd_showcase_slideshow_orbit() {

		dayd_showcase_slideshow.orbit({
			animation: dayd_slideshow.fx,
			animationSpeed: parseInt( dayd_slideshow.speed ),
			timer: dayd_slideshow.timer,
			pauseOnHover: dayd_slideshow.pause,
			captionAnimation: dayd_slideshow.cap_fx,
			captionAnimationSpeed: parseInt( dayd_slideshow.cap_speed ),
			bullets: dayd_slideshow.thumbs,
			bulletThumbs: true
		});
		
		var dayd_slideshow_bullets = dayd_showcase_slideshow.parent().find(".orbit-bullets"),
			dayd_slideshow_container = dayd_showcase_slideshow.parents(".dayd_showcase_slideshow");
		
		dayd_slideshow_bullets.css({
			bottom: - dayd_slideshow_bullets.outerHeight() - 45,
			left: dayd_slideshow_bullets.parent().width() / 2 - ( dayd_slideshow_bullets.outerWidth() / 2 )
		});
				
		dayd_slideshow_container.height( dayd_showcase_slideshow.outerHeight() + dayd_slideshow_bullets.outerHeight() + 45 );

	}
	
	/*
		Insensitive :contains selector (:Contains)
	*/
	jQuery.expr[':'].Contains = function(a, i, m) { 
		return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0; 
	};

});