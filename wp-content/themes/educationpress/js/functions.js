function submit_sort_form()
{
	"use strict";
	document.ads_sort_form.submit();
}			
function updateQueryStringParameter(uri, key, value) {
	"use strict";
	if ( ! uri ) { uri = window.location.href; }
  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
  if (uri.match(re)) {
	  
	if(value!="")
    {
		return uri.replace(re, '$1' + key + "=" + value + '$2');
	}else{
		return uri.replace(re,'$1');
	}
  }
  else {
    return uri + separator + key + "=" + value;
  }
}
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
	
	
	jQuery( window ).resize(function() {
  		 jQuery.ajax({
			 url: educationpress_vars.ajaxurl,
			 data: { 
			 			action: 'educationpress_update_cart_count'
			 	   },
			 async: false,
			 success: function(res){
				 	if( jQuery( '#cart_item_count' ).length )
						jQuery( '#cart_item_count' ).html( res );
				}
		 });
	});
	
	
	//for coursepress but click
	jQuery( 'button[data-link]' ).click(function() {
		  window.location.href = $( this ).data('link');
	});
	
		
	
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
	  jQuery('#testimonials').carousel({ interval: jQuery('#testimonials').data("speed"), cycle: true });
	  
	  
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
	
	
	// Like it Code
	$('#fav-id').on('click', function() {	
		var $this = $(this);
		var likeit = $this.text();
		var liketype;
		$this.addClass('fav-load');
		$this.html('<img src="'+educationpress_vars.loadgif+'">');
		if($this.hasClass('loved')) {
			liketype="unlike";
		    $this.removeClass('loved');
		}	
		if($this.hasClass('love-it')) {
			liketype="like";
			$this.removeClass('love-it');
		}
		var post_id = $this.data('post-id');
		var user_id = $this.data('user-id');
		var post_data = {
			action: 'educationpress_love_it',
			item_id: post_id,
			user_id: user_id,
			liketype: liketype,
			love_it_nonce: educationpress_vars.nonce
		};
		$.post(educationpress_vars.ajaxurl, post_data, function(response) {
			if(response == 'loved') {
				$this.addClass('loved');
				$this.removeClass('fav-load');
				//var count_wrap = $this.next();
				var count = parseInt(likeit) + 1
				$this.html('<i class="fa fa-heart"></i> <span>'+count+'</span> ');
				//var count = count_wrap.text();
				//count_wrap.text(parseInt(count) + 1);	
				
			}else if(response == 'unloved') {
				
				$this.addClass('love-it');
				$this.removeClass('fav-load');
				//var count_wrap = $this.next();
				var count = parseInt(likeit) - 1
				$this.html('<i class="fa fa-heart-o"></i> <span>'+count+'</span> ');
			
			}else {
				alert(educationpress_vars.error_message);
			}
		});
		return false;
	});
	
	
	// Like it Code
	$('#like-id, .like-id').on('click', function() {	
		var $this = $(this);
		var likeit = $this.text();
		var liketype;
		if($this.hasClass('love-it')) {
			alert(educationpress_vars.already_unliked_message);
			return false;
		}	
		if($this.hasClass('loved')) {
			liketype="unlike";
		    $this.removeClass('loved');
		}	
		
		var post_id = $this.data('post-id');
		var user_id = $this.data('user-id');
		var post_data = {
			action: 'educationpress_love_it',
			item_id: post_id,
			user_id: user_id,
			liketype: liketype,
			love_it_nonce: educationpress_vars.nonce
		};
		$.post(educationpress_vars.ajaxurl, post_data, function(response) {
			if(response == 'unloved') {
				$this.addClass('love-it');
				$this.html('<i class="fa fa-heart-o"></i> '+educationpress_vars.unliked_message+'');
			
			}else {
				alert(educationpress_vars.error_message);
			}
		});
		return false;
	});
	
	
	
	/* auto complete the search field with tags */
	if ( jQuery.isFunction( jQuery.fn.autocomplete ) ) {
	jQuery('#s').autocomplete({
		source: function( request, response ) {
			jQuery.ajax({
				url: educationpress_vars.ajax_url,
				dataType: 'json',
				data: {
					action: 'educationpress-ajax-tag-search-front',
					tax: educationpress_vars.appTaxTag,
					term: request.term
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					//alert('Error: ' + errorThrown + ' - ' + textStatus + ' - ' + XMLHttpRequest);
				},
				success: function( data ) {
					response( jQuery.map( data, function( item ) {
						return {
							term: item,
							value: item.name
						};
					}));
				}
			});
		},
		minLength: 2
	});
	}

	
	$('#free').change(function() {
		var queryString = $(this).val();
		var existingquery = location.href.split('?')[1];
		var main_url=window.location.href;
		var re1 = new RegExp("/page/.*(&|$)", "i");
		if (main_url.match(re1)) 
		{
			main_url = main_url.replace(re1,'')+'/';
			if (typeof existingquery !== 'undefined'){
			main_url = main_url+'?'+existingquery;
			}
		}

        if($(this).is(":checked")) {
           var queryString = $(this).val();
		   var redirect_url=updateQueryStringParameter(main_url,'free',queryString);
       	}else{
		   var main_url=window.location.href;
		   var redirect_url=updateQueryStringParameter(main_url,'free','');
		}
		window.location = redirect_url;
	   });
	   
	   
	   $('#ccat').change(function() {
		var queryString = $(this).val();
		if ($(this).val() !=='') 
		{
			window.location = $(this).val();
		}
	   });
	   
	   
	   
	    $('#scat').change(function() {
		var queryString = $(this).val();
		var existingquery = location.href.split('?')[1];
		var main_url=window.location.href;
		var re1 = new RegExp("/page/.*(&|$)", "i");
		if (main_url.match(re1)) 
		{
			main_url = main_url.replace(re1,'')+'/';
			if (typeof existingquery !== 'undefined')
			{
			main_url = main_url+'?'+existingquery;
			}
		}
        var redirect_url=updateQueryStringParameter(main_url,'scat',queryString);
		window.location = redirect_url;
	   });
	   
	   
	   
	   $('#paid').change(function() {
		var queryString = $(this).val();
		var existingquery = location.href.split('?')[1];
		var main_url=window.location.href;
		var re1 = new RegExp("/page/.*(&|$)", "i");
		if (main_url.match(re1)) 
		{
			main_url = main_url.replace(re1,'')+'/';
			if (typeof existingquery !== 'undefined')
			{
			main_url = main_url+'?'+existingquery;
			}
		}
        if($(this).is(":checked")) {
           var queryString = $(this).val();
		   var redirect_url=updateQueryStringParameter(main_url,'paid',queryString);
       	}else{
		   var redirect_url=updateQueryStringParameter(main_url,'paid','');
		}
		window.location = redirect_url;
	   });
	   
	   
	 
		$('input[name="lang"]').change(function(){
			var existingquery = location.href.split('?')[1];
			var main_url=window.location.href;
			var re1 = new RegExp("/page/.*(&|$)", "i");
			if (main_url.match(re1)) 
			{
				main_url = main_url.replace(re1,'')+'/';
				if (typeof existingquery !== 'undefined'){
				main_url = main_url+'?'+existingquery;
				}
			}
			
			var checked = $('input[type="checkbox"].langfil:checked'); // get checked values
			var checkedValues = [];
			checked.each(function (i) {
				checkedValues.push(checked[i].value); // add checked values to our temporary list
			});
			var queryString = checkedValues.join(',');
			var redirect_url=updateQueryStringParameter(main_url,'lang',queryString);
			window.location = redirect_url;
		});	
	
	
	  if(jQuery().flexslider){
	   jQuery('.flexslider').flexslider({
        animation: "fade",
		before: function(slider){
		var $animatingElems = $(slider).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
		},
        start: function(slider){
          $('body').removeClass('loading');
        }
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

		
	$( document ).on( 'click', '.button-reload-module', function(event) {
		event.preventDefault();
		 
		var button = $(this),
			parentDiv = button.closest( '.cp-module-content' ),
			elementsDiv = $( '.module-elements', parentDiv ),
			responseDiv = $( '.module-response', parentDiv )
		;
		
		responseDiv.hide();
		elementsDiv.show();
		elementsDiv.removeClass( 'hide' );

		return false;
	} );
	
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




