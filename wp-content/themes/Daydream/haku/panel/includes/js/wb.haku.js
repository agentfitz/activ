/*
 * Haku Framework
 * Handcrafted by Stefano Giliberti
 * winterbits@gmail.com
 * winterbits.com
 */

jQuery.noConflict();
jQuery(document).ready(function($){
	
	/*
		Init dom manips
	*/
	$("body").prepend('<div id="wb_haku_overlay"></div>');
	
	/*
		Selectors cache
	*/
	var haku = $("#wb_haku"),
		haku_popup = $("#wb_haku_popup"),
		haku_menu = $("#wb_haku > div > .aside ul"),
		haku_save = $("#wb_haku_save"),
		haku_i = $("#wb_haku_i"),
		haku_infolist = $("#wb_haku_infolist"),
		haku_tabs = $("#wb_haku_container > div"),
		haku_changes = 0,
		haku_stored_tab = haku_obtain("haku_tab"),
		haku_chosen_tab = haku_stored_tab ? haku_stored_tab : 0;
		haku_overlay = $("#wb_haku_overlay"),
		haku_image_field = null,
		haku_image_src = null,
		haku_referer = haku.attr("data-referer"),
		haku_reset = $("#wb_haku_infolist a[href='#reset-options']"),
		haku_options_form = $("#wb_haku_options_form"),
		hold_on = false;	

	/*
		Display on load
	*/
	$(window).load(function(){
				
		haku.css("visibility", "visible").hide().fadeIn(200);
	
	});
	
	/*
		Dom manips
	*/
	function haku_radiopic_refresh() {
	
		$(".wb_haku_radiopic_select").each(function(){
			
			var $this = $(this),
				options = $this.find("option"),
				selector = $this.parent().find(".wb_haku_radiopic_list"),
				index = $this.find(":selected").index();
			
			if ( ! selector.hasClass("has_radiopic") ) {
			
				options.each(function(){
								
					selector.append('<a href="#" class="wb_haku_radiopic"><img src="' + $(this).attr("data-radiopic") + '" alt="" /></a>');
				
				});
					
				$this.parent().find(".wb_haku_radiopic:eq(" + index + ")").addClass("active");
				
				selector.addClass("has_radiopic");
			
			}
			
		});
	
	}
	
	haku_radiopic_refresh();
	
	/*
		Tabs
	*/
	haku_tabs.find(".section").each(function(){
		
		var $this = $(this),
			tab_name = $this.attr("data-tab");
		
		if ( $this.index() != haku_chosen_tab ) {
			
			$this.hide();
			
			haku_menu.append("<li>" + tab_name + "</li>");
			
		}
		else {
			
			haku_menu.append('<li class="active">' + tab_name + '<span></span></li>');
			
			if ( $this.hasClass("haku_manager") ) {
				
				haku_save.css("opacity", 0);
				
			}
			
			if ( $this.hasClass("haku_slides") ) {
			
				haku_load_slides();
				
			}
			
		}
		
	});
	
	/*
		Tab switching
	*/
	haku_menu.children("li").mousedown(function(){
				
		if ( ! $(this).hasClass("active") ) {
			
			var index = $(this).index();
									
			haku_tab_switch( index );
			
			haku_chosen_tab = index;
			
		}
		
	});
	
	function haku_tab_switch( index ) {
		
		var tab_to_show = haku_tabs.find(".section:eq(" + index + ")");
		
		if ( ! tab_to_show.hasClass("haku_selected_tab") ) {
						
			tab_to_show.show().addClass("haku_selected_tab").siblings(".section").hide().removeClass("haku_selected_tab");
			
			haku_menu_toggle( index );
			
			haku_store(index, "haku_tab");
			
			if ( tab_to_show.hasClass("haku_manager") ) {
				
				haku_save.animate({ opacity: 0 }, { duration: 150, queue: false });
								
			}
			else if ( is_invisible( haku_save ) ) {
				
				haku_save.animate({ opacity: 1 }, { duration: 150, queue: false });
			
			}
			
			if ( tab_to_show.hasClass("haku_slides") ) {
				
				haku_load_slides();
				
			}
		
		}
		
	}
	
	function haku_menu_toggle(index) {
		
		if ( ! haku_menu.find("li:eq(" + index + ")").hasClass() ) {
						
			haku_menu.find("li:eq(" + index + ")").addClass("active").append("<span></span>").siblings().removeClass().find("span").remove();
		
		}
		
	}
	
	/*
		Adjustments/Plugins
	*/
	haku_overlay.height( $(document).height() );
	
	haku_popup.css("top",  $(window).height() / 2 - 170 );
		
	$(".wb_haku_optgroup .chzn-select").chosen().change(function(){
					
		haku_spot_changes( $(this) );
		
	});
	
	function haku_tiptips() {
		
		$("[data-tip]").tipTip({
			attribute: "data-tip",
			delay: 100,
			defaultPosition: "top",
			maxWidth: "auto"
		});
	
	}
	
	haku_tiptips();
	
	$(".wb_haku_optgroup label").live("click", function(){
		
		$(this).parents(".wb_haku_optgroup").find("input[type='text'], textarea").focus();
	
	});
		
	$("a[href='#']").click(function(e){
		e.preventDefault();
	});
	
	/*
		Haku search
	*/
	$("#wb_haku #wb_haku_search").keyup(function(e){
		
		var $this = $(this),
			search_input = $this.val(),
			search_input_length = jQuery.trim( search_input ).length,
			selected,
			selected_offset;
				
		haku_tabs.removeHighlight();
		
		if ( search_input_length > 1 ) {
			
			selected = haku_tabs.find(".section:Contains('" + search_input + "')");
						
			if ( selected.length ) {
									
				haku_tab_switch( selected.index() );
				
				selected.find("h1, p, label").highlight( search_input );
				
				$this.addClass("found");

			}
			else {
				
				var second_try = haku_menu.find("li:Contains('" + search_input + "')"),
					index;
								
				if ( second_try.length ) {
																
					index = second_try.index();
					selected = haku_tabs.find(".section:eq('" + index + "')");
																
					haku_tab_switch( index );
				
				}
				
			}
			
		}
		else {
						
			haku_tab_switch( haku_chosen_tab );
			
			$this.removeClass("found");
						
		}
	
	});
	
	/*
		UI
	*/
	function haku_checkboxes_refresh() {

		$(".wb_haku_optgroup .wb_haku_checkbox").each(function(){
					
			var $this = $(this),
				real_checkbox = $this.parent().find(":checkbox");
			
			if ( real_checkbox.is(":checked") ) {
				$this.addClass("checked");
			}
			else {
				$this.removeClass("checked");
			}
					
		});

	}

	haku_checkboxes_refresh();
	
	$(".wb_haku_optgroup .wb_haku_checkbox").live("click", function(e){
			
		var $this = $(this),
			real_checkbox = $this.parent().find(":checkbox");
			
		if ( real_checkbox.is(":checked") ) {
			$this.removeClass("checked");
			real_checkbox.removeAttr("checked");
		}
		else {
			$this.addClass("checked");
			real_checkbox.attr("checked", "checked");
		}
		
		haku_spot_changes( real_checkbox );
		
		if ( $this.hasClass("trigger_change") ) {
			
			$this.parents(".wb_haku_element").trigger("change");
		
		}
		
		e.preventDefault();
	
	});
		
	$(".wb_haku_optgroup .wb_haku_picker").each(function(){
		
		var $this = $(this),
			real_input = $(this).parent().find(":text");
				
		$this.css("backgroundColor", real_input.val() );
		
		$this.ColorPicker({
			color: real_input.val(),
			onShow: function (colpkr) {
				if ( $(colpkr).is(":hidden") ) {
					$(colpkr).fadeIn(250);
					return false;
				}
			},
			onHide: function (colpkr) {
				$(colpkr).hide();
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$this.css("backgroundColor", "#" + hex);
				real_input.val("#" + hex)
				haku_spot_changes( real_input );
			}
		
		});
	
	});
	
	$(".wb_haku_optgroup .wb_haku_slider").each(function(){
	
		var $this = $(this),
			real_input = $(this).parent().find(":text"),
			input_tip = $(this).parent().find("span"),
			input_tip_label = ( input_tip.attr("data-label") ? input_tip.attr("data-label") : "pixels" ),
			min = $this.attr("data-min"),
			max = $this.attr("data-max"),
			step = $this.attr("data-step");
				
		$this.slider({
			min: parseFloat( min ),
			max: parseInt( max ),
			step: parseFloat( step ),
			value: real_input.val(),
			animate: true,
			slide: function (event, ui) {
				real_input.val( ui.value );
				input_tip.text( ui.value + " " + input_tip_label ).stop(true, true).fadeTo(250, 1);
				haku_spot_changes( real_input );
			}
		});
		
		$this.hover(function(){
			input_tip.stop(true, true).fadeTo(250, 1);
		},
		function() {
			input_tip.delay(2000).fadeTo(250, 0);
		});
		
	});
	
	$(".wb_haku_radiopic").live("click", function(e){
		
		e.preventDefault();
		
		var $this = $(this),
			index = $this.index(),
			real_input = $this.parent().parent().find("select");
		
		$this.addClass("active").siblings().removeClass("active");
		
		real_input.find("option:eq(" + index + ")").attr("selected", "selected").siblings().removeAttr("selected");
				
		haku_spot_changes( real_input );
		
		if ( real_input.hasClass("trigger_change") ) {
			
			real_input.parents("form").trigger("change");
		
		}
	
	});
	
	$(".wb_haku_optgroup input, .wb_haku_optgroup textarea").change(function(){
		haku_spot_changes( $(this) );
	});
	
	function haku_spot_changes(el) {
			
		if ( ! el.hasClass("changed") ) {
		
			el.addClass("changed");
			
			haku_update_changes();
			
		}
	
	}
	
	function haku_update_changes() {
	
		haku_changes = $(".wb_haku_options").find(".changed").length;
		
		if ( haku_changes ) {
		
			haku_save.children().text( haku_changes ).fadeIn(250);
		
		}
						
	}
	
	haku_i.click(function(){
		
		haku_overlay.show();
		
		$(this).addClass("active");
		
		haku_infolist.stop(true, true).fadeToggle(200);
		
	});
	
	haku_infolist.find("a").click(function(){
		
		haku_infolist.fadeOut(200);
		
		haku_i.removeClass();
	
	});
	
	haku_overlay.click(function(){
		
		$(this).hide();
		
		if ( haku_infolist.is(":visible") ) {
			
			haku_infolist.fadeOut(200);
			
			haku_i.removeClass();
		
		}
		
		if ( haku_popup.is(":visible") ) {
			
			haku_popup.fadeOut(200);
					
		}
			
	});
	
	$("[data-twin] .wb_haku_checkbox").click(function(){
	
		var parent = $(this).parents(".wb_haku_optgroup"),
			twin = parent.attr("data-twin");
			
		parent.nextAll("[data-twin='" + twin + "']").slideToggle(200);

	});
	
	/*
		Images selection
	*/
	$(".wb_haku_image_upload").live("click", function(e) {
		
		haku_image_field = $(this).parent().find(":text");
		
		tb_show( "", "media-upload.php?type=image&amp;post_id=-1&amp;TB_iframe=true" );
		
		e.preventDefault();
	
	});
	
	window.send_to_editor = function( html ) {
		
		haku_image_src = $("img", html ).attr("src");

		tb_remove();

		haku_image_field.val( haku_image_src ).delay(350).slideDown(200);

		haku_spot_changes( haku_image_field );
		
		if ( haku_image_field.hasClass("trigger_change") ) {
			
			haku_image_field.parents("form").trigger("change");
		
		}

	}
	
	/*
		Animations
	*/
	$(".wb_haku_element").live({
		mouseenter: function(){
			$(this).find(".wb_haku_drop").fadeIn(250);
		},
		mouseleave: function(){
			$(this).find(".wb_haku_drop").stop(true, true).hide();
		}
	});

	haku_popup.children(".wb_haku_drop").click(function(e){
		
		e.preventDefault();
		
		$(this).parent().fadeOut(200);
		
		haku_overlay.hide();
	
	});
	
	/*
		Theme options save
	*/
	haku_save.mousedown(function(e){
		
		if ( ! hold_on ) {
			
			var form_action = "action=haku_save_options&haku_referer=" + haku_referer + "&",
				contents = haku_options_form.serialize();
			
			$.post( ajaxurl, form_action + contents, function( response ) {
					
					/*
						Save response
					*/
					hold_on = true;
					
					if ( response == ':)' ) {
						
						haku_save.children("span").fadeOut(150, function(){
							
							haku.find(":text.wb_haku_image_upload_field[value='']").slideUp(200);
							
							haku.find(".changed").removeClass("changed");
							
							$(this).addClass("saved").show().fadeTo(1500, 1, function(){
								
								$(this).fadeOut(250, function(){
									
									$(this).removeClass("saved");
									
									hold_on = false;
									
								});
								
							});
						
						});
					
					}
					else {
					
						alert( response );
						
					}

				}
			);
	
			e.preventDefault();

		}
	
	});
	
	/*
		Theme options reset
	*/
	haku_reset.click(function(e){
				
		haku_popup.show();
		
		haku_popup.children("#wb_haku_popup_confirm").click(function(){
			
			var form_action = "action=haku_options_reset&haku_referer=" + haku_referer;
			
			$.post( ajaxurl, form_action, function( response ) {
			
					haku_popup.fadeOut(200, function(){
						
						window.location.href = window.location.href;
					
					});

				}
			);
		
		});
		
		e.preventDefault();
	
	});
	
	/*
		Slides adding
	*/
	$("#haku_add_slide").click(function(){
		
		$.post( ajaxurl, { action: "haku_add_slide", haku_referer: haku_referer }, function( response ) {
				
				/*
					Adding response
				*/
				if ( response == ':)' ) {
					
					haku_load_slides();
				
				}
				else {
					
					alert( response );
				
				}
				
			}
		);
	
	});
	
	/*
		Slides deleting
	*/
	$("#haku_slides_container .wb_haku_drop").live("click", function(e){
		
		var el = $(this).parents(".wb_haku_element"),
			el_id = el.attr("data-id");
				
		$.post( ajaxurl, { action: "haku_delete_slide", haku_referer: haku_referer, id: el_id }, function( response ) {
				
				/*
					Delete response
				*/
				if ( response == ':)' ) {

					el.hide();
					
					haku_load_slides();
				
				}
				else {
					
					alert( response );
				
				}
				
			}
		);
		
		e.preventDefault();
	
	});
	
	/*
		Slides updating
	*/
	$("#haku_slides_container .wb_haku_element_update").live("change", function(){
			
		var $this = $(this),
			el = $this.children(".wb_haku_element"),
			el_id = el.attr("data-id"),
			form_action = "action=haku_update_slide&haku_referer=" + haku_referer + "&id=" + el_id + "&",
			contents = $this.serialize();
				
		$.post( ajaxurl, form_action + contents, function( response ) {
				
				/*
					Update response
				*/
				if ( response == ':)' ) {

					haku_load_slides();
				
				}
				else {
					
					alert( response );
				
				}

			}
		);
		
	});
	
	/*
		Slides loading
	*/
	function haku_load_slides() {
	
		$.post( ajaxurl, { action: "haku_load_slides", haku_referer: haku_referer }, function( data ) {
				
				$("#haku_slides_container").html( data );
				
				haku_slides_sorting();
				
				haku_checkboxes_refresh();
				
				haku_radiopic_refresh();
				
			}
		);

	}
	
	/*
		Slides sorting
	*/
	function haku_slides_sorting() {
	
		$(".haku_sortable").sortable({
			opacity: .3, 
			cursor: "move",
			axis: "y",
			handle: ".wb_haku_grab",
			containment: "#wb_haku",
			update: function() {
											
				var serial = $(this).sortable("serialize");

				$.post( ajaxurl, { action: "haku_order_slides", haku_referer: haku_referer, order: serial }, function( response ) {
						
						/*
							Sorting response
						*/
						if ( response == ':)' ) {
		
							haku_load_slides();
						
						}
						else {
							
							alert( response );
						
						}
						
					}
				);
					
			}
			
		})
		
	}
	
	/*
		Sidebars loading
	*/
	function haku_load_sidebars() {
	
		$.post( ajaxurl, { action: "haku_load_sidebars", haku_referer: haku_referer }, function( data ) {
				
				$("#haku_sidebars_container").html( data );
				
				haku_tiptips();
								
			}
		);

	}
	
	haku_load_sidebars();
	
	/*
		Sidebars adding
	*/
	$("#haku_add_sidebar").click(function(){
		
		$.post( ajaxurl, { action: "haku_add_sidebar", haku_referer: haku_referer }, function( response ) {
				
				/*
					Adding response
				*/
				if ( response == ':)' ) {
					
					haku_load_sidebars();
				
				}
				else {
					
					alert( response );
				
				}
				
			}
		);
	
	});
	
	/*
		Sidebars deleting
	*/
	$("#haku_sidebars_container .wb_haku_drop").live("click", function(e){
		
		var el = $(this).parents(".wb_haku_element"),
			el_id = el.attr("data-id");
				
		$.post( ajaxurl, { action: "haku_delete_sidebar", haku_referer: haku_referer, id: el_id }, function( response ) {
				
				/*
					Delete response
				*/
				if ( response == ':)' ) {

					el.hide();
					
					haku_load_sidebars();
				
				}
				else {
					
					alert( response );
				
				}
				
			}
		);
		
		e.preventDefault();
	
	});

	/*
		Sidebars updating
	*/
	$("#haku_sidebars_container .wb_haku_element_update").live("change", function(){
			
		var $this = $(this),
			el = $this.children(".wb_haku_element"),
			el_id = el.attr("data-id"),
			form_action = "action=haku_update_sidebar&haku_referer=" + haku_referer + "&id=" + el_id + "&",
			contents = $this.serialize();
				
		$.post( ajaxurl, form_action + contents, function( response ) {
				
				/*
					Update response
				*/
				if ( response == ':)' ) {

					haku_load_sidebars();
				
				}
				else {
					
					alert( response );
				
				}

			}
		);
		
	});
	
	/*
		Fine functions
	*/
	jQuery.expr[':'].Contains = function(a, i, m) { 
		return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0; 
	};
	
	function is_invisible( el ) {
		return ( el.css("opacity") == 0 ? true : false );
	}
	
	function haku_store( value, id ) {
        var date = new Date();
        date.setTime( date.getTime() + (3*24*60*60*1000) );
	    document.cookie = id + "=" + value + "; expires=" + date.toGMTString() + "; path=/";
	}
	
	function haku_obtain( name ) {
	    var nameEQ = name + "=",
	    	ca = document.cookie.split(";");
	    for ( var i = 0; i < ca.length; i++ ) {
	        var c = ca[i];
	        while ( c.charAt(0) == " ") c = c.substring(1, c.length);
	        if ( c.indexOf( nameEQ ) == 0 ) return c.substring(nameEQ.length, c.length);
	    }
	    return null;
	}
	
});