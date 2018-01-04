	//Function to animate slider captions 
	function doAnimations( elems ) {
		//Cache the animationend event in a variable
		"use strict";
		var animEndEv = 'webkitAnimationEnd animationend';
		
		elems.each(function () {
			var $this = jQuery(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function () {
				$this.removeClass($animationType);
			});
		});
	}
	
	
	jQuery(document).ready(function($) {
			// Apply Bootstrap classes for some WordPress components
		"use strict";
		jQuery('#submit, .wpcf7-submit, .comment-reply-link, input[type="submit"]').addClass('btn btn-default');
		jQuery('.wp-caption').addClass('thumbnail');
		jQuery('.widget_rss ul').addClass('media-list');
		jQuery('table#wp-calendar').addClass('table table-striped');
	
			// Scroll to top
			// Makes scroll to top appear only when user starts to scroll down
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.scroll-to-top').fadeIn();
			} else {
				jQuery('.scroll-to-top').fadeOut();
			}
		});
		// Animation for scroll to top
	   jQuery('.scroll-to-top').click(function() {
			jQuery('html, body').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
		
		jQuery('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
				event.preventDefault(); 
				event.stopPropagation(); 
				jQuery(this).parent().siblings().removeClass('open');
				jQuery(this).parent().toggleClass('open');
			});
			
			
			
		/////////////////////////////////////////////////
		// MMenu.js
		/////////////////////////////////////////////////
		if(jQuery('nav#menu-left').length > 0) { //checks if nav element #menu exists
		jQuery('nav#menu-left').mmenu({
		// options
		offCanvas: {
				position: "right"
			 },
		navbars: { 
			add:true,
			title:"Menu"
		},
		classes: "mm-dark",
		slidingSubmenus: false,
		}, {
		// configuration
		selected: "current-menu-item"
		}
		);
		}
			
	  
		 // Testimonial Slider
		  jQuery('#testimonials').carousel({ interval: jQuery('#testimonials').data('speed'), cycle: true });
		  
		  
		// Skip link focus
		( function() {
			var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
				is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
				is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;
	
			if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
				window.addEventListener( 'hashchange', function() {
					var id = location.hash.substring( 1 ),
						element;
	
					if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
						return;
					}
	
					element = document.getElementById( id );
	
					if ( element ) {
						if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
							element.tabIndex = -1;
						}
	
						element.focus();
					}
				}, false );
			}
		})();
		
		jQuery('#list').click(function(event){event.preventDefault();$('#products .courses').addClass('list-group-item'); $('#list').addClass('active'); $('#grid').removeClass('active');});
		jQuery('#grid').click(function(event){event.preventDefault();$('#products .courses').removeClass('list-group-item'); $('#grid').addClass('active');$('#list').removeClass('active');
		
		jQuery('#products .courses').addClass('grid-group-item');});
		
		if(jQuery().flexslider && $(".flexslider").length ){
			var i = 0;
			jQuery('.flexslider').each(function() {
				i++;
				
				var  randomize = typeof $( this ).data('slider_order') !== 'undefined' ? $( this ).data('slider_order'): false;
				var animation = typeof $( this ).data('slider_animation') !== 'undefined' ? $( this ).data('slider_animation'): 'fade';
				var direction = typeof $( this ).data('slider_direction') !== 'undefined' ? $( this ).data('slider_direction'): 'horizontal';
				var slideshowSpeed = typeof $( this ).data('slider_show_speed') !== 'undefined' ? $( this ).data('slider_show_speed'): 7000;
				var animationSpeed = typeof $( this ).data('slider_animation_speed') !== 'undefined' ? $( this ).data('slider_animation_speed'): 600;
				var slideshow = typeof $( this ).data('slider_slide_show') !== 'undefined' && $( this ).data('slider_slide_show') == '1' ? true: false;
			
			jQuery( this ).flexslider({
					namespace: "flex-".i,   
					randomize: randomize,
					animation: animation,
					slideshow: slideshow,
					direction: direction, 
					slideshowSpeed: slideshowSpeed, 
					animationSpeed: animationSpeed,			
					before: function(slider){
					var $animatingElems = $(slider).find("[data-animation ^= 'animated']");
					doAnimations($animatingElems);
					},
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });	
			});
				 
			 var $myCarousel = $('.flexslider'), 
			 $firstAnimatingElems = $myCarousel.find('.flex-active-slide').find("[data-animation ^= 'animated']");
			 doAnimations($firstAnimatingElems);
		  }
		
		/*-----------------------------------------------------------------------------------*/
		/* Page Loader
		/*-----------------------------------------------------------------------------------*/
		 jQuery(window).load(function () {
			jQuery(".page-loader-img").fadeOut();	
			jQuery(".page-loader").delay(300).fadeOut("slow", function () {
				jQuery(this).remove();
			});
	
		});
		
		// ===== Scroll to Top ==== 
		jQuery(window).scroll(function() {
			if( jQuery('#return-to-top').length )
			{
				if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
					jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
				} else {
					jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
				}
			}
		});
		if( jQuery('#return-to-top').length )
		{
			jQuery('#return-to-top').click(function() {      // When arrow is clicked
				jQuery('body,html').animate({
					scrollTop : 0                       // Scroll to top of body
				}, 500);
			});
		}
	
	});
	
	jQuery(window).on("scroll", function() {
		"use strict";
		if(jQuery(".header-stick").length) {
			if (jQuery(window).scrollTop() > 180) {
				if( !jQuery(".header-stick").hasClass("header-sticky") ) 
					jQuery(".header-stick").addClass("header-sticky");
			} else {
				if( jQuery(".header-stick").hasClass("header-sticky") ) 
						jQuery(".header-stick").removeClass("header-sticky");
				
			}
		}
	});
	
	
